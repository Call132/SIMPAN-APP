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
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->enum('kategori', ['elektronik', 'mebel', 'perlengkapan', 'alat tulis', 'lainnya']);
            $table->integer('jumlah');
            $table->enum('kondisi', ['baik', 'rusak ringan', 'rusak berat']);
            $table->string('lokasi_penyimpanan')->nullable();
            $table->date('tanggal_pembelian')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};
