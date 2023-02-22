@extends('layouts.admin')

@section('content')
<div class="container-fluid vh-100">
  <h3><strong class="pt-2">I TUOI PRODOTTI</strong></h3>
    <div class="my-4">
        <a href="{{ route('admin.product.create') }}" class="mt-3 me-4 btn ms-btn shadow bg-white rounded"> <i
                class="fa-solid fa-bowl-food"></i> Crea
            un nuovo Prodotto</a>
    </div>
    <table class="table">
        <thead>
            <tr>
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
                        <form action="{{ route('admin.product.destroy', $product) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
