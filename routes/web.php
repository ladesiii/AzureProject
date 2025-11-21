<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\registroController;
use App\Http\Controllers\ProyectoController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    // Web page Tareas
    Route::get('/tareas', [TareaController::class, 'tareas'])->name('tareas');

    //Pagina de Proyecto
    Route::get('/proyecto', [ProyectoController::class, 'proyecto'])->name('proyecto');

    //Endpoint para crear proyecto (POST)
    Route::post('/proyecto', [ProyectoController::class, 'store'])->name('proyecto.store');
});

// Registro
Route::get('/registro', [registroController::class, 'registro'])->name('registro');
Route::post('/registro', [registroController::class, 'store'])->name('registro.store');

// Login
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
