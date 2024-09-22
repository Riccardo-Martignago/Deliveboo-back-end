<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Braintree\Gateway;
use App\Http\Controllers\Controller;


class OrderController extends Controller
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

    public function createOrder(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'totalAmount' => 'required|numeric',
            'paymentMethodNonce' => 'required',
            'restaurantId' => 'required|numeric',
        ]);

        $amount = $request->totalAmount;
        $nonce = $request->paymentMethodNonce;

        // Effettua il pagamento tramite Braintree
        $result = $this->gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);

        if ($result->success) {
            // Crea l'ordine nel database
            $order = new Order();
            $order->user_id = $request->restaurantId; // Mappa l'id del ristorante a user_id
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->adress = $request->address;
            $order->total_price = $request->totalAmount;
            $order->date = Carbon::now();
            $order->state = 'completed';
            $order->save();

            return response()->json(['success' => true, 'order_id' => $order->id, 'transaction_id' => $result->transaction->id]);
        } else {
            return response()->json(['success' => false, 'message' => $result->message]);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
