<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\registroController;
use App\Http\Controllers\ProyectoController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    
    // Web page Tareas
    Route::resource('tareas', TareasController::class);

    //Endpoint para crear proyecto (POST)
    Route::resource('proyecto', ProyectoController::class);
    
    //Herramoienta para mas tarde 

    // ->only(['index'])->names([
    //     'index' => 'tareas.tareas',
    // ]);



});



// Route to UsuarioController removed to avoid conflict with LoginController

//Registro
Route::get('/registro', [registroController::class, 'registro'])->name('registro');
Route::post('/registro', [registroController::class, 'store'])->name('registro.submit');


Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
