<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class DosenSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            // Tentukan nama file gambar
            $filename = 'dosen_baru' . $i . '.jpg';

            // Hasilkan gambar sementara menggunakan Faker dan simpan di disk 'public'
            $imageContent = $faker->image(null, 640, 480, 'people', true, true, 'Dosen');
            $path = 'datadosen/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($imageContent));

            Dosen::create([
                'nama_dosen' => $faker->name,
                'nika_dosen' => $faker->unique()->numerify('D###'),
                'foto_profil_dosen' => $filename,
            ]);
        }
    }
}
