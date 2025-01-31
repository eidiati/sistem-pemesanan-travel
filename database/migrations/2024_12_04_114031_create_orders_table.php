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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('asal_id');
            $table->foreign('asal_id')->references('id')->on('rute');
            $table->string('alamat_jemput');
            $table->unsignedBigInteger('tujuan_id');
            $table->foreign('tujuan_id')->references('id')->on('rute');
            $table->string('alamat_tujuan');
            $table->unsignedBigInteger('jadwal_id');
            $table->foreign('jadwal_id')->references('id')->on('jadwal');
            $table->string('no_hp');
            $table->string('metode_bayar');
            $table->string('harga');
            $table->string('bayar');
            $table->string('status_bayar');
            $table->string('status_pesanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
