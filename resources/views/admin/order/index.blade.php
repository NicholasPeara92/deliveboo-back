@extends('layouts.admin')

@section('content')
  <h3 class="my-3 text-center text-dark my-3"><strong>I TUOI ORDINI</strong></h3>
  <table class="table">
    <thead>
      <tr class="bg-dark">
        <th scope="col">Nome</th>
        <th scope="col">Cognome</th>
        <th scope="col">Indirizzo</th>
        <th scope="col">Telefono</th>
        <th scope="col">Email</th>
        <th scope="col">Totale</th>
        <th scope="col">Data</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product) 
      @if(count($product->orders) !== 0)
        <tr class="ms-bg-primary">
            <td colspan="8" class="text-center "><strong style="text-transform: uppercase; color: ">{{$product->name}}</strong></td></tr>
      @endif
      @foreach ($product->orders as $order)
        <tr>
          <td>{{ $order->name }}</td>
          <td>{{ $order->surname }}</td>
          <td>{{ $order->address }}</td>
          <td>{{ $order->telephone }}</td>
          <td>{{ $order->email }}</td>
          <td>{{ $order->total }} €</td>
          <td>{{ $order->create_order }}</td>
          <td width="170">
            <a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-success"><i
                class="fa-solid fa-eye"></i></a>
            <form action="{{ route('admin.order.destroy', $order) }}" method="POST" class="d-inline-block">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      @endforeach
    </tbody>
  </table>
@endsection