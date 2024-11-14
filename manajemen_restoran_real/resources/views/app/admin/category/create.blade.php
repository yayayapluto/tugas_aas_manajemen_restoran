@extends("layouts.private")

@section("title", "Tambah Kategori")

@section("content")
<h1>Tambah Kategori Baru</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div>
        <label for="category_name">Nama Kategori</label>
        <input type="text" id="category_name" name="category_name" required>
    </div>
    <div>
        <button type="submit">Simpan</button>
    </div>
</form>
@endsection
