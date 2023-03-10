@extends('layouts.admin')

@section('content')
  <div class="container">
    <h3 class="my-3">Modifica: {{ $product->name }}</h3>

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
          <label for="name" class="form-label">Nome Prodotto *</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3">
          <label for="type" class="form-label">Tipologia *</label>
          <input type="text" class="form-control" id="type" name="type" value="{{ $product->type }}" required>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label d-block">Descrizione *</label>
          <textarea name="description" id="description" rows="5" class="w-100" required>{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
          <label for="price" class="form-label">Inserisci il prezzo *</label>
          <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}"
            step="0.01" {{ old('price') }} min="0.10" required>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Immagine</label>
          <div class="mb-2">
            <img width="100" id="output"
              @if ($product->image) src="{{ asset("storage/$product->image") }}" @endif>
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
          @if ($product->image)
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="no_image" name="no_image">
              <label class="form-check-label" for="no_image">Nessuna immagine</label>
            </div>
          @endif
          <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}"
            onchange="loadFile(event)">
          <script>
            const inputCheckbox = document.getElementById('no_image');
            const inputFile = document.getElementById('image');
            inputCheckbox.addEventListener('change', function() {
              if (inputCheckbox.checked) {
                inputFile.disabled = true;
              } else {
                inputFile.disabled = false;
              }
            });
          </script>
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
