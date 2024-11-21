<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Illuminate\Http\Request;

class orderController extends Controller
{

    public function order()
    {
        $categories = Category::all();
        $menus = Menu::all();

        return view("app.staff.newOrder", compact('categories', 'menus'));
    }

    public function allOrder()
    {
        $orders = Order::with("orderItems")->get();

        return view("app.staff.orders", compact('orders'));
    }

    public function report()
    {
        $orders = Order::with("orderItems")->get();
        return view("app.admin.report", compact('orders'));
    }

    public function storeOrder(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'order_items' => 'required|json',
        ]);

        $orderItems = json_decode($request->order_items, true);
        /**
         * Data yang sebelumnya berbentuk JSON seperti ini:
         * [
         *     {
         *         "menu_id": 1,
         *         "name": "Pempek",
         *         "price": "908.94",
         *         "quantity": 1,
         *         "subtotal": "908.94"
         *     },
         *     {
         *         "menu_id": 2,
         *         "name": "Susu Jahe",
         *         "price": "3766.42",
         *         "quantity": 1,
         *         "subtotal": "3766.42"
         *     }
         * ]
         *
         * Setelah di-decode akan menjadi array seperti ini:
         * [
         *     [
         *         "menu_id" => 1,
         *         "name" => "Pempek",
         *         "price" => "908.94",
         *         "quantity" => 1,
         *         "subtotal" => "908.94"
         *     ],
         *     [
         *         "menu_id" => 2,
         *         "name" => "Susu Jahe",
         *         "price" => "3766.42",
         *         "quantity" => 1,
         *         "subtotal" => "3766.42"
         *     ]
         * ]
         */


        $order = Order::create([
            'customer_name' => $validated['customer_name'],
            'total_price' => array_sum(array_column($orderItems, 'subtotal')),
            /**
             * Ini bakal SUM semua kolom subtotal dari semua array
             */
            'cashier_id' => Auth::user()->id
        ]);

        foreach ($orderItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $item['menu_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['subtotal'],
            ]);
        }

        return response()->json([
            'success' => true,
            'msg' => 'Pesanan berhasil dibuat.',
            'route' => route('order',   Order::latest()->first()->id),
        ]);
    }

    public function checkOrder($order_id)
    {
        $order = Order::with('orderItems.menu', "cashier")
            ->where('id', $order_id)
            ->first();

        $orderItems = OrderItem::where('order_id', $order_id)
            ->get();

        return view("app.staff.order", compact('order', 'orderItems'));
    }
}
