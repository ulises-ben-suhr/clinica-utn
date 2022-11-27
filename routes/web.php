<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// -------- TURNOS --------
Route::get('/turnos', [
    \App\Http\Controllers\TurnosController::class, 'index'
]);


// -------- PACIENTES --------
Route::get('/pacientes', [
    \App\Http\Controllers\PacientesController::class, 'index'
])-> name('paciente.index');


// -------- ADMIN --------
Route::get('/admin', function() {
    return view('admin');
});
