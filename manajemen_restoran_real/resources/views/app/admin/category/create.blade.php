@extends("layouts.private")

@section("title", "Tambah Kategori")

@section("content")
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md sm:w-11/12 md:w-1/3 mx-auto">
        <h2 class="text-3xl font-semibold text-center text-[#333333] mb-5">Tambah Kategori Baru</h2>

        <form action="{{ route('categories.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="category_name" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                <input type="text" id="category_name" name="category_name" required
                    class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-[#333333] focus:border-[#333333] focus:outline-none transition duration-200 ease-in-out">
            </div>

            <div>
                <button type="submit" 
                    class="w-full px-4 py-2 text-white bg-[#333333] rounded-md hover:bg-[#222222] focus:outline-none focus:ring-2 focus:ring-gray-600 transition duration-200 ease-in-out">
                    Simpan
                </button>
            </div>
        </form>

        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">
                <a href="{{ route('categories.index') }}" class="text-[#333333] hover:text-[#222222] font-semibold">Kembali ke Daftar Kategori</a>
            </p>
        </div>
    </div>
@endsection
