<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Errors extends Model
{
    use HasFactory;

    protected $table = 'errors';

    protected $fillable = [
        'error',
        'user_id',
    ];

    protected $hidden = [
        'id',
	];
}
