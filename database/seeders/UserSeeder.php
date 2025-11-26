<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'Nama_Lengkap' => 'Admin BookHaven',
            'Username' => 'admin',
            'Email' => 'admin@bookhaven.com',
            'NoHp' => '081234567890',
            'Alamat' => 'Jl. Admin No. 1, Jakarta',
            'Password' => Hash::make('admin123'),
            'Role' => 'Admin',
        ]);

        // Create Test User
        User::create([
            'Nama_Lengkap' => 'User Test',
            'Username' => 'user',
            'Email' => 'user@bookhaven.com',
            'NoHp' => '081234567891',
            'Alamat' => 'Jl. User No. 2, Jakarta',
            'Password' => Hash::make('user123'),
            'Role' => 'User',
        ]);

        // Create Additional Test Users
        User::create([
            'Nama_Lengkap' => 'John Doe',
            'Username' => 'johndoe',
            'Email' => 'john@example.com',
            'NoHp' => '081234567892',
            'Alamat' => 'Jl. Contoh No. 3, Bandung',
            'Password' => Hash::make('password123'),
            'Role' => 'User',
        ]);

        User::create([
            'Nama_Lengkap' => 'Jane Smith',
            'Username' => 'janesmith',
            'Email' => 'jane@example.com',
            'NoHp' => '081234567893',
            'Alamat' => 'Jl. Contoh No. 4, Surabaya',
            'Password' => Hash::make('password123'),
            'Role' => 'User',
        ]);
    }
}
