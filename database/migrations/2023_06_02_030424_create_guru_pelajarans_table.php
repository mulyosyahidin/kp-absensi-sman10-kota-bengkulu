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
        Schema::create('guru_pelajaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tahun_ajaran')->constrained('tahun_ajaran')->cascadeOnDelete();
            $table->foreignId('id_guru')->constrained('guru')->cascadeOnDelete();
            $table->foreignId('id_pelajaran')->constrained('pelajaran')->cascadeOnDelete();
            $table->foreignId('id_kelas')->constrained('kelas')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru_pelajaran');
    }
};
