@extends('layouts.public')

@section('title', 'Detail Pesanan')

@section('content')
    <div class="w-full max-w-3xl p-6 bg-white rounded-lg shadow-md mx-auto">
        <h2 class="text-3xl font-semibold text-[#333333] mb-6 text-center">Daftar Pesanan</h2>

        @forelse ($orders as $order)
            <a href="{{ route('order', $order->id) }}" class="block mb-6 p-6 bg-gray-50 rounded-lg shadow-sm hover:shadow-md transition duration-200 ease-in-out">
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-[#333333]">Pelanggan: {{ $order->customer_name }}</h3>
                    <h4 class="text-lg text-[#555555]">Total Harga: Rp. {{ number_format($order->total_price, 2) }}</h4>
                    <h5 class="text-sm text-gray-500">Tanggal Pesanan: {{ $order->order_date }}</h5>
                    
                    <hr class="border-t border-dashed border-gray-400 my-4">
                    
                    <h4 class="text-lg font-semibold">Pesanan:</h4>
                    <ul class="space-y-2">
                        @foreach ($order->orderItems as $item)
                            <li class="flex justify-between text-sm text-gray-700">
                                <span>{{ $item->menu->name }} - Rp. {{ number_format($item->price, 2) }} x {{ $item->quantity }}</span>
                                <span class="font-semibold">= Rp. {{ number_format($item->subtotal, 2) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </a>
        @empty
            <div class="text-center">
                <p class="text-lg text-gray-600">Belum ada pesanan</p>
            </div>
        @endforelse
    </div>
@endsection
