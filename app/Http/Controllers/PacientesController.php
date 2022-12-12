<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PacientesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('v-alcance-pacientes');
        $this->middleware('can:puede_borrar_pacientes')->only(['pacientes']);
    }

    public function index(Request $request)
    {
        $this->validate($request,[
            'dni' => ['digits_between:0,8']
        ]);

        $dni = $request->get('dni', NULL);

        if($dni == NULL){
            $pacientes = DB::select(
                'SELECT id,nombre, apellido, dni FROM pacientes'
            );
        }else{
            $dni = $dni.'%';
            $pacientes = DB::select(
                'SELECT id,nombre, apellido, dni FROM pacientes WHERE dni LIKE :dni', ['dni' => $dni]
            );
        }


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
        return view('pacientes.paciente',[
            'create' => true,
            'seccion' => 'Crear paciente'
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
        return 'Guardando';
        // try {
        //     DB::transaction(function() use($request) {
        //         DB::insert(
        //             'INSERT INTO pacientes (nombre, apellido, dni, direccion, telefono1, email, categoria_os, numero_afiliado)
        //                 values (?, ?, ?, ?, ?, ?, ?, ?)', [
        //                 $request -> post('nombre'),
        //                 $request -> post('apellido'),
        //                 $request -> post('dni'),
        //                 $request -> post('direccion'),
        //                 $request -> post('telefono'),
        //                 $request -> post('email'),
        //                 $request -> post('categoria_os'),
        //                 $request -> post('numero_afiliado')
        //             ]
        //         );
        //     });
        //     redirect(route('pacientes.index'));
        // }
        // catch (\Exception $exception) {
        //     dd($exception);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $pacienteBuscado = DB::selectOne(
            'SELECT *
            FROM pacientes
            WHERE id = ?', [$id]
        );


        return view('pacientes.paciente',[
            'paciente' => $pacienteBuscado,
            'show' => true,
            'seccion' => 'Informacion Paciente'
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

        $pacienteBuscado = DB::selectOne(
            'SELECT *
            FROM pacientes
            WHERE id = ?', [$id]
        );


        return view('pacientes.paciente',[
            'paciente' => $pacienteBuscado,
            'edit' => true,
            'seccion' => 'Modificar paciente'
        ]);
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
        return 'Actualizando';
        // try {
        //     DB::transaction(function() use($request) {
        //         DB::update(
        //             'UPDATE pacientes
        //             SET nombre = ?, apellido = ?,
        //                 dni = ?, direccion = ?,
        //                 telefono1 = ?, email = ?,
        //                 categoria_os = ?, numero_afiliado = ?
        //             WHERE dni = ?', [
        //                 $request -> post('nombre'),
        //                 $request -> post('apellido'),
        //                 $request -> post('dni'),
        //                 $request -> post('direccion'),
        //                 $request -> post('telefono'),
        //                 $request -> post('email'),
        //                 $request -> post('categoria_os'),
        //                 $request -> post('numero_afiliado'),
        //                 $request -> post('dni'),
        //             ]
        //         );
        //     });
        //     redirect(route('pacientes.index'));
        // }
        // catch(\Exception $exception) {
        // }
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

        return view('pacientes.detallePaciente', [
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
}
