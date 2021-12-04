<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\DependeciaImport;

class cargarDatosController extends Controller
{
    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new DependeciaImport, $file);
        //dd($imporToDependencia);
        //Excel::import(new EmpleadosImport, $file);
        //return bac
    }
}
