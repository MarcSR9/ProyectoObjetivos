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

    public function listarObjetivosPorId($user_id)
    {
        $objetivos = Goal::where('Id_usuario_origen', $user_id)->get();
        return $objetivos;
    }

    public function listarObjetivosDestino($user_id)
    {
        $objetivos = Goal::where('Id_usuario_destino', $user_id)->get();
        return $objetivos;
    }

    public function crearObjetivo($tipo, $nombre, $descripcion, $year, $id_usuario_destino, $id_objetivo_dependiente)
    {
        return Goal::create([
            'Tipo' => $tipo,
            'Nombre' => $nombre,
            'Descripcion' => $descripcion,
            'Year' => $year,
            'Id_usuario_origen' => auth()->user()->id,
            'Id_usuario_destino' => $id_usuario_destino,
            'Id_objetivo_dependiente' => $id_objetivo_dependiente,
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

}
