@extends('layouts.appd')

@section('title', 'Usuarios')
@section('content')
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            <style>
                .modal-backdrop {
                    position: relative;
                }
            </style>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card card-statistic-2">
                                <div class="card-stats">
                                    <div class="card-body font-weight-bold text-primary">
                                        Usuarios:
                                    </div>
                                    @can('usuario.store')
                                    <div class="card-stats-items text-primary">
                                       @foreach ($admind as $ad)
                                       <div class="card-stats-item">
                                        <div class="card-stats-item-count">{{$ad->total}}</div>
                                        <div class="card-stats-item-label">Administrador</div>
                                    </div>
                                    @endforeach
                                        
                                    @foreach ($empleado as $emp)
                                        <div class="card-stats-item">
                                            <div class="card-stats-item-count">{{$emp->total}}</div>
                                            <div class="card-stats-item-label">Empleado</div>
                                        </div>
                                        @endforeach

                                        @foreach ($usuar as $usu)
                                        <div class="card-stats-item">
                                            <div class="card-stats-item-count">{{$usu->total}}</div>
                                            <div class="card-stats-item-label">Usuario</div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endcan
                                </div>
                                <div class="card-icon shadow-primary bg-primary">
                                    <i class="fas fa-archive"></i>
                                </div>
                                <div class="card-wrap">
                                    @can('usuario.store')
                                    @foreach ($totis as $toti)
                                    <div class="card-header">
                                        <h4 class="text-primary">Total de Usuarios</h4>
                                    </div>
                                    <div class="card-body text-primary">
                                        {{$toti->total}}
                                    </div>
                                    @endforeach
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h6 class="text-light text-center fw-bold">Usuarios</h1>
                                </div>
                                <br>
                                <div class="">
                                    @can('dashboard.store')
                                        <a href="#" class="btn btn-primary fw-bold" data-toggle="modal"
                                            data-target="#exampleModals">+</a>
                                    @endcan
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <div class="row">
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
                                            <div class="table-responsive table-invoice">
                                                <table class="table table-striped" id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Nombre</th>
                                                            <th>Apellido</th>
                                                            <th>Email</th>
                                                            <th>Telefono</th>
                                                            <th>Accion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($users as $user)
                                                            <tr>
                                                                <td>{{ $user->id }}</td>
                                                                <td class="font-weight-600">{{ $user->name }}</td>
                                                                <td>
                                                                    <div class="badge badge-primary">{{ $user->lastname }}</div>
                                                                </td>
                                                                <td>{{ $user->email }}</td>
                                                                <td>{{ $user->phone }}</td>
                                                                <td>
                                                                    <a href="#" class="btn btn-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#exampleModal{{ $user->id }}">Detalles</a>
                                                                </td>
                                                            </tr>


                                                             <!-- Modal -->
                                                <div class="modal fade" id="exampleModals" tabindex="-1"
                                                aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary text-light">
                                                            <h5 class="modal-title" id="exampleModalLabel2">Nuevo
                                                                usuario</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @can('usuario.store')
                                                            <form method="post"
                                                                action="{{ route('usuario.store') }}"
                                                                class="needs-validation" novalidate="">
                                                                @csrf
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12 col-12">
                                                                            <label>Rol (*)</label>
                                                                            <select class="form-control"
                                                                                name="rol" required>
                                                                                <option value="1">Usuario
                                                                                </option>
                                                                                <option value="2">Empleado
                                                                                </option>
                                                                                <option value="3">Administrador
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-md-6 col-12">
                                                                            <label>Nombre (*)</label>
                                                                            <input type="text" class="form-control"
                                                                                value="" name="name"
                                                                                required="">
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the first name
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-6 col-12">
                                                                            <label>Apellido (*)</label>
                                                                            <input type="text" class="form-control"
                                                                                value="" name="lastname"
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
                                                                                value="" name="email"
                                                                                required="">
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the email
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-5 col-12">
                                                                            <label>Teléfono</label>
                                                                            <input type="number" class="form-control"
                                                                                value="" name="phone">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-6">
                                                                            <label for="password"
                                                                                class="d-block">Contraseña (*)</label>
                                                                            <input id="password" type="password"
                                                                                class="form-control pwstrength"
                                                                                data-indicator="pwindicator"
                                                                                name="password" required>
                                                                            <div id="pwindicator" class="pwindicator">
                                                                                <div class="bar"></div>
                                                                                <div class="label"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label for="password_confirmation"
                                                                                class="d-block">Confirmación de contraseña (*)</label>
                                                                            <input id="password_confirmation"
                                                                                type="password" class="form-control"
                                                                                name="password_confirmation" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group col-md-6 col-12">
                                                                            <label>Cedula/Tarjeta Identidad</label>
                                                                            <input type="number" class="form-control"
                                                                                name="dni">
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the email
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-6 col-12">
                                                                            <label>Sexo (*)</label>
                                                                            <select class="form-control"
                                                                                name="sex" required>
                                                                                <option value="Masculino">Masculino
                                                                                </option>
                                                                                <option value="Femenino">Femenino
                                                                                </option>
                                                                                <option value="No binario">No binario
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    {{-- <div class="row">
                                                                        <div class="form-group col-md-12 col-12">
                                                                            <label>Fecha de Nacimiento</label>
                                                                            <input type="date" class="form-control"
                                                                                value="" name="nacimiento">
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the email
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group col-12">
                                                                            <label>Biografía</label>
                                                                            <textarea class="form-control" name="description"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-md-6 col-12">
                                                                            <label>Facebook</label>
                                                                            <input type="text" class="form-control"
                                                                                value="" name="facebook">
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the email
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-6 col-12">
                                                                            <label>Instagram</label>
                                                                            <input type="tel" class="form-control"
                                                                                value="" name="instagram">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12 col-12">
                                                                            <label>YouTube</label>
                                                                            <input type="text" class="form-control"
                                                                                value="" name="youtube">
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the email
                                                                            </div>
                                                                        </div>
                                                                    </div> --}}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cerrar</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Guardar</button>
                                                                </div>
                                                            </form>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $user->id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary text-light">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detalles
                                                                del usuario: {{ $user->name }} {{ $user->lastname }}
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post"
                                                                action="{{ route('usuario.update', $user->id) }}"
                                                                class="needs-validation" novalidate="">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-6 col-12">
                                                                            <label>Nombre (*)</label>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $user->name }}"
                                                                                name="name" required="">
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the first name
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-6 col-12">
                                                                            <label>Apellido (*)</label>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $user->lastname }}"
                                                                                name="lastname" required="">
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the last name
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-md-7 col-12">
                                                                            <label>Email (*)</label>
                                                                            <input type="email" class="form-control"
                                                                                value="{{ $user->email }}"
                                                                                name="email" required="">
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the email
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-5 col-12">
                                                                            <label>Telefono</label>
                                                                            <input type="tel" class="form-control"
                                                                                value="{{ $user->phone }}"
                                                                                name="phone">
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group col-md-6 col-12">
                                                                            <label>Cedula/Tarjeta Identidad</label>
                                                                            <input type="text" class="form-control"
                                                                                name="dni"
                                                                                value="{{ $user->dni }}">
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the email
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-6 col-12">
                                                                            <label>Sexo (*)</label>
                                                                            <select class="form-control" name="sex" required>
                                                                              @if($user->sex=='Masculino')
                                                                                {{-- <option value="{{auth()->user()->sex}}" selected disabled>{{auth()->user()->sex}}</option> --}}
                                                                                <option value="Masculino" selected>Masculino</option>
                                                                                <option value="Femenino">Femenino</option>
                                                                                <option value="No binario">No binario</option>
                                                                              @elseif($user->sex=='Femenino')
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
                                                                                value="{{ $user->nacimiento }}"
                                                                                name="nacimiento">
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the email
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-12">
                                                                            <label>Biografía</label>
                                                                            <textarea class="form-control" name="description">{{ $user->description }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-md-6 col-12">
                                                                            <label>Facebook</label>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $user->facebook }}"
                                                                                name="facebook">
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the email
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-6 col-12">
                                                                            <label>Instagram</label>
                                                                            <input type="tel" class="form-control"
                                                                                value="{{ $user->instagram }}"
                                                                                name="instagram">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12 col-12">
                                                                            <label>YouTube</label>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $user->youtube }}"
                                                                                name="youtube">
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the email
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" class="form-control"
                                                                        id="recipient-name" name="users"
                                                                        value="{{ $user->id }}">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cerrar</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Guardar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                                        @empty
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h6 class="text-light text-center fw-bold">Roles de usuario</h1>
                                </div>
                               
                                <div class="card-body">
                                    <div class="">
                                        <div class="row">
                                            <div class="table-responsive table-invoice">
                                                <table class="table table-striped" id="myTable2">
                                                    <thead>
                                                        <tr>
                                                            <th>Usuario</th>
                                                            <th>Rol</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($results as $result)
                                                            <tr>
                                                                <td>{{ $result->model_id }}</td>
                                                                <td class="font-weight-600">{{ $result->role_id }}</td>
                                                                <td>
                                                                    <a href="#" class="btn btn-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#exampleModald{{ $result->model_id}}">Detalles</a>
                                                                </td>
                                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModald{{ $result->model_id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary text-light">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detalles
                                                                del barbero: {{ $result->model_id }}
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post"
                                                                action="{{ route('usuario.create') }}"
                                                                class="needs-validation" novalidate="">
                                                                @csrf
                                                              
                                                                <div class="card-body">
                                                                    <input type="text" class="form-control"
                                                                                value="{{ $result->model_id }}"
                                                                                name="model_id" hidden>
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12 col-12">
                                                                            <label>Rol</label>
                                                                            <select class="form-control"
                                                                                name="role_id" required>
                                                                                <option value="2">Usuario
                                                                                </option>
                                                                                <option value="3">Empleado
                                                                                </option>
                                                                                <option value="1">Administrador
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cerrar</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Guardar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                                        @empty
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
               // initialView: 'timeGridWeek',
                initialView: 'dayGridMonth',
                slotMinTime: '8:00',
                slotMaxTime: '21:00',
                locale: 'Es',
                events: @json($events)
            });
            calendar.render();
        });
    </script>

    </body>
@endsection
