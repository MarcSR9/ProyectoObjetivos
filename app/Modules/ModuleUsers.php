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
use Illuminate\Support\Str;

class ModuleUsers
{
    public function listarUsuarios()
    {
        $usuarios = DB::table('users')->where('deleted_at', null)->get();
        return $usuarios;
    }

    public function crearUsuario($name, $surname, $role, $obj_general, $obj_secundario, $obj_hito, $email, $password)
    {
        return User::create([
            'name' => $name,
            'surname' => $surname,
            'role' => $role,
            'crea_objetivo_general' => $obj_general,
            'crea_objetivo_secundario' => $obj_secundario,
            'crea_objetivo_hito' => $obj_hito,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
    }

    public function getUserByEmail($email){
        return User::where('email', $email)->first();
    }

    public function mostrarUsuario(User $usuario)
    {
        return $usuario;
    }

    public function editarUsuario(User $usuario, $newdata)
    {
        $usuario->name = $newdata["name"];
        $usuario->surname = $newdata["surname"];
        $usuario->role = $newdata["role"];
        $usuario->email = $newdata["email"];
        $usuario->crea_objetivo_general = $newdata["obj_general"];
        $usuario->crea_objetivo_secundario = $newdata["obj_secundario"];
        $usuario->crea_objetivo_hito = $newdata["obj_hito"];
        $usuario->save();
        return $usuario;
    }

    public function eliminarUsuario(User $usuario)
    {
        $usuario->delete();
        return;
    }

    public function actualizarPassword(User $usuario, $data)
    {
        $usuario->password = Hash::make($data["newPassword"]);
        $usuario->save();
        return $usuario;
    }

    public function recuperarPasswordConToken($data)
    {
        User::where('email', $data['email'])->where('reset_token', $data['token'])->update([
            'password' => Hash::make($data['password']),
            'reset_token' => null
        ]);
        return;
    }

    public function generarTokenPassword($data)
    {
        User::where('email', $data['email'])->update([
            'reset_token' => Str::random(128)
        ]);
        return;
    }

    public function listarPermisos()
    {
        $permisos = DB::table('permisos')->where('deleted_at', null)->get();
        return $permisos;
    }
}
