<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create(
            [
                'nama_lengkap' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'Admin',
                'password' => Hash::make('admin123'), // Ganti 'password123' dengan password yang Anda inginkan
                // 'email_verified_at' => now(), // Jika ingin mengisi kolom email_verified_at dengan timestamp saat ini
            ]
        );
    }
}
