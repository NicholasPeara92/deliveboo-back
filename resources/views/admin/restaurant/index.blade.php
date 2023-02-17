@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="my-3">{{ $restaurant->name}}</h1>
        <a href="{{ route('admin.restaurant.edit', $restaurant) }}" class="btn btn-warning"><i class="fa-solid fa-pen"></i>Modifica il tuo ristorante</a>
    {{-- gestione degli errori di validazione --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{-- /gestione degli errori di validazione --}}
        @if(session('message'))
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                <li>{{ session('message') }}</li>
            </ul>
        </div>
        @endif
    </div>
@endsection