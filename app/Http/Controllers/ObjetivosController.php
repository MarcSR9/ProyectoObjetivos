<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\ModuleGoals;
use App\Modules\ModuleUsers;

class ObjetivosController extends Controller
{
	protected function listarObjetivos()
    {
        $moduloObjetivo = new ModuleGoals();
        $objetivos = $moduloObjetivo->listarObjetivos();
        return view('objetivos.listarObjetivos', [
            'objetivos' => $objetivos
        ]);
    }

    protected function listarObjetivosPorIdUsuario() {

        $user_id = auth()->user()->id;
        $moduloObjetivo = new ModuleGoals();
        $objetivosOrigen = $moduloObjetivo->listarObjetivosOrigen($user_id);
        $objetivosDestino = $moduloObjetivo->listarObjetivosDestino($user_id);
        return view('home', [
            'objetivosOrigen' => $objetivosOrigen,
            'objetivosDestino' => $objetivosDestino
        ]);
    }

    protected function nuevoObjetivo(){
        $usermodule = new ModuleUsers();
        $users = $usermodule->listarUsuarios();

        $user_id = auth()->user()->id;
        $moduloObjetivo = new ModuleGoals();
        $objetivos = $moduloObjetivo->listarObjetivosPorId($user_id);

        return view('objetivos.crearObjetivo', [
            'usuarios' => $users
        ], [
            'objetivos' => $objetivos
        ] );
    }


    protected function create(Request $request)
    {
        $data = $request->post();
        $moduloObjetivo = new ModuleGoals();
        $response = $moduloObjetivo->crearObjetivo($data['tipo'], $data['nombre'], $data['descripcion'], $data['year'], $data['id_usuario_destino'], $data['id_objetivo_dependiente']);
        //$objetivos = $moduloObjetivo->listarObjetivosPorId($user_id);
        return redirect()->route('home')->with('status-success', 'El objetivo ha sido creado correctamente');
        //$this->listarObjetivosPorIdUsuario();
    }
}
