<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    //
    protected $table = 'proyecto';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}
