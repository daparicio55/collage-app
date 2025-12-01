<?php

namespace Database\Seeders;

use App\Models\EquipoInstitucional;
use Illuminate\Database\Seeder;

class EquipoInstitucionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipo = [
            [
                'nombre' => 'Jovita Zumaeta Rojas',
                'cargo' => 'Directivo',
                'foto_url' => 'recursos/img/foto.webp',
                'email' => 'jovita.zumaeta@iei020.edu.pe',
                'telefono' => '987654321',
                'seccion' => null,
            ],
            [
                'nombre' => 'Luis Fernando Gómez',
                'cargo' => 'Docente',
                'foto_url' => 'recursos/img/fotom.png',
                'email' => 'luis.gomez@iei020.edu.pe',
                'telefono' => '987654321',
                'seccion' => 'A',
            ],
            [
                'nombre' => 'Carla Rodríguez',
                'cargo' => 'Docente',
                'foto_url' => 'recursos/img/foto.webp',
                'email' => 'carla.rodriguez@iei020.edu.pe',
                'telefono' => '987654321',
                'seccion' => 'A',
            ],
            [
                'nombre' => 'Carlos Perez',
                'cargo' => 'Docente',
                'foto_url' => 'recursos/img/foto.webp',
                'email' => 'carlos.perez@iei020.edu.pe',
                'telefono' => '987654321',
                'seccion' => 'B',
            ],
            [
                'nombre' => 'Pedro Lopez',
                'cargo' => 'Docente',
                'foto_url' => 'recursos/img/foto.webp',
                'email' => 'pedro.lopez@iei020.edu.pe',
                'telefono' => '987654321',
                'seccion' => 'B',
            ],
            [
                'nombre' => 'Ana María Santos',
                'cargo' => 'Docente',
                'foto_url' => 'recursos/img/foto.webp',
                'email' => 'ana.santos@iei020.edu.pe',
                'telefono' => '987222333',
                'seccion' => 'C',
            ],
            [
                'nombre' => 'Marta Pérez',
                'cargo' => 'Auxiliar de educación',
                'foto_url' => 'recursos/img/foto.webp',
                'email' => 'marta.perez@iei020.edu.pe',
                'telefono' => '987444555',
                'seccion' => null,
            ],
            [
                'nombre' => 'Luisa Ramos',
                'cargo' => 'Auxiliar de educación',
                'foto_url' => 'recursos/img/fotom.png',
                'email' => 'luisa.ramos@iei020.edu.pe',
                'telefono' => '987666777',
                'seccion' => null,
            ],
            [
                'nombre' => 'Rosa Lopez',
                'cargo' => 'Administrativo',
                'foto_url' => 'recursos/img/foto.webp',
                'email' => 'rosa.lopez@iei020.edu.pe',
                'telefono' => '987999000',
                'seccion' => null,
            ],
            [
                'nombre' => 'Miguel Castillo',
                'cargo' => 'Administrativo',
                'foto_url' => 'recursos/img/foto.webp',
                'email' => 'miguel.castillo@iei020.edu.pe',
                'telefono' => '987111000',
                'seccion' => null,
            ],
        ];

        foreach ($equipo as $miembro) {
            EquipoInstitucional::create($miembro);
        }
    }
}
