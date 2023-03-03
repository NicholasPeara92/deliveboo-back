@extends('layouts.admin')

@section('content')
<div class="container-fluid vh-100">
    <div>
      <h4 class="py-4 text-center">I TUOI ORDINI</h4>
      <table class="w-100">
        <thead>
          <tr class="bg-dark">
            <th scope="col">Nome</th>
            <th scope="col">Cognome</th>
            <th scope="col">Indirizzo</th>
            <th scope="col">Telefono</th>
            <th scope="col">Email</th>
            <th scope="col">Data ordine</th>
            <th scope="col">Prodotti</th>
            <th scope="col">Quantità</th>
            <th scope="col">Totale</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($orders as $order)   
          @if($order->products->contains('restaurant_id', $restaurant->id))       
              <tr class="py-2">
                <td class="py-2">{{ $order->name }}</td>
                <td>{{ $order->surname }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->telephone }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->create_order }}</td>
                <td>
                  <ul>
                    @foreach ($order->products as $product)
                    @if($product->restaurant_id === $restaurant->id)
                    <li>{{ $product->name }}</li>
                    @endif
                    @endforeach
                  </ul>                   
                </td>
                <td>
                  <ul>
                    @foreach ($order->products as $product)
                      @if($product->restaurant_id === $restaurant->id)                                      
                      <li>{{ $product->pivot->quantity }}</li>
                      @endif
                    @endforeach
                  </ul>                   
                </td>
                <td>{{ $order->total }} €</td>
              </tr>
              @endif
          @endforeach
        </tbody>
      </table>
    </div>
</div>
    
@endsection