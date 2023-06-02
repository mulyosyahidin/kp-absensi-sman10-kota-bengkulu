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
        Schema::table('absensi', function (Blueprint $table) {
            $table->foreignId('id_pelajaran')->after('id_kelas')->constrained('pelajaran')->cascadeOnDelete();
            $table->date('tanggal')->after('id_pelajaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('absensi', function (Blueprint $table) {
            $table->dropForeign(['id_pelajaran']);
            $table->dropColumn('id_pelajaran');
            $table->dropColumn('tanggal');
        });
    }
};
