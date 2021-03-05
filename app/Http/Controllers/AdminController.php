<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\ModuleUsers;
use App\Models\User;

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
        //redirigir al formulario de crear usuarios
        return view('usuarios.crearUsuario');
    }

    protected function create(Request $request)
    {
        $data = $request->post();
        $usermodule = new ModuleUsers();

        $exists = $usermodule->getUserByEmail($data['email']);
        if(is_null($exists)){
            $response = $usermodule->crearUsuario($data['name'], $data['surname'], $data['role'], $data['email'], $data['password']);
            return redirect()->route('usuarios.lista', $usuarios)->with('status-success', 'El usuario ha sido creado correctamente');
        }else{
            return back()->with('status-error', 'El email del usuario ya existe en la base de datos.');
        }
    }

    public function show($usuario){

        $usermodule = new ModuleUsers();
        $user = $usermodule->mostrarUsuario($usuario);
        return view('usuarios.mostrarUsuario', [
            'usuario' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($usuario)
    {
        return view('usuarios.editarUsuario', [
            'usuario' => $usuario
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->post();
        $usermodule = new ModuleUsers();
        $response = $usermodule->editarUsuario($data['id'], $data['name'], $data['surname'], $data['role'], $data['email']);
        return redirect()->route('usuarios.lista', $usuarios)->with('status-success', 'El usuario ha sido actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usermodule = new ModuleUsers();
        $users = $usermodule->eliminarUsuario($id);
        return view('usuarios.listarUsuarios')->with('status-success', 'El usuario ha sido eliminado correctamente');
    }
}
