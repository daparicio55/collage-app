<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('docentes', function (Blueprint $table) {
            if (!Schema::hasColumn('docentes', 'cargo')) {
                $table->string('cargo')->default('Docente')->after('apellido');
            }
            if (!Schema::hasColumn('docentes', 'seccion')) {
                $table->string('seccion')->nullable()->after('cargo');
            }
        });
    }

    public function down(): void
    {
        Schema::table('docentes', function (Blueprint $table) {
            if (Schema::hasColumn('docentes', 'seccion')) $table->dropColumn('seccion');
            if (Schema::hasColumn('docentes', 'cargo')) $table->dropColumn('cargo');
        });
    }
};
