@extends('layouts.admin')

@section('content')
  <h3 class="my-3"><strong>I TUOI PRODOTTI</strong></h3>
  <div class="my-4">
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
          <td width="170">
            {{-- Show --}}
            <a href="{{ route('admin.product.show', $product->id) }}" class="btn btn-success"><i
                class="fa-solid fa-eye"></i></a>
            {{-- Edit --}}
            <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-warning"><i
                class="fa-solid fa-pencil"></i></a>
              {{-- Destroy --}}
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{ $product->id }}">
                <i class="fa-solid fa-trash"></i>
              </button>
          </td>
        </tr>
        <div class="modal fade" id="modal-{{ $product->id }}" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Sei sicuro di eliminare il prodotto "{{ $product->name }}"?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <form action="{{ route('admin.product.destroy', $product) }}" method="POST" class="d-inline-block">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Si</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
