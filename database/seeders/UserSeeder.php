<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'namaLengkap' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'status' => 'Staff',
            'role' => 'Admin',
        ]);

        // Create pelapor users
        User::create([
            'namaLengkap' => 'Pelapor Mahasiswa',
            'email' => 'pelapor.mahasiswa@example.com',
            'password' => Hash::make('password'),
            'status' => 'Mahasiswa',
            'role' => 'Pelapor',
        ]);

        User::create([
            'namaLengkap' => 'Pelapor Dosen',
            'email' => 'pelapor.dosen@example.com',
            'password' => Hash::make('password'),
            'status' => 'Dosen',
            'role' => 'Pelapor',
        ]);

        User::create([
            'namaLengkap' => 'Pelapor Staff',
            'email' => 'pelapor.staff@example.com',
            'password' => Hash::make('password'),
            'status' => 'Staff',
            'role' => 'Pelapor',
        ]);
    }
}
