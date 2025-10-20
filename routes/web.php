<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProyectosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/index', [TareasController::class, 'index']);

Route::get('/max', function (){
    return view('max');
});
