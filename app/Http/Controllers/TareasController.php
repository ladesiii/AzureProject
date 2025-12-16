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
        $request->merge([
            'id_proyecto' => $request->filled('id_proyecto') ? $request->input('id_proyecto') : 1,
        ]);

        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'descripcion' => ['required', 'string'],
            'id_tipo' => ['required', 'exists:tipo_tarea,id_tipo'],
            'fecha_inicio' => ['required', 'date'],
            'fecha_final' => ['required', 'date', 'after_or_equal:fecha_inicio'],
            'id_usuario' => ['required', 'exists:usuario,id_usuario'],
            'id_proyecto' => ['required', 'exists:proyecto,id_proyecto'],
            'id_estado' => ['required', 'exists:estado,id_estado'],
        ]);

        $data['id_proyecto'] = 1; // Default project assignment

        try {
            $tarea = Tarea::create($data);
        } catch (QueryException $e) {
            report($e);

            return back()->withInput()
                ->withErrors(['general' => 'No se pudo guardar la tarea. Verifica la estructura de la tabla tarea y vuelve a intentarlo.']);
        }

        return redirect()->route('tareas.index')
            ->with('success', "Tarea '{$tarea->nombre}' creada correctamente.");
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

        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'descripcion' => ['required', 'string'],
            'id_tipo' => ['required', 'exists:tipo_tarea,id_tipo'],
            'fecha_inicio' => ['required', 'date'],
            'fecha_final' => ['required', 'date', 'after_or_equal:fecha_inicio'],
            'id_usuario' => ['required', 'exists:usuario,id_usuario'],
            'id_estado' => ['required', 'exists:estado,id_estado'],
        ]);

        // Preserve the project currently asociado; fallback to 1 if missing
        $data['id_proyecto'] = $tarea->id_proyecto ?? 1;

        try {
            $tarea->update($data);
        } catch (QueryException $e) {
            report($e);

            return back()->withInput()
                ->withErrors(['general' => 'No se pudo actualizar la tarea. Verifica los datos y vuelve a intentarlo.']);
        }

        return redirect()->route('tareas.index')
            ->with('success', "Tarea '{$tarea->nombre}' actualizada correctamente.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $tarea)
    {
        try {
            $registro = Tarea::findOrFail($tarea);
            $nombre = $registro->nombre;
            $registro->delete();
        } catch (QueryException $e) {
            report($e);

            return back()->withErrors(['general' => 'No se pudo eliminar la tarea. Inténtalo de nuevo más tarde.']);
        } catch (\Exception $e) {
            report($e);

            return back()->withErrors(['general' => 'La tarea indicada no existe o ya fue eliminada.']);
        }

        return redirect()->route('tareas.index')
            ->with('success', "Tarea '{$nombre}' eliminada correctamente.");
    }


}
