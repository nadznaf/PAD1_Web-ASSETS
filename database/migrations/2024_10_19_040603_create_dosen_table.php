<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dosen_pebimbing', function (Blueprint $table) {
            $table->id('id_dosen');
            $table->string('nama_dosen');
            $table->string('nika_dosen');
            $table->string('foto_profil_dosen')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dosen_pebimbing');
    }
};