<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Models\Order;  // Modello per la tabella 'orders'
use Illuminate\Support\Facades\Auth;  // Per ottenere l'ID utente autenticato
use Carbon\Carbon;  // Per ottenere la data odierna

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
        // 1. Validazione dei dati ricevuti
        $validatedData = $request->validate([
            'paymentMethodNonce' => 'required',
            'totalAmount' => 'required|numeric',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'dishes' => 'required|array', // Piatti ordinati
        ]);

        // 2. Processare il pagamento con Braintree
        $amount = $request->totalAmount;
        $nonce = $request->paymentMethodNonce;

        $result = $this->gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        // 3. Se la transazione ha successo, salvare i dati dell'ordine
        if ($result->success) {
            // Creazione dell'ordine
            $order = Order::create([
                'user_id' => Auth::id(), // ID dell'utente autenticato
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'date' => Carbon::now(), // Data odierna
                'total_price' => $amount, // Prezzo totale
                'state' => 'pending', // Stato iniziale dell'ordine
            ]);

            // Aggiungere i piatti ordinati (questo dipende dalla struttura della tua tabella)
            foreach ($request->dishes as $dish) {
                $order->dishes()->attach($dish['dish_id'], ['quantity' => $dish['quantity']]);
            }

            return response()->json([
                'success' => true,
                'transaction_id' => $result->transaction->id,
                'order_id' => $order->id
            ]);
        } else {
            // 4. Se la transazione fallisce, restituisce un errore
            return response()->json([
                'success' => false,
                'message' => $result->message
            ]);
        }
    }
}
