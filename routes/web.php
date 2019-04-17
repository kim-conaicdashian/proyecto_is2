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

Route::get('/', 'vistasController@home')->name('home')->middleware('auth');

Route::get('login', 'Auth\LoginController@show')->name('login')->middleware('guest');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::resource('register', 'Auth\RegisterController')->middleware('guest');

//======================================RUTAS PARA EL CRUD DE CATEGORIAS========================================================
Route::resource('categorias','ControladorCategorias');
//======================================RUTAS PARA EL CRUD DE PLAN DE ACCION========================================================
Route::resource('plan','ControladorPlanDeAccion');
//==============================================================================================================================
Route::get('categoriaAsignada','ControladorPlanDeAccion@listaPlanes')->name('categoriaAsignada');