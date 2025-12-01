<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccione extends Model
{
    //
    protected $fillable = ['nivel', 'grado', 'seccion', 'vacantes', 'docente_id'];

    public function docente()
    {
        return $this->belongsTo(EquipoInstitucional::class, 'docente_id');
    }
    
}
