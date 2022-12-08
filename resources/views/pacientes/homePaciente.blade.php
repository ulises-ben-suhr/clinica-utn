@extends('layout.template-sesion')



@section('contenido')

    {{-- Esta es la tabla de turnos vigentes --}}
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
        @foreach($turnos as $turno)
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



{{-- Esta es la tabla de turnos pasados --}}
{{--    <table class="table">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Fecha</th>--}}
{{--            <th>Horario</th>--}}
{{--            <th>Profesional</th>--}}
{{--            <th>Especialidad</th>--}}
{{--            <th>Estado</th>--}}
{{--            <th>Acciones</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}

{{--        <tbody>--}}
{{--        @foreach($turnosOtroAlgo as $turno)--}}
{{--            <tr>--}}
{{--                <td>{{ $turno -> fecha_turno }}</td>--}}
{{--                <td>{{ $turno -> horario }}</td>--}}
{{--                <td>{{ $turno -> doctor }}</td>--}}
{{--                <td>{{ $turno -> especialidad }}</td>--}}
{{--                <td>{{ $turno -> estado }}</td>--}}
{{--                <td class="acciones">--}}
{{--                    <button class="btn btn-primary">Editar</button>--}}
{{--                    <button class="btn btn-danger">Cancelar</button>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}

{{--    <div>--}}
{{--        <h1>Perfil</h1>--}}
{{--        <div>--}}
{{--            <h2>Nombre:</h2>--}}
{{--            <span>{{  }}</span>--}}

{{--            <h2>Apellido:</h2>--}}
{{--            <span>{{  }}</span>--}}

{{--            <h2>DNI:</h2>--}}
{{--            <span>{{  }}</span>--}}

{{--            <h2>OS:</h2>--}}
{{--            <span>{{  }}</span>--}}

{{--            <h2>Mail</h2>--}}
{{--            <span>{{  }}</span>--}}
{{--        </div>--}}
{{--        <a href="{{  }}">Actualizar datos</a>--}}
{{--    </div>--}}


@endsection
