@extends('layouts.admin')

@section('content')
  <div class="row justify-content-center align-items-center p-4">
    <div class="col-12 col-md-4">
      @if ($restaurant->image)
        <div>
          <img style="max-width: 400px" class="w-100" src="{{ asset("storage/$restaurant->image") }}"
            alt="{{ $restaurant->name }}">
        </div>
      @endif
    </div>
    <div class="col-12 col-md-7">
      <div class="card ms-card">
        <h3 class="my-3"><strong>IL TUO RISTORANTE: </strong>{{ $restaurant->name }}</h3>
        <h4><strong>NUMERO DI TELEFONO:</strong> +39 {{ $restaurant->telephone }}</h4>
        <h4><strong>INDIRIZZO:</strong> {{ $restaurant->address }}</h4>
        <h4><strong>PARTITA IVA:</strong> {{ $restaurant->iva }}</h4>
        @if(isset($restaurant->categories))
        @foreach($restaurant->categories as $category)
          <h4>{{$category->name}}</h4>
        @endforeach
        @endif
      </div>
      <div class="text-center pt-3">
        {{-- bottone edit --}}
        <a href="{{ route('admin.restaurant.edit', $restaurant) }}" class="mt-3 me-4 btn ms-btn"><i
            class="fa-solid fa-pen"></i>
          Modifica il tuo ristorante</a>

        {{-- bottone delete --}}

        <button type="button" class="btn ms-btn mt-3" data-bs-toggle="modal"
          data-bs-target="#modal-{{ $restaurant->id }}">
          <i class="fa-solid fa-trash"></i> Elimina il tuo ristorante
        </button>

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
          <form action="{{ route('admin.restaurant.destroy', $restaurant) }}" method="POST" class="d-inline-block">
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
