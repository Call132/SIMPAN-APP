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
        Schema::create('donasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donatur_id')->constrained('donaturs')->cascadeOnDelete();
            $table->date('tanggal_donasi');
            $table->enum('jenis_donasi', ['uang', 'barang', 'makanan', 'pakaian']);
            $table->decimal('jumlah_uang', 15, 2)->nullable();
            $table->string('satuan_barang')->nullable();
            $table->integer('jumlah_barang')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('bukti_transfer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasis');
    }
};
