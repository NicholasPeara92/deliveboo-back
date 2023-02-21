@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-12 col-md-6">
      @if ($restaurant->image)
        <div>
          <img style="max-width: 200px" class="w-100 py-3" src="{{ asset("storage/$restaurant->image") }}"
            alt="{{ $restaurant->name }}">
        </div>
      @endif
    </div>
    <div class="col-12 col-md-6">
      <h3 class="my-3"><strong>NOME DEL RISTORANTE: </strong>{{ $restaurant->name }}</h3>
      <h4><strong>NUMERO DI TELEFONO:</strong> +39 {{ $restaurant->telephone }}</h4>
      <h4><strong>INDIRIZZO:</strong> {{ $restaurant->address }}</h4>
      <h4><strong>PARTITA IVA:</strong> {{ $restaurant->iva }}</h4>
    </div>
  </div>



  {{-- bottone edit --}}
  <a href="{{ route('admin.restaurant.edit', $restaurant) }}" class="mt-3 me-4 btn btn-warning"><i
      class="fa-solid fa-pen"></i>Modifica il tuo ristorante</a>

  {{-- bottone delete --}}
  <div>
    <form action="{{ route('admin.restaurant.destroy', $restaurant->id) }}" method="POST" class="d-inline-block">
      @csrf
      @method('DELETE')
      <button type="submit" class="mt-3 btn btn-danger"><i class="fa-solid fa-trash"></i> Elimina il tuo ristorante
      </button>
    </form>
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
