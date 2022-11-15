<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<main class="container py-2 " >

    <form action="" method="" class="card p-3 bg-light">

        <fieldset class="card p-4 mb-3">
            <legend>Datos del paciente</legend>
            <label for="nombrePaciente" class="form-label">Nombre y apellido</label>
            <input type="text" placeholder="Ej: Escudero Jorge" name="nombrePaciente" id="nombrePaciente">
        </fieldset>

        <fieldset class="card p-4 mb-3">
            <legend>Datos del médico</legend>
            <label for="nombreMedico" class="form-label">Nombre y apellido</label>
            <input type="text" placeholder="Ej: Rojas Verónica" name="nombreMedico" id="nombreMedico">
            <label for="especialidadMedica" class="form-label">Especialidad</label>
            <input type="text" placeholder="Ej: Nefrologia" name="especialidadMedica" id="especialidadMedica">
        </fieldset>

        <fieldset class="card p-4 mb-3">
            <legend>Datos del turno</legend>
            <label for="fechaTurno" class="form-label">Fecha</label>
            <input type="text" placeholder="Ej: 14/11/2022" name="fechaTurno" id="fechaTurno">
            <label for="horarioTurno" class="form-label">Horario</label>
            <input type="text" placeholder="Ej: 10:30" name="horarioTurno" id="horarioTurno">
        </fieldset>

        <button type="submit" class="btn btn-primary">Nuevo turno</button>
    </form>

</main>

</body>
</html>
