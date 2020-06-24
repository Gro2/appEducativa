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
    return redirect('/est');
});
Route::view('/est','nino.start')->name('nino');
Route::view('/est/mat','nino.materia')->name('nino.materia');
Route::view('/est/mat/tareas','nino.tarea')->name('nino.tarea');
Route::view('/est/mat/tareas/resp','nino.respuesta')->name('nino.respuesta');
Route::view('/est/rec','nino.recurso')->name('nino.recurso');
Route::view('/est/rec/mat','nino.recursoMat')->name('nino.recurso.materia');

