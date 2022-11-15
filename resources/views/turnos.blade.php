<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<header>

</header>

<main class="container">
    <table class="table">
        <thead>
        <tr>
            <th>Fecha</th>
            <th>Horario</th>
            <th>Paciente</th>
            <th>Profesional</th>
            <th>Especialidad</th>
            <th>Estado</th>
            <th>Acciones</th>
{{--            <td>pacienteFK</td>--}}
        </tr>
        </thead>

        <tbody>
            @foreach($turnos as $turno)
                <tr>
                    <td>{{ $turno -> getFechaTurno() }}</td>
                    <td>{{ $turno -> getHorario() }}</td>
                    <td>{{ $turno -> getPaciente() }}</td>
                    <td>{{ $turno -> getDoctor() }}</td>
                    <td>{{ $turno -> getEspecialidad() }}</td>
                    <td>{{ $turno -> getEstado() }}</td>
                    <td class="acciones">
                        <button>Editar</button>
                        <button>Cancelar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>

<footer>

</footer>

</body>
</html>
