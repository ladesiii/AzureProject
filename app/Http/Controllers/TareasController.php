<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    function index() : Returntype {
        return view("tareas.tareas");
    }
}
