<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tareas()
    {
        $tarea = session('tareas', []);
        return view("tareas", compact('tarea'));

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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $tarea)
    {
        /**
        $tarea = session('tareas', []);
        $t = $this->findTareaByCodi($tarea, $tarea);
        if ($t != -1) {
            // Remove the task from the array
            $index = array_search($t, $tarea);
            if ($index !== false) {
                unset($tarea[$index]);
                // Reindex the array
                $tarea = array_values($tarea);
                // Update the session
                session(['tareas' => $tarea]);
            }
        }

        return redirect()->route('tareas');
        **/
    }

    /**
    public function findTareaByCodi($tarea, $codi)
    {
        $i = 0;
        $found = false; 
        $t = -1;

        while ($i < count($tarea) && !$found) {
            if ($tarea[$i]->getCodi() === $codi) {
                $found = true;
                $t = $tarea[$i];
            }
            $i++;
        }

        foreach ($tarea as $t) {
            if ($t->getCodi() === $codi) {
                return $t;
            }
        }
        return $t;
    }

    **/
}