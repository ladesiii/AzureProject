<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProyectosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing');


Route::get('/index', [TareasController::class, 'index'])->name('index');

Route::get('/Proyectos', [ProyectosController::class, 'index' ] );

