<?php

namespace Database\Seeders;

use App\Models\EquipoInstitucional;
use App\Models\Seccione;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    

    /**
     * Seed the application's database.
     */
    public function run(): void
    {        
        //$this->call(SeccioneSeed::class);
        $this->call(EquipoInstitucionalSeeder::class);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);

        $secciones  = Seccione::get();
        foreach($secciones as $seccion){
            $seccion->docente_id = EquipoInstitucional::whereIn('cargo', ['Docente', 'Directivo'])->inRandomOrder()->first()->id;
            $seccion->update();
        }

    }

}

