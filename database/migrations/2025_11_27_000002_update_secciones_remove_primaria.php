<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Eliminar registros del nivel "Primaria"
        // Actualizar la tabla con los datos del controlador
        DB::table('secciones')->truncate();

        DB::table('secciones')->insert([
            ['grado' => '3 años', 'seccion' => 'Amorosos', 'vacantes' => 20],
            ['grado' => '3 años', 'seccion' => 'Divertidos', 'vacantes' => 20],
            ['grado' => '4 años', 'seccion' => 'Creativos', 'vacantes' => 20],
            ['grado' => '5 años', 'seccion' => 'Solidarios', 'vacantes' => 20],
            ['grado' => '5 años', 'seccion' => 'Cariñosos', 'vacantes' => 20],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Restaurar los datos eliminados (si es necesario)
        DB::table('secciones')->truncate();
    }
};