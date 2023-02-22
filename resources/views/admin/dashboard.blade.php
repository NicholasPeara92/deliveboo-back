@extends('layouts.admin')

@section('content')
    <div>
        <h1 class="my-3"><strong>DASHBOARD</strong></h1>
        @if ($restaurant)
            <h3>Benvenuto {{ $restaurant->name }}</h3>
        @endif
    </div>
    <div>
        <h4 class="my-4 text-center">Riepilogo Ordini</h4>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nome Acquirente</th>
                <th scope="col">Cognome Acquirente</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Email</th>
                <th scope="col">Totale Ordine</th>
                <th scope="col">Data</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product) 
              @if(count($product->orders) !== 0)
                <tr>
                    <td colspan="7" class="text-center text-blue"><strong style="text-transform: uppercase; color: ">{{$product->name}}</strong></td></tr>
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
                  {{-- <td width="170">
                    <a href="{{ route('admin.product.show', $product->id) }}" class="btn btn-success"><i
                        class="fa-solid fa-eye"></i></a>
                    <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-warning"><i
                        class="fa-solid fa-pencil"></i></a>
                    <form action="{{ route('admin.product.destroy', $product) }}" method="POST" class="d-inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </form>
                  </td> --}}
                </tr>
                @endforeach
              @endforeach
            </tbody>
          </table>
    </div>
@endsection
