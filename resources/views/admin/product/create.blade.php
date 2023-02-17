@extends('layouts.admin')

@section('content')
  <div class="container">
    <h1 class="my-3">Crea Prodotto</h1>
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
    <div>
      <form action="{{ route('admin.product.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nome Prodotto</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il nome"
            value="{{ old('name') }}">
        </div>
        <div class="mb-3">
          <label for="type" class="form-label">Tipologia</label>
          <input type="text" class="form-control" id="type" name="type"
            placeholder="Inserisci l'indirizzo">{{ old('type') }}
        </div>
        <div class="mb-3">
          <label for="iva" class="form-label">Descrizione</label>
          <textarea name="" id="" cols="30" rows="10"></textarea>
          <input type="text" class="form-control" id="iva" name="iva"
            placeholder="Inserisci la Partita IVA">{{ old('iva') }}
        </div>
        <div class="mb-3">
          <label for="telephone" class="form-label">Inserisci il numero di telefono</label>
          <input type="text" class="form-control" id="telephone" name="telephone"
            placeholder="Inserisci il numero di telefono">{{ old('telephone') }}
        </div>

        {{-- <div class="mb-3">
                    <label for="cover_image" class="form-label">Immagine</label>
                    <div class="mb-2">
                    <script>
                        var loadFile = function(event) {
                        var output = document.getElementById('output');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                            URL.revokeObjectURL(output.src) // free memory
                        }
                        };
                    </script>
                    </div>
                    <img width="100" id="output">
                    <input type="file" class="form-control" id="cover_image" name="cover_image" value="{{old('cover_image')}}" onchange="loadFile(event)">          
                    </div>
                    <div class="mb-3">
                    <label for="preview_link" class="form-label">Link all'anteprima del Progetto</label>
                    <input type="text" class="form-control" id="preview_link" name="preview_link" placeholder="Inserisci il link" value="{{old('preview_link')}}">
                    </div> --}}
        {{-- <div class="mb-3">
                    @foreach ($categories as $technology)
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="{{$technology->slug}}" name="technologies[]" value="{{$technology->id}}"{{in_array($technology->id, old('technologies', [])) ? 'checked' : ""}}>
                        <label class="form-check-label" for="{{$technology->slug}}">{{$technology->name}}</label>
                        </div>
                    @endforeach
                    </div> --}}
        <button type="submit" class="btn btn-success mt-5">Conferma</button>
      </form>
      <a href="{{ route('admin.product.index') }}" class="btn btn-primary my-4">Torna alla Lista</a>
    </div>
  </div>
@endsection