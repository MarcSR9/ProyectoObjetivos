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

Route::view('/home', 'home');

Route::get('/usuarios', 'AdminController@index')->name('usuarios.lista');
Route::get('/usuarios/nuevoUsuario', 'AdminController@nuevoUsuario')->name('usuarios.nuevoUsuario');
Route::post('/usuarios/crearUsuario', 'AdminController@create')->name('usuarios.crear');

Route::get('/usuarios/{usuario}', 'AdminController@show')->name('usuarios.mostrarUsuario');

Route::get('/usuarios/{usuario}/editar', 'AdminController@edit')->name('usuarios.editar');
Route::post('/usuarios/{usuario}/actualizar', 'AdminController@update')->name('usuarios.actualizar');

Route::delete('/usuarios/{usuario}/eliminarUsuario', 'AdminController@destroy')->name('usuarios.eliminarUsuario');

Route::get('/usuarios/{usuario}/editarContraseña', 'AdminController@editarContraseña')->name('usuarios.editarContraseña');
Route::post('/usuarios/{usuario}/actualizarContraseña', 'AdminController@actualizarContraseña')->name('usuarios.actualizarContraseña');

Route::get('/login/recuperarContraseña', 'AdminController@recuperarContraseña')->name('recuperarContraseña');
Route::post('/login/recuperarContraseña', 'AdminController@generarTokenPW')->name('generarTokenPW');

Route::get('/login/recuperarCuenta', 'AdminController@recuperarCuenta')->name('recuperarCuenta');
Route::post('/login/recuperarCuenta', 'AdminController@recuperarContraseñaConToken')->name('resetearCuenta');



//Route::view('/objetivos', 'objetivos');


