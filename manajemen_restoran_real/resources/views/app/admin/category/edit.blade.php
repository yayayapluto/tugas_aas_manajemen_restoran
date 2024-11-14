@extends("layouts.private")

@section("title", "Ubah Kategori")

@section("content")
<h1>Ubah Kategori</h1>

<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="category_name">Nama Kategori</label>
        <input type="text" id="category_name" name="category_name" value="{{ $category->category_name }}" required>
    </div>
    <div>
        <button type="submit">Perbarui</button>
    </div>
</form>
@endsection
