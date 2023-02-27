@extends('layouts.admin')

@section('content')
<div class="container-fluid vh-100">
    <div>
        <h1><strong>DASHBOARD</strong></h1>
        @if ($restaurant)
            <h3>Benvenuto '{{ $restaurant->name }}'</h3>
        @endif
    </div>
        
</div>
    
@endsection
