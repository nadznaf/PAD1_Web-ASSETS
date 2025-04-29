<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Storage::disk('public')->deleteDirectory('artikel');
        Schema::dropIfExists('artikel');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
