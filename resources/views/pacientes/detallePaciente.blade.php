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

<main>

{{--  Este es el formulario al que llega la REQUEST que busca a un paciente con el método SEARCH  --}}
{{--  Si encuentra el DNI @if(isset($paciente)) -> devuelve el formulario con sus datos y un botón de editar  --}}
{{--  Si no encuentra el DNI @if(!isset($paciente)) -> devuelve el formulario vacío y un botón para darle el alta  --}}

    @if(isset($paciente)) <form action="{{ route('paciente.update') }}" method="POST"> @method('PUT') @endif
    @if(!isset($paciente)) <form action="{{ route('paciente.store') }}" method="POST"> @endif
        @csrf
        <fieldset>
            <legend>Datos Personales</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" @if(isset($paciente)) value="{{$paciente -> nombre }}" disabled @endif>
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" @if(isset($paciente)) value="{{$paciente -> apellido }}" disabled @endif>
            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" @if(isset($paciente)) value="{{$paciente -> dni }}" disabled @endif>
        </fieldset>


        <fieldset>
            <legend>Datos de residencia</legend>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" @if(isset($paciente)) value="{{$paciente -> direccion }}" disabled @endif>
        </fieldset>


        <fieldset>
            <legend>Datos de contacto</legend>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" @if(isset($paciente)) value="{{$paciente -> telefono1 }}" disabled @endif>
            <label for="email">Correo Electrónico</label>
            <input type="text" id="email" name="email" @if(isset($paciente)) value="{{$paciente -> email }}" disabled @endif>
        </fieldset>


        <fieldset>
            <legend>Datos de obra social</legend>
            <label for="categoria_os">Plan:</label>
            <input type="text" id="categoria_os" name="categoria_os" @if(isset($paciente)) value="{{$paciente -> categoria_os }}" disabled @endif>
            <label for="numero_afiliado">Nº de socio:</label>
            <input type="text" id="numero_afiliado" name="numero_afiliado" @if(isset($paciente)) value="{{$paciente -> numero_afiliado }}" disabled @endif>
        </fieldset>

        {{--
            Este botón de editar no está funcionando
            Al clickearlo deberían pasar varias cosas
            1. Habilitar todos los campos de texto para escribir
            2. No perder el contenido de los campos al habilitarlos
            3. Que desaparezca el botón de "EDITAR"
            4. Que aparezca un botón de "CANCELAR"
            5. Que aparezca un botón de "GUARDAR"
         --}}

        @if(isset($paciente)) <input type="submit" value="Editar"> @endif
        @if(!isset($paciente)) <input type="submit" value="Alta"> @endif

        <a href="{{ route('turno.create') }}">Dar turno</a>

    @if(!isset($paciente)) </form> @endif
    @if(isset($paciente)) </form> @endif
</main>




</body>
</html>
