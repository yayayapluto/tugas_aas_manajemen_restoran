@extends("layouts.public")

@section("title", "Detail Pesanan")

@section("content")
<div class="container mx-auto p-6 flex justify-center">
    <div class="bg-white w-[400px] p-6 rounded-lg border border-gray-300 shadow-md">
        <h2 class="text-center text-2xl font-bold text-black mb-6">Detail Pesanan</h2>
        
        @if($order)
        <div class="text-base text-gray-800 font-mono">
            <div class="mb-4">
                <span class="block text-lg">Pelanggan: {{ $order->customer_name }}</span>
                <span class="block text-lg">Tanggal: {{ $order->order_date }}</span>
                <span class="block text-lg">Kasir: {{ $order->cashier->name }}</span>
            </div>
            <hr class="border-t border-dashed border-gray-400 my-4">
            <h3 class="text-center text-xl font-bold mb-4">Pesanan</h3>
            <ul class="mb-4">
                @forelse($orderItems as $item)
                    <li class="flex justify-between text-lg">
                        <span>{{ $item->menu->name }} x{{ $item->quantity }}</span>
                        <span>Rp. {{ number_format($item->subtotal, 2) }}</span>
                    </li>
                @empty
                    <li class="text-center text-gray-600 text-lg">Tidak ada pesanan</li>
                @endforelse
            </ul>
            <hr class="border-t border-dashed border-gray-400 my-4">
            <div class="flex justify-between font-bold text-xl">
                <span>Total:</span>
                <span>Rp. {{ number_format($order->total_price, 2) }}</span>
            </div>
        </div>
        @else
        <p class="text-gray-600 text-center font-mono text-lg">Pesanan tidak ditemukan.</p>
        @endif
        
        <hr class="border-t border-dashed border-gray-400 my-6">
        <p class="text-center text-sm text-gray-500 font-mono">Terima kasih telah berbelanja!</p>
    </div>
</div>
@endsection
