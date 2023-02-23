@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5 mt-5 d-flex flex-column">
        <div class="logo_laravel d-flex justify-content-center pt-5">
            <img width="300" src="{{ asset('storage/uploads/deliverboo.png') }}" alt="">
        </div>
        <h1 class="display-5 fw-bold my-5 text-center">
            Welcome to Deliveboo Dasboard
        </h1>

        <p class="fs-4 text-center mt-3">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
        <div class="d-flex justify-content-center"><button class="btn btn-primary btn-lg my-5" type="button">Vai alla Dasboard</button></div>
    </div>
</div>
@endsection
