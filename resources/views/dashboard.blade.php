@extends('layouts.appd')

@section('title', 'Home')
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
                                        Citas:
                                    </div>
                                    <div class="card-stats-items text-primary">
                                        <div class="card-stats-item">
                                            <div class="card-stats-item-count">{{$citasssp}}</div>
                                            <div class="card-stats-item-label">Pendiente</div>
                                        </div>
                                        <div class="card-stats-item">
                                            <div class="card-stats-item-count">∞</div>
                                            <div class="card-stats-item-label"></div>
                                        </div>
                                        <div class="card-stats-item">
                                            <div class="card-stats-item-count">{{$citasssd}}</div>
                                            <div class="card-stats-item-label">Cumplido</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-icon shadow-primary bg-primary">
                                    <i class="fas fa-archive"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4 class="text-primary">Total de Citas</h4>
                                    </div>
                                    <div class="card-body text-primary">
                                        {{$citasss}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h6 class="text-light text-center fw-bold">Empleados</h1>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <div class="row">
                                            @forelse ($users as $user)
                                                <div class="col-md-4">
                                                    <div class="col-12 col-md-12 col-lg-12">
                                                        <div class="card profile-widget">
                                                            <div class="profile-widget-header">
                                                                {{-- <img alt="image" src="{{ asset('assets/assets/img/avatar/avatar-1.png') }}" --}}
                                                                <img alt="image"
                                                                    src="{{asset($user->file)}}"
                                                                    class="rounded-circle profile-widget-picture">
                                                                <div class="profile-widget-items">
                                                                    <div class="profile-widget-item">
                                                                        <div class="profile-widget-item-label">Atenciones</div>
                                                                        <div class="profile-widget-item-value">{{$user->total}}</div>
                                                                    </div>
                                                                    <div class="profile-widget-item">
                                                                        <div class="profile-widget-item-label">Realizadas
                                                                        </div>
                                                                        <div class="profile-widget-item-value">{{$user->realizado}}</div>
                                                                    </div>
                                                                    <div class="profile-widget-item">
                                                                        <div class="profile-widget-item-label">Pendientes
                                                                        </div>
                                                                        <div class="profile-widget-item-value">{{$user->pendiente}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="profile-widget-description text-dark text-justify">
                                                                <div class="profile-widget-name text-dark">
                                                                    {{ $user->name }} <div
                                                                        class="text-muted d-inline font-weight-normal">
                                                                        <div class="slash"></div> Empleado
                                                                    </div>
                                                                </div>
                                                                {{ $user->description }}
                                                            </div>
                                                            <div class="card-footer  ">
                                                                <div class="">
                                                                    <div class="row">
                                                                        <div class="col-md-6 align-items-start">
                                                                            @can('dashboard.update')
                                                                                <a href="#" class="btn btn-primary"
                                                                                    data-toggle="modal"
                                                                                    data-target="#exampleModal{{ $user->id }}">Detalles</a>
                                                                            @endcan
                                                                        </div>
                                                                        <br>
                                                                        <br>
                                                                        <div class="col-md-6 align-items-end">
                                                                            {{-- <div class="font-weight-bold mb-2">Sigue a {{ $user->name }}:</div> --}}
                                                                            <a href="{{ $user->facebook }}" target="_Blank"
                                                                                class="btn btn-social-icon btn-facebook mr-1">
                                                                                <i class="fab fa-facebook"></i>
                                                                            </a>
                                                                            <a href="{{ $user->instagram }}"target="_Blank"
                                                                                class="btn btn-social-icon btn-instagram mr-1">
                                                                                <i class="fab fa-instagram"></i>
                                                                            </a>
                                                                            <a href="{{ $user->youtube }}" target="_Blank"
                                                                                class="btn btn-social-icon btn-pinterest ">
                                                                                <i class="fa-brands fa-youtube"
                                                                                    style="color: #ffffff;"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
                                                                    del empleado: {{ $user->name }} {{ $user->lastname }}
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post"
                                                                    action="{{ route('dashboard.update', $user->id) }}"
                                                                    class="needs-validation" novalidate="">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="form-group col-md-6 col-12">
                                                                                <label>Nombre</label>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $user->name }}"
                                                                                    name="name" required="">
                                                                                <div class="invalid-feedback">
                                                                                    Please fill in the first name
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-6 col-12">
                                                                                <label>Apellido</label>
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
                                                                                <label>Email</label>
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
                                                                                <label>Sexo</label>
                                                                                <select class="form-control"
                                                                                    name="sex" required>
                                                                                    if($user->sex==Masculino){
                                                                                    <option value="{{ $user->sex }}"
                                                                                        disabled selected>
                                                                                        {{ $user->sex }}</option>
                                                                                    <option value="Masculino">Masculino
                                                                                    </option>
                                                                                    <option value="Femenino">Femenino
                                                                                    </option>
                                                                                    <option value="No binario">No binario
                                                                                    </option>
                                                                                    }
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
                                    <h6 class="text-light text-center fw-bold">Servicios</h1>
                                </div>
                                <br>
                               
                               
                                <div class="card-body">
                                    <div class="">
                                        
                                        <div class="row">
                                            @forelse ($services as $servicio)
                                            <div class="card col-lg-6">
                                                <div class="card-header bg-primary text-light">
                                                  <h4>{{$servicio->name}}</h4>
                                                </div>
                                                <div class="card-body">
                                                  <div id="carouselExampleFade{{$servicio->id}}" class="carousel slide carousel-fade" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img class="d-block w-100" src="{{asset($servicio->file)}}" alt="First slide">
                                                          </div>
                                                          <div class="carousel-item">
                                                            <img class="d-block w-100" src="{{asset($servicio->file2)}}" alt="Second slide">
                                                          </div>
                                                          <div class="carousel-item">
                                                            <img class="d-block w-100" src="{{asset($servicio->file3)}}" alt="Third slide">
                                                          </div>
                                                          <div class="carousel-item">
                                                            <img class="d-block w-100" src="{{asset($servicio->file4)}}" alt="Forth slide">
                                                          </div>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleFade{{$servicio->id}}" role="button" data-slide="prev">
                                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                      <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleFade{{$servicio->id}}" role="button" data-slide="next">
                                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                      <span class="sr-only">Next</span>
                                                    </a>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-4 align-items-cent">          
                                                            <a href="#" class="btn btn-primary font-weight-bold"
                                                                data-toggle="modal"
                                                                data-target="#exampleModal{{ $servicio->id }}">Detalles</a>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="col-md-4 align-items-cent">      
                                                                <button class="btn btn-primary text-light font-weight-bold"><i class="fa-solid fa-dollar-sign"></i> Precio: {{ number_format($servicio->precio, 0, ',', '.')}} COP </button>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="col-md-4 align-items-cent">      
                                                                <button class="btn btn-primary text-light font-weight-bold"><i class="fa-solid fa-clock"></i> Tiempo: {{$servicio->tiempo}} </button>
                                                    </div>
                                                </div>
                                                </div>
                                              </div>

                                               <!-- Modal -->
                                               <div class="modal fade" id="exampleModal{{$servicio->id}}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary text-light">
                                                            <h5 class="modal-title" id="exampleModalLabel2">
                                                                Servicio ID {{$servicio->id}}: {{$servicio->name}}</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                           
                                                            <form method="post"
                                                                action="" enctype="multipart/form-data"
                                                                class="needs-validation" novalidate="">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="card-body">
                                                                  <input type="text" class="form-control"
                                                                  value="{{$servicio->id}}" name="id"
                                                                  required="" hidden>
                                                                  <div class="row">
                                                                      <div class="form-group col-md-6 col-12">
                                                                          <label>Nombre (*)</label>
                                                                          <input type="text" class="form-control"
                                                                              value="{{$servicio->name}}" name="name"
                                                                              required="" disabled>
                                                                          <div class="invalid-feedback">
                                                                              Please fill in the first name
                                                                          </div>
                                                                      </div>
                                                                      <div class="form-group col-md-6 col-12">
                                                                        <label>Precio</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{$servicio->precio}}" name="precio"
                                                                            required="" disabled>
                                                                        <div class="invalid-feedback">
                                                                            Please fill in the first name
                                                                        </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="row">
                                                                      <div class="form-group col-md-12 col-12">
                                                                        <label>Tiempo</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{$servicio->tiempo}}" name="tiempo"
                                                                            required="" disabled>
                                                                        <div class="invalid-feedback">
                                                                            Please fill in the first name
                                                                        </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="row">
                                                                  <div class="form-group col-md-12 col-12">
                                                                      <label>Descripcion (*)</label>
                                                                      <textarea class="form-control" name="description" disabled>{{$servicio->description}}</textarea>
                                                                  </div>
                                                                </div>
                                                                  
                                                                    
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-dismiss="modal">Cerrar</button>
                                                                </div>
                                                            </form>
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
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
