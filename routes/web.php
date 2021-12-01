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

Route::get('/frecuencia-dependencia','App\Http\Controllers\EmpleadoController@frecuenciaDependencia');

