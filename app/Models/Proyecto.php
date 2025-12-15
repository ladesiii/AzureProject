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

    public $incrementing = true;

    /**
     * Get all of the comments for the Proyecto
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Tarea(): HasMany
    {
        return $this->hasMany(Tarea::class, 'id_proyecto');
    }

    public function Usuario_Proyecto()
    {
        return $this->hasMany(Usuario_Proyecto::class, 'id_proyecto');
    }

}
