<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('divisi', function (Blueprint $table) {
            $table->id('id_divisi');
            $table->unsignedBigInteger('id_kabinet');
            $table->string('nama_divisi');
            $table->text('deskripsi_divisi');
            $table->text('tugas_dan_tanggung_jawab');
            $table->text('foto_sampul_divisi');
            $table->timestamps();

            $table->foreign('id_kabinet')->references('id_kabinet')->on('kabinet')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('divisi');
    }
};