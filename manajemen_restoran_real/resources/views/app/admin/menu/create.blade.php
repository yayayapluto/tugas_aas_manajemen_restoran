@extends("layouts.private")

@section("title", "Tambah Menu")

@section("content")
<h1>Tambah Menu Baru</h1>

<form action="{{ route('menus.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Nama Menu</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="price">Harga</label>
        <input type="number" id="price" name="price" step="0.01" required>
    </div>
    <div>
        <label for="description">Deskripsi</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <div>
        <label for="category_id">Kategori</label>
        <select id="category_id" name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <button type="submit">Simpan</button>
    </div>
</form>
@endsection
