<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\registroController;
use App\Http\Controllers\ProyectoController;

// Ruta pública para la página de aterrizaje
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {

    // Listado de tareas filtradas por proyecto: tareas/proyecto/{id}
    Route::get('tareas/proyecto/{proyecto}', [TareasController::class, 'index'])->name('tareas.proyecto');

    // Recurso REST de tareas (index, store, update, destroy, etc.)
    Route::resource('tareas', TareasController::class);

    // Recurso REST de proyectos
    Route::resource('proyecto', ProyectoController::class);

    // CAMBIO: Ruta API para obtener usuarios de un proyecto (para llenar dropdown dinámicamente)
    Route::get('/proyecto/{id}/usuarios', [ProyectoController::class, 'obtenerUsuarios']);

    //Herramoienta para mas tarde

    // ->only(['index'])->names([
    //     'index' => 'tareas.tareas',
    // ]);

});





// Registro de usuarios (público)
Route::get('/registro', [registroController::class, 'registro'])->name('registro');
Route::post('/registro', [registroController::class, 'store'])->name('registro.submit');

// Login y Logout (público)
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
