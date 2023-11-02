<?php

namespace Database\Factories;

use App\Models\barang;
use App\Models\product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'harga' => fake()->randomFloat(50000, 150000, 1000000),
            'jumlah' => fake()->numberBetween(1, 50),
            'deskripsi' => fake()->sentence,
            'product_id' => product::all()->random()->id
        ];
    }
}
