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
}
