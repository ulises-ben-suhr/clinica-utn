@extends('layout.template-sesion')

@push('user-home')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('css/user-home.css') }}">
@endpush

@section('contenido')

    @if(isset($paciente))
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
    @else
        <div class="">
            <form action="{{ route('pacientesRegistrados.store') }}" method="POST">
                @csrf
                <fieldset>
                    <legend>Datos Personales</legend>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" value="">
                    <label for="dni">DNI:</label>
                    <input type="text" id="dni" name="dni" value="">
                </fieldset>


                <fieldset>
                    <legend>Datos de residencia</legend>
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" value="">
                </fieldset>


                <fieldset>
                    <legend>Datos de contacto</legend>
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" value="">
                    <label for="email">Correo Electrónico</label>
                    <input type="text" id="email" name="email" value="">
                </fieldset>


                <fieldset>
                    <legend>Datos de obra social</legend>
                    <label for="categoria_os">Plan:</label>
                    <input type="text" id="categoria_os" name="categoria_os" value="">
                    <label for="numero_afiliado">Nº de socio:</label>
                    <input type="text" id="numero_afiliado" name="numero_afiliado" value="">
                </fieldset>

                <input class="btn btn-primary" type="submit" value="Alta">
            </form>
        </div>
    @endif


@endsection
