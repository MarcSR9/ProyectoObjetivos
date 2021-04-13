<?php

namespace App\Modules;

use DB;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Goal;
use Illuminate\Support\Str;

class ModuleGoals
{
    public function listarObjetivos()
    {
        $objetivos = Goal::get();
        return $objetivos;
    }

    public function listarObjetivosOrigen($user_id)
    {
        $objetivosOrigen = Goal::leftJoin('users', 'goals.id_usuario_origen', '=', 'users.id')
        ->select('goals.id', 'goals.nombre', 'goals.tipo', 'users.email')
        ->where('goals.id_usuario_destino', auth()->user()->id)
        ->get();

        return $objetivosOrigen;
    }

    public function listarObjetivosDestino($user_id)
    {
        $objetivosDestino = Goal::leftJoin('users', 'goals.id_usuario_destino', '=', 'users.id')
        ->select('goals.id', 'goals.nombre', 'goals.tipo', 'users.email')
        ->where('goals.id_usuario_origen', $user_id)
        ->get();
        return $objetivosDestino;
    }

    public function crearObjetivo($tipo, $nombre, $descripcion, $year, $id_usuario_destino, $id_objetivo_dependiente)
    {
        return Goal::create([
            'tipo' => $tipo,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'year' => $year,
            'id_usuario_origen' => auth()->user()->id,
            'id_usuario_destino' => $id_usuario_destino,
            'id_objetivo_dependiente' => $id_objetivo_dependiente,
        ]);
    }

    public function mostrarObjetivo(Goal $objetivo)
    {
        return $objetivo;
    }

    public function comentarObjetivoOrigen(Goal $objetivo, $comentario){
        $objetivo->comentario_origen = $comentario;
        $objetivo->save();
        return $objetivo;
    }

    public function comentarObjetivoDestino(Goal $objetivo, $comentario)
    {
        $objetivo->comentario_destino = $comentario;
        $objetivo->save();
        return $objetivo;
    }

    public function editarObjetivo(Goal $objetivo, $newdata)
    {
        $objetivo->name = $newdata["name"];
        $objetivo->surname = $newdata["surname"];
        $objetivo->role = $newdata["role"];
        $objetivo->email = $newdata["email"];
        $objetivo->save();
        return $objetivo;
    }

    public function completarObjetivo(Goal $objetivo, $comentario)
    {
        $objetivo->Completado = 'Completado';
        return $objetivo;
    }

    public function creadorObjetivo(Goal $objetivo)
    {
        $creador = Goal::join('users', 'goals.id_usuario_origen', '=', 'users.id')
        ->select('users.email')->where('id_usuario_origen', $objetivo->id_usuario_origen)->take(1)->get();
        return $creador;
    }

    public function destinatarioObjetivo(Goal $objetivo)
    {
        $destinatario = Goal::join('users', 'goals.id_usuario_destino', '=', 'users.id')
        ->select('users.email')->where('id_usuario_destino', $objetivo->id_usuario_destino)->take(1)->get();
        return $destinatario;
    }

}
