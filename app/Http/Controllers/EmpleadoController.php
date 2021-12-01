<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    public function listar(){
        $arrayNombres =  array();
        $nombresEPS = \DB::table('empleado')
            ->distinct()
            ->get('eps');
        $conteoEPS = count($nombresEPS);
        foreach($nombresEPS as $nombreEps => $valor){
            array_push($arrayNombres, $valor);
        }
            
        $arrayConsultaCount = array();
        foreach ($arrayNombres as $for){
            foreach ($for as $clave => $valor){
                $consulta = \DB::select("SELECT COUNT(EPS) FROM `empleado` WHERE EPS= '" .$valor. "';");
                array_push($arrayConsultaCount, $consulta);
            }    
        }
        
        $response = [
                'code' => 200,
                'status' => 'success',
                'nombresEPS' => $arrayNombres,
                'empleados' => $arrayConsultaCount,
        ];

        return response()->json($response, $response['code']);
    }
}
