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
     
        
        

        for ($i=0; $i < $conteoEPS; $i++) { 
            $nombre;
            foreach ($arrayNombres as $for){
                foreach ($for as $clave => $valor){
                    $nombre = $valor;
                }    
            }
            $consulta = \DB::select('SELECT * FROM `empleado` ORDER BY Nombre_emp ' . $nombre;
        }

        echo $consulta;
        
        
        
    }
}
