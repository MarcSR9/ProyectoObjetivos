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

Route::group(['middleware' => 'auth'], function(){
	Route::get('/', 'ObjetivosController@listarObjetivosPorIdUsuario')->name('home');

	//Usuarios
	Route::get('/usuarios', 'UsersController@index')->name('usuarios.lista');
	Route::get('/usuarios/nuevoUsuario', 'UsersController@nuevoUsuario')->name('usuarios.nuevoUsuario');
	Route::post('/usuarios/crearUsuario', 'UsersController@create')->name('usuarios.crear');

	Route::get('/usuarios/{usuario}', 'UsersController@show')->name('usuarios.mostrarUsuario');

	Route::get('/usuarios/{usuario}/editar', 'UsersController@edit')->name('usuarios.editar');
	Route::post('/usuarios/{usuario}/actualizar', 'UsersController@update')->name('usuarios.actualizar');

	Route::delete('/usuarios/{usuario}/eliminarUsuario', 'UsersController@destroy')->name('usuarios.eliminarUsuario');

	Route::get('/usuarios/{usuario}/editarContraseña', 'UsersController@editarContraseña')->name('usuarios.editarContraseña');
	Route::post('/usuarios/{usuario}/actualizarContraseña', 'UsersController@actualizarContraseña')->name('usuarios.actualizarContraseña');

	Route::get('/login/recuperarContraseña', 'UsersController@recuperarContraseña')->name('recuperarContraseña');
	Route::post('/login/recuperarContraseña', 'UsersController@generarTokenPW')->name('generarTokenPW');

	Route::get('/login/recuperarCuenta', 'UsersController@recuperarCuenta')->name('recuperarCuenta');
	Route::post('/login/recuperarCuenta', 'UsersController@recuperarContraseñaConToken')->name('resetearCuenta');

	//Objetivos
	Route::get('/objetivos/nuevoObjetivo', 'ObjetivosController@nuevoObjetivo')->name('nuevoObjetivo');
	Route::post('/objetivos/crearObjetivo', 'ObjetivosController@create')->name('crearObjetivo');



	//Administración de la aplicación


});

//Route::view('/objetivos', 'objetivos');


