<?php

namespace App\Http\Controllers;

use App\Models\entities\Paciente;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use mysql_xdevapi\Table;

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















    //////////////////////////////////////////////////////////////////


    private function createRandomPass() {
        return "shadow";
    }

    private function getLastPacienteID() {
        return DB::selectOne(
            'SELECT id FROM pacientes WHERE id = (SELECT MAX(id) FROM pacientes)'
        );
    }

    private function getLastUsuarioID() {
        return DB::selectOne(
            'SELECT id FROM usuarios WHERE id = (SELECT MAX(id) FROM usuarios)'
        );
    }

    private function conectarUserPaciente($idPaciente, $idUsuario) {
        try {
            DB::transaction(function() use($idPaciente, $idUsuario) {
                DB::update(
                    'UPDATE usuarios SET usuarios.pacienteFK = ?
             WHERE id = ?', [$idPaciente, $idUsuario]
                );
            });
        }

        catch (\Exception $exception) {

        }

    }

    public function recepcionDePaciente(Request $request) {
        try {
            $this -> store($request);

            $nombreUsuario = $request -> post('dni');
            $contrasenia = $this -> createRandomPass();
            $ultimoPacienteRecepcionado = $this -> getLastPacienteID() -> id;

            (new RegisterController()) -> storeAutoUser(
                $nombreUsuario,
                $contrasenia,
                $ultimoPacienteRecepcionado
            );

            return redirect('');
        }
        catch (\Exception $exception) {
            dd($nombreUsuario, $contrasenia, $ultimoPacienteRecepcionado);
        }
    }

    public function registroDePaciente(Request $request) {
        $this -> store($request);
        $ultimoIdPaciente = $this -> getLastPacienteID();
        $ultimoIdUsuario = $this -> getLastUsuarioID();
        $this -> conectarUserPaciente($ultimoIdPaciente -> id, $ultimoIdUsuario -> id);

        return redirect('');
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
        }
        catch (\Exception $exception) {
            dd($exception);
        }
    }






    //////////////////////////////////////////////////////////////////

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
