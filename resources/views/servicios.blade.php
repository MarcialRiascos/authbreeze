@extends('layouts.appd')

@section('title', 'Servicios')
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
                                        Servicios:
                                    </div>
                                    <div class="card-stats-items text-primary">
                                        <div class="card-stats-item">
                                            <div class="card-stats-item-count">∞</div>
                                            <div class="card-stats-item-label"></div>
                                        </div>
                                        <div class="card-stats-item">
                                            <div class="card-stats-item-count">∞</div>
                                            <div class="card-stats-item-label"></div>
                                        </div>
                                        <div class="card-stats-item">
                                            <div class="card-stats-item-count">∞</div>
                                            <div class="card-stats-item-label"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-icon shadow-primary bg-primary">
                                    <i class="fas fa-archive"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4 class="text-primary">Total de Servicios</h4>
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
                                    <h6 class="text-light text-center fw-bold">Servicios</h1>
                                </div>
                                <br>
                                <div class="">
                                    @can('servicio.store')
                                        <a href="#" class="btn btn-primary fw-bold" data-toggle="modal"
                                            data-target="#exampleModals">+</a>
                                    @endcan
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
                                                    <div class="col-md-2 align-items-cent">
                                                        @can('servicio.update')
                                                            <a href="#" class="btn btn-primary"
                                                                data-toggle="modal"
                                                                data-target="#exampleModal{{ $servicio->id }}">Detalles</a>
                                                        @endcan
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="col-md-2 align-items-cent">
                                                        @can('servicio.destroy')
                                                        <form action="{{ route('servicio.destroy', $servicio->id ) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                                
                                                                <button type="submit" class="btn btn-danger text-light">Eliminar</button>
                                                                                                         
                                                        </form>
                                                        
                                                        @endcan
                                                    </div>
                                                </div>
                                                </div>
                                              </div>

                                                  <!-- Modal -->
                                                  <div class="modal fade" id="exampleModals" tabindex="-1"
                                                  aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                      <div class="modal-content">
                                                          <div class="modal-header bg-primary text-light">
                                                              <h5 class="modal-title" id="exampleModalLabel2">Nuevo
                                                                  Servicio</h5>
                                                              <button type="button" class="close"
                                                                  data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                              </button>
                                                          </div>
                                                          <div class="modal-body">
                                                              @can('servicio.store')
                                                              <form method="post"
                                                                  action="{{ route('servicio.store') }}" enctype="multipart/form-data"
                                                                  class="needs-validation" novalidate="">
                                                                  @csrf
                                                                  <div class="card-body">
                                                                     
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
                                                                            <label>Precio</label>
                                                                            <input type="text" class="form-control"
                                                                                value="" name="precio"
                                                                               >
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the first name
                                                                            </div>
                                                                        </div>
                                                                      </div>
                                                                      <div class="row">
                                                                          <div class="form-group col-md-6 col-12">
                                                                            <label>Tiempo</label>
                                                                            <input type="text" class="form-control"
                                                                                value="" name="tiempo"
                                                                                >
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the first name
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-6 col-12">
                                                                            <label>Descripcion (*)</label>
                                                                            <textarea class="form-control" name="description"></textarea>
                                                                        </div>
                                                                      </div>
                                                                      <div class="row">
                                                                          <div class="form-group col-md-12 col-12">
                                                                              <label>Imagen #1 (*)</label>
                                                                              <input type="file" class=""
                                                                                  value="" name="file" accept="image/jpeg, image/png">
                                                                              <div class="invalid-feedback">
                                                                                  Please fill in the email
                                                                              </div>
                                                                          </div>
                                                                          <div class="form-group col-md-12 col-12">
                                                                            <label>Imagen #2 (*)</label>
                                                                            <input type="file" class=""
                                                                                value="" name="file2" accept="image/jpeg, image/png">
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the email
                                                                            </div>
                                                                        </div>
                                                                      </div>
                                                                      <div class="row">
                                                                        <div class="form-group col-md-12 col-12">
                                                                            <label>Imagen #3 (*)</label>
                                                                            <input type="file" class=""
                                                                                value="" name="file3" accept="image/jpeg, image/png">
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the email
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-12 col-12">
                                                                          <label>Imagen #4 (*)</label>
                                                                          <input type="file" class=""
                                                                              value="" name="file4" accept="image/jpeg, image/png">
                                                                          <div class="invalid-feedback">
                                                                              Please fill in the email
                                                                          </div>
                                                                      </div>
                                                                    </div>
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
                                                  <div class="modal fade" id="exampleModal{{$servicio->id}}" tabindex="-1"
                                                  aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                      <div class="modal-content">
                                                          <div class="modal-header bg-primary text-light">
                                                              <h5 class="modal-title" id="exampleModalLabel2">
                                                                  Servicio ID {{$servicio->id}}: {{$servicio->name}} </h5>
                                                              <button type="button" class="close"
                                                                  data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                              </button>
                                                          </div>
                                                          <div class="modal-body">
                                                              @can('servicio.store')
                                                              <form method="post"
                                                                  action="{{ route('servicio.update', $servicio->id ) }}" enctype="multipart/form-data"
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
                                                                                required="">
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the first name
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-6 col-12">
                                                                          <label>Precio</label>
                                                                          <input type="text" class="form-control"
                                                                              value="{{$servicio->precio}}" name="precio"
                                                                              >
                                                                          <div class="invalid-feedback">
                                                                              Please fill in the first name
                                                                          </div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-md-6 col-12">
                                                                          <label>Tiempo</label>
                                                                          <input type="text" class="form-control"
                                                                              value="{{$servicio->tiempo}}" name="tiempo"
                                                                              >
                                                                          <div class="invalid-feedback">
                                                                              Please fill in the first name
                                                                          </div>
                                                                      </div>
                                                                      <div class="form-group col-md-6 col-12">
                                                                          <label>Descripcion (*)</label>
                                                                          <textarea class="form-control" name="description">{{$servicio->description}}</textarea>
                                                                      </div>
                                                                    </div>
                                                                      <div class="row">
                                                                          <div class="form-group col-md-12 col-12">
                                                                              <label>Imagen #1 (*)</label>
                                                                              <input type="file" class=""
                                                                                  value="" name="file">
                                                                              <div class="invalid-feedback">
                                                                                  Please fill in the email
                                                                              </div>
                                                                          </div>
                                                                          <div class="form-group col-md-12 col-12">
                                                                            <label>Imagen #2 (*)</label>
                                                                            <input type="file" class=""
                                                                                value="" name="file2">
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the email
                                                                            </div>
                                                                        </div>
                                                                      </div>
                                                                      <div class="row">
                                                                        <div class="form-group col-md-12 col-12">
                                                                            <label>Imagen #3 (*)</label>
                                                                            <input type="file" class=""
                                                                                value="" name="file3">
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the email
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-12 col-12">
                                                                          <label>Imagen #4 (*)</label>
                                                                          <input type="file" class=""
                                                                              value="" name="file4">
                                                                          <div class="invalid-feedback">
                                                                              Please fill in the email
                                                                          </div>
                                                                      </div>
                                                                    </div>
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
