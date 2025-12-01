<?php

namespace Database\Seeders;

use App\Models\Seccione;
use Illuminate\Database\Seeder;

class SeccioneSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seccione::create([
            'nivel'    => 'Inicial',
            'grado'    => '3 años',
            'seccion'  => 'A',
            'vacantes' => 20,
        ]);
        Seccione::create([
            'nivel'    => 'Inicial',
            'grado'    => '4 años',
            'seccion'  => 'A',
            'vacantes' => 20,
        ]);
        Seccione::create([
            'nivel'    => 'Inicial',
            'grado'    => '5 años',
            'seccion'  => 'A',
            'vacantes' => 20,
        ]);
        Seccione::create([
            'nivel'    => 'Primaria',
            'grado'    => '1°',
            'seccion'  => 'A',
            'vacantes' => 25,
        ]);
        Seccione::create([
            'nivel'    => 'Primaria',
            'grado'    => '2°',
            'seccion'  => 'A',
            'vacantes' => 25,
        ]);
        Seccione::create([
            'nivel'    => 'Primaria',
            'grado'    => '3°',
            'seccion'  => 'A',
            'vacantes' => 25,
        ]);
        Seccione::create([
            'nivel'    => 'Primaria',
            'grado'    => '4°',
            'seccion'  => 'A',
            'vacantes' => 25,
        ]);
        Seccione::create([
            'nivel'    => 'Primaria',
            'grado'    => '5°',
            'seccion'  => 'A',
            'vacantes' => 25,
        ]);
        Seccione::create([
            'nivel'    => 'Primaria',
            'grado'    => '6°',
            'seccion'  => 'A',
            'vacantes' => 25,
        ]);
        Seccione::create([
            'nivel'    => 'Primaria',
            'grado'    => '6°',
            'seccion'  => 'B',
            'vacantes' => 25,
        ]);   
    }
}
