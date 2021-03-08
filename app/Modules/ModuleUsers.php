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
    public function listarUsuarios()
    {
        $usuarios = DB::table('users')->where('deleted_at', null)->get();
        return $usuarios;
    }

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

    public function mostrarUsuario($id)
    {
        $usuario = User::find($id);
        return $usuario;
    }

    public function editarUsuario($id, $name, $surname, $role, $email)
    {
        $usuario = User::find($id);
        $usuario->update([
            'id' => $id,
            'name' => $name,
            'surname' => $surname,
            'role' => $role,
            'email' => $email,
        ]);
        return;
    }

    public function eliminarUsuario($id)
    {
        User::find($id)->delete();
        return;
    }

    public function actualizarPassword($id)
    {
        $usuario = User::find($id);
        $usuario->update([
            'password' => $password,
        ]);
        return;
    }

    public function getUserPW($id)
    {
        # code...
    }

    public function recuperarPasswordConToken($id)
    {
        //
    }

    public function generarTokenPassword($id)
    {
        $usuario = User::find($id);
        User::create(['reset_token' => Str::random(10)]);
        return ;
    }
}
