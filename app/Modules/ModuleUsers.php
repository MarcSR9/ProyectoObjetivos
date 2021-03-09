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
        $usuario->save();
        return $usuario;
    }

    public function eliminarUsuario(User $usuario)
    {
        $usuario->delete();
        return;
    }

    public function actualizarPassword(User $usuario)
    {
        $usuario = User::find($id);

        $usuario->update([
            'password' => $password,
        ]);
        return;
    }

    public function recuperarPasswordConToken(User $usuario)
    {
        //
    }

    public function generarTokenPassword(User $usuario)
    {
        $usuario = User::find($id);
        User::create(['reset_token' => Str::random(128)]);
        return ;
    }
}
