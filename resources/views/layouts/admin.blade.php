<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fontawesome 6 cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />

  <!-- Usando Vite -->
  @vite(['resources/js/app.js'])
</head>

<body>
  <div id="app">


    <div class="container-fluid vh-100">
      <div class="row h-100">
        <nav id="sidebarMenu"
          class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar collapse position-fixed h-100 pt-3 d-flex flex-column justify-space-between">
          <a class="navbar-brand col-md-3 col-lg-2" href="/"><img class="h- w-100"
              src="{{ asset('storage/uploads/deliverboo.png') }}" alt="Deliveboo"></a>
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              {{-- Tasto dashboard --}}
              <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}"
                  href="{{ route('admin.dashboard') }}">
                  <i class="fa-solid fa-d fa-lg fa-fw"></i>
                  Dashboard
                </a>
              </li>
              {{-- Tasto index Restaurant --}}
              <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.restaurant.index' ? 'bg-secondary' : '' }}"
                  href="{{ route('admin.restaurant.index') }}">
                  <i class="fa-solid fa-home fa-lg fa-fw"></i>
                  Il mio ristorante
                </a>
              </li>
              {{-- Tasto create Restaurant --}}
              <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.restaurant.create' ? 'bg-secondary' : '' }}"
                  href="{{ route('admin.restaurant.create') }}">
                  <i class="fa-solid fa-utensils fa-lg fa-fw"></i>
                  Crea ristorante
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.product.index' ? 'bg-secondary' : '' }}"
                  href="{{ route('admin.product.index') }}">
                  <i class="fa-solid fa-burger fa-lg fa-fw"></i>
                  Vedi prodotti
                </a>
              </li>
              <li class="nav-item flex-grow-1">
                <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>
          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          @yield('content')
        </main>
      </div>
    </div>
  </div>
</body>

</html>
