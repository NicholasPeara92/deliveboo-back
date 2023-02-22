@extends('layouts.admin')

@section('content')
<div class="container-fluid vh-100">
    <div>
        <h1><strong>DASHBOARD</strong></h1>
        @if ($restaurant)
            <h3>Benvenuto {{ $restaurant->name }}</h3>
        @endif
    </div>
    <div>
        <h4 class="my-4 text-center">Riepilogo Ordini</h4>
        <table class="w-100">
            <thead>
              <tr class="bg-dark">
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Email</th>
                <th scope="col">Totale</th>
                <th scope="col">Data</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product) 
              @if(count($product->orders) !== 0)
                <tr class="ms-bg-primary">
                    <td colspan="7" class="text-center py-2"><strong style="text-transform: uppercase;">{{$product->name}}</strong></td></tr>
              @endif
              @foreach ($product->orders as $order)
                <tr>
                  <td class="py-2">{{ $order->name }}</td>
                  <td>{{ $order->surname }}</td>
                  <td>{{ $order->address }}</td>
                  <td>{{ $order->telephone }}</td>
                  <td>{{ $order->email }}</td>
                  <td>{{ $order->total }} €</td>
                  <td>{{ $order->create_order }}</td>
                </tr>
                @endforeach
              @endforeach
            </tbody>
          </table>
    </div>
</div>
    
@endsection
