@extends('layout.template-sesion')
@push('register-styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('css/register.css') }}">
@endpush
@section('contenido')
<div id="register">
    <form method="POST" action="{{ route('pacientesRegistrados.store') }}" class="form-register w-100 m-auto text-center">
        @csrf

        <img class="mb-4 logo" src="{{ Illuminate\Support\Facades\URL::asset('images/logo1.png') }}" alt="UTN Salud">
        <h1 class="h3 mb-3 fw-normal">Formulario de registro</h1>

        <div class="contenedor-principal">

            <fieldset>
                <legend>Datos de usuario</legend>
                <div class="form-floating">
                    <input type="text" class="form-control top-stack-input" id="floatingInput" name="usuario" placeholder="Usuario">
                    <label for="floatingInput">Usuario</label>
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control middle-stack-input" id="floatingPassword" name="contrasenia" placeholder="Contraseña">
                    <label for="floatingPassword">Contraseña</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control bottom-stack-input" id="floatingPasswordConfirmation" name="confirmacion" placeholder="Confirmar Contraseña">
                    <label for="floatingPasswordConfirmation">Confirmar Contraseña</label>
                </div>
            </fieldset>



    {{--  Agrego la información del paciente para que al registrarse se cree su perfil de paciente  --}}

            <fieldset>
                <legend>Datos personales</legend>
                <div class="form-floating">
                    <input type="text" class="form-control top-stack-input" id="floatingName" name="nombre" placeholder="Nombre">
                    <label for="floatingName">Nombre</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control middle-stack-input" id="floatingApellido" name="apellido" placeholder="Apellido">
                    <label for="floatingApellido">Apellido</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control bottom-stack-input" id="floatingDNI" name="dni" placeholder="DNI">
                    <label for="floatingDNI">DNI</label>
                </div>
                {{-- Poner almanaque --}}
                <div class="contenedor-nacimiento">
                    <label for="floatingNacimiento">Fecha de nacimiento</label>
                    <input type="date" id="floatingNacimiento" name="nacimiento">

                </div>
                <div class="contenedor-genero">
                    <label>Género</label>
                    <div class="form-check form-check-inline">
                        <div>
                            <label for="masculino">Masculino</label>
                            <input class="form-check-input" type="radio" id="masculino" name="genero" value="Masculino">
                        </div>
                        <div>
                            <label for="femenino">Femenino</label>
                            <input class="form-check-input" type="radio" id="femenino" name="genero" value="Femenino">
                        </div>
                    </div>
                </div>

            </fieldset>

            <fieldset>
                <legend>Datos de contacto</legend>
                <div class="form-floating">
                    <input type="email" class="form-control top-stack-input" id="floatingEmail" name="email" placeholder="Email">
                    <label for="floatingEmail">Email</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control middle-stack-input" id="floatingTelefono1" name="tel1" placeholder="Telefono">
                    <label for="floatingTelefono1">Telefono</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control bottom-stack-input" id="floatingTelefono2" name="tel2" placeholder="Telefono (Opc.)">
                    <label for="floatingTelefono2">Telefono <em>(Opc.)</em></label>
                </div>
            </fieldset>

            <fieldset>
                <legend>Datos de domicilio</legend>
                <div class="form-floating">
                    <input type="text" class="form-control top-stack-input" id="floatingCalle" name="calle" placeholder="Calle">
                    <label for="floatingCalle">Calle</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control middle-stack-input" id="floatingNumero" name="numeroDomicilio" placeholder="Numero">
                    <label for="floatingNumero">Numero</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control bottom-stack-input" id="floatingLocalidad" name="localidad" placeholder="Localidad">
                    <label for="floatingLocalidad">Localidad</label>
                </div>
            </fieldset>

            <fieldset>
                <legend>Cobertura médica</legend>
                <div class="form-floating">
                    <input type="text" class="form-control top-stack-input" id="floatingObraSocial" name="obraSocial" placeholder="Obra social">
                    <label for="floatingObraSocial">Obra social</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control middle-stack-input" id="floatingPlanObraSocial" name="planObraSocial" placeholder="Plan">
                    <label for="floatingPlanObraSocial">Plan</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control bottom-stack-input" id="floatingNumeroSocio" name="numeroSocio" placeholder="Socio Nº">
                    <label for="floatingNumeroSocio">Socio Nº</label>
                </div>
            </fieldset>


        </div>

{{--  Hasta aquí la información de paciente  --}}

        <button class="w-100 btn btn-lg btn-primary" type="submit">Registrarse</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>

    </form>
</div>


@endsection

