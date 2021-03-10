<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\ModuleUsers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Rule;


class AdminController extends Controller
{
    protected function index()
    {
        $usermodule = new ModuleUsers();
        $users = $usermodule->listarUsuarios();
        return view('usuarios.listarUsuarios', [
            'usuarios' => $users
        ]);
    }

    protected function nuevoUsuario(){
        return view('usuarios.crearUsuario');
    }

    protected function create(Request $request)
    {
        $data = $request->post();
        $usermodule = new ModuleUsers();

        $exists = $usermodule->getUserByEmail($data['email']);
        if(is_null($exists)){
            $response = $usermodule->crearUsuario($data['name'], $data['surname'], $data['role'], $data['email'], $data['password']);
            return redirect()->route('usuarios.lista', $usuario)->with('status-success', 'El usuario ha sido creado correctamente');
        }else{
            return back()->with('status-error', 'El email del usuario ya existe en la base de datos.');
        }
    }

    public function show(User $usuario){

        $usermodule = new ModuleUsers();
        $user = $usermodule->mostrarUsuario($usuario);
        return view('usuarios.mostrarUsuario', [
            'usuario' => $user
        ]);
    }

    public function edit(User $usuario)
    {
        return view('usuarios.editarUsuario', [
            'usuario' => $usuario
        ]);
    }

    public function update(Request $request, User $usuario)
    {
        $usermodule = new ModuleUsers();
        $usermodule->editarUsuario($usuario, $request->post());
        return redirect()->route('usuarios.mostrarUsuario', $usuario)->with('status-success', 'El usuario ha sido actualizado correctamente');
    }

    public function destroy(User $usuario)
    {
        $usermodule = new ModuleUsers();
        $users = $usermodule->eliminarUsuario($usuario);
        return view('usuarios.listarUsuarios', $usuarios)->with('status-success', 'El usuario ha sido eliminado correctamente');
    }

    public function editarContraseña(User $usuario)
    {
        return view('usuarios.actualizarPassword', ['usuario' => $usuario]);
    }

    public function actualizarContraseña(User $usuario, Request $request)
    {
        $data = $request->post();
        $usermodule = new ModuleUsers();

        if (Hash::check($data["oldPassword"], auth()->user()->password)) {
            $usermodule->actualizarPassword($usuario, $data);
            return back()->with('status-success', 'La contraseña ha sido actualizada correctamente');
        }
        else{
            return back()->with('status-error', 'La contraseña introducida no es correcta');
        }
    }

    public function recuperarContraseña()
    {
        return view('recuperarContraseña');
    }

    public function generarTokenPW(Request $request)
    {
        $data = $request->post();
        $usermodule = new ModuleUsers();
        $exists = $usermodule->getUserByEmail($data['email']);
        if(is_null($exists)){
            return back()->with('status-error', 'La dirección de correo electrónico no existe en la base de datos.');
        }else{
            $users = $usermodule->generarTokenPassword($data);
            return back()->with('status-success', 'Ponte en contacto con el Administrador para obtener el Token y recuperar tu cuenta.');
        }
    }

    public function recuperarCuenta()
    {
        return view('recuperarCuenta');
    }

    public function recuperarContraseñaConToken(Request $request)
    {
        $data = $request->post();
        $usermodule = new ModuleUsers();
        $exists = $usermodule->getUserByEmail($data['email']);
        if(is_null($exists)){
            return back()->with('status-error', 'La dirección de correo electrónico no existe en la base de datos.');
        }else{
            $users = $usermodule->recuperarPasswordConToken($data);
            return redirect('login')->with('status-success', 'Tu contraseña ha sido actualizada correctamente');
        }
    }
}
