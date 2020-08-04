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

// Route::get('/', function () {
//     return redirect('/est');
// });
Route::view('/','nino.start')->name('nino');
Route::view('/ejemTar','nino.respEjem')->name('nino.ejemTar');

Route::get('/est/mat','NinoController@listaMateriasA')->name('nino.materia');
Route::get('/est/mat/tareas','NinoController@listaTareas')->name('nino.tarea');
Route::get('/est/mat/tareas/resp','NinoController@respTarea')->name('nino.respuesta');
Route::get('/est/rec','NinoController@listaMateriasR')->name('nino.recurso');
Route::get('/est/rec/mat','NinoController@listaRecursos')->name('nino.recurso.materia');


Route::get('/add','FirebaseController@index');
Route::get('/get','FirebaseController@getPost');