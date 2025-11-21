<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'tarea';
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
    
    /**
     * Get the estado that owns the Tarea
     *
     * @return BelongsTo
     */
    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'id_estado');
    }

    /**
     * Get the tipoTarea that owns the Tarea
     *
     * @return BelongsTo
     */
    public function tipoTarea(): BelongsTo
    {
        return $this->belongsTo(TipoTarea::class, 'id_tipo_tarea');
    }

    /**
     * Get the usuario that owns the Tarea
     *
     * @return BelongsTo
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
