<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ProyectosController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

// Web page Tareas
Route::get('/tareas', [TareaController::class, 'tareas'])->name('tareas');

//Pagina de Proyecto
Route::get('/proyecto', [ProyectoController::class, 'proyecto'])->name('proyecto');

//Endpoint para crear proyecto (POST)
Route::post('/proyecto', [ProyectoController::class, 'store'])->name('proyecto.store');

Route::get('/login', [UsuarioController::class, 'login'])->name('login');

// Registro view (simple GET route)
Route::get('/registro', function () {
    return view('registro');
})->name('registro');


//Registro
Route::get('/registro', [registroController::class, 'registro'])->name('registro');

Route::view('/login', 'login')->name('login');


