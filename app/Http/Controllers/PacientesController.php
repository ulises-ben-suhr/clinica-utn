<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = DB::select(
            'SELECT nombre, apellido, dni FROM pacientes'
        );
        return view('/pacientes/pacientes', [
            'pacientes' => $pacientes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.detallePaciente');
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
                    'INSERT INTO pacientes (nombre, apellido, dni, direccion, telefono1, email, categoria_os, numero_afiliado)
                        values (?, ?, ?, ?, ?, ?, ?, ?)', [
                        $request -> post('nombre'),
                        $request -> post('apellido'),
                        $request -> post('dni'),
                        $request -> post('direccion'),
                        $request -> post('telefono'),
                        $request -> post('email'),
                        $request -> post('categoria_os'),
                        $request -> post('numero_afiliado')
                    ]
                );
            });
            redirect(route('pacientes.index'));
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
    public function show($dni)
    {
        $busqueda = $dni;

        $pacienteBuscado = DB::selectOne(
            'SELECT nombre, apellido, dni, direccion, telefono1, email, categoria_os, numero_afiliado
            FROM pacientes
            WHERE dni = ?', [$busqueda]
        );
        return view('/pacientes/detallePaciente', [
            'paciente' => $pacienteBuscado
        ]);
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
        try {
            DB::transaction(function() use($request) {
                DB::update(
                    'UPDATE pacientes
                    SET nombre = ?, apellido = ?,
                        dni = ?, direccion = ?,
                        telefono1 = ?, email = ?,
                        categoria_os = ?, numero_afiliado = ?
                    WHERE dni = ?', [
                        $request -> post('nombre'),
                        $request -> post('apellido'),
                        $request -> post('dni'),
                        $request -> post('direccion'),
                        $request -> post('telefono'),
                        $request -> post('email'),
                        $request -> post('categoria_os'),
                        $request -> post('numero_afiliado'),
                        $request -> post('dni'),
                    ]
                );
            });
            redirect(route('pacientes.index'));
        }
        catch(\Exception $exception) {
        }
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

    public function search(Request $request) {
        $busqueda = $request -> input('dni');

        $pacienteBuscado = DB::selectOne(
            'SELECT nombre, apellido, dni, direccion, telefono1, email, categoria_os, numero_afiliado
            FROM pacientes
            WHERE dni = ?', [$busqueda]
        );
        return view('/pacientes/detallePaciente', [
            'paciente' => $pacienteBuscado
        ]);
    }
}
