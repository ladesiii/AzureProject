<?php

namespace App\Models;

use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tarea extends Model
{
    protected $table = 'tarea'; //Liaada MAX
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
