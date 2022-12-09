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
    return view('home');
})->name('home.index');



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


Route::resource('pacientes', \App\Http\Controllers\PacientesController::class)
    ->only(['index','store','update','show','create','edit']);

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


// -------- PRUEBAS --------
Route::get('/hora', function () {
    return view('header');
    //return \Carbon\Carbon:: now() -> toDateString();
});
