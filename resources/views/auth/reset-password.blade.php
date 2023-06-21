{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div >
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

{{-- @extends('layouts.apps')
@section('style')
    {{ asset('assets/css/login.css') }}
@endsection
@section('title', 'Resetar contraseña')
@section('content')
    <div class="row">
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
            <div class="login-card">
                <h1 class="text-dark"><span class="typer pregunta"></span></h1>
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <label  class="pregunta" for="email" hidden>Email:</label>
                    <input type="hidden" class="pregunta" type="email" id="email" name="email" value="{{old('email', $request->email)}}" placeholder="Introduce tu email" required autofocus autocomplete="username">
                    
                    <label class="pregunta" for="password">Contraseña:</label>
                    <input class="pregunta" id="password" type="password" name="password" placeholder="Introduce tu contraseña" required autocomplete="new-password">
             
      
                    <label class="pregunta" for="password_confirmation">Confirmar:</label>
                    <input class="pregunta" type="password" id="password_confirmation" name="password_confirmation" placeholder="Introduce nuevamente tu contraseña" required autocomplete="new-password">
                   
                    

                    <button class="sesion" type="submit">Reset Password</button>
                    <br>
                </form>
            </div>
        </div>
    </div>

    @section('script')
    {{ asset('assets/js/password.js') }}
@endsection
@endsection --}}



@extends('layouts.apps')

@section('title', 'Resetar contraseña')
@section('content')
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            @component('_components.authlogo')
                   
            @endcomponent

            <div class="card card-primary">
              <div class="card-header"><h4>Restablecer la contraseña</h4></div>

              <div class="card-body">
                {{-- <p class="text-muted">Le enviaremos un enlace para restablecer su contraseña</p> --}}
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
                      <x-input-error :messages="$errors->get('email')" class="mt-2" />
                      <x-input-error :messages="$errors->get('password')" class="mt-2" />
                      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                  <div class="form-group">
                    {{-- <label for="email">Email</label> --}}
                    <input type="hidden" id="email" type="email" class="form-control" name="email" value="{{old('email', $request->email)}}" tabindex="1" required autofocus>
                  </div>

                  <div class="form-group">
                    <label for="password">Nueva contraseña (*)</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" tabindex="2" required>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password_confirmation">Confirmar Contraseña (*)</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" tabindex="2" required>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Restablecer la contraseña
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
    </div>
@endsection


