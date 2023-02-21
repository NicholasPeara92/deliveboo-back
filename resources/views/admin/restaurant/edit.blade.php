@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="my-3">Modifica Ristorante</h1>
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
            <form action="{{ route('admin.restaurant.update', $restaurant) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nome Ristorante *</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $restaurant->name) }}" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Indirizzo *</label>
                    <input type="text" class="form-control" id="address" name="address"
                        value="{{ old('address', $restaurant->address) }}" required>
                </div>
                <div class="mb-3">
                    <label for="iva" class="form-label">Partita IVA *</label>
                    <input type="text" class="form-control" id="iva" name="iva"
                        value="{{ old('iva', $restaurant->iva) }}" required>
                </div>
                <div class="mb-3">
                    <label for="telephone" class="form-label">Modifica il numero di telefono *</label>
                    <input type="text" class="form-control" id="telephone" name="telephone"
                        value="{{ old('telephone', $restaurant->telephone) }}" required>
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
                    <img width="100" id="output">
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
            <a href="{{ route('admin.restaurant.index') }}" class="btn btn-primary my-4">Torna al Ristorante</a>
        </div>
    </div>
@endsection
