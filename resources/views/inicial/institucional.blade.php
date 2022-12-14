@extends('layout.template-base')

@section('titulo')
    Institucional
@endsection

@push('institucional-styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('css/institucional.css') }}">
@endpush

@section('contenido')
    <section class="institucional_hero">
        <div class="hero_titulo text-center py-2">
            <h1 class="display-2 text-white">Institucional</h1>
        </div>
    </section>

    <section class="ideologia">
        <div class="ideologia_mision">
            <h2 class="mision_titulo display-4 text-center">Misión</h2>
            <p class="mision_descripcion fs-5 fw-light lh-lg">
                Satisfacer de manera eficaz y eficiente las necesidades de cuidado de salud de la comunidad.
                Brindar a toda la comunidad la mejor atención medica basada en la evidencia científica y contenido ético, acompañando al paciente y su familia.
                Colaborar con la Educación del paciente, su familia y la sociedad, brindando cuidado y promoción de actitudes saludables.
            </p>
        </div>

        <div class="ideologia_vision">
            <h2 class="vision_titulo display-4 text-center">Visión</h2>
            <p class="vision_descripcion fs-5 fw-light lh-lg">
                Crear y sostener un sistema integral de salud privada, que ofrezca un espacio de crecimiento y desarrollo profesional enfocado en la excelencia y calidez en la asistencia al paciente y su familia.
            </p>
            <div class="vision_deco"></div>
        </div>
    </section>

    <section class="valores">
        <h2 class="valores_titulo display-4 text-center">Valores</h2>

        <div class="valores_descripcion">
            <div class="descripcion_card">
                <img class="card_imagen" src="{{ \Illuminate\Support\Facades\URL::asset('images/assets/aprecio.svg') }}" alt="aprecio">
                <h3 class="card_titulo">Hospitalidad</h3>
                <p class="card_texto">Acojer incondicionalmente a las personas, respetando su dignidad, cuidando y promoviendo integramente su vida</p>
            </div>

            <div class="descripcion_card">
                <img class="card_imagen" src="{{ \Illuminate\Support\Facades\URL::asset('images/assets/doctores.svg') }}" alt="doctores">
                <h3 class="card_titulo">Calidad</h3>
                <p class="card_texto">Es la base escencial de nuestro servicio, involucra la excelencia, profesionalidad, atención y
                    conciencia de las necesidades de la comunidad</p>
            </div>

            <div class="descripcion_card">
                <img class="card_imagen" src="{{ \Illuminate\Support\Facades\URL::asset('images/assets/cientifica.svg') }}" alt="cientifica">
                <h3 class="card_titulo">Responsabilidad</h3>
                <p class="card_texto">Representa un criterio funcamental para nuestro servicio y nuestra gestión, asumir el rol activo en
                    la labor diaria.</p>
            </div>

            <div class="descripcion_card">
                <img class="card_imagen" src="{{ \Illuminate\Support\Facades\URL::asset('images/assets/seguridad.svg') }}" alt="seguridad">
                <h3 class="card_titulo">Compromiso</h3>
                <p class="card_texto">Desarrollar las tareas enfocando el esfuerzo en brindar atención de calidad a nuestros pacientes y
                    sus familiares, mantener una conducta transparente y un accionar honesto</p>
            </div>
        </div>

    </section>

@endsection
