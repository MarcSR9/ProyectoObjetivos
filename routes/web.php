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

Route::get('/usuarios', 'AdminController@index');
Route::get('/usuarios/crearUsuario', 'AdminController@create');

Route::get('/usuarios/{id}', 'AdminController@show');

Route::get('/usuarios/{id}/editar', 'AdminController@editar');
Route::patch('/usuarios/{id}', 'AdminController@update');






