@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card" style="max-width: 500px; border: 2px solid #ccc; box-shadow: 0px 2px 6px #ccc;">
        @if ($restaurant->image)
        <div>
            <img src="{{asset("storage/$restaurant->image")}}" class="card-img-top" alt="{{$restaurant-> name}}" style="height: 350px; object-fit: cover;">
        </div>
    @endif
      <div class="card-body">
        <h5 class="card-title" style="font-family: Arial, sans-serif; font-size: 2rem; font-weight: bold; margin-bottom: 0.5rem;">Nome: {{$restaurant-> name}}</h5>
        <p class="card-text" style="font-family: Arial, sans-serif; font-size: 1.2rem; margin-top: 0.5rem;"><strong>Numero di telefono:</strong> +39 {{ $restaurant->telephone }}</p>
        <p class="card-text" style="font-family: Arial, sans-serif; font-size: 1.2rem; margin-top: 0.5rem;"><strong>Indirizzo: </strong>{{ $restaurant->address }}</p>
        <h5 class=""><strong>Partita IVA:</strong> {{ $restaurant->address }}</h5>
        @if (isset($restaurant->categories))
            @foreach ($restaurant->categories as $category)
                <h4>{{ $category->name }}</h4>
            @endforeach
        @endif
      </div>
      <div class="card-footer" style="background-color: #f9f9f9;">
        <a href="{{ route('admin.restaurant.edit', $restaurant) }}" class=" me-8 btn ms-btn shadow bg-white rounded"><i class="fa-solid fa-pen"></i>Modifica</a>
        <button type="button" class="me-8 btn ms-btn  shadow bg-white rounded" data-bs-toggle="modal" data-bs-target="#modal-{{ $restaurant->id }}"><i class="fa-solid fa-trash"></i> Elimina</button>  
    </div>
    </div>
  </div>
  <div class="modal fade" id="modal-{{ $restaurant->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Sei sicuro di eliminare il tuo ristorante "{{ $restaurant->name }}"?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <form action="{{ route('admin.restaurant.destroy', $restaurant) }}" method="POST"
                    class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Si</button>
                </form>
            </div>
        </div>
    </div>
</div>

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

@if (session('message'))
    <div class="alert alert-danger my-4">
        <ul class="list-unstyled">
            <li>{{ session('message') }}</li>
        </ul>
    </div>
@endif
@endsection




