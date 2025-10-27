<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\ProyectosController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/index', [TareaController::class, 'index']);


//Web page Tareas
Route::get('/tareas', function (){
    return view('tareas');

});//hgukvgvgj


//Web Page Proyecto (handled by controller)
Route::get('/proyecto', function () {
    return view('proyecto');

})->name('proyecto');


