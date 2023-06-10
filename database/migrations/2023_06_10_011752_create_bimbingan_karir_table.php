<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bimbingan_karir', function (Blueprint $table) {
            $table->id();
            $table->dateTime('jadwal_sosialisasi', $precision = 0);
            $table->dateTime('jadwal_bimbingan_karir_siswa', $precision = 0);
            $table->string('nama_sosialisasi');
            $table->unsignedBigInteger('karir_id');
            $table->string('alasan_siswa');
            $table->string('tujuan_siswa');
            $table->string('saran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bimbingan_karir');
    }
};