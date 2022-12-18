<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create() {
        // Nos dirige a la pantalla de creación de usuario
        if(is_null(Auth::user())){
            return view('inicial/register');
        }
        return redirect(route('home.view'));

    }

    public function store(Request $request, $idPacienteFK) {
        try {
            DB::transaction(function() use($request, $idPacienteFK) {
                DB::insert(
                    'INSERT INTO usuarios (username, password, pacienteFK, rol) VALUES (?, ?, ?, ?)', [
                        $request -> post('usuario'),
                        Hash::make($request -> post('contrasenia')),
                        $idPacienteFK,
                        'PACIENTE'
                    ]
                );
            });
//            return redirect(route('login.index'));
        }
        catch (\Exception $exception) {
            dd($exception);
        }
    }

    public function storeAutoUser($usuario, $contrasenia, $idPacienteFK) {
        try {
            DB::transaction(function() use($usuario, $contrasenia, $idPacienteFK) {
                DB::insert(
                    'INSERT INTO usuarios (username, password, pacienteFK) VALUES (?, ?, ?)', [
                        $usuario,
                        Hash::make($contrasenia),
                        $idPacienteFK
                    ]
                );
            });

            return redirect('');
        }
        catch (\Exception $exception) {
            dd($exception);
        }
    }
}
