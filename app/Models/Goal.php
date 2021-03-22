<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Goal extends Model
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    protected $table = 'goals';

    protected $fillable = [
        'Tipo',
        'Nombre',
        'Descripcion',
        'Id_usuario_origen',
        'Id_usuario_destino',
        'Id_objetivo_dependiente',
        'Completado',
        'Year',
        'Comentario_origen_T1',
        'Comentario_origen_T2',
        'Comentario_origen_T3',
        'Comentario_origen_T4',
        'Comentario_destino_T1',
        'Comentario_destino_T2',
        'Comentario_destino_T3',
        'Comentario_destino_T4',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function resolveRouteBinding($id, $deleted = null)
    {
        return $this->where('id', $id)->firstOrFail();
    }
}
