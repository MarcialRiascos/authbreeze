<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @section('title', 'Perfil')
    {{-- <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    @include('layouts._partials.dashboardhead')
 



    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    {{-- @include('layouts._partials.dashboardscripts') --}}

</head>

<body class="">
    <div class="">
        @include('layouts.navigation')
        @include('layouts._partials.dashboardmenu')
        @include('sweetalert::alert')
        <!-- Page Heading -->
        @if (isset($header))
            {{-- <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header> --}}
        @endif

        <!-- Page Content -->
        <main>
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Perfil</h1>
                        <div class="section-header-breadcrumb">
                        </div>
                    </div>
                    @if(Session::has('success'))
                    <div class="alert alert-success text-dark text-center font-weight-bold col-md-11 container" role="alert">
                      {{Session::get('success')}}
                    </div>
                    @endif
                    @if(Session::has('danger'))
                    <div class="alert bg-danger text-light text-center font-weight-bold col-md-11 container" role="alert">
                      {{Session::get('danger')}}
                    </div>
                    @endif
                    <div class="section-body">
                        <h2 class="section-title">Hola, {{ auth()->user()->name }}! su ID de usuario es: {{auth()->user()->id}}</h2>
                        <p class="section-lead">
                            Cambie la información sobre usted en esta página.
                        </p>
                        <div class="row mt-sm-4">
                            <div class="col-12 col-md-12 col-lg-5">
                                <div class="card profile-widget">
                                    <div class="profile-widget-header">
                                        {{-- <img alt="image" src="{{ asset('assets/assets/img/avatar/avatar-1.png') }}" --}}
                                        <img alt="image" src="{{asset(auth()->user()->file)}}"
                                            class="rounded-circle profile-widget-picture">
                                        <div class="profile-widget-items">
                                            <div class="profile-widget-item">
                                                <div class="profile-widget-item-label">Atenciones</div>
                                                <div class="profile-widget-item-value">{{auth()->user()->total}}</div>
                                            </div>
                                            <div class="profile-widget-item">
                                                <div class="profile-widget-item-label">Realizadas</div>
                                                <div class="profile-widget-item-value">{{auth()->user()->realizado}}</div>
                                            </div>
                                            <div class="profile-widget-item">
                                                <div class="profile-widget-item-label">Pendientes</div>
                                                <div class="profile-widget-item-value">{{auth()->user()->pendiente}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-widget-description text-dark text-justify">
                                        <div class="profile-widget-name text-dark">{{ auth()->user()->name }} <div
                                                class="text-muted d-inline font-weight-normal">
                                                
                                            </div>
                                        </div>
                                        {{ auth()->user()->description }}
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="{{ auth()->user()->facebook }}" target="_Blank"
                                            class="btn btn-social-icon btn-facebook mr-1">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                        <a href="{{ auth()->user()->instagram }}"target="_Blank"
                                            class="btn btn-social-icon btn-instagram mr-1">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                        <a href="{{ auth()->user()->youtube }}" target="_Blank"
                                            class="btn btn-social-icon btn-pinterest ">
                                            <i class="fa-brands fa-youtube" style="color: #ffffff;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-7">
                                <div class="card">
                                    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="needs-validation"
                                        novalidate="">
                                        @csrf
                                        @method('patch')
                                        <div class="card-header bg-primary">
                                            <h4 class="text-light">Editar Perfil</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Nombre (*)</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->name }}" name="name"
                                                        required="">
                                                    <div class="invalid-feedback">
                                                        Please fill in the first name
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Apellido (*)</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->lastname }}" name="lastname"
                                                        required="">
                                                    <div class="invalid-feedback">
                                                        Please fill in the last name
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-7 col-12">
                                                    <label>Email (*)</label>
                                                    <input type="email" class="form-control"
                                                        value="{{ auth()->user()->email }}" name="email"
                                                        required="">
                                                    <div class="invalid-feedback">
                                                        Please fill in the email
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-5 col-12">
                                                    <label>Telefono</label>
                                                    <input type="tel" class="form-control"
                                                        value="{{ auth()->user()->phone }}" name="phone">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Cedula/Tarjeta Identidad</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->dni }}" name="dni"
                                                        >
                                                    <div class="invalid-feedback">
                                                        Please fill in the email
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Sexo (*)</label>
                                                    <select class="form-control" name="sex" required>
                                                      @if(auth()->user()->sex=='Masculino')
                                                        {{-- <option value="{{auth()->user()->sex}}" selected disabled>{{auth()->user()->sex}}</option> --}}
                                                        <option value="Masculino" selected>Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                        <option value="No binario">No binario</option>
                                                      @elseif(auth()->user()->sex=='Femenino')
                                                      <option value="Masculino">Masculino</option>
                                                      <option value="Femenino" selected>Femenino</option>
                                                      <option value="No binario">No binario</option>
                                                      @else 
                                                      <option value="Masculino">Masculino</option>
                                                      <option value="Femenino">Femenino</option>
                                                      <option value="No binario" selected>No binario</option>
                                                      @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 col-12">
                                                    <label>Fecha de Nacimiento</label>
                                                    <input type="date" class="form-control"
                                                        value="{{ auth()->user()->nacimiento }}" name="nacimiento">
                                                    <div class="invalid-feedback">
                                                        Please fill in the email
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label>Biografía</label>
                                                    <textarea class="form-control" name="description">{{ auth()->user()->description }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Facebook</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->facebook }}" name="facebook">
                                                    <div class="invalid-feedback">
                                                        Please fill in the email
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Instagram</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->instagram }}" name="instagram">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 col-12">
                                                    <label>YouTube</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->youtube }}" name="youtube">
                                                    <div class="invalid-feedback">
                                                        Please fill in the email
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Foto</label>
                                                    <br>
                                                    <input type="file" class=""
                                                        value="" name="file" accept="image/jpeg, image/png">
                                                    <div class="invalid-feedback">
                                                        Please fill in the email
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Main Content -->

            <div class="main-content">
                <section class="section">

                    <div class="section-body">

                        <div class="row mt-sm-4">
                            <div class="col-12 col-md-12 col-lg-5">
                                <div class="">

                                    <div class="">

                                    </div>
                                    <div class=" text-center">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-7">
                                <div class="card">
                                    <form method="post" action="{{ route('password.update') }}"
                                        class="needs-validation" novalidate="">
                                        @csrf
                                        @method('put')
                                        <div class="card-header bg-primary">
                                            <h4 class="text-light">Editar Contraseña</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-12 col-12">
                                                    <label>Contraseña Actual (*)</label>
                                                    <input type="password" class="form-control" value=""
                                                        name="current_password" required="">
                                                    <div class="invalid-feedback">
                                                        Please fill in the first name
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Contraseña Nueva (*)</label>
                                                    <input type="password" class="form-control" value=""
                                                        name="password" required="">
                                                    <div class="invalid-feedback">
                                                        Please fill in the first name
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Repetir Contraseña Nueva (*)</label>
                                                    <input type="password" class="form-control" value=""
                                                        name="password_confirmation" required="">
                                                    <div class="invalid-feedback">
                                                        Please fill in the last name
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Main Content -->
        </main>
    </div>
    @include('layouts._partials.dashboardfooter')
    @include('layouts._partials.dashboardscripts')
</body>

</html>
