<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\ProyectosController;

Route::get('/', function () {
    return view('landing');
})->name('landing');
/// aixhJBQDQW UV WCH WWC CQ LQJKDF WE WFLWE WELFLFLFLFLFFLFLFLFLFLFLFLFLLLLL

Route::get('/index', [TareaController::class, 'index']);

Route::get('/proyecto', [ProyectosController::class, 'proyecto']);


//Web page Tareas
Route::get('/max', function (){
    return view('max');
});//hgukvgvgj


//Web Page Proyecto
Route::get('/proyecto', function(){
    return view('proyecto');
}) -> name('proyecto');
