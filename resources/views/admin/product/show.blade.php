@extends('layouts.admin')

@section('content')
    <div class="txt-center">
      <h3 class="pt-3 pb-4"><strong>Nome prodotto:</strong> {{ $product->name }}</h3>
        @if ($product->image)
          <img class="w-25 pb-3" src="{{ asset("storage/$product->image") }}" alt="{{ $product->name }}">
        @endif
    </div>

    {{-- imgage --}}
    <h4 class="py-3"><strong>Tipologia del prodotto:</strong> {{ $product->type }}</h4>
    <h5 class="py-3"><strong>Costo:</strong> {{ $product->price }} €</h5>
    <p class="py-3"><strong>Descrizione:</strong> {{ $product->description, $product->is_available }}
    </p>
    <a href="{{ route('admin.product.index', $product->id) }}" class="my-3 btn btn-success">Menù</i></a>
@endsection
