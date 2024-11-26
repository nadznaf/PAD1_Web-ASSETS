<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dokumentasi', function (Blueprint $table) {
            $table->id('id_dokumentasi');
            $table->unsignedBigInteger('id_proker');
            $table->string('isi_dokumentasi')->nullable();
            $table->integer('keterangan_hari')->nullable();
            $table->timestamps();

            $table->foreign('id_proker')->references('id_proker')->on('proker')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokumentasi');
    }
};