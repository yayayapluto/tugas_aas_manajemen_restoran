<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "order_id" => Order::inRandomOrder()->first()->id,
            "menu_id" => Menu::inRandomOrder()->first()->id,
            "quantity" => fake()->numberBetween(1, 10),
            "price" => fake()->randomFloat(2, 10, 10000),
            "subtotal" => fake()->randomFloat(2, 10, 10000),
        ];
    }
}
