<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ArtikelSeeder::class,
            AspirasiSeeder::class,
            DosenSeeder::class,
            MahasiswaSeeder::class,
        ]);
    }
}
