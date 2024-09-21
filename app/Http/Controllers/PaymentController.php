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
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'email' => 'required|email',
            'phone' => 'required|string',  // Cambiato da numeric a string
            'adress' => 'required|string',  // Corretto l'errore di battitura
            'date' => 'required|date',
            'total_price' => 'required|numeric',
            'restaurantId' => 'required|integer|exists:restaurants,id',  // Aggiunto per sicurezza
            'dishes' => 'required|array',
            'dishes.*.dish_id' => 'required|integer|exists:dishes,id',
            'dishes.*.quantity' => 'required|integer|min:1',  // Assicurarsi che ci sia almeno 1 piatto
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
            $order = Order::create([
                'user_id' => $validatedData['user_id'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'adress' => $validatedData['adress'],
                'date' => $validatedData['date'],
                'total_price' => $validatedData['total_price'],
                'state' => 'pending', // Imposta lo stato iniziale
            ]);
            foreach ($validatedData['dishes'] as $dish) {
                Order_Dish::create([
                    'order_id' => $order->id,
                    'dish_id' => $dish['dish_id'],
                    'quantity' => $dish['quantity'],
                ]);
            }
            return response()->json(['success' => true, 'message' => 'Payment completed successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => $result->message], 500);
        }
    }
}
