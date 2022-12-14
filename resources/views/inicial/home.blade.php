@extends('layout.template-base')

@section('titulo')
    Inicio
@endsection

@push('home-styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('css/home.css') }}">
@endpush

@section('contenido')

    <section id="home-hero">
        <div class="cristal hero--title text-center pt-3 pb-4">
            <h1 class="display-1 text-white">Bienvenido a UTN Salud</h1>
            <small class="lead text-primary">El centro de salud para el estudiante tecnológico</small>
        </div>

        <div class="cristal hero--text py-3">
            <p>Salud UTN es un proyecto con fines didácticos propuesto por un grupo de estudiantes en el curso de formación Full Stack impartido por profesores del área de Sistemas de la Universidad Tecnológica Nacional regional Buenos Aires</p>
            <p>El sitio está construido en Laravel</p>
        </div>
    </section>

@endsection


