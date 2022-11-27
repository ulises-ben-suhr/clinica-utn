<?php

namespace App\Http\Controllers;

use App\Models\entities\Paciente;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    public function index() {
        $pacientes = DB::select(
            'SELECT nombre, apellido, dni FROM pacientes'
        );
        return view('/pacientes/pacientes', [
            'pacientes' => $pacientes
        ]);
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

    public function store(Request $request) {
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
            redirect(route('paciente.index'));
        }
        catch (\Exception $exception) {

        }
    }

    public function update(Request $request) {
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
            redirect(route('paciente.index'));
        }
        catch(\Exception $exception) {
        }
    }



}
