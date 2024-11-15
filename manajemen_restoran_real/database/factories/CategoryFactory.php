<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "category_name" => $this->faker->randomElement([
                    'Makanan Pembuka',
                    'Makanan Utama',
                    'Makanan Penutup',
                    'Makanan Ringan',
                    'Makanan Sehat',
                    'Minuman Segar',
                    'Minuman Hangat',
                    'Minuman Dingin',
                    'Minuman Manis',
                    'Minuman Kopi',
                    'Minuman Teh',
                    'Minuman Jus'
            ])
        ];
        
    }
}
