@extends('layouts.admin')

@section('content')
    <div class="txt-center">
      <h3 class="pt-3 pb-4"><strong>Ordine numero:</strong> {{ $order->id }}</h3>
    </div>

    {{-- imgage --}}
    <h4 class="pt-3"><strong>Nome Acquirente:</strong> {{ $order->name }}</h4>
    <h5 class=""><strong>Cognome Acquirente:</strong> {{ $order->surname }} </h5>
    <p class=""><strong>Totale:</strong> {{ $order->total }} €
    </p>
    <a href="{{ route('admin.order.index') }}" class="my-3 btn btn-success">Menù</i></a>
@endsection