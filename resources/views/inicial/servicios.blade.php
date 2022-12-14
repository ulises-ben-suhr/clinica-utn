@extends('layout.template-base')

@section('titulo')
    Servicios
@endsection

@push('services-styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('css/servicios.css') }}">
@endpush

@section('contenido')

    <section class="servicios_hero">
        <div class="hero_titulo text-center py-2">
            <h1 class="display-2 text-white">Servicios</h1>
        </div>
    </section>

    <section class="servicios_especialidades">
        <h2 class="especialidades_titulo display-4 text-center">Especialidades</h2>

        <p class="especialidades_descripcion">En UTN Salud nos comprometemos con el cuidado y la atención de las siguientes especialidades:</p>

        <ul class="especialidades_lista">
            <li>Cardiología</li>
            <li>Dermatología</li>
            <li>Endocrinología</li>
            <li>Gastroenterología</li>
            <li>Ginecología</li>
            <li>Hematología</li>
            <li>Hepatología</li>
            <li>Nefrología</li>
            <li>Neonatología</li>
            <li>Neumonología</li>
            <li>Neurología</li>
            <li>Nutriología</li>
            <li>Obstetricia</li>
            <li>Oncología</li>
            <li>Pediatría</li>
            <li>Psiquiatría</li>
            <li>Reumatología</li>
            <li>Toxicología</li>
            <li>Traumatología</li>
            <li>Urología</li>
        </ul>
    </section>

    <section class="servicios_destacados">

        <h2 class="destacados_titulo display-4 text-center">Servicios destacados</h2>

        <div class="row row-cols-auto justify-content-evenly">
            <div class="destacados_features col mb-5">
                <div class="features_imagen--gradient">
                    <img class="features_imagen" src="{{ \Illuminate\Support\Facades\URL::asset('images/resonancia.png') }}" alt="">
                </div>
                <span class="features_descripcion">Laboratorio de imágenes</span>
            </div>

            <div class="destacados_features col mb-5">
                <div class="features_imagen--gradient">
                    <img class="features_imagen" src="{{ \Illuminate\Support\Facades\URL::asset('images/quirofano.png') }}" alt="">
                </div>
                <span class="features_descripcion">Quirófano</span>
            </div>

            <div class="destacados_features col mb-5">
                <div class="features_imagen--gradient">
                    <img class="features_imagen" src="{{ \Illuminate\Support\Facades\URL::asset('images/uti.png') }}" alt="">
                </div>
                <span class="features_descripcion">Unidad de Terapia Intensiva</span>
            </div>

            <div class="destacados_features col mb-5">
                <div class="features_imagen--gradient">
                    <img class="features_imagen" src="{{ \Illuminate\Support\Facades\URL::asset('images/laboratorio.png') }}" alt="">
                </div>
                <span class="features_descripcion">Laboratorio</span>
            </div>
        </div>

        <p>Además contamos con:</p>
        <ul class="destacados_lista">
            <li>Internación</li>
            <li>Servicio de Guardia</li>
            <li>Unidad de Hemodinamia</li>
            <li>Unidad Materno Infantil</li>
        </ul>
    </section>

@endsection
