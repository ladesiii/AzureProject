<?php

use App\Http\Controllers\ProyectosController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing');

// Web page Tareas
Route::get('/tareas', [TareaController::class, 'tareas'])->name('tareas');

//Pagina de Proyecto
Route::get('/proyecto', [ProyectosController::class, 'proyecto'])->name('proyecto');

//Endpoint para crear proyecto (POST)
Route::post('/proyecto', [ProyectosController::class, 'store'])->name('proyecto.store');

Route::get('/login', [UsuarioController::class, 'login'])->name('login');

// Registro view (simple GET route)
Route::get('/registro', function () {
    return view('registro');
})->name('registro');


//Registro
Route::get('/registro', [registroController::class, 'registro'])->name('registro');

Route::view('/login', 'login')->name('login');


