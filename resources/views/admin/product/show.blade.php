@extends('layouts.admin')

@section('content')
  <div class="container">
    <a href="{{ route('admin.product.index', $product->id) }}" class="btn btn-success">Menù</i></a>
    <div class="mt-4">
      <div class="text-center">
        @if ($project->cover_image)
          <img class="w-25" src="{{ asset("storage/$project->cover_image") }}" alt="{{ $project->title }}">
        @endif
      </div>
      {{ $project->description }}
    </div>
    <h1>{{ $product->name }}</h1>
    {{-- imgage --}}
    <h3>{{ $product->type }}</h3>
    <h4>{{ $product->price }}</h4>
    <p>{{ $product->description, $product->is_available }}
    </p>
  </div>
@endsection
