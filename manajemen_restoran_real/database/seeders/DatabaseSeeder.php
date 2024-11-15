<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        User::truncate();
        Category::truncate();
        Menu::truncate();
        Order::truncate();
        OrderItem::truncate();

        User::create([
            "name" => "admin",
            "password" => "admin123",
            "role" => "admin"
        ]);

        User::create([
            "name" => "staff",
            "password" => "staff123",
            "role" => "staff"
        ]);

        User::create([
            "name" => "staff_1",
            "password" => "staff_1123",
            "role" => "staff"
        ]);

        User::factory(5)->create();
        Category::factory(20)->create();
        Menu::factory(30)->create();
        // Order::factory(15)->create();
        // OrderItem::factory(50)->create();

        Schema::enableForeignKeyConstraints();
    }
}
