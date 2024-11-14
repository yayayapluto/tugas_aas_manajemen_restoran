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
            "name" => fake()->word() . " Food",
            "price" => fake()->randomFloat(2, 10, 10000),
            "description" => fake()->text(),
            "category_id" => Category::inRandomOrder()->first()->id
        ];
    }
}
