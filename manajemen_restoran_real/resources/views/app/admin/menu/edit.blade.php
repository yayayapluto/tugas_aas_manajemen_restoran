@extends('layouts.private')

@section('title', 'Ubah Menu')

@section('content')
    <h1>Ubah Menu</h1>

    <form action="{{ route('menus.update', $menu->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nama Menu</label>
            <input type="text" id="name" name="name" value="{{ $menu->name }}" required>
        </div>
        <div>
            <label for="price">Harga</label>
            <input type="number" id="price" name="price" value="{{ $menu->price }}" step="0.01" required>
        </div>
        <div>
            <label for="description">Deskripsi</label>
            <textarea id="description" name="description">{{ $menu->description }}</textarea>
        </div>
        <div>
            <label for="category_id">Kategori</label>
            <select id="category_id" name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $menu->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit">Perbarui</button>
        </div>
    </form>
@endsection
