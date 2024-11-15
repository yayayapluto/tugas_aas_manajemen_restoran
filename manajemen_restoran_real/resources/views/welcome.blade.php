@extends('layouts.public')

@section('title', 'Masuk')

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
        @auth
            <p class="text-xl mb-4">Hallo, {{ Auth::user()->name }}</p>

            @if (Auth::user()->role == 'staff')
                <ul class="space-y-2">
                    <strong class="text-lg">Kamu bisa akses rute ini:</strong>
                    <li>
                        <a href="{{ route('orders') }}" class="w-full inline-block text-white bg-[#333] hover:bg-black transition-all duration-200 py-2 px-4 rounded-md text-center">
                            Semua pesanan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('neworder') }}" class="w-full inline-block text-white bg-[#333] hover:bg-black transition-all duration-200 py-2 px-4 rounded-md text-center">
                            Pesanan baru
                        </a>
                    </li>
                </ul>
            @else
                <ul class="space-y-2">
                    <strong class="text-lg">Kamu bisa akses rute ini:</strong>
                    <li>
                        <a href="{{ route('dashboard') }}" class="w-full inline-block text-white bg-[#333] hover:bg-black transition-all duration-200 py-2 px-4 rounded-md text-center">
                            Dashboard
                        </a>
                    </li>
                </ul>
            @endif
        @endauth

        @guest
            <p class="text-lg">Login atau register dulu yak</p>
        @endguest
    </div>
@endsection
