<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UTN Salud - @yield('titulo')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="{{ \Illuminate\Support\Facades\URL::asset('images/Logo1.png') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('css/generales-inicio.css') }}">
    @stack('home-styles')
    @stack('services-styles')
    @stack('institucional-styles')
    @stack('login-styles')
    @yield('styles')

</head>
<body>

    <div class="container-fluid shadow">
        <header class="container d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
            <a href="/" class="navbar-brand d-flex align-items-center col-12 col-xl-auto justify-content-center col-xl-auto mb-2 mb-md-0 text-dark text-decoration-none">
                <img class="logo" src="{{ \Illuminate\Support\Facades\URL::asset('images/Logo1.png') }}" alt="UTN Salud logo">
            </a>

            <ul class="nav col-12 col-xl-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('home.view') }}" class="nav-link px-2 link-dark text-secondary">inicio</a></li>
                <li><a href="{{ route('servicios.view') }}" class="nav-link px-2 link-dark text-secondary">servicios</a></li>
                <li><a href="{{ route('institucional.view') }}" class="nav-link px-2 link-dark text-secondary">institucional</a></li>
                <li><a href="#" class="nav-link px-2 link-dark text-secondary">contacto</a></li>
            </ul>

        @auth
            <div id="registro" class="col-12 col-xl-auto d-flex justify-content-center gap-4 text-end">
                <div class="btn-desplegable btn-group">
                    <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
                    Acciones
                    </button>
                    <ul class="dropdown-menu">

                        @if (Auth::user()->rol == 'PACIENTE')
                            <li><a class="dropdown-item " href="{{route('turno.index')}}">Mis Turnos</a></li>
                            <li><a class="dropdown-item " href="{{route('turno.create')}}">Programar un turno</a></li>
                        @endif

                        @if (Auth::user()->rol != 'PACIENTE')
                            <li><a class="dropdown-item " href="{{route('pacientes.index')}}">Ver pacientes</a></li>
                            @if(Auth::user()->rol == 'ADMINISTRADOR')
                                <li><a class="dropdown-item " href="#">Administrar usuarios</a></li>
                            @endif
                        @endif

                    </ul>
                </div>

                <div class="btn-desplegable btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
                    Mi Cuenta
                    </button>
                    <ul class="dropdown-menu">
                        @if (Auth::user()->rol == 'PACIENTE')
                            <li><a class="dropdown-item" href="{{ route('pacientes.show',session('pacienteID',0)->paciente_id) }}">Mis datos personales</a></li>
                            <li><hr class="dropdown-divider"></li>
                        @endif
                        <li><a class="dropdown-item" href="{{route('login.edit', Auth::user()->id)}}">Cambiar contraseña</a></li>
                    </ul>
                </div>


                <form id="form-logout" action="{{route('log.out')}}" class="d-inline-block top-0 end-0" method="POST">
                    @csrf
                    <button class="btn text-primary text-wrap underline">Cerrar sesión</button>
                </form>
            </div>
        @else
                <div id="registro" class="col-md-5 text-end">
                    <a href="{{ route('login.index') }}" class="btn btn-outline-primary me-2">ingresar</a>
                    <a  href="{{ route('register.create') }}" class="btn btn-primary">registrarse</a>
                </div>
        @endauth


        </header>


    </div>

    <main>
        @yield('contenido')
    </main>



    <footer class="container d-flex flex-wrap justify-content-between align-items-center py-2 my-3 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <img class="logo-small" src="{{ \Illuminate\Support\Facades\URL::asset('images/LogoBN.png') }}" alt="UTN Salud logo">
            </a>
            <span class="mb-3 mb-md-0 text-muted">&copy; 2022 UTN Salud</span>
        </div>
    </footer>


    @yield('scripts')



</body>
</html>
