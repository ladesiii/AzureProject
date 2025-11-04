<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProyectosController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/index', [TareaController::class, 'index']);


//Web page Tareas

Route::get('/tareas', [TareaController::class, 'index'])->name('tareas');

Route::get('/tareas', function (){
    return view('tareas');


})->name('tareas');//hgukvgvgj
Route::get('/tareas', [TareaController::class, 'tareas'])->name('tareas');

//Web Page Proyecto (handled by controller)
Route::get('/proyecto', [ProyectosController::class, 'proyecto'])->name('proyecto');
Route::get('/login', [UsuarioController::class, 'login'])->name('login');

//dqwxqwqdqd
