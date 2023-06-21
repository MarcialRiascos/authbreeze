{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

{{-- @extends('layouts.apps')
@section('style')
    {{ asset('assets/css/login.css') }}
@endsection
@section('title', 'Login')
@section('content')
    <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">
            <div class="login-card">
                <h1 class="text-dark"><span class="typer pregunta"></span></h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <label class="pregunta" for="email">Email:</label>
                    <input class="pregunta" type="email" name="email" placeholder="Introduce tu email">
                 

                    <label class="pregunta" for="password">Contraseña:</label>
                    <input class="pregunta" type="password" name="password" placeholder="Introduce tu contraseña">


                    <button class="sesion" type="submit">Iniciar sesión</button>
                    <div class="pregunta">
                        
                    </div>
            
                    <br>
                    <a class="pregunta" href="{{route('register')}}">¿No tienes una cuneta?</a>
                    <a class="pregunta" href="{{route('password.request')}}">¿Olvidaste tu contraseña?</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{ asset('assets/js/login.js') }}
@endsection --}}

@extends('layouts.apps')

@section('title', 'Login')
@section('content')
<div id="app">
<section class="section">
  <div class="container mt-5">
    <div class="row">
      <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        @component('_components.authlogo')
                   
        @endcomponent

        <div class="card card-primary">
          <div class="card-header"><h4>Login</h4></div>

          <div class="card-body">
            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                @csrf
                <x-input-error :messages="$errors->get('email')" class="mt-2" class="card-header"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2" class="card-header"/>
              <div class="form-group">
                <label for="email">Email (*)</label>
                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                  Por favor ingrese su email
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label">Contraseña (*)</label>
                  <div class="float-right">
                    <a href="{{route('password.request')}}" class="text-small">
                      ¿Has olvidado tu contraseña?
                    </a>
                  </div>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <div class="invalid-feedback">
                  Por favor ingrese su contraseña
                </div>
              </div>

              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                  <label class="custom-control-label" for="remember-me">Recordarme</label>
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                  Login
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="mt-5 text-muted text-center">
          ¿No tienes una cuenta? <a href="{{route('register')}}">¡Crea una!</a>
        </div>
        <div class="simple-footer">
          Copyright &copy; Stisla 2018
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection


