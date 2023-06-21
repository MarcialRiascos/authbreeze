{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

{{-- @extends('layouts.apps')
@section('style')
    {{ asset('assets/css/login.css') }}
@endsection
@section('title', 'Resetear contraseña')
@section('content')
    <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">
            <div class="login-card">
                <h1 class="text-dark"><span class="typer pregunta"></span></h1>
                <p class="pregunta parrafo">
                    ¿Olvidaste tu contraseña? Ningún problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace de restablecimiento de contraseña que le permitirá elegir una nueva.
                </p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        
                    <label class="pregunta" for="email">Email:</label>
                    <input class="pregunta" type="email" name="email" placeholder="Introduce tu email">

                    <button class="sesion" type="submit">Enviar</button>
                    <br>
                    <a class="pregunta" href="{{route('login')}}">Volver al inicio</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{ asset('assets/js/resetear.js') }}
@endsection
 --}}

@extends('layouts.apps')

@section('title', 'Resetear contraseña')
@section('content')
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                      @component('_components.authlogo')
                   
                      @endcomponent
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="pregunta parrafo">
                                    {{ __(' ¿Olvidaste tu contraseña? Ningún problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace de restablecimiento de contraseña que le permitirá elegir una nueva.') }}
                                </div>
                            </div>
                            <x-auth-session-status class="mb-4" :status="session('status')" class="card-header" />

                            <div class="card-body">
                                <form method="POST" action="{{ route('password.email') }}" class="needs-validation"
                                    novalidate="">
                                    @csrf
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" class="card-header" />
                                    <div class="form-group">
                                        <label for="email">Email (*)</label>
                                        <input id="email" type="text" class="form-control" name="email" required>
                                        <br>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Enviar correo electrónico de verificación
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Volver al <a href="{{ route('login') }}">¡Login!</a>
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
