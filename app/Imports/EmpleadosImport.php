<?php

namespace App\Imports;

use App\Models\Empleado;
use Maatwebsite\Excel\Concerns\ToModel;

class EmpleadosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //Agregar empleados : Es necesario tener la dep creada
        return new Empleado([
            'Codigo' => $row[0],
            'Nombre_emp' => $row[1],
            'Cargo' => $row[3],
            'Fecha_ingreso' => $row[4],
            'EPS' => $row[5],
            'ARL' => $row[6],
            'Fondo_pension' => $row[7],
            'Sueldo' => $row[8]
        ]);
    }
}
