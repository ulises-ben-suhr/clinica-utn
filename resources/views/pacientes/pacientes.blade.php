@extends('layout.template-base')

@section('titulo')
    Pacientes
@endsection

{{-- <!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body> --}}

@section('contenido')

<section class="container border-15 my-5 rounded p-0">

    <section class="container">

        <section class="list-head row justify-content-between">
            <div class="p-2 my-3 col-md-4 mx-3">
                <div class="d-flex align-items-center">
                    <img  src="./images/pacientes.svg" alt="" srcset="">
                    <span class=" fs-5 text text-color-gray ms-3 lh-sm sansbold">Listado de pacientes<br> consultados</span>
                </div>
            </div>

            <form class="col-11 col-md-6 col-xxl-5 p-2 mx-3 d-flex align-items-center justify-content-center" action="{{ url('/pacientes/search') }}" method="GET">
                <input class="w-100 p-2 outline-0 border border-secondary" type="search" name="dni" id="dni" placeholder="Ingrese DNI del paciente">
                <input class="btn h-42 lh-0 px-5 fs-5 rounded-0  btn-primary sansbold text-with" type="submit" value="Buscar">
            </form>
        </section>

        <section class="row justify-content-between my-4 align-items-center ">
            <a href="" class=" col-11 col-md-auto rounded-0 text-center d-flex align-items-center justify-content-center btn btn-success mx-3 sansbold">Añadir un nuevo paciente</a>
            <nav aria-label="..." class="col-11 col-md-6 col-xxl-5 p-2 mx-3 d-flex align-items-center" >
                1.2.3.4.5.6.7.8.9.10
            </nav>
        </section>

    </section>

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">DNI</th>
            <th scope="col">Consultas</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach($pacientes as $paciente)
                <tr>
                    <td class="align-middle text-primary sansRegular">
                            {{$paciente -> nombre}} {{$paciente -> apellido}}
                    </td>
                    <td class="align-middle text-color-gray sansRegular">{{$paciente -> dni}}</td>
                    <td class="align-middle">
                        <button class="btn btn-primary  sansbold py-0 px-2 rounded-1 d-flex align-items-center">
                        <img src="./images/calendar.svg" alt="" srcset="" class="me-2">
                            Turnos
                        </button>
                    </td>
                    <td >
                        <div class="d-lg-flex gap-3 d-none ">
                            <button class="btn btn-primary sansbold py-0 ps-1 pe-2 rounded-1 d-flex align-items-center">
                                <img src="./images/eye.svg" alt="" srcset="" class="me-2">
                                    Ver
                            </button>

                            <button class="btn btn-primary sansbold py-0 pe-2 rounded-1 d-flex align-items-center">
                                <img src="./images/edit.svg" alt="" srcset="" class="me-2">
                                    Modificar
                            </button>

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



{{-- </body>
</html> --}}
