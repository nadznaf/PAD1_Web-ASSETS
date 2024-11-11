<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aspirasi;
use Faker\Factory as Faker;

class AspirasiSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Aspirasi::create([
                'nama_pengirim' => $faker->name,
                'judul_aspirasi' => $faker->sentence,
                'isi_aspirasi' => $faker->paragraphs(1, true),
            ]);
        }
    }
}
