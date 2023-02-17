@extends('layouts.admin')

@section('content')
  <div class="container">
    <h1 class="my-3">Modifica: {{ $product->name}}</h1>

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
      <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="name" class="form-label">Nome Prodotto</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
        </div>
        <div class="mb-3">
          <label for="type" class="form-label">Tipologia</label>
          <input type="text" class="form-control" id="type" name="type" value="{{ $product->type }}">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label d-block">Descrizione</label>
          <textarea name="description" id="description" rows="5" class="w-100">{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
          <label for="price" class="form-label">Inserisci il prezzo</label>
          <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" step="0.01" {{ old('price') }}>
        </div>

        <div class="mb-3">
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
                    </div>
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