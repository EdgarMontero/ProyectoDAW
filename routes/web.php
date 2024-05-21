<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::resource('consultas', App\Http\Controllers\ConsultaController::class);
Route::resource('medicos', App\Http\Controllers\MedicoController::class);
Route::resource('pacientes', App\Http\Controllers\PacienteController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::get('pacientes/{dni_paciente}/consultas', [App\Http\Controllers\PacienteController::class, 'showConsultas'])->name('pacientes.showConsultas');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
