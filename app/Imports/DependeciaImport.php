<?php

namespace App\Imports;

use App\Models\Dependencia;
use Maatwebsite\Excel\Concerns\ToModel;

class DependeciaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd ($existeDep);
        if ($row[2] == "" or $row[2] == null ) {

        } else {
            if ($row[2] != "DEPENDENCIA" or $row[2] != "X") {
               //$existeDep = Dependencia::where('nombre_dep', '=', $row[2]);
                $existeDep = \DB::select("SELECT id_dep FROM dependencia WHERE nombre_dep = '" .$row[2]."'");

                $contadorDependencias = count($existeDep);
                if ($contadorDependencias==0) {
                    $insertDependencias = \DB::insert("insert into dependencia (nombre_dep) values ('" .$row[2]. "')");
                }
                $varNumeroDep; 
                foreach ($existeDep as $for){
                    foreach($for as $llave => $valor){
                        $varNumeroDep = $valor;
                        //echo $varNumeroDep;
                        
                       $insertEmpleados = \DB::insert("INSERT INTO `empleado` (`Codigo`, `Nombre_emp`, `Cargo`, `Fecha_ingreso`, `EPS`, `ARL`, `Fondo_pension`, `Sueldo`, `id_dep`, `fecha_actualizacion`) VALUES ('".$row[0]."','".$row[1]."','".$row[3]."','".$row[4]."','".$row[5]."','".$row[6]."','".$row[7]."','".$row[8]."','".$varNumeroDep."','".$row[4]."')");

                    }
                }
            }    
        }

        $dependencias = \DB::select("SELECT id_dep, nombre_dep FROM dependencia");

        $empleados = \DB::select("SELECT * FROM empleado");

        $response = [
                'code' => 200,
                'status' => 'success',
                'dependencias' => $dependencias,
                'empleados' => $empleados,
        ];
       

        return response()->json($response, $response['code']);  
    }
}
