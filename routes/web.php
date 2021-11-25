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

Route::get('/select', function(){
    $primerSelect = DB::select('SELECT * FROM `users`');
    return $primerSelect;
    dd($primerSelect);
});

/*
Route::middleware(['auth:sanctum', 'verified'])->get('/cantidad-lista-empleados', 'App\Http\Controllers\EmpleadosController@listar');
*/


Route::get('/cantidad-lista-empleados', 'App\Http\Controllers\EmpleadosController@listar');

Route::get('/test-pdf', function(){
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML('
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
  <title>Mi primera página con estilo</title>
  <style type="text/css">
  body {
    color: purple;
    background-color: #d8da3d }
  </style>
</head>

<body>
        <!-- Menú de navegación del sitio -->
<ul class="navbar">
  <li><a href="indice.html">Página principal</a>
  <li><a href="meditaciones.html">Meditaciones</a>
  <li><a href="ciudad.html">Mi ciudad</a>
  <li><a href="enlaces.html">Enlaces</a>
</ul>

<!-- Contenido principal -->
<h1>Mi primera página con estilo</h1>

<p>¡Bienvenido a mi primera página con estilo!

<p>No tiene imágenes, pero tiene estilo.
También tiene enlaces, aunque no te lleven a
ningún sitio…

<p>Debería haber más cosas aquí, pero todavía no sé
qué poner.

<!-- Firma y fecha de la página, ¡sólo por cortesía! -->
<address>Creada el 5 de abril de 2004<br>
  por mí mismo.</address>

</body>
</html>');
    return $pdf->stream();
    //return $pdf->download();

});