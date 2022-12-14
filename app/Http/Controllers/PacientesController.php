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
        $this->middleware('v-alcance-pacientes')->except(['edit','show','update']);
        $this->middleware('v-datos-personales')->only(['edit','show','update']);
        $this->middleware('can:puede_borrar_pacientes')->only(['pacientes']);
    }

    //METODOS PRINCIPALES

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

    public function create()
    {

        $obrasSociales = $this->getObrasSociales();

        return view('pacientes.paciente',[
            'create' => true,
            'seccion' => 'Crear paciente',
            'obrasSociales' => $obrasSociales
        ]);
    }

    public function store(Request $request)
    {
        $this->formPacienteValidation($request);
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

    public function show($id)
    {

        $pacienteBuscado = $this->getPacienteOfID($id);

        $obrasSociales = $this->getObrasSociales();

        return view('pacientes.paciente',[
            'paciente' => $pacienteBuscado,
            'show' => true,
            'seccion' => 'Informacion Paciente',
            'obrasSociales' => $obrasSociales
        ]);
    }

    public function edit($id)
    {

        $pacienteBuscado = $this->getPacienteOfID($id);

        $obrasSociales = $this->getObrasSociales();

        return view('pacientes.paciente',[
            'paciente' => $pacienteBuscado,
            'edit' => true,
            'seccion' => 'Modificar paciente',
            'obrasSociales' => $obrasSociales
        ]);
}

    public function update(Request $request, $id)
    {

        $this->formPacienteValidation($request);

        try {
            DB::transaction(function() use($request,$id) {
                DB::update(
                    'UPDATE pacientes
                    SET nombre = ?, apellido = ?,
                        dni = ?,
                        telefono1 = ?, email = ?,
                        categoria_os = ?, numero_afiliado = ?, calle = ?,
                        n_calle = ?, localidad = ?, f_nacimiento = ?, genero = ?, obra_social_FK = ?
                    WHERE id = ?', [
                        $request -> post('nombre'),
                        $request -> post('apellido'),
                        $request -> post('dni'),
                        $request -> post('telefono'),
                        $request -> post('email'),
                        $request -> post('categoria_os'),
                        $request -> post('numero_afiliado'),
                        $request -> post('calle'),
                        $request -> post('n_calle'),
                        $request -> post('localidad'),
                        $request -> post('f_nacimiento'),
                        $request -> post('genero'),
                        $request -> post('obrasocial'),
                        $id,
                    ]
                );
            });
            // redirect(route('pacientes.show', $id));
        }
        catch(\Exception $exception) {
            dd($exception);
        }
        return redirect()->route('pacientes.show', $id);
    }

    public function destroy($id)
    {
        //
    }


    // METODOS SECUNDARIOS

    // getPacienteOfID: Sirve para SHOW y EDIT, nos devuelve una vista con toda la informacion del paciente
    // incluso el nombre de su obra social, para poder mostrarla.
    private function getPacienteOfID($id){
        $paciente = DB::selectOne(
            'SELECT p.*, os.nombre as os_nombre
            FROM pacientes as p
            INNER JOIN obras_sociales as os
            on p.obra_social_FK = os.id
            WHERE p.id = ?', [$id]
        );
        return $paciente;
    }

    // Retorna la lista de obras sociales para poder mapearla en el formulario
    private function getObrasSociales(){
        return DB::select(
            'SELECT * FROM obras_sociales'
        );
    }

    private function formPacienteValidation(Request $request){
        return Validator::make($request->post(), [
            'nombre' => ['required','max:30'],
            'apellido' => ['required','max:30'],
            'dni' => ['required','digits:8'], //'digits_between:8,8'
            'telefono' => ['required', 'digits_between:8,10'],
            'email' => ['required','max:50','email'],
            'categoria_os' => ['required','max:15'],
            'numero_afiliado' => ['required','max:30'],
            'calle' => ['required','max:30'],
            'n_calle' => ['required','digits_between:0,5'],
            'localidad' => ['required','max:25'],
            'f_nacimiento' => ['required','before_or_equal:'.Date('Y-m-d')],
            'genero' => ['required'],
            'obrasocial' => ['required']
        ])->validate();

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
