@extends('layouts.admin')

@section('content')
    <div class="txt-center d-flex flex-column align-items-center">
      <h3 class="pt-3 pb-4"><strong>{{ $product->name }}</strong> </h3>
        @if ($product->image)
          <img width="300" height="300" class="pb-3" src="{{ asset("storage/$product->image") }}" alt="{{ $product->name }}">
        @endif
        <h4 class="pt-3"><strong>Tipologia del prodotto:</strong> {{ $product->type }}</h4>
        <p class=""><strong>Descrizione:</strong> {{ $product->description, $product->is_available }}
        <h5 class=""><strong>Costo:</strong> {{ $product->price }} €</h5>
    
    </p>
    <a href="{{ route('admin.product.index', $product->id) }}" class="my-3 btn btn-success">Menù</i></a>
    </div>
    {{-- image --}}
    
@endsection
