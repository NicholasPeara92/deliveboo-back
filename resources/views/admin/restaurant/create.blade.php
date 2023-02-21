@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3 class="my-3"><strong>Crea Ristorante</strong></h3>
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
            <form action="{{ route('admin.restaurant.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome Ristorante *</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il nome"
                        value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Indirizzo *</label>
                    <input type="text" class="form-control" id="address" name="address"
                        placeholder="Inserisci l'indirizzo" {{ old('address') }} required>
                </div>
                <div class="mb-3">
                    <label for="iva" class="form-label">Partita IVA *</label>
                    <input type="text" class="form-control" id="iva" name="iva"
                        placeholder="Inserisci la Partita IVA" {{ old('iva') }} required>
                </div>
                <div class="mb-3">
                    <label for="telephone" class="form-label">Inserisci il numero di telefono *</label>
                    <input type="text" class="form-control" id="telephone" name="telephone"
                        placeholder="Inserisci il numero di telefono" {{ old('telephone') }} required>
                </div>
                <div class="mb-3">
                    <div class="mb-1">
                        Scegli la tipologia di ristorante
                    </div>              
                    @foreach ($categories as $category)
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="{{$category->slug}}" name="categories[]" value="{{$category->id}}"{{in_array($category->id, old('categories', [])) ? 'checked' : ""}}>
                    <label class="form-check-label" for="{{$category->slug}}">{{$category->name}}</label>
                    </div>
                    @endforeach
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
                <button type="submit" class="btn btn-success mt-5">Conferma</button>
            </form>
            <a href="{{ route('admin.restaurant.index') }}" class="btn btn-primary my-4">Torna alla Lista</a>
        </div>
    </div>
@endsection
