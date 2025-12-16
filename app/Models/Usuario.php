<?php

namespace App\Models;

use App\Models\Rol;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
    * Table and primary key configuration for non-standard column names
    */
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;
     /**
     * Relationship: usuario belongs to un rol
     */
    public function rol(): BelongsTo
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

}
