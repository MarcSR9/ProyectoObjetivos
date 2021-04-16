<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\ModuleUsers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Rule;
use App\Modules\ModuleAppAdministration;


class UsersController extends Controller
{
    protected function index()
    {
        $usermodule = new ModuleUsers();
        $users = $usermodule->listarUsuarios();
        return view('usuarios.listarUsuarios', [
            'usuarios' => $users
        ]);
    }

    protected function nuevoUsuario()
    {
        if(auth()->user()->role == 'Admin'){
            return view('usuarios.crearUsuario');
        }
        else{
            $moduloAdminApp = new ModuleAppAdministration();
            $action = $moduloAdminApp->registrarAccion('Intento de acceso a recurso no autorizado');
            return back()->with('status-error', 'No tienes acceso a este recurso');
        }
    }

    protected function create(Request $request)
    {
        if(auth()->user()->role == 'Admin'){
            $data = $request->post();
            $usermodule = new ModuleUsers();

            $exists = $usermodule->getUserByEmail($data['email']);
            if(is_null($exists)){
                $appmodule = new ModuleAppAdministration();
                $action = $appmodule->registrarAccion('Usuario creado');
                $response = $usermodule->crearUsuario($data['name'], $data['surname'], $data['role'], $data['email'], $data['password']);
                return redirect()->route('usuarios.lista', $usuarios)->with('status-success', 'El usuario ha sido creado correctamente');
            }else{
                $appmodule = new ModuleAppAdministration();
                $error = $appmodule->registrarError('Error al crear nuevo usuario. Email ya registrado');
                return back()->with('status-error', 'El email del usuario ya existe en la base de datos.');
            }
        }
        else{
            $moduloAdminApp = new ModuleAppAdministration();
            $action = $moduloAdminApp->registrarAccion('Intento de acceso a recurso no autorizado');
            return back()->with('status-error', 'No tienes acceso a este recurso');
        }
    }

    public function show(User $usuario)
    {
        if(auth()->user()->role == 'Admin'){
             $usermodule = new ModuleUsers();
            $user = $usermodule->mostrarUsuario($usuario);
            return view('usuarios.mostrarUsuario', [
                'usuario' => $user
            ]);
        }
        else{
            $moduloAdminApp = new ModuleAppAdministration();
            $action = $moduloAdminApp->registrarAccion('Intento de acceso a recurso no autorizado');
            return back()->with('status-error', 'No tienes acceso a este recurso');
        }
    }

    public function edit(User $usuario)
    {
        if(auth()->user()->role == 'Admin'){
            return view('usuarios.editarUsuario', [
                'usuario' => $usuario
            ]);
        }
        else{
            $moduloAdminApp = new ModuleAppAdministration();
            $action = $moduloAdminApp->registrarAccion('Intento de acceso a recurso no autorizado');
            return back()->with('status-error', 'No tienes acceso a este recurso');
        }
    }

    public function update(Request $request, User $usuario)
    {
        if(auth()->user()->role == 'Admin'){
            $usermodule = new ModuleUsers();
            $usermodule->editarUsuario($usuario, $request->post());
            $appmodule = new ModuleAppAdministration();
            $action = $appmodule->registrarAccion('Usuario actualizado');
            return redirect()->route('usuarios.mostrarUsuario', $usuario)->with('status-success', 'El usuario ha sido actualizado correctamente');
        }
        else{
            $moduloAdminApp = new ModuleAppAdministration();
            $action = $moduloAdminApp->registrarAccion('Intento de acceso a recurso no autorizado');
            return back()->with('status-error', 'No tienes acceso a este recurso');
        }
    }

    public function destroy(User $usuario)
    {
        if(auth()->user()->role == 'Admin'){
            $usermodule = new ModuleUsers();
            $users = $usermodule->eliminarUsuario($usuario);
            $appmodule = new ModuleAppAdministration();
            $action = $appmodule->registrarAccion('Usuario eliminado');
            return view('usuarios.listarUsuarios', $usuarios)->with('status-success', 'El usuario ha sido eliminado correctamente');
        }
        else{
            $moduloAdminApp = new ModuleAppAdministration();
            $action = $moduloAdminApp->registrarAccion('Intento de acceso a recurso no autorizado');
            return back()->with('status-error', 'No tienes acceso a este recurso');
        }
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
            $appmodule = new ModuleAppAdministration();
            $action = $appmodule->registrarAccion('Contraseña actualizada');
            $usermodule->actualizarPassword($usuario, $data);
            return back()->with('status-success', 'La contraseña ha sido actualizada correctamente');
        }
        else{
            $appmodule = new ModuleAppAdministration();
            $error = $appmodule->registrarError('Error al actualizar contraseña. La contraseña introducida no es correcta');
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
            $appmodule = new ModuleAppAdministration();
            $error = $appmodule->registrarError('Error al generar Token de recuperacion. El email no existe en la Base de datos');
            return back()->with('status-error', 'La dirección de correo electrónico no existe en la base de datos.');
        }else{
            $appmodule = new ModuleAppAdministration();
            $action = $appmodule->registrarAccion('Generado Token de recuperación de contraseña');
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
            $appmodule = new ModuleAppAdministration();
            $error = $appmodule->registrarError('Error al recuperar cuenta. El email no existe en la Base de datos');
            return back()->with('status-error', 'La dirección de correo electrónico no existe en la base de datos.');
        }else{
            $users = $usermodule->recuperarPasswordConToken($data);
            return redirect('login')->with('status-success', 'Tu contraseña ha sido actualizada correctamente');
        }
    }
}
