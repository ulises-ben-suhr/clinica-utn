@extends('layout.template-base')


@section('titulo')
    Pacientes
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('css/pacientes.css') }}">
@endsection

@section('contenido')

    @include('layout.template-title-section', [
        'titulo' => 'listado de pacientes',
        'links' => [
            (object) array(
                'titulo' => 'Inicio',
                'ruta' => 'home.index'
            ),
            (object) array(
                'titulo' => 'Pacientes',
                'ruta' => '#'
            )
        ]
    ])

    <section class="container border-15 my-5 rounded p-0">

        <section class="container">

            <section class="list-head row justify-content-between">
                <div class="p-2 my-3 col-md-4 mx-3">
                    <div class="d-flex align-items-center">
                        <img  src="./images/pacientes.svg" alt="" srcset="">
                        <span class=" fs-5 text text-color-gray ms-3 lh-sm sansbold">Listado de pacientes<br> consultados</span>
                    </div>
                </div>

                <form class="position-relative col-11 col-md-6 col-xxl-5 p-2 mx-3 d-flex align-items-center justify-content-center" action="{{ route('pacientes.index') }}" method="GET">
                    <input class="w-100 p-2 outline-0 border border-secondary border-right-0
                    @error('dni')
                    border-danger
                    @enderror

                    "
                    value="{{ old('dni') }}"
                    type="search" name="dni" id="dni" placeholder="Ingrese DNI del paciente">
                    <input class="btn h-42 lh-0 px-5 fs-5 rounded-0  btn-primary sansbold text-with" type="submit" value="Buscar">
                    @error('dni')
                    <p class="position-absolute top-50 my-4 start-0 rounded fw-bold p-2 text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                </form>

            </section>

            <section class="row justify-content-between my-5 my-lg-4 align-items-center ">
                <a href="{{ route('pacientes.create') }}" class=" col-11 col-md-auto rounded-0 text-center d-flex align-items-center justify-content-center btn btn-success mx-3 sansbold">Añadir un nuevo paciente</a>
                <nav aria-label="..." class="col-11 col-md-6 col-xxl-5 p-2 mx-3 d-flex align-items-center" >
                    1.2.3.4.5.6.7.8.9.10
                </nav>
            </section>

        </section>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col" class="d-none d-sm-table-cell">DNI</th>
                <th scope="col" class="d-none d-sm-table-cell">Consultas</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
                @foreach($pacientes as $paciente)
                    <tr>
                        <td class="align-middle text-primary sansRegular">
                            <a href="{{ route('pacientes.show', $paciente->id) }}"
                                class="text-decoration-none">{{$paciente -> nombre}} {{$paciente -> apellido}}</a>
                        </td>

                        <td class="align-middle text-color-gray sansRegular d-none d-sm-table-cell">{{$paciente -> dni}}</td>

                        <td class="align-middle position-relative d-none d-sm-table-cell">
                            <button class=" btn btn-turno btn-primary  sansbold py-0 px-2 rounded-1 d-flex align-items-center">
                                <img src="./images/calendar.svg" alt="" srcset="" class="me-2">
                                Turnos
                            </button>
                            <nav class="nav-turnos position-absolute top-40 bg-light d-none">
                                <div class="list-group">
                                    <a href="{{ route('turno.create', [
                                        'nombre' => $paciente -> nombre,
                                        'apellido' => $paciente -> apellido,
                                        'dni' => $paciente -> dni
                                    ]) }}" class="list-group-item list-group-item-action d-flex align-items-center gap-2">
                                        <img src="./images/calendario_plus.svg"  alt="" srcset="">
                                        Programar turno
                                    </a>
                                    <button type="button" class="list-group-item list-group-item-action d-flex align-items-center gap-2">
                                        <img src="./images/list.svg"  alt="" srcset="">
                                        Listado de turnos
                                    </button>
                                </div>
                            </nav>
                        </td>

                        <td >
                            <div class="d-lg-flex gap-3 d-none ">
                                <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-primary sansbold py-0 ps-1 pe-2 rounded-1 d-flex align-items-center">
                                    <img src="./images/eye.svg" alt="" srcset="" class="me-2">
                                        Ver
                                </a>

                                <a href="#" class="btn btn-primary sansbold py-0 pe-2 rounded-1 d-flex align-items-center">
                                    <img src="./images/edit.svg" alt="" srcset="" class="me-2">
                                        Modificar
                                </a>

                                <button class="btn btn-danger sansbold py-0 pe-2 rounded-1 d-flex align-items-center">
                                    <img src="./images/trash.svg" alt="" srcset="" class="me-2">
                                        Remover
                                </button>
                            </div>

                            <div class="d-flex gap-4 d-lg-none ">
                                <button class="btn btn-primary sansbold py-0 ps-1 pe-2 rounded-1 d-flex align-items-center">
                                    <img src="./images/tool_1.svg" alt="" srcset="" class="me-2">
                                        Acciones
                                </button>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>


@endsection

@section('scripts')
    <script src="./js/menuTurnos.js"></script>
@endsection
