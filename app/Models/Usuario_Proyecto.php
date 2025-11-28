<?php
namespace App\Models;

use App\Models\Proyecto;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario_Proyecto extends Model
{
    //crear un array donde estan espicificas los ids de esa tabla
    // La relacion tiene que ser 1 por cada tabla

    protected $table      = 'usuario_proyecto_rol';
    protected $primaryKey = ['id_usuario', 'id_proyecto', 'id_rol'];
    public $incrementing  = false;

    public $timestamps = false;

    public function usuario(): HasMany
    {
        return $this->hasMany(Usuario::class, 'id_usuario');
    }

    public function rol(): HasMany
    {
        return $this->hasMany(Rol::class, 'id_rol');
    }

    public function proyecto(): HasMany
    {
        return $this->hasMany(Proyecto::class, 'id_proyecto');
    }

}
