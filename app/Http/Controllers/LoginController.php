<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('inicial/login');
    }

    public function store() {
        // Acá vienen todas las validaciones pertinentes

    }

    public function destroy() {

    }
}


