<?php

namespace App\Http\Controllers;

use App\Models\entities\Turno;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TurnosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        if(Auth::user()->rol == 'PACIENTE'){
            return view('turnos.ajax');
        }else{
        $turnos = DB::select(
            'SELECT fecha_turno, estado, paciente, doctor, especialidad, horario FROM turnos'
        );

        return view('turnos', [
            "turnos" => $turnos
        ]);
        }


    }

    public function indexTurnosPaciente($username) {
        $fechaActual = Carbon::now() -> toDateString();

        $turnos = DB::select(
            'SELECT fecha_turno, horario, doctor, especialidad, estado FROM turnos
            INNER JOIN usuarios ON usuarios.pacienteFK = turnos.paciente_FK
            WHERE usuarios.username = ? ', [$username]
        );

        $turnosVigentes = array_filter($turnos, function($turno) use($fechaActual) {
            return $turno -> fecha_turno >= $fechaActual &&
                $turno -> estado == 'activo';
        });
        $turnosViejos = array_filter($turnos, function($turno) use($fechaActual) {
            return $turno -> fecha_turno < $fechaActual ||
                $turno -> estado != 'activo';
        });

        $paciente = DB::selectOne(
            'SELECT nombre, apellido, dni, email, telefono1, categoria_os, numero_afiliado FROM pacientes
            INNER JOIN usuarios ON pacientes.id = usuarios.pacienteFK
            WHERE usuarios.username = ?', [$username]
        );

//        dd($paciente);

        return view('/pacientes/homePaciente', [
            'turnosVigentes' => $turnosVigentes,
            'turnosViejos' => $turnosViejos,
            'paciente' => $paciente
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $idPaciente = Auth::user()->rol == 'PACIENTE' ? session('pacienteID',0)->paciente_id : 0;

        if($idPaciente != 0){
            $paciente = DB::selectOne(
                'SELECT nombre,apellido,dni FROM pacientes WHERE id = :id',['id' => $idPaciente]
            );
            return view('/turnos/nuevoTurno', [
                'nombre' => $paciente->nombre,
                'apellido'=> $paciente->apellido,
                'dni' => $paciente -> dni
            ]);
        }else{
            return view('/turnos/nuevoTurno', [
                'nombre' => $request -> get('nombre'),
                'apellido'=> $request -> get('apellido'),
                'dni' => $request -> get('dni')
            ]);
        }



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $idPaciente = Auth::user()->rol == 'PACIENTE' ? session('pacienteID',0)->paciente_id : 0;

        if($idPaciente == 0){
            $idPaciente = DB::selectOne(
                'SELECT id FROM pacientes WHERE dni = ?', [$request -> query('dni')]
            )->id;
        };

        try {
            DB::transaction(function() use($request, $idPaciente) {
                DB::insert(
                    'INSERT into turnos (fecha_turno, horario, paciente, doctor, fecha_solicitud, estado, especialidad, dni_paciente, paciente_FK)
                    values (?, ?, ?, ?, ?, ?, ?, ?, ?)', [
                        $request -> post('fecha_turno'),
                        $request -> post('horario'),
                        "{$request -> query('apellido')} {$request -> query('nombre')}",
                        $request -> post('profesional'),
                        Carbon::now() -> toDateString(),
                        'activo',
                        $request -> post('especialidad'),
                        $request -> query('dni'),
                        $idPaciente
                    ]
                );
            });
            return redirect(route('turno.index'));
        }
        catch (\Exception $exception) {
            dd($exception);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //METODO AJAX TURNOS
    public function getPatientShifts(Request $request){
        $month = $request->post('monthCalender');
        $year = $request->post('yearCalender');
        $id = Auth::user()->rol == 'PACIENTE' ? session('pacienteID',0)->paciente_id : 0;
        $turnos = DB::select(
            'SELECT * FROM turnos WHERE fecha_turno LIKE :fecha AND paciente_FK = :id',[
                'fecha' => $year.'-%'.$month.'-%',
                'id' => $id
                ]
        );
        return response(json_encode($turnos),200)->header('Content-type','text/plain');
    }


}
