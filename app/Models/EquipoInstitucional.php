<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipoInstitucional extends Model
{
    protected $table = 'equipo_institucional';

    protected $fillable = [
        'nombre',
        'cargo',
        'foto_url',
        'email',
    ];
}