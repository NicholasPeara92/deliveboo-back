@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="txt-center">
      <h3 style="">Nome prodotto: {{ $product->name }}</h3>
        @if ($product->image)
          <img class="w-25" src="{{ asset("storage/$product->image") }}" alt="{{ $product->name }}">
        @endif
    </div>

    {{-- imgage --}}
    <h3>Tipologia del prodotto: {{ $product->type }}</h3>
    <h4>Costo: {{ $product->price }} €</h4>
    <p>Descrizione: {{ $product->description, $product->is_available }}
    </p>
    <a href="{{ route('admin.product.index', $product->id) }}" class="mt-3 btn btn-success">Menù</i></a>
  </div>
@endsection
