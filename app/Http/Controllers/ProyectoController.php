<?php
namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Usuario_Proyecto;
use App\Models\Usuario;
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
        // CAMBIO: Obtener todos los proyectos
        $proyectos = Proyecto::all();
        // CAMBIO: Obtener todos los usuarios (para el dropdown de agregar usuario)
        $usuarios = Usuario::all();
        // CAMBIO: Pasar ambas variables a la vista
        return view('proyecto', compact('proyectos', 'usuarios'));
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
        try {
            // CAMBIO: Buscar proyecto por ID
            $proyecto = Proyecto::findOrFail($id);
            
            // CAMBIO: Actualizar nombre si se proporciona
            if ($request->filled('nombre')) {
                $proyecto->nombre = $request->input('nombre');
                $proyecto->save();
            }

            // CAMBIO: Agregar usuario al proyecto (evitando duplicados)
            if ($request->filled('usuario_add')) {
                $usuarioId = $request->input('usuario_add');
                if (!Usuario_Proyecto::where('id_usuario', $usuarioId)->where('id_proyecto', $proyecto->id_proyecto)->exists()) {
                    $usuario_proyecto = new Usuario_Proyecto();
                    $usuario_proyecto->id_usuario = $usuarioId;
                    $usuario_proyecto->id_proyecto = $proyecto->id_proyecto;
                    $usuario_proyecto->id_rol = 2; // CAMBIO: Rol usuario (2)
                    $usuario_proyecto->save();
                }
            }

            // CAMBIO: Remover usuario del proyecto
            if ($request->filled('usuario_remove')) {
                Usuario_Proyecto::where('id_usuario', $request->input('usuario_remove'))
                    ->where('id_proyecto', $proyecto->id_proyecto)
                    ->delete();
            }

            return redirect()->route('proyecto.index')->with('success', 'Proyecto actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('proyecto.index')->with('error', 'No se pudo actualizar el proyecto: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $proyecto)
    {
        // Aceptamos que la ruta nos pueda dar un id (int) o, por error, el nombre.
        // Primero intentamos con ID numérico, si no, intentamos buscar por nombre.
        try {
            if (is_numeric($proyecto)) {
                $proj = Proyecto::findOrFail((int) $proyecto);
            } else {
                // Si recibimos un nombre por error, intentamos buscar por nombre
                $proj = Proyecto::where('nombre', $proyecto)->firstOrFail();
            }

            // Si el proyecto tiene tareas relacionadas, eliminarlas primero para evitar problemas de FK
            if (method_exists($proj, 'tareas')) {
                $proj->tareas()->delete();
            }

            // Eliminar el proyecto
            $proj->delete();

            // Redirigir a la lista de proyectos con mensaje de éxito
            return redirect()->route('proyecto.index')->with('success', 'Proyecto eliminado correctamente.');
        } catch (\Exception $e) {
            // En caso de cualquier error (no encontrado o conversión) redirigimos con mensaje de error
            return redirect()->route('proyecto.index')->with('error', 'No se pudo eliminar el proyecto: ' . $e->getMessage());
        }
    }

    /**
     * CAMBIO: Obtener usuarios asignados a un proyecto (método API para llenar dropdown)
     */
    public function obtenerUsuarios(string $id)
    {
        try {
            $proyecto = Proyecto::findOrFail($id);
            // CAMBIO: Obtener usuarios a través de la relación many-to-many
            $usuarios = $proyecto->usuarios()->get();
            return response()->json(['usuarios' => $usuarios], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }
    }

}
