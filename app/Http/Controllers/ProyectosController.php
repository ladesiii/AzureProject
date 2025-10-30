<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProyectosController extends Controller
{

    // Route target for /proyecto
    public function proyecto()
    {
        return view('proyecto');
    }

}



