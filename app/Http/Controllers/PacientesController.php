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

}
