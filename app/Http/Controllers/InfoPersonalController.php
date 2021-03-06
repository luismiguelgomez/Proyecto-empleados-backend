<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class InfoPersonalController extends Controller
{
    public function reportTodos(){
         $empleados = \DB::select("SELECT CONCAT(empleado.Nombre_emp, ' ' , empleado.Codigo) nombre_codigo, dependencia.nombre_dep, empleado.Cargo, empleado.Fecha_ingreso, empleado.EPS, empleado.ARL, empleado.Sueldo FROM `empleado` INNER JOIN dependencia ON empleado.id_dep=dependencia.id_dep ORDER BY empleado.Nombre_emp");

        $response = [
                'code' => 200,
                'status' => 'success',
                'empleados' => $empleados,
        ];

        return response()->json($response, $response['code']);
    }

    public function reportIndividual($nombre){
         $empleados = \DB::select("SELECT CONCAT(empleado.Nombre_emp, ' ' , empleado.Codigo) nombre_codigo, dependencia.nombre_dep, empleado.Cargo, empleado.Fecha_ingreso, empleado.EPS, empleado.ARL, empleado.Sueldo FROM `empleado` INNER JOIN dependencia ON empleado.id_dep=dependencia.id_dep WHERE empleado.Nombre_emp = '".$nombre."' ORDER BY empleado.Nombre_emp");

        $response = [
                'code' => 200,
                'status' => 'success',
                'empleados' => $empleados,
        ];

        return response()->json($response, $response['code']);
    }
}
