<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'email_admin' => 'admin@admin.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
