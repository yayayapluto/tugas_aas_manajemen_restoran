@extends("layouts.public")

@section("title", "Detail Pesanan")

@section("content")
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold text-[#333333] mb-6">Detail Pesanan</h2>
    @if($order)
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-medium mb-4">Customer: {{ $order->customer_name }}</h3>
        <h4 class="text-lg font-semibold mb-4">Total Price: Rp. {{ number_format($order->total_price, 2) }}</h4>
        <h5 class="text-md text-gray-600 mb-6">Order Date: {{ $order->order_date }}</h5>

        <h4 class="text-lg font-semibold mb-4">Items:</h4>
        <ul class="space-y-2">
            @foreach($orderItems as $item)
                <li class="flex justify-between items-center">
                    <span>{{ $item->menu->name }} - Rp. {{ number_format($item->price, 2) }} x {{ $item->quantity }}</span>
                    <span class="font-semibold">= Rp. {{ number_format($item->subtotal, 2) }}</span>
                </li>
            @endforeach
        </ul>
    </div>
    @else
    <p class="text-gray-600">Pesanan tidak ditemukan.</p>
    @endif
</div>
@endsection
