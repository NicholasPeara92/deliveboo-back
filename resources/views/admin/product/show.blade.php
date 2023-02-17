@extends('layouts.admin')

@section('content')
  <div class="container">
    <a href="{{ route('admin.product.index', $product->id) }}" class="btn btn-success">Menù</i></a>
    <h1>{{ $product->name }}</h1>
    {{-- imgage --}}
    <h3>{{ $product->type }}</h3>
    <h4>{{ $product->price }}</h4>
    <p>{{ $product->description, $product->is_available }}
    </p>
  </div>
@endsection
