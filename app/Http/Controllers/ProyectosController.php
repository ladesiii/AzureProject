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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        if($request-> ajax()) {
        return response()->json([
            'message' => 'Proyecto creado exitosamente.',
            'nombre' => $validated['nombre'],
        ]);
    }

    return redirect()->route('proyecto')->with('success', 'Proyecto creado correctamente.');
    }

}



