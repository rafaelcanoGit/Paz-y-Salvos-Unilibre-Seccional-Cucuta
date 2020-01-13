<?php
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
    return view('auth/login');
});


Route::resource('sispazysalvos/facultad','FacultadController');
Route::resource('sispazysalvos/dependencia','DepenController');
Route::resource('sispazysalvos/docente','DocenteController');
Route::resource('sispazysalvos/subir','ImportController');
Route::resource('sispazysalvos/caja','AdminEstadoCajaController');

Route::resource('sispazysalvos/periodo','PeriodoController');
Route::resource('sispazysalvos/usuario','UsuarioController');
Route::resource('talentohumano/pazysalvos','PazySalvoController');
Route::resource('talentohumano/docentes','TalentoDocenteController');
Route::resource('talentohumano/estadocaja','TalentoCajaController');
Route::resource('talentohumano/facultades','TalentoFacultadController');
Route::resource('dependencia/pazysalvo','DependenciaPazySalvosController');
Route::resource('dependencia/docen','DependenciaDocenteController');

Route::resource('caja/docents','CajaController');
Route::resource('caja/estadocaja','CajaEstadoController');

Auth::routes();

Route::get('/logout', '\sisPazySalvos\Http\Controllers\Auth\LoginController@logout');
Route::get('/{slug?}', 'HomeController@index')->name('home');

