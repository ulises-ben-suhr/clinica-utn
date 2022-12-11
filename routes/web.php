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
    return view('inicial/home');
}) -> name('home.view');

Route::get('/servicios', function () {
    return view('inicial/servicios');
}) -> name('servicios.view');

Route::get('/institucional', function () {
    return view('inicial/institucional');
}) -> name('institucional.view');

Route::get('/contacto', function () {
    return view('inicial/contacto');
}) -> name('contacto.view');




// -------- TURNOS --------
Route::get('/turnos', [
    \App\Http\Controllers\TurnosController::class, 'index'
]) -> name('turno.index');

Route::get('/turnos/create', [
    \App\Http\Controllers\TurnosController::class, 'create'
]) -> name('turno.create');

Route::post('/turnos', [
    \App\Http\Controllers\TurnosController::class, 'store'
]) -> name('turno.store');


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



//Route::post('/pacientes', [
//    \App\Http\Controllers\PacientesController::class, 'store'
//]) -> name('paciente.store');

Route::post('/pacientesRecepcionados', [
  \App\Http\Controllers\PacientesController:: class, 'recepcionDePaciente'
]) -> name('pacientesRecepcionados.store');

Route::post('/pacientesRegistrados', [
  \App\Http\Controllers\PacientesController::class, 'registroDePaciente'
]) -> name('pacientesRegistrados.store');



// Esto no está funcionando -> Es el botón para editar los datos de un paciente
Route::put('/paciente', [
    \App\Http\Controllers\PacientesController::class, 'update'
]) -> name('paciente.update');




Route::get('/pacientes/{username}', [
    \App\Http\Controllers\TurnosController::class, 'indexTurnosPaciente'
]) -> name('turnos.unPaciente');







// -------- ADMIN --------
Route::get('/admin', function() {
    return view('admin');
});






// -------- SESIONES --------
Route::resource('/login', \App\Http\Controllers\LoginController::class)
    ->only(['index', 'store']);

Route::post('/logout', [
    \App\Http\Controllers\LoginController::class, 'destroy'
]) -> name('log.out');

Route::get('/registro', [
    \App\Http\Controllers\RegisterController::class, 'create'
]) -> name('register.create');

Route::post('/registro', [
    \App\Http\Controllers\RegisterController::class, 'store'
]) -> name('register.store');


// -------- PRUEBAS --------
Route::get('/hora', function () {
    return \Carbon\Carbon:: now() -> toDateString();
}) -> name('hora.show');


