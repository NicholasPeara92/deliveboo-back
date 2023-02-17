@extends('layouts.admin')

@section('content')
    <h2>product index</h2>
    <div class="my-3">
        <a href="{{route('admin.product.create')}}" class="btn btn-primary">Crea un nuovo Prodotto</a>
    </div>
@endsection