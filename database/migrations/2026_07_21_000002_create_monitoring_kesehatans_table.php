<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('monitoring_kesehatans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('anak_asuh_id')->constrained('anak_asuh')->cascadeOnDelete();
            $table->date('tanggal_pemeriksaan');
            $table->float('tinggi_badan')->nullable();
            $table->float('berat_badan')->nullable();
            $table->float('lingkar_kepala')->nullable();
            $table->string('status_gizi')->nullable();
            $table->text('keluhan')->nullable();
            $table->text('diagnosis')->nullable();
            $table->text('tindakan')->nullable();
            $table->string('nama_pemeriksa')->nullable();
            $table->text('catatan_tambahan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('monitoring_kesehatans');
    }
};
