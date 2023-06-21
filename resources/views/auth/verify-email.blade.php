{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}

{{-- @extends('layouts.apps')
@section('style')
    {{ asset('assets/css/login.css') }}
@endsection
@section('title', 'Verificar email')
@section('content')
    <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">
            <div class="login-card">
                <h1 class="text-dark"><span class="typer pregunta"></span></h1>
                <div class="pregunta parrafo">
                    {{ __('Gracias por registrarte! Antes de comenzar, ¿podría verificar su dirección de correo electrónico haciendo clic en el enlace que le acabamos de enviar? Si no recibiste el correo electrónico, con gusto te enviaremos otro.') }}
                </div>
            <br>
                @if (session('status') == 'verification-link-sent')
                    <div class="parrafo text-success">
                        {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó durante el registro.') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button class="sesion" type="submit">Enviar emial de verificación</button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
        
                    <button class="sesion" type="submit">Cerrar sesion</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{ asset('assets/js/verify.js') }}
@endsection --}}

@extends('layouts.apps')

@section('title', 'Verificar email')
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
                <div class="text-justify">
                    {{ __('Gracias por registrarte! Antes de comenzar, ¿podría verificar su dirección de correo electrónico haciendo clic en el enlace que le acabamos de enviar? Si no recibiste el correo electrónico, con gusto te enviaremos otro.') }}
                </div>
               </div>
               <div class="card-header">
                @if (session('status') == 'verification-link-sent')
                    <div class="text-gray text-justify">
                        {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó durante el registro.') }}
                    </div>
                @endif
               </div>
    
    
              <div class="card-body">
                <form method="POST" action="{{ route('verification.send') }}" class="needs-validation" novalidate="">
                    @csrf
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Send Verify Email 
                    </button>
                  </div>
                </form>
                <form method="POST" action="{{ route('logout') }}" class="needs-validation" novalidate="">
                    @csrf
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Log Out
                    </button>
                  </div>
                </form>
              </div>
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


