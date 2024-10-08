@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
                <h1>Order ID: {{ $order->id }}</h1>
                <h1>Customer ID: {{ $order->user->id }}</h1>
                <p>Email: {{ $order->email }}</p>
                <p>Phone: {{ $order->phone }}</p>
                <p>Address: {{ $order->adress }}</p>
                <p>Date: {{ $order->date }}</td>
                <p>Total Price: {{ $order->total_price }}</p>
                <p>State: {{ $order->state }}</p>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-primary mt-3">Return to orders</a>
        </div>
    </div>
</div>
@endsection
