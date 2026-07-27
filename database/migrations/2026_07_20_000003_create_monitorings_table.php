<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('monitorings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('anak_asuh_id')->constrained('anak_asuh')->cascadeOnDelete();
            $table->date('tanggal');
            $table->text('catatan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('monitorings');
    }
};
