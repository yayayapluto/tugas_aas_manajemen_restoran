@extends('layouts.public')

@section('title', 'Masuk')

@section('content')
    @auth
        <p>
            Hallo, {{ Auth::user()->name }}
        </p>

        @if (Auth::user()->role == "staff")
            <ul>
                <strong>Kamu bisa akses rute ini:</strong>
                <li>
                    <a href="{{route("orders")}}">Semua pesanan</a>
                </li>
                <li>
                    <a href="{{route("neworder")}}">Pesanan baru</a>
                </li>
            </ul>
        @else
            <ul>
                <strong>Kamu bisa akses rute ini:</strong>
                <li>
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </li>
            </ul>
        @endif
    @endauth
    @guest
        <p>
            Login atau register dulu yak
        </p>
    @endguest
@endsection
