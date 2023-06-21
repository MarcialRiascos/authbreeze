{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

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
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

{{-- @extends('layouts.apps')
@section('style')
    {{ asset('assets/css/login.css') }}
@endsection
@section('title', 'Registro')
@section('content')
<div class="row">
    <div class="col-md-6">
      
    </div>
    <div class="col-md-6">
        <div class="login-card" >
            <h1 class="text-dark"><span class="typer2 pregunta"></span></h1>
            <form method="POST" action="{{ route('register') }}">
              @csrf
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

            <label class="pregunta" for="name">Nombre:</label>
            <input class="pregunta" type="text" name="name" placeholder="Introduce tu nombre">

            <label class="pregunta" for="lastname">Apellido:</label>
            <input class="pregunta" type="text" name="lastname" placeholder="Introduce tu apellido">

              <label class="pregunta" for="email">Email:</label>
              <input class="pregunta" type="text" name="email" placeholder="Introduce tu email">
             

              <label class="pregunta" for="phone">Telefono:</label>
              <input class="pregunta" type="text" name="phone" placeholder="Introduce tu telefono">
              
              <label class="pregunta" for="password">Contraseña:</label>
              <input class="pregunta" type="password" name="password" placeholder="Introduce tu contraseña">

              <label class="pregunta" for="password_confirmation">Confirmar:</label>
              <input class="pregunta" type="password" name="password_confirmation" placeholder="Introduce nuevamente tu contraseña">
              
              <button class="sesion" type="submit">Registrarse</button>
              <br>
              <a class="pregunta" href="{{route('login')}}">¿Tienes una cuneta?</a>
            </form>
          </div>
    </div>
</div>
@endsection

@section('script')
{{asset('assets/js/registro.js')}}
@endsection --}}

@extends('layouts.apps')

@section('title', 'Registro')
@section('content')
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            @component('_components.authlogo')
                   
            @endcomponent

            <div class="card card-primary">
              <div class="card-header"><h4>Registro</h4></div>

              <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <x-input-error :messages="$errors->get('email')" class="mt-2" class="card-header"/>
                      <x-input-error :messages="$errors->get('password')" class="mt-2" class="card-header"/>
                      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" class="card-header"/>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="name">Nombre (*)</label>
                      <input id="name" type="text" class="form-control" name="name" autofocus required>
                    </div>
                    <div class="form-group col-6">
                      <label for="lastname">Apellido (*)</label>
                      <input id="lastname" type="text" class="form-control" name="lastname" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="phone">Teléfono</label>
                      <input id="phone" type="text" class="form-control" name="phone">
                    </div>
                    <div class="form-group col-6">
                      <label for="email">Email (*)</label>
                      <input id="email" type="text" class="form-control" name="email" required>
                    </div>
                  </div>


                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password (*)</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password_confirmation" class="d-block">Confirmación de password (*)</label>
                      <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Sexo (*)</label>
                    <select class="form-control" name="sex" required>
                      <option value="Masculino">Masculino</option>
                      <option value="Femenino">Femenino</option>
                      <option value="No binario">No binario</option>
                    </select>
                  </div>


                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
                      <label class="custom-control-label" for="agree">Estoy de acuerdo con los términos y condiciones</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Registrar 
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              ¿Tienes una cuenta? <a href="{{route('login')}}">Login</a>
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