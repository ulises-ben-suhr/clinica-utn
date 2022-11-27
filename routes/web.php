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

Route::get('/turnos/create', [
    \App\Http\Controllers\TurnosController::class, 'create'
]) -> name('turno.create');



// -------- PACIENTES --------
Route::get('/pacientes', [
    \App\Http\Controllers\PacientesController::class, 'index'
])-> name('paciente.index');

// Este search busca un DNI de paciente en la DB
// Si encuentra el DNI devuelve un formulario con todos los datos
// Si no lo encuentra devuelve el formulario vacío para cargarlo con datos nuevos
Route::get('/pacientes/search', [
    \App\Http\Controllers\PacientesController::class, 'search'
]) -> name('paciente.search');

Route::post('/pacientes', [
    \App\Http\Controllers\PacientesController::class, 'store'
]) -> name('paciente.store');

// Esto no está funcionando -> Es el botón para editar los datos de un paciente
Route::put('/paciente', [
    \App\Http\Controllers\PacientesController::class, 'update'
]) -> name('paciente.update');


// -------- ADMIN --------
Route::get('/admin', function() {
    return view('admin');
});
