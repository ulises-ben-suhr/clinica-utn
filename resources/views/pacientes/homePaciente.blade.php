@extends('layout.template-sesion')

@push('user-home')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('css/user-home.css') }}">
@endpush

@section('contenido')

    <div class="contenido">
        {{-- Esta es la tabla de turnos vigentes --}}
        <section class="turnos-vigentes">
            <h1 class="display-5 text-center">Turnos</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Horario</th>
                    <th>Profesional</th>
                    <th>Especialidad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($turnosVigentes as $turno)
                    <tr>
                        <td>{{ $turno -> fecha_turno }}</td>
                        <td>{{ $turno -> horario }}</td>
                        <td>{{ $turno -> doctor }}</td>
                        <td>{{ $turno -> especialidad }}</td>
                        <td>{{ $turno -> estado }}</td>
                        <td class="acciones">
                            <button class="btn btn-primary">Editar</button>
                            <button class="btn btn-danger">Cancelar</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>

    {{-- Esta es la tabla de turnos pasados --}}
        <section class="turnos-viejos">
            <h1 class="display-5 text-center">Turnos antiguos</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Horario</th>
                    <th>Profesional</th>
                    <th>Especialidad</th>
                    <th>Estado</th>
                </tr>
                </thead>

                <tbody>
                @foreach($turnosViejos as $turno)
                    <tr>
                        <td>{{ $turno -> fecha_turno }}</td>
                        <td>{{ $turno -> horario }}</td>
                        <td>{{ $turno -> doctor }}</td>
                        <td>{{ $turno -> especialidad }}</td>
                        <td>{{ $turno -> estado }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>

        <dsection class="perfil">
            <h1 class="display-5 text-center">Perfil</h1>
            <div class="datos-personales">
                <span>
                    <strong>Nombre:</strong> {{ $paciente -> nombre }} {{ $paciente -> apellido }}
                </span>
                <span>
                    <strong>DNI:</strong> {{ $paciente -> dni }}
                </span>
                <span>
                    <strong>Teléfono:</strong> {{ $paciente -> telefono1 }}
                </span>
                <span>
                    <strong>Mail:</strong> {{ $paciente -> email }}
                </span>
                <span>
                    <strong>OS:</strong> {{ $paciente -> categoria_os }}
                </span>
                <span>
                    <strong>Afiliado:</strong> {{ $paciente -> numero_afiliado }}
                </span>

            </div>
        </dsection>

    </div>

@endsection
