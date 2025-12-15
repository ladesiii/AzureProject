<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoTarea extends Model
{
    protected $table = 'tipo_tarea';
    protected $primaryKey = 'id_tipo';
    //public $incrementing = true;
    public $timestamps = false;


    public function tareas(): HasMany
    {
        return $this->hasMany(Tarea::class, 'id_tipo');
    }
}
