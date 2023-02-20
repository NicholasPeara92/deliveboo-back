@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="txt-center">
<<<<<<< HEAD
      <h1><strong>Nome prodotto:</strong> {{ $product->name }}</h1>
=======
      <h3 style="">Nome prodotto: {{ $product->name }}</h3>
>>>>>>> 4d38ef8a56cf6bb12242f6ad67ad260128b1e770
        @if ($product->image)
          <img class="w-25" src="{{ asset("storage/$product->image") }}" alt="{{ $product->name }}">
        @endif
    </div>

    {{-- imgage --}}
    <h3><strong>Tipologia del prodotto:</strong> {{ $product->type }}</h3>
    <h4><strong>Costo:</strong> {{ $product->price }} €</h4>
    <p><strong>Descrizione:</strong> {{ $product->description, $product->is_available }}
    </p>
    <a href="{{ route('admin.product.index', $product->id) }}" class="mt-3 btn btn-success">Menù</i></a>
  </div>
@endsection
