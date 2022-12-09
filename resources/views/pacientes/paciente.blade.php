@extends('layout.template-base')



{{--
    Cuando existe un paciente la ruta puede ser SHOW o EDIT
    Cuando no existe el paciente habra que comprobar si estamos en la ruta CREATE
--}}
@if (isset($paciente) || isset($create))

    @section('titulo')
        Paciente
    @endsection

    @section('styles')
        <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('css/pacientes.css') }}">
    @endsection

    @section('contenido')
        @include('layout.template-title-section', [
            'titulo' => 'datos personales',
            'links' => [
                (object) array(
                    'titulo' => 'Inicio',
                    'ruta' => 'home.index'
                ),
                (object) array(
                    'titulo' => 'Pacientes',
                    'ruta' => 'pacientes.index'
                ),
                (object) array(
                    'titulo' => 'Información paciente',
                    'ruta' => '#'
                ),
            ]
        ])

        <section class="container">
            <form class="row shadow d-flex justify-content-evenly flex-wrap form" @if (isset($show)) method='GET' action="{{route('pacientes.edit', $paciente->id)}}"
            @elseif (isset($edit)) method="POST" action="{{route('pacientes.update', $paciente->id)}}"
            @elseif (isset($create)) method="POST" action="{{route('pacientes.store')}}" @endif>

            @if (isset($edit))
                @method('PUT')
            @endif

            @if(isset($create) || isset($edit))
                @csrf
            @endif

            <fieldset class="col-md-6 mt-4 px-xl-5">
                <label for="" class="fs-5 mb-1">APELLIDO</label>
                <div class="input__form d-flex">
                    <div class="input-icon d-flex justify-content-center align-items-center">
                        <img src="{{ \Illuminate\Support\Facades\URL::asset('/images/form_paciente/form_user.svg') }}"
                        alt="icono de correo electronico" class="">
                    </div>
                    <input type="text" placeholder="Ingrese su apellido" class="outline-0 border-0 ht-48 w-100 fs-5 ps-2">
                </div>
            </fieldset>

            <fieldset class="col-md-6 mt-4 px-xl-5">
                <label for="" class="fs-5 d-block mb-1">NOMBRE COMPLETO</label>
                <input type="text" placeholder="Ingrese su nombre completo" class="input__form fs-5 ps-2 outline-0 w-100">
            </fieldset>

            <fieldset class="col-md-6 mt-4 px-xl-5">
                <label for="" class="fs-5 mb-1">EMAIL</label>
                <div class="input__form d-flex">
                    <div class="input-icon d-flex justify-content-center align-items-center">
                        <img src="{{ \Illuminate\Support\Facades\URL::asset('/images/form_paciente/form_email.svg') }}"
                        alt="icono de correo electronico" class="">
                    </div>
                    <input type="text" placeholder="Por ejemplo, tucorreo@gmail.com" class="outline-0 border-0 ht-48 w-100 fs-5 ps-2">
                </div>
            </fieldset>

            <fieldset class="col-md-6 mt-4 px-xl-5">
                <label for="" class="fs-5 d-block mb-1">GENERO</label>
                <select type="text" placeholder="Ingrese su nombre" class="input__form fs-5 ps-2 w-100 outline-0 input__form">
                    <option value="">Eliga una opción...</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                    <option value="3">Otro</option>
                </select>
            </fieldset>

            <fieldset class="col-md-3 mt-4 px-xl-5">
                <label for="" class="fs-5 mb-1">DNI</label>
                <div class="input__form d-flex">
                    <div class="input-icon d-flex justify-content-center align-items-center">
                        <img src="{{ \Illuminate\Support\Facades\URL::asset('/images/form_paciente/form_dni.svg') }}"
                        alt="icono de correo electronico" class="">
                    </div>
                    <input type="text" placeholder="Tú DNI" class="outline-0 border-0 ht-48 w-100 fs-5 ps-2">
                </div>
            </fieldset>

            <fieldset class="col-md-3 mt-4 px-xl-5">
                <label for="" class="fs-5 d-block mb-1">NACIMIENTO</label>
                <input type="date" placeholder="Ingrese su nombre" class="input__form fs-5 ps-2 outline-0 w-100">
            </fieldset>

            <fieldset class="col-md-6 mt-4 px-xl-5">
                <label for="" class="fs-5 mb-1">NÚMERO DE CELULAR</label>
                <div class="input__form d-flex">
                    <div class="input-icon d-flex justify-content-center align-items-center">
                        <img src="{{ \Illuminate\Support\Facades\URL::asset('/images/form_paciente/form_phone.svg') }}"
                        alt="icono de correo electronico" class="">
                    </div>
                    <input type="text" placeholder="11 XXXX-XXXX" class="outline-0 border-0 ht-48 w-100 fs-5 ps-2">
                </div>
            </fieldset>

            <fieldset class="col-md-6 mt-4 px-xl-5">
                <label for="" class="fs-5 mb-1">NOMBRE DE CALLE</label>
                <div class="input__form d-flex">
                    <div class="input-icon d-flex justify-content-center align-items-center">
                        <img src="{{ \Illuminate\Support\Facades\URL::asset('/images/form_paciente/form_map.svg') }}"
                        alt="icono de correo electronico" class="">
                    </div>
                    <input type="text" placeholder="Por ejemplo, 25 de mayo" class="outline-0 border-0 ht-48 w-100 fs-5 ps-2">
                </div>
            </fieldset>

            <fieldset class="col-md-3 mt-4 px-xl-5">
                <label for="" class="fs-5 d-block mb-1">NÚMERO</label>
                <input type="text" placeholder="N° Domicilio" class="input__form fs-5 ps-2 outline-0 w-100">
            </fieldset>

            <fieldset class="col-md-3 mt-4 px-xl-5">
                <label for="" class="fs-5 d-block mb-1">LOCALIDAD</label>
                <input type="text" placeholder="Lanús, Lomas..." class="input__form fs-5 ps-2 outline-0 w-100">
            </fieldset>

            <fieldset class="col-md-6 mt-4 px-xl-5">
                <label for="" class="fs-5 mb-1">OBRA SOCIAL</label>
                <div class="input__form d-flex">
                    <div class="input-icon d-flex justify-content-center align-items-center">
                        <img src="{{ \Illuminate\Support\Facades\URL::asset('/images/form_paciente/form_obrasocial.svg') }}"
                        alt="icono de correo electronico" class="">
                    </div>
                    <input type="text" placeholder="Obra social a la cual pertenece" class="outline-0 border-0 ht-48 w-100 fs-5 ps-2">
                </div>
            </fieldset>

            <fieldset class="col-md-3 mt-4 px-xl-5">
                <label for="" class="fs-5 d-block mb-1">PLAN</label>
                <input type="text" placeholder="Tú plan" class="input__form fs-5 ps-2 outline-0 w-100">
            </fieldset>

            <fieldset class="col-md-3 mt-4 px-xl-5">
                <label for="" class="fs-5 d-block mb-1">N° DE SOCIO</label>
                <input type="text" placeholder="Tú N° de Socio" class="input__form fs-5 ps-2 outline-0 w-100">
            </fieldset>

            <button class="col-8 col-md-auto btn btn-success rounded-0 px-5 mx-auto me-md-3 me-xl-5 fw-bold fs-5 my-5 ms-auto">Editar</button>

        </form>
        </section>


    @endsection

    @section('scripts')

    @endsection


@else
    @section('titulo')
        No disponible
    @endsection

    @section('contenido')
        Recurso no disponible .
    @endsection
@endif
