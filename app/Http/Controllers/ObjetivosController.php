<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\ModuleGoals;
use App\Modules\ModuleUsers;
use App\Models\Goal;
use App\Modules\ModuleAppAdministration;

class ObjetivosController extends Controller
{
	/*protected function listarObjetivos()
    {
        $moduloObjetivo = new ModuleGoals();
        $objetivos = $moduloObjetivo->listarObjetivos();
        return view('objetivos.listarObjetivos', [
            'objetivos' => $objetivos
        ]);
    }*/

    protected function listarObjetivosPorIdUsuario() {

        $user_id = auth()->user()->id;
        $moduloObjetivo = new ModuleGoals();
        $objetivosOrigen = $moduloObjetivo->listarObjetivosOrigen($user_id);
        $objetivosDestino = $moduloObjetivo->listarObjetivosDestino($user_id);
        return view('home', [
            'objetivosOrigen' => $objetivosOrigen
        ], [
            'objetivosDestino' => $objetivosDestino,
        ]);
    }

    protected function nuevoObjetivo(){
        $usermodule = new ModuleUsers();
        $users = $usermodule->listarUsuarios();

        $user_id = auth()->user()->id;
        $moduloObjetivo = new ModuleGoals();
        $objetivos = $moduloObjetivo->listarObjetivosDestino($user_id);


        if (auth()->user()->crea_objetivo_general == 'true' || auth()->user()->crea_objetivo_secundario == 'true' || auth()->user()->crea_objetivo_hito == 'true') {
            return view('objetivos.crearObjetivo', [
                'usuarios' => $users
            ], [
                'objetivos' => $objetivos
            ] );
        }
        else {
            $moduloAdminApp = new ModuleAppAdministration();
            $action = $moduloAdminApp->registrarAccion('Intento de acceso a recurso no autorizado');
            return back()->with('status-error', 'No tienes permisos para crear objetivos');
        }
    }


    protected function create(Request $request)
    {
        $data = $request->post();
        $moduloObjetivo = new ModuleGoals();
        $response = $moduloObjetivo->crearObjetivo($data['tipo'], $data['nombre'], $data['descripcion'], $data['year'], $data['id_usuario_destino'], $data['id_objetivo_dependiente']);

        $appmodule = new ModuleAppAdministration();
        $action = $appmodule->registrarAccion('El usuario ha creado un nuevo objetivo');

        return redirect()->route('home')->with('status-success', 'El objetivo ha sido creado correctamente');
    }

    public function mostrarObjetivo(Goal $objetivo){

        $moduloObjetivo = new ModuleGoals();
        $objetivo = $moduloObjetivo->mostrarObjetivo($objetivo);
        $creador = $moduloObjetivo->creadorObjetivo($objetivo);
        $destinatario = $moduloObjetivo->destinatarioObjetivo($objetivo);

        $moduloAdminApp = new ModuleAppAdministration();
        $estados = $moduloAdminApp->estadoApp();

        if (auth()->user()->id == $objetivo->id_usuario_destino || auth()->user()->id == $objetivo->id_usuario_origen) {
            return view('objetivos.mostrarObjetivo',
                ['objetivo' => $objetivo, 'creador' => $creador, 'destinatario' => $destinatario, 'estados' => $estados]
            );
        }
        else {
            $moduloAdminApp = new ModuleAppAdministration();
            $action = $moduloAdminApp->registrarAccion('Intento de acceso a recurso no autorizado');
            return back()->with('status-error', 'No tienes acceso a este recurso');
        }


    }

    public function actualizarObjetivo(Request $request, Goal $objetivo)
    {
        $moduloObjetivo = new ModuleGoals();
        $moduloObjetivo->actualizarObjetivo($objetivo, $request->post());

        $moduloAdminApp = new ModuleAppAdministration();
            $action = $moduloAdminApp->registrarAccion('El usuario ha actualizado un objetivo');

        return redirect()->route('mostrarObjetivo', $objetivo)->with('status-success', 'El objetivo ha sido actualizado correctamente');
    }

    public function completarObjetivo(Goal $objetivo)
    {
        $moduloObjetivo = new ModuleGoals();
        $moduloObjetivo->completarObjetivo($objetivo);
        $moduloAdminApp = new ModuleAppAdministration();
            $action = $moduloAdminApp->registrarAccion('El usuario ha completado un objetivo');
        return redirect()->route('mostrarObjetivo', $objetivo)->with('status-success', 'El objetivo ha sido marcado como completado');
    }

    public function eliminarObjetivo(Goal $objetivo)
    {
        $moduloObjetivo = new ModuleGoals();
        $moduloObjetivo->eliminarObjetivo($objetivo);
        $moduloAdminApp = new ModuleAppAdministration();
            $action = $moduloAdminApp->registrarAccion('El usuario ha eliminado un objetivo');
        return redirect()->route('home')->with('status-success', 'El objetivo ha sido eliminado correctamente');
    }
}
