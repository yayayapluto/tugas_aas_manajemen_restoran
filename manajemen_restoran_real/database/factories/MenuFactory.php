<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->randomElement([
                'Nasi Goreng',
                'Sate',
                'Bakso',
                'Rendang',
                'Mie Goreng',
                'Gado-Gado',
                'Soto',
                'Martabak',
                'Ayam Penyet',
                'Tempe',
                'Tahu',
                'Pempek',
                'Mie Ayam',
                'Mie Rebus',
                'Nasi Uduk',
                'Nasi Kuning',
                'Ikan Bakar',
                'Tahu Tempe',
                'Ayam Goreng',
                'Sayur Asem',
                'Karedok',
                'Nasi Liwet',
                'Bubur Ayam',
                'Gulai',
                'Pecel',
                'Cilok',
                'Lotek',
                'Teh Manis',
                'Es Kelapa',
                'Jus Jeruk',
                'Jus Mangga',
                'Es Teh',
                'Es Doger',
                'Kopi',
                'Jus Alpukat',
                'Bandrek',
                'Kopi Susu',
                'Jus Tomat',
                'Es Cendol',
                'Teh Tarik',
                'Es Teler',
                'Susu Jahe',
                'Es Pisang Ijo',
                'Kopi Hitam',
                'Es Krim',
                'Es Buah',
                'Jus Apel',
                'Es Campur',
                'Es Krim Cokelat',
                'Es Lemon Tea',
                'Soda Gembira',
                'Teh Botol',
                'Es Madu'
            ]),
            "price" => $this->faker->randomFloat(2, 10, 10000),
            "description" => $this->faker->text(),
            "category_id" => Category::inRandomOrder()->first()->id
        ];
    }
}
