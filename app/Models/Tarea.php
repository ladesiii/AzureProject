<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'tarea'; //Liaada MAX v2
    protected $primaryKey = 'id_tarea';
    //public $incrementing = true;
    public $timestamps = false;

    /**
     * Get the user that owns the Tarea
     *
     * @return BelongsTo
     */
    public function proyectos(): BelongsTo
    {
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }
}
