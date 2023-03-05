@extends('layouts.app')

@section('content')
    <section class="vh-100" style="background-color: #00ccbc;">
        <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem; box-shadow: 0 20px 40px rgba(0, 0, 0, 1);">
                <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black{{__('Login')}}">
    
                    <form method="POST" action="{{route('login')}}">
                        @csrf
    
                        <div class="d-flex align-items-center mb-3 pb-1">
                            <i class="fas fa-cubes fa-2x me-3" style="color: #00ccbc;"></i>
                            <span class="h1 fw-bold mb-0">Deliveboo</span>
                        </div>
    
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;"><strong>Accedi al tuo account</strong></h5>
    
                        {{-- Indirizzo email --}}
                        <div class="form-outline mb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        {{-- Password --}}
                        <div class="form-outline mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
    
                        {{-- bottone login --}}
                        <div class="pt-1 mb-4">
                        <button class="btn btn-primary btn-dark btn-lg" type="submit">{{__('Login')}}</button>
                        </div>

                        @if (Route::has('password.request'))
                        <a class="btn btn-link" style="color: #00ccbc;" href="{{ route('password.request') }}">
                            {{ __('Password dimenticata?') }}
                        </a>
                        @endif

                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Non hai un account? <a href="#!"
                            style="color: #00ccbc;">Registrati qui!</a></p>
                    </form>
    
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
@endsection

