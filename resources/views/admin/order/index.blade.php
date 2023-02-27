@extends('layouts.admin')

@section('content')
<div class="container-fluid vh-100">
    <div>
        <h4 class="py-4 text-center">I TUOI ORDINI</h4>
        {{-- @dd($products) --}}

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
              <th scope="col">Azioni</th>
            </tr>
          </thead>
        </table>
        
        @foreach ($orders as $order)
        <div>{{ $order->name }}</div> 

          @foreach ($order->products as $product)
          <span>{{ $product->name}}</span>      
          @endforeach

        @endforeach
        {{-- <table class="w-100">
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
                    <td colspan="8" class="text-center py-2"><strong style="text-transform: uppercase;">{{$product->name}}</strong></td></tr>
              @endif
              @foreach ($product->orders as $order)
                <tr class="py-2">
                  <td class="py-2">{{ $order->name }}</td>
                  <td>{{ $order->surname }}</td>
                  <td>{{ $order->address }}</td>
                  <td>{{ $order->telephone }}</td>
                  <td>{{ $order->email }}</td>
                  <td>{{ $order->total }} €</td>
                  <td>{{ $order->create_order }}</td>
                  <td width="130">
                    <a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-success"><i
                        class="fa-solid fa-eye"></i></a>
                  </td>
                </tr>
                @endforeach
              @endforeach
            </tbody>
          </table> --}}
    </div>
</div>
    
@endsection