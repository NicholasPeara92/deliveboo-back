@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
      <div class="card" style="max-width: 500px; border: 2px solid #ccc; border-radius: 10px; box-shadow: 0px 2px 6px #ccc;">
        <img src="{{asset("storage/$product->image")}}" class="card-img-top" alt="{{$product-> name}}" style="height: 350px; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title" style="font-family: Arial, sans-serif; font-size: 2rem; font-weight: bold; margin-bottom: 0.5rem;">{{$product-> name}}</h5>
          <p class="card-text" style="font-family: Arial, sans-serif; font-size: 1.2rem; margin-top: 0.5rem;"><strong>Tipologia del prodotto:</strong> {{ $product->type }}</p>
          <p class="card-text" style="font-family: Arial, sans-serif; font-size: 1.2rem; margin-top: 0.5rem;"><strong>Descrizione: </strong>{{ $product->description, $product->is_available }}</p>
          <h5 class=""><strong>Costo:</strong> {{ $product->price }} €</h5>
          <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-warning">Modifica prodotto</i></a>
        </div>
        <div class="card-footer" style="background-color: #f9f9f9;">
          <small class="text-muted" style="font-family: Arial, sans-serif; font-size: 1rem;">Ultima modifica 10 minuti fa</small>
        </div>
      </div>
    </div>
    
    {{-- image --}}
    
@endsection
