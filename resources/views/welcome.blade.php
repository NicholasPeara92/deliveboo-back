@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5 mt-5 d-flex flex-column">
        <div class="logo_laravel d-flex justify-content-center pt-5">
            <img width="300" src="{{ asset('storage/uploads/deliverboo.png') }}" alt="">
        </div>
        <h1 class="display-5 fw-bold my-5 text-center">Benvenuto nella Dashoboard di Deliveboo!</h1>
        <p class="fs-4 text-center mt-3">Insieme possiamo aiutarti a raggiungere più utenti</p>
        <div class="d-flex justify-content-center"><button class="btn btn-primary btn-lg my-5" type="button"><a class="text-white" style="text-decoration:none;" href="{{ route('admin.dashboard') }}">Vai alla Dasboard</a></button></div>
    </div>
</div>
@endsection
