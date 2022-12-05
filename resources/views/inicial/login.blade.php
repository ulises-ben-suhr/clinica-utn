@extends('layout.template-base')

@section('contenido')

    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <input type="text" name="usuario" id="usuario" placeholder="Nombre de usuario">
        <input type="password" name="contrasenia" id="contrasenia" placeholder="Contraseña">

        <button type="submit">Ingresar!</button>

    </form>

@endsection
