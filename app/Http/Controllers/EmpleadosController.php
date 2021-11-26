<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmpleadosController extends Controller
{
    public function listar() {
        $empleados = \DB::select('SELECT * FROM empleado');
        //return $empleados;

        $data = [
                'code' => 200,
                'status' => 'success',
                'empleados' => $empleados,
        ];

        //Devolver la respuesta
        return response()->json($data, $data['code']);
    }
    public function create(Request $request) {
        $json = $request->input('json', null);
        $params_array = json_decode($json, true);
        echo $params_array['orden'];
        
        $datosEmp = \DB::select('SELECT * FROM `empleado` ORDER BY Nombre_emp '. $params_array['orden']);
        
        return $datosEmp;
    }
}
