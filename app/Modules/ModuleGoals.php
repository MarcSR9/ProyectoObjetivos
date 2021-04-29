<?php

namespace App\Modules;

use DB;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Goal;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModuleGoals
{
    public function listarObjetivos()
    {
        $objetivos = Goal::leftJoin('users as creadores', 'goals.id_usuario_origen', '=', 'creadores.id')
        ->leftJoin('users as destinatarios', 'goals.id_usuario_destino', '=', 'destinatarios.id')
        ->select('goals.*', 'creadores.name as nombre_origen', 'creadores.surname as apellido_origen', 'destinatarios.name as destino_nombre', 'destinatarios.surname as destino_apellido')
        ->orderBy('year', 'desc')
        ->get();
        return $objetivos;
    }

    public function listarObjetivosOrigen($user_id)
    {
        $objetivosOrigen = Goal::leftJoin('users', 'goals.id_usuario_destino', '=', 'users.id')
        ->select('goals.*', 'users.name', 'users.surname')
        ->where('goals.id_usuario_origen', $user_id)
        ->get();

        return $objetivosOrigen;
    }

    public function listarObjetivosDestino($user_id)
    {
        $objetivosDestino = Goal::leftJoin('users', 'goals.id_usuario_origen', '=', 'users.id')
        ->select('goals.*', 'users.name', 'users.surname')
        ->where('goals.id_usuario_destino', $user_id)
        ->get();
        return $objetivosDestino;
    }

    public function crearObjetivo(string $tipo, string $nombre, string $descripcion, int $year, int $id_usuario_destino, int $id_objetivo_dependiente)
    {
        return Goal::create([
            'tipo' => $tipo,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'year' => $year,
            'id_usuario_origen' => auth()->user()->id,
            'id_usuario_destino' => $id_usuario_destino,
            'id_objetivo_dependiente' => $id_objetivo_dependiente
        ]);
    }

    public function mostrarObjetivo(Goal $objetivo)
    {
        return $objetivo;
    }

    public function dependenciaObjetivo(Goal $objetivo)
    {
        $objetivoDependiente = Goal::where('id', $objetivo->id_objetivo_dependiente)->first();

        return $objetivoDependiente;

    }

    public function actualizarObjetivo(Goal $objetivo, $newdata)
    {
        $moduloAdminApp = new ModuleAppAdministration();
        $estados = $moduloAdminApp->estadoApp();

        if (auth()->user()->id == $objetivo->id_usuario_destino) {
            if ($estados[0]->trimester_1== 'enabled') {
                $objetivo->comentario_destino_T1 = $newdata["comentario_destino_T1"];
            }
            if ($estados[0]->trimester_2== 'enabled') {
                $objetivo->comentario_destino_T2 = $newdata["comentario_destino_T2"];
            }
            if ($estados[0]->trimester_3== 'enabled') {
                $objetivo->comentario_destino_T3 = $newdata["comentario_destino_T3"];
            }
            if ($estados[0]->trimester_4== 'enabled') {
                $objetivo->comentario_destino_T4 = $newdata["comentario_destino_T4"];
            }
            if ($estados[0]->conclusions== 'enabled') {
                $objetivo->comentario_destino_conclusiones = $newdata["comentario_destino_conclusiones"];
            }
            $objetivo->save();
        }
        else if (auth()->user()->id == $objetivo->id_usuario_origen){
            $objetivo->tipo = $newdata["tipo"];
            $objetivo->nombre = $newdata["nombre"];
            $objetivo->year = intval($newdata["year"]);
            $objetivo->id_usuario_destino = intval($newdata["id_usuario_destino"]);
            $objetivo->id_objetivo_dependiente = intval($newdata["id_objetivo_dependiente"]);
            $objetivo->descripcion = $newdata["descripcion"];
            if ($estados[0]->trimester_1== 'enabled') {
                $objetivo->comentario_origen_T1 = $newdata["comentario_origen_T1"];
            }
            if ($estados[0]->trimester_2== 'enabled') {
                $objetivo->comentario_origen_T2 = $newdata["comentario_origen_T2"];
            }
            if ($estados[0]->trimester_3== 'enabled') {
                $objetivo->comentario_origen_T3 = $newdata["comentario_origen_T3"];
            }
            if ($estados[0]->trimester_4== 'enabled') {
                $objetivo->comentario_origen_T4 = $newdata["comentario_origen_T4"];
            }
            if ($estados[0]->conclusions== 'enabled') {
                $objetivo->comentario_origen_conclusiones = $newdata["comentario_origen_conclusiones"];
            }
            $objetivo->save();
        }

        return $objetivo;
    }

    public function completarObjetivo(Goal $objetivo)
    {
        $objetivo->completado = "completado";
        $objetivo->save();
        return $objetivo;
    }

    public function creadorObjetivo(Goal $objetivo)
    {
        $creador = User::where('id', $objetivo->id_usuario_origen)->first();
        return $creador;
    }

    public function destinatarioObjetivo(Goal $objetivo)
    {
        $destinatario = User::where('id', $objetivo->id_usuario_destino)->first();
        return $destinatario;
    }

    public function eliminarObjetivo(Goal $objetivo)
    {
        $objetivo->delete();
        return;
    }

}
