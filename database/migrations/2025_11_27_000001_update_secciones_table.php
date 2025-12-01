<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Vaciar la tabla `secciones`
        DB::table('secciones')->truncate();

        // Insertar los datos correspondientes al nivel "Inicial"
        DB::table('secciones')->insert([
            ['nivel' => 'Inicial', 'grado' => '3 años', 'seccion' => 'Amorosos', 'vacantes' => 20],
            ['nivel' => 'Inicial', 'grado' => '3 años', 'seccion' => 'Divertidos', 'vacantes' => 20],
            ['nivel' => 'Inicial', 'grado' => '4 años', 'seccion' => 'Creativos', 'vacantes' => 20],
            ['nivel' => 'Inicial', 'grado' => '5 años', 'seccion' => 'Solidarios', 'vacantes' => 20],
            ['nivel' => 'Inicial', 'grado' => '5 años', 'seccion' => 'Cariñosos', 'vacantes' => 20],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Vaciar la tabla `secciones`
        DB::table('secciones')->truncate();
    }
};