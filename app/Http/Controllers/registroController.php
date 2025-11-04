<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class registroController extends Controller
{
    public function registro()
    {
        return view('registro');
    }
}
