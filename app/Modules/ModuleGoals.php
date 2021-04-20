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
        $objetivos = Goal::get();
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

    public function actualizarObjetivo(Goal $objetivo, $newdata)
    {
        $objetivo->descripcion = $newdata["descripcion"];
        $objetivo->comentario_origen_T1 = $newdata["comentario_origen_T1"];
        $objetivo->comentario_destino_T1 = $newdata["comentario_destino_T1"];
        $objetivo->comentario_origen_T2 = $newdata["comentario_origen_T2"];
        $objetivo->comentario_destino_T2 = $newdata["comentario_destino_T2"];
        $objetivo->comentario_origen_T3 = $newdata["comentario_origen_T3"];
        $objetivo->comentario_destino_T3 = $newdata["comentario_destino_T3"];
        $objetivo->comentario_origen_T4 = $newdata["comentario_origen_T4"];
        $objetivo->comentario_destino_T4 = $newdata["comentario_destino_T4"];
        $objetivo->comentario_origen_conclusiones = $newdata["comentario_origen_conclusiones"];
        $objetivo->comentario_destino_conclusiones = $newdata["comentario_destino_conclusiones"];
        $objetivo->save();
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
