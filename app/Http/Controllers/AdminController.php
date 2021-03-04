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

    protected function create(Request $request)
    {
        $data = $request->post();
        $usermodule = new ModuleUsers();

        $exists = $usermodule->getUserByEmail($data['email']);
        if(is_null($exists)){
            $response = $usermodule->crearUsuario($data['name'], $data['surname'], $data['role'], $data['email'], $data['password']);
            return back()->with('status-success', 'El usuario ha sido creado correctamente');
        }else{
            return back()->with('status-error', 'El email del usuario ya existe en la base de datos.');
        }
    }

    public function show($id){

        $usermodule = new ModuleUsers();
        $user = $usermodule->mostrarUsuario($id);
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
    public function edit($id)
    {
        //
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
        $usermodule = new ModuleUsers();
        $user = $usermodule->mostrarUsuario($id);
        return view('usuarios.mostrarUsuario', [
            'usuario' => $user
        ]);
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
        return view('usuarios.listarUsuarios', [
            'usuarios' => $users
        ]);
    }
}
