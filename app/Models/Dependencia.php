<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    protected $table = 'dependencia';

    //Relacion uno a muchos
    public function empleado() {
        return $this->hasMany ('App\Models\Empleado');
    }
}
