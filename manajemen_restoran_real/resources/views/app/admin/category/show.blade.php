@extends("layouts.private")

@section("title", "Detail Kategori")

@section("content")
    <div class="w-full max-w-3xl p-6 bg-white rounded-lg shadow-md mx-auto">
        <h1 class="text-3xl font-semibold text-[#333333] mb-5">Detail Kategori</h1>

        <div class="space-y-4 mb-6">
            <p class="text-lg"><strong>Nama Kategori:</strong> {{ $category->category_name }}</p>
            <p class="text-lg"><strong>Terdaftar pada:</strong> {{ $category->created_at->format('d M Y, H:i') }}</p>
        </div>

        <div class="flex space-x-4">
            <a href="{{ route('categories.edit', $category->id) }}" 
                class="inline-block px-6 py-2 text-white bg-[#333333] rounded-md hover:bg-[#222222] focus:outline-none focus:ring-2 focus:ring-[#333333] transition duration-200 ease-in-out">
                Ubah Kategori
            </a>

            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" 
                    class="inline-block px-6 py-2 text-white bg-red-600 hover:bg-red-700 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-200 ease-in-out"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                    Hapus Kategori
                </button>
            </form>
        </div>
    </div>
@endsection
