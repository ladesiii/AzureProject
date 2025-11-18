<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\registroController;
use App\Http\Controllers\ProyectosController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

// Web page Tareas
Route::get('/tareas', [TareaController::class, 'tareas'])->name('tareas');

//Pagina de Proyecto
Route::get('/proyecto', [ProyectosController::class, 'proyecto'])->name('proyecto');

//Endpoint para crear proyecto (POST)
Route::post('/proyecto', [ProyectosController::class, 'store'])->name('proyecto.store');

// Route to UsuarioController removed to avoid conflict with LoginController

//Registro
Route::get('/registro', [registroController::class, 'registro'])->name('registro');


Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
