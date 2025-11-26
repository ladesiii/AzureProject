<?php
namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

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
        //

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // // Crear y guardar el proyecto en la base de datos
        // try {
        //     $proyecto = new Proyecto();
        //     // Asumimos que la columna se llama 'nombre' en la tabla 'proyecto'
        //     $proyecto->nombre = $validated['nombre'];

        //     // Si en el formulario se envía un usuario (id), lo almacenamos si existe la columna
        //     if ($request->filled('usuario')) {
        //         // intentar asignar una columna id_usuario si existe
        //         // Evitamos lanzar error si la propiedad no existe: usamos setAttribute
        //         $proyecto->setAttribute('id_usuario', $request->input('usuario'));
        //     }

        //     $proyecto->save();

        //     if ($request->ajax()) {
        //         return response()->json([
        //             'message' => 'Proyecto creado exitosamente.',
        //             'id' => $proyecto->{$proyecto->getKeyName()},
        //             'nombre'  => $proyecto->nombre,
        //         ]);
        //     }

        //     return redirect()->route('proyecto.index')->with('success', 'Proyecto creado correctamente.');
        // } catch (\Exception $e) {
        //     if ($request->ajax()) {
        //         return response()->json(['error' => 'No se pudo crear el proyecto: ' . $e->getMessage()], 500);
        //     }
        //     return redirect()->route('proyecto.index')->with('error', 'No se pudo crear el proyecto. ' . $e->getMessage());
        }
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

}
