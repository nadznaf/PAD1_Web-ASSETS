<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kabinet', function (Blueprint $table) {
            $table->id('id_kabinet');
            $table->unsignedBigInteger('id_dosen');
            $table->string('nama_kabinet');
            $table->string('logo_kabinet')->nullable();
            $table->string('foto_sampul_kabinet')->nullable();
            $table->text('visi_kabinet');
            $table->text('misi_kabinet');
            $table->text('makna_kabinet')->nullable();
            $table->integer('tahun_awal_kabinet');
            $table->integer('tahun_akhir_kabinet');
            $table->text('deskripsi_kabinet');
            $table->timestamps();

            $table->foreign('id_dosen')->references('id_dosen')->on('dosen_pebimbing')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kabinet');
    }
};
