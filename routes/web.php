<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::resource('consultas', App\Http\Controllers\ConsultaController::class);
Route::resource('medicos', App\Http\Controllers\MedicoController::class);
Route::resource('pacientes', App\Http\Controllers\PacienteController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
