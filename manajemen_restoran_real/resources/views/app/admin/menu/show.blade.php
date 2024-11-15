@extends("layouts.private")

@section("title", "Detail Menu")

@section("content")
    <div class="w-full max-w-3xl p-5 bg-white rounded-lg shadow-md mx-auto">
        <h1 class="text-3xl font-semibold text-[#333333] mb-5">Detail Menu</h1>

        <div class="space-y-4 mb-6">
            <p class="text-lg"><strong>Nama Menu:</strong> {{ $menu->name }}</p>
            <p class="text-lg"><strong>Harga:</strong> {{ number_format($menu->price, 2) }}</p>
            <p class="text-lg"><strong>Deskripsi:</strong> {{ $menu->description }}</p>
            <p class="text-lg"><strong>Kategori:</strong> {{ $menu->category->category_name }}</p>
            <p class="text-lg"><strong>Terdaftar pada:</strong> {{ $menu->created_at->format('d M Y, H:i') }}</p>
        </div>

        <div class="flex space-x-4">
            <a href="{{ route('menus.edit', $menu->id) }}" 
                class="inline-block px-6 py-2 text-white bg-[#333333] rounded-md hover:bg-[#222222] focus:outline-none focus:ring-2 focus:ring-[#333333] transition duration-200 ease-in-out">
                Ubah Menu
            </a>

            <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" 
                    class="inline-block px-6 py-2 text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-200 ease-in-out"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">
                    Hapus Menu
                </button>
            </form>
        </div>
    </div>
@endsection
