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
        Schema::table('jadwal', function (Blueprint $table) {
            $table->dropForeign('jadwal_driver_id_foreign');
            $table->dropColumn('driver_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->unsignedBigInteger('driver_id')->after('kendaraan_id');
            $table->foreign('driver_id')->references('id')->on('driver');
        });
    }
};
