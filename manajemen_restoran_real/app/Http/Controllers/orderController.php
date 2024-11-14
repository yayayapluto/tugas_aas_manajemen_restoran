<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function order()
    {
        $categories = Category::all();
        $menus = Menu::all();

        return view("app.staff.newOrder", compact('categories', 'menus'));
    }

    public function storeOrder(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'order_items' => 'required|json',
        ]);

        $orderItems = json_decode($request->order_items, true);

        $order = Order::create([
            'customer_name' => $validated['customer_name'],
            'total_price' => array_sum(array_column($orderItems, 'subtotal')),
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
            'route' => route('order'),
        ]);
    }

    public function checkOrder($order_id)
    {
        $order = Order::with('orderItems.menu')
            ->where('id', $order_id)
            ->first();

        $orderItems = OrderItem::where('order_id', $order_id)
            ->get();

        return view("app.staff.order", compact('order', 'orderItems'));
    }
}
