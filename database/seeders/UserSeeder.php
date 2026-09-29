<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
            'name' => 'Admin UMKM',
            'email' => 'admin@gmail.com', // Ini email untuk login nanti
            'password' => Hash::make('admin123'), // Ini password untuk login nanti
        ]);
    }
}
