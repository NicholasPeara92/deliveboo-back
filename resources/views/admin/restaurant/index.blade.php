@extends('layouts.admin')

@section('content')
    <div class="container">
        
        <h2 class="my-3" style="text-transform: uppercase;">{{ $restaurant->name}}</h2>
        @if(session('message'))
        <div class="alert alert-danger my-3">
            <ul class="list-unstyled">
                <li>{{ session('message') }}</li>
            </ul>
        </div>
        @endif
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
        
    </div>
@endsection