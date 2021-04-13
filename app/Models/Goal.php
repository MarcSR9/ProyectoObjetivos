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
        'tipo',
        'nombre',
        'descripcion',
        'id_usuario_origen',
        'id_usuario_destino',
        'id_objetivo_dependiente',
        'completado',
        'year',
        'comentario_origen_T1',
        'comentario_origen_T2',
        'comentario_origen_T3',
        'comentario_origen_T4',
        'comentario_destino_T1',
        'comentario_destino_T2',
        'comentario_destino_T3',
        'comentario_destino_T4',
    ];

    protected $hidden = [
        'id',
        'deleted_at'
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
