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
        Schema::table('projects', function (Blueprint $table) {
            // Alterando o campo status para ser um enum
            $table->enum('status', ['planejado', 'em andamento', 'completo'])->default('planejado')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Revertendo o campo status para string
            $table->string('status')->default('planejado')->change();
        });
    }
};
