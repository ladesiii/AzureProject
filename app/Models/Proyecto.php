<?php

namespace App\Models;

use App\Models\Tarea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proyecto extends Model
{
    //
    protected $table = 'proyecto';
    protected $primaryKey = 'id_proyecto';
    //public $incrementing = true;
    public $timestamps = false;

    /**
     * Get all of the comments for the Proyecto
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tareas(): HasMany
    {
        return $this->hasMany(Tarea::class, 'id_proyecto');
    }
}
