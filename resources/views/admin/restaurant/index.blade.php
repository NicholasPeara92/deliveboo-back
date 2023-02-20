@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="my-3"><strong>Nome del Ristorante: </strong>{{ $restaurant->name}}</h1>
        <h2><strong>Numero di telefono:</strong> +39 {{ $restaurant->telephone }}</h2>
        <h2><strong>Indirizzo:</strong> {{ $restaurant->address }}</h2>     
        <h2><strong>Partita IVA:</strong> {{ $restaurant->iva }}</h2>
        
        {{-- bottone edit --}}
        <a href="{{ route('admin.restaurant.edit', $restaurant) }}" class="mt-3 me-4 btn btn-warning"><i class="fa-solid fa-pen"></i>Modifica il tuo ristorante</a>
        
        {{-- bottone delete --}}
        <a href="{{ route('admin.restaurant.destroy', $restaurant->id) }}" class="mt-3 btn btn-danger"><i class="fa-solid fa-trash"></i><i>Elimina il tuo ristorante</i></a>
        
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
        <div class="alert alert-danger my-4">
            <ul class="list-unstyled">
                <li>{{ session('message') }}</li>
            </ul>
        </div>
        @endif
    </div>
@endsection