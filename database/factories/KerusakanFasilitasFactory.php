<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KerusakanFasilitas>
 */
class KerusakanFasilitasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_laporan' => \App\Models\Laporan::factory(),
            'nama_fasilitas' => fake()->word(),
            'tingkat_kerusakan' => fake()->randomElement(['Ringan', 'Sedang', 'Berat']),
            'status' => fake()->randomElement(['Dilaporkan', 'Diperbaiki', 'Selesai']),
        ];
    }
}
