<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Dependencia;

class EmpleadoController extends Controller
{
    public function frecuenciaEps(){
        $arrayNombres =  array();
        $nombresEPS = \DB::table('empleado')
            ->distinct()
            ->get('eps');
       
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

    public function frecuenciaPension(){
        $arrayNombres =  array();
        $nombresSalud = \DB::table('empleado')
            ->distinct()
            ->get('arl');
        
        foreach($nombresSalud as $nombreSalud => $valor){
            array_push($arrayNombres, $valor);
        }
            
        $arrayConsultaCount = array();
        foreach ($arrayNombres as $for){
            foreach ($for as $clave => $valor){
                $consulta = \DB::select("SELECT COUNT(ARL) FROM `empleado` WHERE ARL= '" .$valor. "';");
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

    public function frecuenciaDependenciaEPS() {
        //Traer todas las Dependencias
        $traerDatosDependencia = \DB::table('dependencia')->select('id_dep')->get();
        //Conocer el numero de dependencias
        $numeroDependencias = count($traerDatosDependencia);

        $arrayConsultaCount = array();
          foreach ($traerDatosDependencia as $for){
            foreach ($for as $clave => $valor){
                $consulta = \DB::select("SELECT COUNT(EPS) FROM `empleado` WHERE id_dep = '" .$valor. "';");
                array_push($arrayConsultaCount, $consulta);
            }
        }

        $nombreDependencia = \DB::table('dependencia')->select('nombre_dep')->get(); 


       $response = [
                'code' => 200,
                'status' => 'success',
                'frecuencia_EPS' => $arrayConsultaCount,
                'nombres_depencias' => $nombreDependencia,
        ];

        return response()->json($response, $response['code']);
    }

    public function frecuenciaDependenciaARL() {
        //Traer todas las Dependencias
        $traerDatosDependencia = \DB::table('dependencia')->select('id_dep')->get();
        //Conocer el numero de dependencias
        $numeroDependencias = count($traerDatosDependencia);

        $arrayConsultaCount = array();
          foreach ($traerDatosDependencia as $for){
            foreach ($for as $clave => $valor){
                $consulta = \DB::select("SELECT COUNT(ARL) FROM `empleado` WHERE id_dep = '" .$valor. "';");
                array_push($arrayConsultaCount, $consulta);
            }
        }

        $nombreDependencia = \DB::table('dependencia')->select('nombre_dep')->get(); 


       $response = [
                'code' => 200,
                'status' => 'success',
                'frecuencia_EPS' => $arrayConsultaCount,
                'nombres_depencias' => $nombreDependencia,
        ];

        return response()->json($response, $response['code']);
    }

    /*
    Por favor pasarme en $tipo desc o asc
    */
    public function ordenarXcargo($tipo)
    {
        $ordenarXcargos = Empleado::select('Cargo','EPS', 'Codigo', 'Nombre_emp', 'Fecha_ingreso', 'ARL', 'Fondo_pension', 'Sueldo')
                ->orderBy('Cargo', $tipo)
                ->get();
       
        $response = [
                'code' => 200,
                'status' => 'success',
                'empleados' => $ordenarXcargos,
        ];

        return response()->json($response, $response['code']);
    }

    public function ordenarXeps($tipo)
    {
        $ordenarXeps = Empleado::select('EPS','Cargo', 'Codigo', 'Nombre_emp', 'Fecha_ingreso', 'ARL', 'Fondo_pension', 'Sueldo')
                ->orderBy('EPS', $tipo)
                ->get();
       
        $response = [
                'code' => 200,
                'status' => 'success',
                'empleados' => $ordenarXeps,
        ];

        return response()->json($response, $response['code']);
    }

    public function ordenarXfondoPension($tipo)
    {
        $ordenarXeps = Empleado::select( 'Fondo_pension', 'EPS','Cargo', 'Codigo', 'Nombre_emp', 'Fecha_ingreso', 'ARL', 'Sueldo')
                ->orderBy('Fondo_pension', $tipo)
                ->get();
       
        $response = [
                'code' => 200,
                'status' => 'success',
                'empleados' => $ordenarXeps,
        ];

        return response()->json($response, $response['code']);
    }

}
