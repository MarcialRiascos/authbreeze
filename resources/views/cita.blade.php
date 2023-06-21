@extends('layouts.appd')

@section('title', 'Citas')
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
                                        Gestión de citas:
                                    </div>
                                    @can('citad.store')
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
                                    @endcan
                                </div>
                                <div class="card-icon shadow-primary bg-primary">
                                    <i class="fas fa-archive"></i>
                                </div>
                                <div class="card-wrap">
                                    @can('citad.store')
                                    <div class="card-header">
                                        <h4 class="text-primary">Total de Citas</h4>
                                    </div>
                                    <div class="card-body text-primary">
                                        {{$citasss}}
                                    </div>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                    
            
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h6 class="text-light text-center fw-bold">Calendario de Citas</h1>
                                </div>
                                <br>
                                @can('citad.store')
                                <div class="">
                                  <form method="post" action="{{route('citad.create')}}" class="needs-validation"
                                      novalidate="">
                                      @csrf
                                      <div class="card-body">
                                          <div class="row">
                                            <div class="form-group col-md-4 col-12">
                                                <label>Empleado</label>
                                                <select class="form-control" name="useri_id" required>
                                                    @forelse ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}
                                                        </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                              <div class="form-group col-md-3 col-12">
                                                  <label>Dia</label>
                                                  <input type="text" class="form-control datepicker" value=""
                                                      name="dia" required="">
                                                  <div class="invalid-feedback">
                                                      Please fill in the last name
                                                  </div>
                                              </div>
                                              <div class="form-group col-md-3 col-12">
                                                  <label>Hora</label>
                                                  <select class="form-control" name="hora" required>
                                                      <option value=" 08:00">08:00</option>
                                                      <option value=" 09:00">09:00</option>
                                                      <option value=" 10:00">10:00</option>
                                                      <option value=" 11:00">11:00</option>
                                                      <option value=" 12:00">12:00</option>
                                                      <option value=" 13:00">13:00</option>
                                                      <option value=" 14:00">14:00</option>
                                                      <option value=" 15:00">15:00</option>
                                                      <option value=" 16:00">16:00</option>
                                                      <option value=" 17:00">17:00</option>
                                                      <option value=" 18:00">18:00</option>
                                                      <option value=" 19:00">19:00</option>
                                                      <option value=" 20:00">20:00</option>
                                                  </select>
                                              </div>
                                              <div class="form-group col-md-2 col-12">
                                                <label>.</label>
                                                <button type="submit" class="btn form-control btn-primary">Consultar Agenda</button>
                                            </div>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                              @endcan
                              @can('citad.store')
                                <div class="">
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
                                    <form method="post" action="{{ route('citad.store') }}" class="needs-validation"
                                        novalidate="">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                
                                                <div class="form-group col-md-2 col-12">
                                                    <label>Servicio</label>
                                                    <select class="form-control" name="event" required>
                                                        @forelse ($services as $servicio)
                                                            <option value="{{ $servicio->name }}">{{ $servicio->name }}
                                                            </option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2 col-12">
                                                    <label>Usuario</label>
                                                    <select class="form-control" name="user_id" required>
                                                        @forelse ($usuarios as $usuario)
                                                            <option value="{{ $usuario->id }}">{{ $usuario->id }}
                                                            </option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2 col-12">
                                                    <label>Empleado</label>
                                                    <select class="form-control" name="useri_id" required>
                                                        @forelse ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}
                                                            </option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2 col-12">
                                                    <label>Dia</label>
                                                    <input type="text" class="form-control datepicker" value=""
                                                        name="dia" required="">
                                                    <div class="invalid-feedback">
                                                        Please fill in the last name
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 col-12">
                                                    <label>Hora</label>
                                                    <select class="form-control" name="hora" required>
                                                        <option value=" 08:00">08:00</option>
                                                        <option value=" 09:00">09:00</option>
                                                        <option value=" 10:00">10:00</option>
                                                        <option value=" 11:00">11:00</option>
                                                        <option value=" 12:00">12:00</option>
                                                        <option value=" 13:00">13:00</option>
                                                        <option value=" 14:00">14:00</option>
                                                        <option value=" 15:00">15:00</option>
                                                        <option value=" 16:00">16:00</option>
                                                        <option value=" 17:00">17:00</option>
                                                        <option value=" 18:00">18:00</option>
                                                        <option value=" 19:00">19:00</option>
                                                        <option value=" 20:00">20:00</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2 col-12">
                                                  <label>.</label>
                                                  <button type="submit" class="btn form-control btn-primary">Agendar Cita</button>
                                              </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endcan
                                
                                <br>
                                <br>
                                <div class="col-md-12 text-primary " id='calendar'></div>
                                <div class="card-body">
                                    <div class="owl-carousel owl-theme" id="products-carousel">
                                        <div>
                                            <div class="product-item pb-3">
                                                <div class="product-image">
                                                    <img alt="image"
                                                        src="{{ asset('assets/assets/img/products/product-4-50.png') }}"
                                                        class="img-fluid">
                                                </div>
                                                <div class="product-details">
                                                    <div class="product-name">iBook Pro 2018</div>
                                                    <div class="product-review">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="text-muted text-small">67 Sales</div>
                                                    <div class="product-cta">
                                                        <a href="#" class="btn btn-primary">Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="product-item">
                                                <div class="product-image">
                                                    <img alt="image"
                                                        src="{{ asset('assets/assets/img/products/product-3-50.png') }}"
                                                        class="img-fluid">
                                                </div>
                                                <div class="product-details">
                                                    <div class="product-name">oPhone S9 Limited</div>
                                                    <div class="product-review">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star-half"></i>
                                                    </div>
                                                    <div class="text-muted text-small">86 Sales</div>
                                                    <div class="product-cta">
                                                        <a href="#" class="btn btn-primary">Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="product-item">
                                                <div class="product-image">
                                                    <img alt="image"
                                                        src="{{ asset('assets/assets/img/products/product-1-50.png') }}"
                                                        class="img-fluid">
                                                </div>
                                                <div class="product-details">
                                                    <div class="product-name">Headphone Blitz</div>
                                                    <div class="product-review">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div>
                                                    <div class="text-muted text-small">63 Sales</div>
                                                    <div class="product-cta">
                                                        <a href="#" class="btn btn-primary">Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @can('citad.store')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-primary text-light">
                                    <h4>Citas Pendiente</h4>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive table-invoice">
                                        <table class="table table-striped" id="myTable1">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Usuario</th>
                                                    <th>Servicio</th>
                                                    <th>Fecha</th>
                                                    <th>Encargado</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($citassspe as $citasssps)
                                            <tr>
                                                <td>{{ $citasssps->id }}</td>
                                                <td>{{ $citasssps->cliente->name}}</td>
                                                <td class="font-weight-600">{{ $citasssps->event }}</td>
                                                <td>
                                                    <div class="badge badge-primary">{{ $citasssps->start_date }}</div>
                                                </td>
                                                <td>{{ $citasssps->operario->name}}</td>
                                                <td>
                                                <form action="{{ route('citad.destroy', $citasssps->id ) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="text"  value="{{$citasssps->useri_id}}"
                                                    name="useri_id" required="" hidden>
                                                        <button type="submit" class="btn btn-primary text-light">Cancelar</button>
                                                                                                 
                                                </form>
                                            </td> 
                                            </tr>
                                            @empty
                                                <h6 class="text-primary">No hay citas penientes.</h6>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('citad.store')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-primary text-light">
                                    <h4>Historial</h4>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive table-invoice">
                                        <table class="table table-striped" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>Cita ID</th>
                                                    <th>Usuario</th>
                                                    <th>Servicio</th>
                                                    <th>Fecha</th>
                                                    <th>Encargado</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($citas as $cita)
                                                    <tr>
                                                        <td>{{ $cita->id }}</td>
                                                        <td>{{ $cita->cliente->name}}</td>
                                                        <td class="font-weight-600">{{ $cita->event }}</td>
                                                        <td>
                                                            <div class="badge badge-primary">{{ $cita->start_date }}</div>
                                                        </td>
                                                        <td>{{ $cita->operario->name }}</td>
                                                    </tr>
                                                @empty
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
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
