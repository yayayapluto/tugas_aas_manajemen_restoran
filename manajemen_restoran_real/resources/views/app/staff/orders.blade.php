@extends('layouts.public')

@section('title', 'Detail Pesanan')

@section('content')
    <div class="container">
        <h2>Daftar Pesanan</h2>
        @forelse ($orders as $order)
            <a href="{{route("order", $order->id)}}">
                <div>
                    <h3>Customer: {{ $order->customer_name }}</h3>
                    <h4>Total Price: Rp. {{ number_format($order->total_price, 2) }}</h4>
                    <h5>Order Date: {{ $order->order_date }}</h5>
    
                    <h4>Items:</h4>
                    <ul>
                        @foreach ($order->orderItems as $item)
                            <li>
                                {{ $item->menu->name }} - Rp. {{ number_format($item->price, 2) }} x {{ $item->quantity }} = Rp.
                                {{ number_format($item->subtotal, 2) }}
                            </li>
                        @endforeach
                    </ul>
                    <hr>
                </div>
            </a>
        @empty
            <div>
                <p>Belum ada pesanan</p>
            </div>
        @endforelse
    </div>
@endsection
