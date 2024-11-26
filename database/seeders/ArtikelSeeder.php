<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artikel;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ArtikelSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        
        // Create the artikel directory if it doesn't exist
        Storage::disk('public')->makeDirectory('artikel');

        for ($i = 0; $i < 5; $i++) {
            // Generate a unique filename
            $filename = 'artikel_' . uniqid() . '.jpg';
            $path = 'artikel/' . $filename;

            // Create a simple colored rectangle as a placeholder image
            $image = imagecreatetruecolor(640, 480);
            $bgColor = imagecolorallocate($image, 
                rand(0, 255), 
                rand(0, 255), 
                rand(0, 255)
            );
            imagefill($image, 0, 0, $bgColor);

            // Save the image to a temporary file
            $tempPath = tempnam(sys_get_temp_dir(), 'artikel_');
            imagejpeg($image, $tempPath);
            imagedestroy($image);

            // Store the image in public storage
            Storage::disk('public')->put($path, file_get_contents($tempPath));
            unlink($tempPath); // Clean up the temporary file

            // Create the artikel record
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
