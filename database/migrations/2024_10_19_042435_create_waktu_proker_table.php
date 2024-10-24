<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaktuProkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waktu_proker', function (Blueprint $table) {
            $table->id("id_waktu_proker"); // Kolom id sebagai primary key
            $table->unsignedBigInteger('id_proker');
            $table->date('start_date'); // Tanggal mulai
            $table->date('end_date'); // Tanggal akhir
            $table->json('dates_list'); // List tanggal dalam bentuk JSON
            $table->timestamps(); // Kolom created_at dan updated_at

            $table->foreign('id_proker')->references('id_proker')->on('proker')->onDelete('restrict')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('waktu_proker');
    }
}
