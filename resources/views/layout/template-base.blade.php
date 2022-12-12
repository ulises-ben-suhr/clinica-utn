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


    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('css/generales-inicio.css') }}">
    @stack('home-styles')
    @stack('services-styles')
    @stack('institucional-styles')

    @yield('styles')

</head>
<body>

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom">
        <a href="/" class="navbar-brand d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img class="logo" src="{{ \Illuminate\Support\Facades\URL::asset('images/Logo1.png') }}" alt="UTN Salud logo">
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ route('home.view') }}" class="nav-link px-2 link-dark">inicio</a></li>
            <li><a href="{{ route('servicios.view') }}" class="nav-link px-2 link-dark">servicios</a></li>
            <li><a href="{{ route('institucional.view') }}" class="nav-link px-2 link-dark">institucional</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">contacto</a></li>
        </ul>

        <div id="registro" class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-primary me-2">ingresar</button>
            <button type="button" class="btn btn-primary">registrarse</button>
        </div>
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
