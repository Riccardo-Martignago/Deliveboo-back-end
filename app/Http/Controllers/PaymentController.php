<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Models\Order;
use App\Models\Order_Dish;

class PaymentController extends Controller
{
    protected $gateway;

    public function __construct()
    {
        $this->gateway = new Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
        ]);
    }

    // Metodo per generare un token del client
    public function generateToken()
    {
        $clientToken = $this->gateway->clientToken()->generate();
        return response()->json(['token' => $clientToken]);
    }

    // Metodo per processare il pagamento
    public function processPayment(Request $request)
    {
        $request->validate([
            'paymentMethodNonce' => 'required|string',
            'amount' => 'required|numeric',
            'restaurantId' => 'required|integer',
            'dishes' => 'required|array',
            'dishes.*.dish_id' => 'required|integer',
            'dishes.*.quantity' => 'required|integer',
        ]);

        $nonce = $request->input('paymentMethodNonce');
        $amount = $request->input('amount');
        $restaurantId = $request->input('restaurantId');
        $dishes = $request->input('dishes');

        // Configura il gateway Braintree
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        // Esegui la transazione
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        // Controlla il risultato della transazione
        if ($result->success) {
            // Salva l'ordine nel database
            Order::create([
                'restaurant_id' => $restaurantId,
                'total_price' => $amount,
                'dishes' => json_encode($dishes) // O crea una relazione nella tabella 'order_dishes'
            ]);

            return response()->json(['success' => true, 'message' => 'Payment completed successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => $result->message], 500);
        }
    }
}
