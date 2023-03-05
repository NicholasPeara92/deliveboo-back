@extends('layouts.admin')

@section('content')
<div class="container-fluid vh-100">
  <h3><strong class="pt-2">I TUOI PRODOTTI</strong></h3>
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    <div class="my-4">
        <a href="{{ route('admin.product.create') }}" class="mt-3 me-4 btn ms-btn shadow bg-white rounded"> 
            <i class="fa-solid fa-bowl-food"></i> Crea un nuovo Prodotto
        </a>
    </div>
    @if(sizeof($products))        
    <table class="table">
        <thead>
            <tr class="bg-dark">
                <th scope="col">Nome Prodotto</th>
                <th scope="col">Tipologia</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->type }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }} €</td>
                    <td width="170">
                        <a href="{{ route('admin.product.show', $product->id) }}" class="btn btn-success"><i
                                class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-warning"><i
                                class="fa-solid fa-pencil"></i></a>
                            <button type="button" data-bs-toggle="modal"
                            data-bs-target="#modal-{{ $product->id }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        <div class="modal fade" id="modal-{{ $product->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Sei sicuro di eliminare il tuo prodotto "{{ $product->name }}"?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                        <form action="{{ route('admin.product.destroy', $product) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">Si</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div>
        <h4>Non sono ancora presenti prodotti. Comincia ad aggiunge prodotti al tuo ristorante!
        </h4>
    </div>        
    @endif
</div>
@endsection
