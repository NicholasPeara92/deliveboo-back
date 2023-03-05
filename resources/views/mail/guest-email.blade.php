<div class="email">
    <img src="{{ asset('storage/uploads/deliverboo.png') }}" alt="">

    <h2 style="text-color: red;">Nuovo Ordine effettuato !</h2>
    
    <h3>Riepilogo del tuo ordine</h3>
    <p>
        <ul>
        @foreach($order->products as $product)
            <li><b style="text-transform: uppercase">{{$product->name}} x{{$product->pivot->quantity}}</b></li>
        @endforeach
        </ul> 
        <ul style="margin-top: 25px;">
            <li><b>Totale:</b> {{$order->total}} €</li>
            <li><b>Nome:</b> {{$order->name}}</li>
            <li><b>Cognome:</b> {{$order->surname}}</li>
            <li><b>Indirizzo:</b> {{$order->address}}</li>
            <li><b>Telefono:</b> {{$order->telephone}}</li>
        </ul>  
    </p>
</div>

<style>
    .email {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-size: 32px;
    }
    img{
        width: 300px;
    }
    ul{
        list-style: none;
    }

</style>



