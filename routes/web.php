<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


#Mis Rutas
Route::get('/frecuencia-eps','App\Http\Controllers\EmpleadoController@frecuenciaEps');

Route::get('/frecuencia-pension','App\Http\Controllers\EmpleadoController@frecuenciaPension');

Route::get('/frecuencia-dependencia-EPS','App\Http\Controllers\EmpleadoController@frecuenciaDependenciaEPS');

Route::get('/frecuencia-dependencia-ARL','App\Http\Controllers\EmpleadoController@frecuenciaDependenciaARL');

#Los dos tipos variable pueden ser 'asc' o 'desc'
Route::get('/orden-por-cargo/{tipo}','App\Http\Controllers\EmpleadoController@ordenarXcargo');

#Los dos tipos variable pueden ser 'asc' o 'desc'
Route::get('/orden-por-eps/{tipo}','App\Http\Controllers\EmpleadoController@ordenarXeps');

#Los dos tipos variable pueden ser 'asc' o 'desc'
Route::get('/orden-por-pension/{tipo}','App\Http\Controllers\EmpleadoController@ordenarXfondoPension');