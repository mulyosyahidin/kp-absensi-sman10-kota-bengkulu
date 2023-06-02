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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tahun_ajaran')->nullable()->constrained('tahun_ajaran')->cascadeOnDelete();
            $table->foreignId('id_guru')->nullable()->constrained('guru')->cascadeOnDelete();
            $table->foreignId('id_kelas')->nullable()->constrained('kelas')->cascadeOnDelete();
            $table->string('judul')->nullable();
            $table->mediumText('deskripsi')->nullable();
            $table->tinyInteger('pertemuan_ke')->nullable();
            $table->enum('status', ['draft', 'saved'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
