<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Storage::disk('public')->deleteDirectory('datadokumentasi');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('pelaksana')->truncate();
        DB::table('dokumentasi')->truncate();
        DB::table('waktu_proker')->truncate();
        DB::table('proker')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
