<?php

use Illuminate\Support\Facades\Route;


Route::get('/login', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/login/recuperarContraseña', 'UsersController@recuperarContraseña')->name('recuperarContraseña');
Route::post('/login/recuperarContraseña', 'UsersController@generarTokenPW')->name('generarTokenPW');

Route::get('/login/recuperarCuenta', 'UsersController@recuperarCuenta')->name('recuperarCuenta');
Route::post('/login/recuperarCuenta', 'UsersController@recuperarContraseñaConToken')->name('resetearCuenta');

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


	//Objetivos
	Route::get('/objetivos/nuevoObjetivo', 'ObjetivosController@nuevoObjetivo')->name('nuevoObjetivo');
	Route::post('/objetivos/crearObjetivo', 'ObjetivosController@create')->name('crearObjetivo');
	Route::get('/objetivos/{objetivo}', 'ObjetivosController@mostrarObjetivo')->name('mostrarObjetivo');
	Route::post('/objetivos/{objetivo}/actualizar', 'ObjetivosController@actualizarObjetivo')->name('actualizarObjetivo');
	Route::post('/objetivos/{objetivo}/completar', 'ObjetivosController@completarObjetivo')->name('completarObjetivo');
    Route::post('/objetivos/{objetivo}/nocompletar', 'ObjetivosController@noCompletarObjetivo')->name('noCompletarObjetivo');
	Route::delete('/objetivos/{objetivo}/eliminar', 'ObjetivosController@eliminarObjetivo')->name('eliminarObjetivo');

	//Administración de la aplicación
	Route::get('/administracion', 'AppAdminController@estadoApp')->name('administracion');
	Route::get('/panelDGeneral', 'AppAdminController@vistaDG')->name('panelDGeneral');
	Route::post('/filtrarObjetivos', 'AppAdminController@filtrarObjetivos')->name('filtrarObjetivos');
	Route::get('/administracion/errores', 'AppAdminController@listarErrores')->name('listaErrores');
	Route::get('/administracion/acciones', 'AppAdminController@listarAcciones')->name('listaAcciones');

	// Activación/Desactivación de trimestres
	Route::post('/administracion/at1', 'AppAdminController@activarTrimestre1')->name('activarTrimestre1');
	Route::post('/administracion/dt1', 'AppAdminController@desactivarTrimestre1')->name('desactivarTrimestre1');
	Route::post('/administracion/at2', 'AppAdminController@activarTrimestre2')->name('activarTrimestre2');
	Route::post('/administracion/dt2', 'AppAdminController@desactivarTrimestre2')->name('desactivarTrimestre2');
	Route::post('/administracion/at3', 'AppAdminController@activarTrimestre3')->name('activarTrimestre3');
	Route::post('/administracion/dt3', 'AppAdminController@desactivarTrimestre3')->name('desactivarTrimestre3');
	Route::post('/administracion/at4', 'AppAdminController@activarTrimestre4')->name('activarTrimestre4');
	Route::post('/administracion/dt4', 'AppAdminController@desactivarTrimestre4')->name('desactivarTrimestre4');
	Route::post('/administracion/ac', 'AppAdminController@activarConclusiones')->name('activarConclusiones');
	Route::post('/administracion/dc', 'AppAdminController@desactivarConclusiones')->name('desactivarConclusiones');

});

