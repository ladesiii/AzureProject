<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Rol;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
    public $incrementing = true;
    public $timestamps = false;

    /**
     * Relationship: usuario belongs to un rol
     */
    public function rol(): BelongsTo
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }
}
