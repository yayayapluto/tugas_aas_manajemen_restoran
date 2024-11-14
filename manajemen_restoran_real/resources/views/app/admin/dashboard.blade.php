@extends("layouts.private")

@section("title", "Dashboard")

@section("content")
    <ul>
        <strong>Daftar rute:</strong>
        <li>
            <a href="{{route("users.index")}}">Pengguna</a>
        </li>
        <li>
            <a href="{{route("categories.index")}}">Kategori</a>
        </li>
        <li>
            <a href="{{route("menus.index")}}">Menu</a>
        </li>
    </ul>
@endsection
