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

Route::get('/login', function () {
    return view('auth/login');
});

Auth::routes();

Route::view('/', 'home');

Route::get('/usuarios', 'AdminController@index')->name('usuarios.lista');
Route::get('/usuarios/nuevoUsuario', 'AdminController@nuevoUsuario')->name('usuarios.nuevoUsuario');
Route::post('/usuarios/crearUsuario', 'AdminController@create')->name('usuarios.crear');

Route::get('/usuarios/{id}', 'AdminController@show')->name('usuarios.mostrarUsuario');

Route::get('/usuarios/{id}/editar', 'AdminController@edit')->name('usuarios.editar');
Route::post('/usuarios/{id}/actualizar', 'AdminController@update')->name('usuarios.actualizar');

Route::delete('/usuarios/{id}/eliminarUsuario', 'AdminController@destroy')->name('usuarios.eliminarUsuario');

//Route::view('/objetivos', 'objetivos');


