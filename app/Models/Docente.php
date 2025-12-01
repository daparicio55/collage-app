<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'especialidad',
        'email',
        'telefono',
        'foto_url',
        'cargo',
        'seccion',
    ];

    public function secciones()
    {
        return $this->hasMany(Seccione::class, 'docente_id');
    }
}
