<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function index() {
        if(is_null(Auth::user())){
            return view('inicial.login');
        }
        return redirect(route('home.view'));
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
            return back() -> withErrors([
                'usuario' => 'El nombre de usuario no existe en la base de datos.',
                'contrasenia' => 'La contraseña no coincide con el nombre de usuario ingresado.'
            ]);
        }
    }

    public function edit(Request $request, $id){
        return view('usuario.cambioContraseña');
    }

    public function update(Request $request){
        $this->formPacienteValidation($request);

        if (Auth::attempt([
            'username' => Auth::user()->username,
            'password' => $request -> post('oldPassword')
        ])) {
            $this->cambiarPassword($request->post('password'));
        }else{
            return back() -> withErrors([
                'oldPassword' => 'La contraseña actual es incorrecta, porfavor intentelo nuevamente'
            ]);
        }

        $request -> session() -> invalidate();
        return redirect(route('home.view'));

    }

    public function destroy(Request $request) {
        $request -> session() -> invalidate();
        return redirect(route('home.view'));
    }

    // METODOS SECUNDARIOS

    private function cambiarPassword($newPassword){
        try {
            DB::transaction(function() use($newPassword) {
                DB::insert(
                    'UPDATE usuarios SET password = ? WHERE id = ?', [
                        Hash::make($newPassword),
                        Auth::user()->id
                    ]
                );
            });
        }
        catch (\Exception $exception) {
            dd($exception);
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

    private function formPacienteValidation(Request $request){
        return Validator::make($request->post(), [
            'oldPassword' => ['required','min:6'],
            'password' => ['required','confirmed','min:6']
        ])->validate();
    }



}


