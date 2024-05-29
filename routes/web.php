<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/calendario', function () {
    return view('calendario');
});

Auth::routes();

Route::resource('consultas', App\Http\Controllers\ConsultaController::class);
Route::resource('medicos', App\Http\Controllers\MedicoController::class);
Route::resource('pacientes', App\Http\Controllers\PacienteController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('relacionmedicopacientes', App\Http\Controllers\RelacionMedicoPacienteController::class);

Route::get('/calendario', [ App\Http\Controllers\CalendarioController::class, 'index']);
Route::get('pacientes/{dni_paciente}/consultas', [App\Http\Controllers\PacienteController::class, 'showConsultas'])->name('pacientes.showConsultas');
Route::get('/calendario', [App\Http\Controllers\CalendarioController::class, 'index']);
Route::get('/calendario/consultas', [App\Http\Controllers\CalendarioController::class, 'consultas']);
Route::get('medicos/{dni_medico}/consultas', [App\Http\Controllers\MedicoController::class, 'showConsultas'])->name('medicos.showConsultas');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


