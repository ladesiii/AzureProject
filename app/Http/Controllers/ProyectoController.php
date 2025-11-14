<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function proyecto()
    {
        //
        $proyectos = Proyecto::with('tareas')->get()->map(funtion($p) {
            return [
                'id' => $p->id,
                'nombre' => $p->nombre,
                'tareas' => $p->tareas->pluck('nombre')->toArray(),
            ];
        });

        return view('proyecto', compact('proyecto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        if ($request->ajax()) {
            return response()->json([
                'message' => 'Proyecto creado exitosamente.',
                'nombre'  => $validated['nombre'],
            ]);
        }

        return redirect()->route('proyecto')->with('success', 'Proyecto creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        return redirect()->route('proyecto')->with('success', 'Proyecto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

};
