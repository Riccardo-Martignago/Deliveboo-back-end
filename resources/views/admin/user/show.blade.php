@extends('layouts.app')
@section('page-title')
Showing {{ $user->name }}
@endsection
@section('main-section')
<section class="col-12 mb-4 d-flex flex-wrap justify-content-center text-center ">

    <div class="card m-4" style="width: 40rem;">
        <h3 class="card-header">{{ $user->name}}</h3>
        <div class="m-3">
            <img src="{{ asset('uploads/' . $user->photo) }}" class="card-img" alt="{{ $user->name}}">
        </div>
        <div class="card-body">
            <br>
            <h5 class="card-title ">Address: {{ $user->adress }}</h5>
            Company Code: {{ $user->piva }} <br>
            <p class="card-text"> Email: {{ $user->email }}</p>
        </div>
    </div>
</section>
@endsection
@section('additional-scripts')
@vite('resources/js/posts/delete-index-confirmation.js')
@endsection


