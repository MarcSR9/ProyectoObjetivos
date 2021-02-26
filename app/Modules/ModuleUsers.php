<?php

namespace App\Modules;

use DB;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Modules\ModuleUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ModuleUsers
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarUsuarios()
    {
        echo "Module User: crearUsuario";
        $usuarios = DB::table('users')->get();
        return $usuarios;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearUsuario($data)
    {
        echo "Module User: crearUsuario";
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'role' => $data['role'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrarUsuario($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editarUsuario($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function elimnarUsuario($id)
    {
        //
    }


    /**
     * Un usuario que conoce su password puede actualizarlo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizarPassword($id)
    {
        //
    }

    /**
     * Un usuario usa el token para cambiar su contraseña que desconoce.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function recuperarPasswordConToken($id)
    {
        //
    }

    /**
     * Un usuario usa el token para cambiar su contraseña que desconoce.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function generarPasswordConToken($id)
    {
        //
    }
}
