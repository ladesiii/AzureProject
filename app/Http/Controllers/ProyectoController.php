<?php
namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Usuario_Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $proyectos = Proyecto::all();
        return view('proyecto', compact('proyectos'));
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
        //Crear el proyecto
        $proyecto         = new Proyecto();
        $proyecto->nombre = $request->input('nombre');
        $proyecto->save();

        $Usuario_Proyecto              = new Usuario_Proyecto();
        $Usuario_Proyecto->id_usuario  = Auth::user()->id_usuario;
        $Usuario_Proyecto->id_proyecto = $proyecto->id_proyecto;
        $Usuario_Proyecto->id_rol      = 1; // Asignar el rol de administrador (1)
        $Usuario_Proyecto->save();

        /*Añadir un nuevo registro en la tabla usuario_proyecto_rol para tener constancia del usuario admi, id proyecto y id usuario

        Esto del usuario proyecto sol
        $proyecto = new Usuario_proyecto();
        $proyecto->nombre = $request->input('nombre');
        $proyecto->save();

        */
        /*Crear una check list en ves de un desplegable con los usuarios existentes y que sean no admin y esto eria un bucle*/
        return redirect()->route('proyecto.index')->with('success', 'Proyecto creado correctamente.');

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

        return redirect()->route('proyecto.index')->with('success', 'Proyecto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto)
    {
        try {
            $proyecto->tareas()->delete();// Eliminar tareas relacionadas al proyecto
            $proyecto->delete();// Eliminar el proyecto
              $response = redirect()->route('proyecto.index')
            ->with('success', 'Proyecto eliminado correctamente.');
        }catch (\Exception $e) {
            $response = redirect()->route('proyecto.index')
            ->with('error', 'Error al eliminar el proyecto: ' . $e->getMessage());
        }
        return $response;

    }

}
