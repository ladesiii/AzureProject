<?php

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
     */
    public function index()
    {
        $tareas = Tarea::with(['estado', 'tipoTarea', 'usuario', 'proyectos'])->get();
        $tiposTarea = TipoTarea::orderBy('id_tipo')->get();
        $usuarios = Usuario::orderBy('id_usuario')->get();
        $proyectos = Proyecto::orderBy('nombre')->get();
        $estados = Estado::orderBy('id_estado')->get();

        return view('tareas', compact('tareas', 'tiposTarea', 'usuarios', 'proyectos', 'estados'));
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
            // Crear la tarea
            $tarea = new Tarea();
            $tarea->nombre = $request->input('nombre');
            $tarea->descripcion = $request->input('descripcion');
            $tarea->id_tipo = $request->input('id_tipo');
            $tarea->fecha_inicio = $request->input('fecha_inicio');
            $tarea->fecha_final = $request->input('fecha_final');
            $tarea->id_usuario = $request->input('id_usuario');
            $tarea->id_estado = $request->input('id_estado');
            $tarea->id_proyecto = $request->filled('id_proyecto') ? $request->input('id_proyecto') : 1;
            $tarea->save();
        } catch (QueryException $e) {
            report($e);

            return back()->withInput()
                ->withErrors(['general' => 'No se pudo guardar la tarea. Verifica la estructura de la tabla tarea y vuelve a intentarlo.']);
        }

        return redirect()->route('tareas.index');
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
