<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipoInstitucional extends Model
{
    public $table = 'equipo_institucional';

    public $fillable = [
        'nombre',
        'cargo',
        'foto_url',
        'email',
        'telefono',
        'seccion',
    ];
}
