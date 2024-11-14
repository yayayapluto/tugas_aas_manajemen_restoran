@extends("layouts.private")

@section("title", "Detail Kategori")

@section("content")
<h1>Detail Kategori</h1>

<div>
    <p><strong>Nama Kategori:</strong> {{ $category->name }}</p>
    <p><strong>Terdaftar pada:</strong> {{ $category->created_at->format('d M Y, H:i') }}</p>
</div>

<div>
    <a href="{{ route('categories.edit', $category->id) }}">Ubah Kategori</a>
    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus Kategori</button>
    </form>
</div>

@endsection
