@extends("layouts.private")

@section("title", "Detail Menu")

@section("content")
<h1>Detail Menu</h1>

<div>
    <p><strong>Nama Menu:</strong> {{ $menu->name }}</p>
    <p><strong>Harga:</strong> {{ number_format($menu->price, 2) }}</p>
    <p><strong>Deskripsi:</strong> {{ $menu->description }}</p>
    <p><strong>Kategori:</strong> {{ $menu->category->category_name }}</p>
    <p><strong>Terdaftar pada:</strong> {{ $menu->created_at->format('d M Y, H:i') }}</p>
</div>

<div>
    <a href="{{ route('menus.edit', $menu->id) }}">Ubah Menu</a>
    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus Menu</button>
    </form>
</div>

@endsection
