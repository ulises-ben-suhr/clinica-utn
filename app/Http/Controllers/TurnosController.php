<?php

namespace App\Http\Controllers;

use App\Models\entities\Turno;
use Illuminate\Http\Request;

class TurnosController extends Controller
{
     private $turnos = [];

     public function __construct() {
         $unTurno = new Turno();
         $unTurno -> setId("143");
         $unTurno -> setFechaTurno("24/11/2022");
         $unTurno -> setHorario("15:00");
         $unTurno -> setPaciente("Robles Valentina");
         $unTurno -> setDoctor("Berton Nicolás");
         $unTurno -> setFechaSolicitud("14/11/2022");
         $unTurno -> setEspecialidad("Cardiología");
         $unTurno -> setEstado("Activo");

         array_push($this->turnos, $unTurno);
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ir a la DB a buscar los turnos
        return view('turnos', [
            "turnos" => $this -> turnos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
