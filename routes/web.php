<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProyectosController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

// Web page Tareas
Route::get('/tareas', [TareasController::class, 'tareas'])->name('tareas');

//Pagina de Proyecto
Route::get('/proyecto', [ProyectosController::class, 'proyecto'])->name('proyecto');

//Endpoint para crear proyecto (POST)
Route::post('/proyecto', [ProyectosController::class, 'store'])->name('proyecto.store');


Route::get('/login', [UsuarioController::class, 'login'])->name('login');



// Registro view (simple GET route)
Route::get('/registro', function () {
    return view('registro');
})->name('registro');

