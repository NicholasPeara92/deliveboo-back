@extends('layouts.admin')

@section('content')
<div class="container-fluid vh-100">
    <div>
        <h1><strong>DASHBOARD</strong></h1>
        @if ($restaurant)
            <h2>Benvenuto '{{ $restaurant->name }}'</h2>
        @endif
    </div>
    {{-- Ultimi ordini --}}
    @if($orders)
    <div class="border border-3 rounded-end p-2 mb-2">
        <h4>Ultimi ordini:</h4>       
        <table class="table">
            <thead>
                <tr class="bg-dark">
                    <th scope="col">id</th>
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
                @foreach ($myorders as $order)
                @if($order->products->contains('restaurant_id', $restaurant->id))         
                <tr class="py-2">
                    <td class="py-2">{{ $order->id }}</td>
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
    @endif
    {{-- Fine ultimi ordini --}}
    {{-- Ultimi piatti aggiunti --}}
    @if($myproducts)
    <div class="border border-3 rounded-end p-2">
        <h4>Ultimi prodotti:</h4>
        <table class="table">
            <thead>
                <tr class="bg-dark">
                    <th scope="col">Nome Prodotto</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Ultima modifica</th>
                </tr>
            </thead>
            <t-body>
                @foreach($myproducts as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->type }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->updated_at }}</td>
                </tr>            
                @endforeach
            </t-body>
        </table>
    </div>
    @endif
    {{-- Fine ultimi piatti aggiunti --}}
</div>    
@endsection
