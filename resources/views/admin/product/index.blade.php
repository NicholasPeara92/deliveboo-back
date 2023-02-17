@extends('layouts.admin')

@section('content')
  <h2>product index</h2>
  <div class="my-3">
    <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Crea un nuovo Prodotto</a>
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
          <td>{{ $product->price }}</td>
          <td>
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
@endsection
