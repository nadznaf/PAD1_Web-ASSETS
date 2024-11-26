<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DosenSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID'); // Using Indonesian locale for more appropriate names
        
        // Create the datadosen directory if it doesn't exist
        Storage::disk('public')->makeDirectory('datadosen');

        for ($i = 0; $i < 5; $i++) {
            // Generate a unique filename
            $filename = 'dosen_' . uniqid() . '.jpg';
            $path = 'datadosen/' . $filename;

            // Create a simple colored rectangle as a placeholder image
            $image = imagecreatetruecolor(640, 480);
            $bgColor = imagecolorallocate($image, 
                rand(200, 255), // Lighter colors for better visibility
                rand(200, 255),
                rand(200, 255)
            );
            imagefill($image, 0, 0, $bgColor);

            // Add some basic shapes to make it look more like a profile picture
            $borderColor = imagecolorallocate($image, 100, 100, 100);
            $circleColor = imagecolorallocate($image, 150, 150, 150);
            
            // Draw a "profile" circle
            imagefilledellipse($image, 320, 200, 200, 200, $circleColor);
            imageellipse($image, 320, 200, 200, 200, $borderColor);
            
            // Draw a "body" shape
            imagefilledpolygon($image, [
                320, 300,  // Top point
                420, 480,  // Bottom right
                220, 480   // Bottom left
            ], 3, $circleColor);

            // Save the image to a temporary file
            $tempPath = tempnam(sys_get_temp_dir(), 'dosen_');
            imagejpeg($image, $tempPath, 90); // Higher quality for profile pictures
            imagedestroy($image);

            // Store the image in public storage
            Storage::disk('public')->put($path, file_get_contents($tempPath));
            unlink($tempPath); // Clean up the temporary file

            // Create the dosen record
            Dosen::create([
                'nama_dosen' => $faker->name,
                'nika_dosen' => $faker->unique()->numerify('D###'),
                'foto_profil_dosen' => $filename,
            ]);
        }
    }
}