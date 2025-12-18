<?php

/**
 * Controlador de Tareas
 *
 * Gestiona el listado, creación, edición y eliminación de tareas.
 * El método index admite opcionalmente un id de proyecto para
 * filtrar las tareas y el conjunto de usuarios asociados a ese proyecto.
 */


namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Tarea;
use App\Models\Usuario;
use App\Models\Proyecto;
use App\Models\TipoTarea;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Muestra el tablero de tareas. Si se proporciona `$proyecto`,
     * filtra las tareas por ese proyecto y también limita el listado
     * de usuarios a los que pertenecen al proyecto.
     */
    public function index(Request $request, $proyecto = null)
    {
        $proyectoActual = null;

        if ($proyecto) {
            // Carga el proyecto actual y las tareas relacionadas con él
            $proyectoActual = Proyecto::findOrFail($proyecto);
            $tareas = Tarea::with(['estado', 'tipoTarea', 'usuario', 'proyectos'])
                ->whereHas('proyectos', function($query) use ($proyecto) {
                    $query->where('proyecto.id_proyecto', $proyecto);
                })
                ->get();

            // Usuarios vinculados al proyecto (para el selector de asignación)
            $usuarios = Usuario::whereHas('usuario_proyecto', function($query) use ($proyecto) {
                $query->where('id_proyecto', $proyecto);
            })->orderBy('id_usuario')->get();
        } else {
            // Vista general: todas las tareas y todos los usuarios
            $tareas = Tarea::with(['estado', 'tipoTarea', 'usuario', 'proyectos'])->get();
            $usuarios = Usuario::orderBy('id_usuario')->get();
        }

        // Datos auxiliares para renders (tipos de tarea, proyectos y estados)
        $tiposTarea = TipoTarea::orderBy('id_tipo')->get();
        $proyectos = Proyecto::orderBy('nombre')->get();
        $estados = Estado::orderBy('id_estado')->get();

        return view('tareas', compact('tareas', 'tiposTarea', 'usuarios', 'proyectos', 'estados', 'proyectoActual'));
    }

    /**
     * Show the form for creating a new resource.
     * (No se utiliza porque el formulario se renderiza en un modal dentro de la vista de tareas.)
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * Valida y crea una nueva tarea. La asignación de usuario es opcional
     * y el proyecto es obligatorio. Tras crear, redirige de vuelta a la
     * vista en contexto (proyecto concreto o listado general), usando el
     * referer para detectar si se estaba en `tareas/proyecto/{id}`.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'descripcion' => ['nullable', 'string'],
            'id_tipo' => ['required', 'exists:tipo_tarea,id_tipo'],
            'fecha_inicio' => ['required', 'date'],
            'fecha_final' => ['required', 'date', 'after_or_equal:fecha_inicio'],
            'id_usuario' => ['nullable', 'exists:usuario,id_usuario'],
            'id_estado' => ['required', 'exists:estado,id_estado'],
            'id_proyecto' => ['required', 'exists:proyecto,id_proyecto'],
        ]);

        try {
            // Crear la tarea
            $tarea = new Tarea();
            $tarea->nombre = $request->input('nombre');
            $tarea->descripcion = $request->input('descripcion');
            $tarea->id_tipo = $request->input('id_tipo');
            $tarea->fecha_inicio = $request->input('fecha_inicio');
            $tarea->fecha_final = $request->input('fecha_final');
            $tarea->id_usuario = $request->filled('id_usuario') ? $request->input('id_usuario') : null;
            $tarea->id_estado = $request->input('id_estado');
            $tarea->id_proyecto = $request->input('id_proyecto');
            $tarea->save();
        } catch (QueryException $e) {
            report($e);

            return back()->withInput()
                ->withErrors(['general' => 'No se pudo guardar la tarea. Verifica la estructura de la tabla tarea y vuelve a intentarlo.']);
        }

        // Redirigir según el contexto: si viene de un proyecto específico, volver a ese proyecto
        $proyectoId = $request->input('id_proyecto');
        $referer = $request->headers->get('referer');

        // Si la URL de referencia contiene 'tareas/proyecto/', redirigir a esa vista del proyecto
        if ($proyectoId && $referer && str_contains($referer, 'tareas/proyecto/')) {
            return redirect()->route('tareas.proyecto', ['proyecto' => $proyectoId]);
        }

        return redirect()->route('tareas.index');
    }

    /**
     * Display the specified resource.
     * (Pendiente de implementación si se necesita una vista detallada.)
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * (No se utiliza porque el formulario se renderiza en un modal dentro de la vista de tareas.)
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * Actualiza los campos principales de una tarea existente.
     * La validación requiere todos los campos.
     */
    public function update(Request $request, string $id)
    {
        $tarea = Tarea::findOrFail($id);

        $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'descripcion' => ['required', 'string'],
            'id_tipo' => ['required', 'exists:tipo_tarea,id_tipo'],
            'fecha_inicio' => ['required', 'date'],
            'fecha_final' => ['required', 'date', 'after_or_equal:fecha_inicio'],
            'id_usuario' => ['required', 'exists:usuario,id_usuario'],
            'id_estado' => ['required', 'exists:estado,id_estado'],
        ]);

        try {
            // Actualizar la tarea
            $tarea->nombre = $request->input('nombre');
            $tarea->descripcion = $request->input('descripcion');
            $tarea->id_tipo = $request->input('id_tipo');
            $tarea->fecha_inicio = $request->input('fecha_inicio');
            $tarea->fecha_final = $request->input('fecha_final');
            $tarea->id_usuario = $request->input('id_usuario');
            $tarea->id_estado = $request->input('id_estado');
            $tarea->save();
        } catch (QueryException $e) {
            report($e);

            return back()->withInput()
                ->withErrors(['general' => 'No se pudo actualizar la tarea. Verifica los datos y vuelve a intentarlo.']);
        }

        return redirect()->route('tareas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * Elimina una tarea por su id. Maneja errores de base de datos
     * devolviendo un mensaje al usuario si falla.
     */
    public function destroy(string $id)
    {
        try {
            $tarea = Tarea::findOrFail($id);
            $tarea->delete();
        } catch (QueryException $e) {
            report($e);
            return back()->withErrors(['general' => 'No se pudo eliminar la tarea. Inténtalo de nuevo más tarde.']);
        }

        return redirect()->route('tareas.index');
    }


}
