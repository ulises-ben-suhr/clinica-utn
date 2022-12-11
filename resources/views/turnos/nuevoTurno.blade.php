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
<body id="body">

<form action="{{ route('turno.store', ['nombre' => $nombre, 'apellido' => $apellido, 'dni' => $dni]) }}" method="POST">
    @csrf
    <fieldset>
        <legend>Datos del paciente:</legend>
        <label for="nombre">Nombre: </label>
        <input type="text" value="{{$nombre}}" name="nombre" id="nombre" disabled>
        <label for="apellido">Apellido:</label>
        <input type="text" value="{{$apellido}}" name="apellido" id="apellido" disabled>
        <label for="dni">DNI:</label>
        <input type="text" value="{{$dni}}" name="dni" id="dni" disabled>
    </fieldset>

    <fieldset>
        <legend>Datos del turno:</legend>

        <label for="especialidad">Especialidad: (*)</label>
        <select name="especialidad" id="especialidad">
            <option value="" disabled selected>Elija una opción</option>
            <option value="cardiologia">cardiologia</option>
            <option value="dermatologia">dermatologia</option>
            <option value="endocrinologia">endocrinologia</option>
            <option value="gastroenterologia">gastroenterologia</option>
            <option value="ginecologia">ginecologia</option>
            <option value="hematologia">hematologia</option>
            <option value="hepatologia">hepatologia</option>
            <option value="nefrologia">nefrologia</option>
            <option value="neonatologia">neonatologia</option>
            <option value="neumonologia">neumonologia</option>
            <option value="neurologia">neurologia</option>
            <option value="nutriologia">nutriologia</option>
            <option value="obstetricia">obstetricia</option>
            <option value="oncologia">oncologia</option>
            <option value="pediatria">pediatria</option>
            <option value="psiquiatria">psiquiatria</option>
            <option value="reumatologia">reumatologia</option>
            <option value="toxicologia">toxicologia</option>
            <option value="traumatologia">traumatologia</option>
            <option value="urologia">urologia</option>
        </select>

        <label class="d-none" for="profesional">Especialista: (*)</label>
        <select class="d-none" name="profesional" id="profesional">
            <option value="" disabled selected>Elija una opción</option>
        </select>

        <label class="d-none" for="fecha_turno">Fecha: (*)</label>
        <input class="d-none" type="date" name="fecha_turno" id="fecha_turno">

        {{-- La selección de horario se puede hacer de dos formas --}}
        {{--
            1. Con un select
            2. Con varios radio buttons
            * Ambos deben recibir los datos pertinentes con JS
        --}}
        <label class="d-none" for="horario">Hora: (*)</label>
        <input class="d-none" type="time" name="horario" id="horario">
    </fieldset>

    <p>Los campos marcados con (*) son obligatorios</p>

    <input type="submit" value="Agendar!">
</form>

