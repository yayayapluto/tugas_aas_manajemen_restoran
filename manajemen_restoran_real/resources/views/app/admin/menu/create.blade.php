@extends("layouts.private")

@section("title", "Tambah Menu")

@section("content")
    <div class="w-full max-w-3xl p-6 bg-white rounded-lg shadow-md mx-auto">
        <h1 class="text-3xl font-semibold text-[#333333] mb-6">Tambah Menu Baru</h1>

        <form action="{{ route('menus.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Menu</label>
                <input type="text" id="name" name="name" required
                    class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-[#333333] focus:border-[#333333] focus:outline-none transition duration-200 ease-in-out">
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" id="price" name="price" step="0.01" required
                    class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-[#333333] focus:border-[#333333] focus:outline-none transition duration-200 ease-in-out">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-[#333333] focus:border-[#333333] focus:outline-none transition duration-200 ease-in-out"></textarea>
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select id="category_id" name="category_id" required
                    class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-[#333333] focus:border-[#333333] focus:outline-none transition duration-200 ease-in-out">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit" 
                    class="w-full px-6 py-2 text-white bg-[#333333] rounded-md hover:bg-[#222222] focus:outline-none focus:ring-2 focus:ring-gray-600 transition duration-200 ease-in-out">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
