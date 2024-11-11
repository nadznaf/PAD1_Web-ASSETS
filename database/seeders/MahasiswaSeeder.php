<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            // Tentukan nama file gambar
            $filename = 'mahasiswa_' . $i . '.jpg';

            // Hasilkan gambar sementara menggunakan Faker dan simpan di disk 'public'
            $imageContent = $faker->image(null, 640, 480, 'people', true, true, 'Mahasiswa');
            $path = 'datamahasiswa/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($imageContent));

            // Simpan hanya nama file atau path relatif ke database
            Mahasiswa::create([
                'nama_mhs' => $faker->name,
                'nim_mhs' => $faker->unique()->numerify('MHS###'),
                'foto_profil_mhs' => $filename,  // Simpan path relatifnya di DB
            ]);
        }
    }
}
