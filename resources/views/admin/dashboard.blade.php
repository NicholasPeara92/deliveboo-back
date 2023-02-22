@extends('layouts.admin')

@section('content')
    <div>
        <h1 class="my-3"><strong>DASHBOARD</strong></h1>
        @if ($restaurant)
            <h3>Benvenuto {{ $restaurant->name }}</h3>
        @endif

    </div>
@endsection
