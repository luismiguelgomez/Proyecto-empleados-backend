<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';

    public function dependencia(){
        return $this->belongsTo('App/Models/Dependencia');
    }

    public function novedad(){
        return $this->belongsTo('App/Models/Novedad');
    }
}