<script>
    //import {doctores} from "@/profesionales/profesionales";

    class Profesional {
        constructor(nombre, apellido, matricula, especialidad, diasQueAtiende, horariosQueAtiende, obrasSocialesQueAtiende) {
            this.nombre = nombre;
            this.apellido = apellido;
            this.matricula = matricula;
            this.especialidad = especialidad;
            this.diasQueAtiende = diasQueAtiende;
            this.horariosQueAtiende = horariosQueAtiende;
            this.obrasSocialesQueAtiende = obrasSocialesQueAtiende;
        }

        nombre;
        apellido;
        matricula;
        especialidad;
        diasQueAtiende;
        horariosQueAtiende;
        obrasSocialesQueAtiende;

        get especialidad() {
            return this.especialidad;
        }
        get nombre() {
            return this.nombre;
        }
        get apellido() {
            return this.apellido;
        }
    }

    const doctoresDeLaClinica = [
        new Profesional(
            "daniel",
            "lin",
            "23162",
            "cardiologia",
            ["lunes", "miercoles", "jueves"],
            [
                ["8:00", "8:30", "9:00", "9:30", "10:00", "10:30", "11:00", "11:30"],
                ["14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30"],
                ["14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30"]
            ],
            ["osde"]
        ),
        new Profesional(
            "guadalupe",
            "baez",
            "24582",
            "cardiologia",
            ["lunes", "martes", "miercoles"],
            [
                ["10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30"],
                ["10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30"],
                ["10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30"]
            ],
            ["osde"]
        ),
        new Profesional(
            "patricio",
            "heredia",
            "34913",
            "cardiologia",
            ["martes", "viernes"],
            [
                ["14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30"],
                ["8:00", "8:30", "9:00", "9:30", "10:00", "10:30", "11:00", "11:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30"],
            ],
            ["osde"]
        ),

        new Profesional("celeste",
            "fuentes",
            "63058",
            "dermatologia",
            ["lunes", "martes", "miercoles", "jueves", "viernes"],
            [
                ["8:00", "8:30", "9:00", "9:30", "10:00", "10:30", "11:00", "11:30"],
                ["8:00", "8:30", "9:00", "9:30", "10:00", "10:30", "11:00", "11:30"],
                ["8:00", "8:30", "9:00", "9:30", "10:00", "10:30", "11:00", "11:30"],
                ["8:00", "8:30", "9:00", "9:30", "10:00", "10:30", "11:00", "11:30"],
                ["8:00", "8:30", "9:00", "9:30", "10:00", "10:30", "11:00", "11:30"]
            ],
            ["osde"]),
        new Profesional("rafael",
            "davio",
            "50543",
            "dermatologia",
            ["martes", "miercoles", "sabado"],
            [
                ["8:00", "8:30", "9:00", "9:30", "10:00", "10:30", "11:00", "11:30"],
                ["8:00", "8:30", "9:00", "9:30", "10:00", "10:30", "11:00", "11:30"],
                ["8:00", "8:30", "9:00", "9:30", "10:00", "10:30", "11:00", "11:30"],
                ["8:00", "8:30", "9:00", "9:30", "10:00", "10:30", "11:00", "11:30"],
                ["8:00", "8:30", "9:00", "9:30", "10:00", "10:30", "11:00", "11:30"]
            ],
            ["osde"])
        ]

    let especialidad = document.getElementById('especialidad');
    let profesional = document.getElementById('profesional');
    let fechaTurno = document.getElementById('fecha_turno');
    let horario = document.getElementById('horario');

    /*
    * Esta función acota los médicos disponibles de acuerdo a
    * la especialidad que seleccione el usuario
     */
    especialidad.addEventListener('input', () => {
        /*
        * Al elegir especialidad se revelan los médicos disponibles
        * Si uno cambia de especialidad, los médicos quedan (no deseado)
        * removeAllChildNodes elimina todos los médicos que podrían quedar de una selección de especialidad previa
         */
        removeAllChildNodes(profesional);

        /*
        * medicosDisponibles filtra los médicos de la especialidad seleccionada
        * Y luego mapeamos sus nombres
         */
        let medicos = medicosDisponibles(especialidad.value).map(
            doc => doc.apellido + ' ' + doc.nombre
        );

        /*
        * Ponemos cada médico como opción a elegir
         */
        medicos.forEach(medico => {
            let opcion = document.createElement('option');
            opcion.innerText = medico;
            profesional.appendChild(opcion);
        })

        /*
        * Revelamos el selector de medicos
         */
        document.querySelector('label[for="profesional"]').classList.remove('d-none');
        profesional.classList.remove('d-none');
    });

    profesional.addEventListener('input', () => {
        document.querySelector('label[for="fecha_turno"]').classList.remove('d-none');
        fechaTurno.classList.remove('d-none');
    });

    fechaTurno.addEventListener('input', () => {
        document.querySelector('label[for="horario"]').classList.remove('d-none');
        horario.classList.remove('d-none');
    })




    /*
    * Funciones auxiliares
    */


    function removeAllChildNodes(parent) {
        while (parent.firstChild) {
            parent.removeChild(parent.firstChild);
        }
    }

    function medicosDisponibles(sector) {
        return doctoresDeLaClinica.filter(
            doc => doc.especialidad == sector
        );
    }





</script>

</body>
</html>
