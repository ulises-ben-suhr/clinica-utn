<?php

namespace App\Http\Controllers;

use App\Models\entities\Turno;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TurnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turnos = DB::select('SELECT fecha_turno, estado, paciente, doctor, especialidad, horario FROM turnos');


        return view('turnos', [
            "turnos" => $turnos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $paciente)
    {
//        dd($paciente); die();
        return view('/turnos/nuevoTurno', [
            'nombre' => $paciente -> get('nombre'),
            'apellido'=> $paciente -> get('apellido'),
            'dni' => $paciente -> get('dni')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::transaction(function() use($request) {
                DB::insert(
                    'INSERT into turnos (fecha_turno, horario, paciente, doctor, fecha_solicitud, estado, especialidad, dni_paciente)
                    values (?,?,?,?,?,?,?,?)', [
                        $request -> post('fecha_turno'),
                        $request -> post('horario'),
                        "{$request -> query('apellido')} {$request -> query('nombre')}",
                        $request -> post('profesional'),
                        Carbon::now() -> toDateString(),
                        'activo',
                        $request -> post('especialidad'),
                        $request -> query('dni')
                    ]
                );
            });
            redirect(route('turno.index'));
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
}
