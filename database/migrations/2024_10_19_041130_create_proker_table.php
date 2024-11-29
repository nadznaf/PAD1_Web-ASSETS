<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('proker', function (Blueprint $table) {
            $table->id('id_proker');
            $table->unsignedBigInteger('id_divisi');
            $table->string('judul_proker');
            $table->string('foto_sampul_proker');
            $table->text('deskripsi_proker');
            $table->text('deskripsi_kegiatan_proker');
            $table->integer('jumlah_hari_proker');
            $table->string('status_proker');
            $table->timestamps();

            $table->foreign('id_divisi')->references('id_divisi')->on('divisi')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('proker');
    }
};