<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index() {
        return view('inicial.login');
    }


    public function store(Request $request) {
        // Acá vienen todas las validaciones pertinentes


        if (Auth::attempt([
            'username' => $request -> post('usuario'),
            'password' => $request -> post('contrasenia')
        ])) {
            // Si coincide creamos la sesión
            $request -> session() -> regenerate();


            if($request->user()->rol == 'PACIENTE'){
                $this->pacienteIdOnSession($request);
            }

            return redirect()->route('home.view');

        }

        else {
            dd($request); die();
            return back() -> withErrors([
                'usuario' => 'El nombre de usuario no existe en la base de datos.',
                'contrasenia' => 'La contraseña no coincide con el nombre de usuario ingresado.'
            ]);
        }
    }

    private function pacienteIdOnSession(Request $request){
        $pacienteID = DB::selectOne(
            'SELECT p.id as paciente_id
                FROM usuarios as u
                INNER JOIN pacientes as p
                on u.pacienteFK = p.id
                WHERE u.id = :id ;' , ['id' => Auth::user()->id]
        );

        session(['pacienteID' => $pacienteID]);
        return redirect()->route('home.view', ['username' => $request -> post('usuario')]);
    }


    public function destroy(Request $request) {
        $request -> session() -> invalidate();
        return redirect(route('home.view'));
    }
}


