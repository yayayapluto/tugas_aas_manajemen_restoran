<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class aditionalController extends Controller
{
    public function showDashboard() {
        $summary = [
            "user" => User::count(),
            "kategori" => Category::count(),
            "menu" => Menu::count(),
            "laporan" => Order::sum("total_price")
        ];

        return view("app.admin.dashboard", compact("summary"));
    }
}
