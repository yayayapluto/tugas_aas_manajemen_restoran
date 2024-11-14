@extends("layouts.private")

@section("title", "Semua Menu")

@section("content")
<h1>Semua Menu</h1>

<a href="{{ route('menus.create') }}">Tambah Menu</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Menu</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($menus as $menu)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $menu->name }}</td>
                <td>{{ number_format($menu->price, 2) }}</td>
                <td>{{ $menu->category->category_name }}</td>
                <td>
                    <a href="{{ route('menus.edit', $menu->id) }}">Edit</a>
                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
