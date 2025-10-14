<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProyectosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Proyectos', [ProyectosController::class, 'index' ] );
