<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/pacientes/{username}', [
    \App\Http\Controllers\TurnosController::class, 'indexTurnosPaciente'
]) -> name('turnos.unPaciente');


// -------- PACIENTES --------


Route::resource('pacientes', \App\Http\Controllers\PacientesController::class)
    ->only(['index','store','update','show','create','edit','destroy']);


Route::post('/pacientesRecepcionados', [\App\Http\Controllers\PacientesController:: class, 'recepcionDePaciente'])
    -> name('pacientesRecepcionados.store');

// Cuando un usuario se registra en la plataforma, en el formulario de registro va a tener:
//  1. Datos de registro (usuario y contraseña) -> Le pega a la tabla de usuarios
//  2. Datos de paciente (nombre, apellido, dni, obra social, etc) -> Le pega a la tabla de pacientes
// Como necesito pegarle a dos controladores distintos, esta función hace de paso intermedio

Route::post('/pacientesRegistrados',[
    \App\Http\Controllers\PacientesController::class, 'registroDePaciente'
]) -> name('pacientesRegistrados.store');




// Este search busca un DNI de paciente en la DB
// Si encuentra el DNI devuelve un formulario con todos los datos
// Si no lo encuentra devuelve el formulario vacío para cargarlo con datos nuevos

Route::get('/pacientes/d/search', [
    \App\Http\Controllers\PacientesController::class, 'search'
]) -> name('paciente.search');

// -------- ADMIN --------
Route::get('/admin', function() {
    return view('admin');
});


// -------- SESIONES --------

Route::resource('/login', \App\Http\Controllers\LoginController::class)
    ->only(['index', 'store']);

Route::get('/login/{id}/edit', [\App\Http\Controllers\LoginController::class, 'edit'])
    ->middleware('auth')->middleware('v-user-password')->name('login.edit');

Route::put('/login/{id}', [\App\Http\Controllers\LoginController::class, 'update'])
    ->middleware('auth')->middleware('v-user-password')->name('login.update');

Route::post('/logout', [
    \App\Http\Controllers\LoginController::class, 'destroy'
]) -> name('log.out');

Route::get('/registro', [
    \App\Http\Controllers\RegisterController::class, 'create'
]) -> name('register.create');

Route::post('/registro', [
    \App\Http\Controllers\RegisterController::class, 'store'
]) -> name('register.store');


// -------- CONFIGURACION DE USUARIO --------

// -------- PRUEBAS --------
Route::get('/hora', function () {
//    return view('header');
    return \Carbon\Carbon:: now() -> toDateString();
}) -> name('prueba');
