<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artikel;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class ArtikelSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            // Tentukan nama file gambar
            $filename = 'artikel_baru' . $i . '.jpg';

            // Hasilkan gambar sementara menggunakan Faker dan simpan di disk 'public'
            $imageContent = $faker->image(null, 640, 480, 'people', true, true, 'Artikel');
            $path = 'artikel/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($imageContent));

            Artikel::create([
                'judul_artikel' => $faker->sentence,
                'nama_penulis' => $faker->name,
                'tanggal_terbit' => $faker->date,
                'foto_sampul_artikel' => $filename,
                'tautan_artikel_resmi' => $faker->url,
                'konten_artikel' => $faker->paragraphs(3, true),
            ]);
        }
    }
}
