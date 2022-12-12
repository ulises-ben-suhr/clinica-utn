<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

            return redirect()->route('home.view', ['username' => $request -> post('usuario')]);
        }

        else {
            dd($request); die();
            return back() -> withErrors([
                'usuario' => 'El nombre de usuario no existe en la base de datos.',
                'contrasenia' => 'La contraseña no coincide con el nombre de usuario ingresado.'
            ]);
        }
    }

    public function destroy(Request $request) {
        $request -> session() -> invalidate();
        return redirect(route('home.view'));
    }
}


