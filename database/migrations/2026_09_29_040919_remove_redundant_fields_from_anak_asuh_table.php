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
        Schema::table('anak_asuh', function (Blueprint $table) {
            $table->dropColumn([
                'tinggi_badan',
                'berat_badan',
                'catatan_kesehatan_lain',
                'tingkat_pendidikan',
                'nama_sekolah',
                'kelas',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anak_asuh', function (Blueprint $table) {
            $table->float('tinggi_badan')->nullable()->after('alergi');
            $table->float('berat_badan')->nullable()->after('tinggi_badan');
            $table->text('catatan_kesehatan_lain')->nullable()->after('berat_badan');
            $table->string('tingkat_pendidikan')->nullable()->after('catatan_kesehatan_lain');
            $table->string('nama_sekolah')->nullable()->after('tingkat_pendidikan');
            $table->string('kelas')->nullable()->after('nama_sekolah');
        });
    }
};
