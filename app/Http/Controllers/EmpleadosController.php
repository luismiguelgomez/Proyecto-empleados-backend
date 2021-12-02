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
    public function listEmployes(Request $request) {
        $json = $request->input('json', null);
        $params_array = json_decode($json, true);
        echo $params_array['orden'];
        
        $datosEmp = \DB::select('SELECT * FROM `empleado` ORDER BY Nombre_emp '. $params_array['orden']);
        
        return $datosEmp;
    }
    public function listbydependence(Request $request) {
        $json = $request->input('json', null);
        $params_array = json_decode($json, true);
        echo $params_array['orden'];
        
        $datosEmp = \DB::select('SELECT * FROM `empleado`,`dependencia` ORDER BY nombre_dep asc, Nombre_emp '. $params_array['orden']);
        
        return $datosEmp;
    }

    public function listbycharge(Request $request) {
        $json = $request->input('json', null);
        $params_array = json_decode($json, true);
        echo $params_array['orden'];
        
        $datosEmp = \DB::select('SELECT * FROM `empleado`,`dependencia` ORDER BY Cargo asc,  nombre_dep asc, Nombre_emp '. $params_array['orden']);
        
        return $datosEmp;
    }

    public function countdependence(Request $request) {

        $datosEmp = \DB::select('SELECT `nombre_dep`,`id_dep` from `dependencia`,`empleado` where `id_dep`');
        return $datosEmp;
        
    }
}