@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3 class="my-3"><strong>Crea Prodotto</strong></h3>
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
            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome Prodotto *</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il nome"
                        value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Tipologia *</label>
                    <input type="text" class="form-control" id="type" name="type"
                        placeholder="Inserisci la tipologia del prodotto" {{ old('type') }} required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label d-block">Descrizione *</label>
                    <textarea name="description" id="description" rows="5" class="w-100" required>{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Inserisci il prezzo *</label>
                    <input type="number" class="form-control" id="price" name="price"
                        placeholder="Inserisci il prezzo" step="0.01" {{ old('price') }} min="0.10" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
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
                    <img class="mb-3" width="100" id="output">
                    <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}"
                        onchange="loadFile(event)">
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
