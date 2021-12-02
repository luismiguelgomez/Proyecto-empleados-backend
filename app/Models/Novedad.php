<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    protected $table = 'Novedad';

    //Relacion uno a muchos
    public function empleado() {
        return $this->hasMany ('App\Models\Empleado');
    }
}
