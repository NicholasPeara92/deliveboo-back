@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-3">{{ $restaurant->name}}</h1>
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