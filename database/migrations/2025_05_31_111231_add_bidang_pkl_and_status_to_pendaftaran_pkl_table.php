<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pendaftaran_pkl', function (Blueprint $table) {
            $table->string('bidang_pkl', 100)->after('perusahaan_id');
            $table->string('status', 20)->default('menunggu')->after('periode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('pendaftaran_pkl', function (Blueprint $table) {
            $table->dropColumn(['bidang_pkl', 'status']);
        });
    }
};