<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pelaksana', function (Blueprint $table) {
            $table->id('id_pelaksana');
            $table->unsignedBigInteger('id_mhs');
            $table->unsignedBigInteger('id_proker');
            $table->string('jabatan_pelaksana');
            $table->timestamps();

            $table->foreign('id_mhs')->references('id_mhs')->on('mahasiswa')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('id_proker')->references('id_proker')->on('proker')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pelaksana');
    }
};