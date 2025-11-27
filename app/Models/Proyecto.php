<?php

namespace App\Models;

use App\Models\Tarea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    // CAMBIO: Renombramos de proyecto() a tareas() para seguir convención de nombres
    public function tareas(): HasMany
    {
        return $this->hasMany(Tarea::class, 'id_proyecto');
    }

    /**
     * CAMBIO: Relación many-to-many con Usuario a través de Usuario_Proyecto
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(Usuario::class, 'usuario_proyecto', 'id_proyecto', 'id_usuario');
    }

}

