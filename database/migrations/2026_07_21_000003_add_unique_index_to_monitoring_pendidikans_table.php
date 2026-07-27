<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Hapus duplikat opsional jika ada sebelum membuat unique index
        $duplicates = DB::table('monitoring_pendidikans')
            ->select('anak_asuh_id', 'tahun_ajaran', 'semester', DB::raw('MIN(id) as keep_id'))
            ->groupBy('anak_asuh_id', 'tahun_ajaran', 'semester')
            ->havingRaw('COUNT(*) > 1')
            ->get();

        foreach ($duplicates as $dup) {
            DB::table('monitoring_pendidikans')
                ->where('anak_asuh_id', $dup->anak_asuh_id)
                ->where('tahun_ajaran', $dup->tahun_ajaran)
                ->where('semester', $dup->semester)
                ->where('id', '!=', $dup->keep_id)
                ->delete();
        }

        Schema::table('monitoring_pendidikans', function (Blueprint $table) {
            $table->unique(['anak_asuh_id', 'tahun_ajaran', 'semester'], 'unique_anak_tahun_semester');
        });
    }

    public function down(): void
    {
        Schema::table('monitoring_pendidikans', function (Blueprint $table) {
            $table->dropUnique('unique_anak_tahun_semester');
        });
    }
};
