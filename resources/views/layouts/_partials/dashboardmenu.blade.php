{{-- <nav class="navbar navbar-expand-md navbar-light bg-success">
    <div class="container">
        <a class="navbar-brand text-light" href="">Analisis Bet</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <!-- Here's the magic. Add the .animate and .slideIn classes to your .dropdown-menu and you're all set! -->
                    <div class="dropdown-menu dropdown-menu-end animate slideIn" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="">Mi Perfil</a>
                        <a class="dropdown-item" href="">Analisis</a>
                        <a class="dropdown-item" href="">Seguridad</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="">Cerrar Sesion</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}

<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{route('dashboard')}}">DeimarSoft</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{route('dashboard')}}">DS</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="dropdown active">
        <a href="{{route('dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="menu-header">USUARIOS</li>
      <li class="dropdown active">
        <a href="{{route('cita.index')}}" class="nav-link"><i class="fas fa-columns"></i><span>Citas</span></a>
      </li>
      @can('dashboard.store')
      <li class="menu-header">ADMINISTRADOR</li>
      <li class="dropdown active">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Administrador</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{route('citad.index')}}"><i class="fas fa-columns"></i>Citas</a></li>
          <li><a class="nav-link" href="{{route('usuario.index')}}"><i class="fas fa-users"></i>Usuarios</a></li>    
          <li><a class="nav-link" href="{{route('servicio.index')}}"><i class="fas fa-list"></i>Servicios</a></li>                
        </ul>
      </li>
      @endcan
      @can('citae.store')
      <li class="menu-header">EMPLEADO</li>
      <li class="dropdown active">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Empleado</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{route('citae.index')}}"><i class="fas fa-columns"></i>Citas</a></li>              
        </ul>
      </li>
      @endcan
    </ul>
    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> Documentation
      </a>
    </div>        </aside>
</div>