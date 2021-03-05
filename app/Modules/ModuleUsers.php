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
use Illuminate\Database\Eloquent\SoftDeletes;

class ModuleUsers
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarUsuarios()
    {
        //echo "Module User: crearUsuario";
        $usuarios = DB::table('users')->where('deleted_at', null)->get();
        return $usuarios;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearUsuario($name, $surname, $role, $email, $password)
    {
        return User::create([
            'name' => $name,
            'surname' => $surname,
            'role' => $role,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
    }

    public function getUserByEmail($email){
        return User::where('email', $email)->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrarUsuario($id)
    {
        $usuario = User::find($id);
        return $usuario;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editarUsuario($id)
    {
        $usuario = User::find($id);
        $usuario->update([
            'name' => $name,
            'surname' => $surname,
            'role' => $role,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
        return;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminarUsuario($id)
    {
        User::find($id)->delete();
        return;
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
