<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\ModuleUsers;

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

    public function loadUser($user_id){

        $usermodule = new ModuleUsers();
        $user = $user->listarUsuario($id);
        return view('usuarios.listarUsuarios', [
            'usuarios' => [$user]
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
    public function show($id)
    {

    }

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
