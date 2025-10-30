<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\registroController;
use App\Http\Controllers\ProyectosController;

Route::get('/', function () {
    return view('landing');
})->name('landing');


//Web page Tareas

Route::get('/tareas', [TareaController::class, 'tareas'])->name('tareas');
//hgukvgvgj



//Web Page Proyecto (handled by controller)
Route::get('/proyecto', [ProyectosController::class, 'proyecto'])->name('proyecto');


//dqwxqwqdqd

//Web Page Registro
Route::get('/registro', [registroController::class, 'registro'])->name('registro');

//Route::get('/registro', function () {
 //   return view('registro');
//})->name('registro');
