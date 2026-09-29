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
        Schema::table('monitoring_pendidikans', function (Blueprint $table) {
            $table->string('jenjang_pendidikan')->nullable()->after('anak_asuh_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('monitoring_pendidikans', function (Blueprint $table) {
            $table->dropColumn('jenjang_pendidikan');
        });
    }
};
