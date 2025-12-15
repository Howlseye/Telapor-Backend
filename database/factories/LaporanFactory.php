<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laporan>
 */
class LaporanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_user' => User::inRandomOrder()->first()->id,
            'detail' => fake()->sentence(),
            'lokasi' => fake()->address(),
            'foto' => fake()->imageUrl(),
            'tipe_laporan' => fake()->randomElement(['Barang Hilang', 'Kerusakan Fasilitas']),
        ];
    }
}
