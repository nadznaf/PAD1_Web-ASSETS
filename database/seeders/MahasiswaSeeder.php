<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID'); // Using Indonesian locale for more appropriate names
        
        // Create the datamahasiswa directory if it doesn't exist
        Storage::disk('public')->makeDirectory('datamahasiswa');

        for ($i = 0; $i < 5; $i++) {
            // Generate a unique filename
            $filename = 'mahasiswa_' . uniqid() . '.jpg';
            $path = 'datamahasiswa/' . $filename;

            try {
                // Create a simple colored rectangle as a placeholder image
                $image = imagecreatetruecolor(640, 480);
                if (!$image) {
                    throw new \Exception("Failed to create image resource");
                }

                // Create a gradient background
                $topColor = imagecolorallocate($image, 
                    rand(180, 220), 
                    rand(180, 220), 
                    rand(220, 255)
                );
                $bottomColor = imagecolorallocate($image, 
                    rand(140, 180), 
                    rand(140, 180), 
                    rand(180, 220)
                );

                // Fill background with gradient
                for ($y = 0; $y < 480; $y++) {
                    $ratio = $y / 480;
                    $r = (int)(($topColor >> 16) * (1 - $ratio) + ($bottomColor >> 16) * $ratio);
                    $g = (int)((($topColor >> 8) & 0xFF) * (1 - $ratio) + (($bottomColor >> 8) & 0xFF) * $ratio);
                    $b = (int)(($topColor & 0xFF) * (1 - $ratio) + ($bottomColor & 0xFF) * $ratio);
                    $color = imagecolorallocate($image, $r, $g, $b);
                    imageline($image, 0, $y, 640, $y, $color);
                }

                // Draw a "profile" silhouette
                $profileColor = imagecolorallocate($image, 80, 80, 80);
                
                // Head
                imagefilledellipse($image, 320, 180, 160, 160, $profileColor);
                
                // Shoulders
                imagefilledpolygon($image, [
                    240, 260,  // Left shoulder
                    400, 260,  // Right shoulder
                    440, 380,  // Bottom right
                    200, 380   // Bottom left
                ], 4, $profileColor);

                // Save the image to a temporary file
                $tempPath = tempnam(sys_get_temp_dir(), 'mahasiswa_');
                imagejpeg($image, $tempPath, 90);
                imagedestroy($image);

                // Store the image in public storage
                Storage::disk('public')->put($path, file_get_contents($tempPath));
                unlink($tempPath); // Clean up the temporary file

                // Create the mahasiswa record with proper nim format
                Mahasiswa::create([
                    'nama_mhs' => $faker->name,
                    'nim_mhs' => $faker->unique()->numerify('MHS###'),
                    'foto_profil_mhs' => $filename, // Store just the filename, not the full path
                ]);

            } catch (\Exception $e) {
                // Log the error and continue with the next iteration
                \Log::error('Failed to create mahasiswa record: ' . $e->getMessage());
                continue;
            }
        }
    }
}
