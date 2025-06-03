<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id('id_staff');
            $table->unsignedBigInteger('id_divisi');
            $table->unsignedBigInteger('id_mhs');
            $table->string('nama_jabatan');
            $table->string('foto_pose_staff')->nullable();
            $table->timestamps();

            $table->foreign('id_divisi')->references('id_divisi')->on('divisi')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('id_mhs')->references('id_mhs')->on('mahasiswa')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('staff');
    }
};
