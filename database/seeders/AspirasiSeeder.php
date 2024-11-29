<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aspirasi;
use Faker\Factory as Faker;

class AspirasiSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 5; $i++) {
            Aspirasi::create([
                'nama_pengirim' => $faker->name,
                'judul_aspirasi' => $faker->sentence,
                'isi_aspirasi' => substr($faker->paragraphs(1, true), 0, 255), // Batasi panjang ke 255 karakter
            ]);
        }
    }
}
