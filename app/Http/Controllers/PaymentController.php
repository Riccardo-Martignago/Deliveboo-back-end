<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree\Gateway;

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
        $amount = $request->amount; // Totale da pagare
        $nonce = $request->paymentMethodNonce; // Nonce generato dal client

        // Effettuare la transazione
        $result = $this->gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            return response()->json(['success' => true, 'transaction_id' => $result->transaction->id]);
        } else {
            return response()->json(['success' => false, 'message' => $result->message]);
        }
    }
}
