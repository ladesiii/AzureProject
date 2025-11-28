
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estado extends Model
{
    protected $table = 'estado';
    protected $primaryKey = 'id_estado';
    //public $incrementing = true;
    public $timestamps = false;

    public function tareas(): HasMany
    {
        return $this->hasMany(Tarea::class, 'id_estado');
    }
}
main
