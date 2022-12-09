@extends('layout.template-sesion')
@push('login-styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('css/login.css') }}">
@endpush

@section('contenido')
<div id="login">
    <form method="POST" action="{{ route('login.store') }}" class="form-signin w-100 m-auto text-center">
        @csrf

        <img class="mb-4 logo" src="{{ Illuminate\Support\Facades\URL::asset('images/logo1.png') }}" alt="UTN Salud">
        <h1 class="h3 mb-3 fw-normal">Ingreso a la plataforma</h1>

        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" name="usuario" placeholder="Usuario">
            <label for="floatingInput">Usuario</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="contrasenia" placeholder="Contraseña">
            <label for="floatingPassword">Contraseña</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar!</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
</div>
@endsection
