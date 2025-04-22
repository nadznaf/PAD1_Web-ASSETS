<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // $this->call([
        //     ArtikelSeeder::class,
        //     AspirasiSeeder::class,
        //     DosenSeeder::class,
        //     MahasiswaSeeder::class,
        // ]);
        Admin::create([
            'email_admin' => 'admin@admin.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
