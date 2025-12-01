<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('secciones', function (Blueprint $table) {
            $table->unsignedBigInteger('docente_id')->nullable();
            $table->foreign('docente_id')->references('id')->on('equipo_institucional')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('secciones', function (Blueprint $table) {
            $table->dropForeign(['docente_id']);
            $table->dropColumn('docente_id');
        });
    }
};