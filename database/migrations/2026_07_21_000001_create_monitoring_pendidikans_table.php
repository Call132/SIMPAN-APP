<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('monitoring_pendidikans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('anak_asuh_id')->constrained('anak_asuh')->cascadeOnDelete();
            $table->string('tahun_ajaran');
            $table->string('semester');
            $table->string('nama_sekolah')->nullable();
            $table->string('kelas')->nullable();
            $table->float('nilai_rata_rata')->nullable();
            $table->float('persentase_kehadiran')->nullable();
            $table->text('prestasi')->nullable();
            $table->text('catatan_guru')->nullable();
            $table->date('tanggal_input');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('monitoring_pendidikans');
    }
};
