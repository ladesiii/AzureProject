<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
<<<<<<< HEAD
use App\Http\Controllers\registroController;
=======
use App\Http\Controllers\UsuarioController;
>>>>>>> main
use App\Http\Controllers\ProyectosController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

// Web page Tareas
Route::get('/tareas', [TareaController::class, 'tareas'])->name('tareas');

//Web Page Proyecto (handled by controller)
Route::get('/proyecto', [ProyectosController::class, 'proyecto'])->name('proyecto');
Route::get('/login', [UsuarioController::class, 'login'])->name('login');
// Registro view (simple GET route)
Route::get('/registro', function () {
    return view('registro');
})->name('registro');

<<<<<<< HEAD
//Registro
Route::get('/registro', [registroController::class, 'registro'])->name('registro');

Route::view('/login', 'login')->name('login');

=======
>>>>>>> main
