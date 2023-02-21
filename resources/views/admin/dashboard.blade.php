@extends('layouts.admin')

@section('content')
    <div class="pt-2">
        <h1 class="my-3"><strong>DASHBOARD</strong></h1>
        <h3>Benvenuto {{ $restaurant->name }}</h3>
    </div>
@endsection
