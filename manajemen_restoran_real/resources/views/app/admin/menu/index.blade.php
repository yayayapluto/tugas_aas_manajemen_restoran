@extends("layouts.private")

@section("title", "Semua Menu")

@section("content")
    <div class="w-full max-w-4xl p-6 bg-white rounded-lg shadow-md mx-auto">
        <h1 class="text-3xl font-semibold text-[#333333] mb-5">Semua Menu</h1>

        <a href="{{ route('menus.create') }}" 
            class="inline-block px-4 py-2 text-white bg-[#333333] rounded-md hover:bg-[#222222] focus:outline-none focus:ring-2 focus:ring-gray-600 transition duration-200 ease-in-out mb-5">
            Tambah Menu
        </a>

        @if(session('success'))
            <p class="text-sm text-green-600 mb-5">{{ session('success') }}</p>
        @endif

        <div class="overflow-x-auto max-h-[400px] md:max-h-[500px] lg:max-h-[600px] xl:max-h-[700px]">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead class="bg-[#333333] text-white">
                    <tr>
                        <th class="py-3 px-6 text-center">#</th>
                        <th class="py-3 px-6 text-center">Nama Menu</th>
                        <th class="py-3 px-6 text-center">Harga</th>
                        <th class="py-3 px-6 text-center">Kategori</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="overflow-y-scroll">
                    @foreach($menus as $menu)
                        <tr class="border-b hover:bg-gray-100 cursor-pointer" data-href="{{ route('menus.show', $menu->id) }}">
                            <td class="py-3 px-6 text-center">{{ $loop->iteration }}</td>
                            <td class="py-3 px-6">{{ $menu->name }}</td>
                            <td class="py-3 px-6 text-center">Rp. {{number_format($menu->price, 2) }}</td>
                            <td class="py-3 px-6">{{ $menu->category->category_name }}</td>
                            <td class="py-3 px-6">
                                <div class="flex justify-end space-x-3">
                                    <a href="{{ route('menus.edit', $menu->id) }}" 
                                        class="inline-block px-4 py-2 text-white bg-[#333333] hover:bg-[#222222] rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600 transition duration-200">
                                        Edit
                                    </a>

                                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="inline-block px-4 py-2 text-white bg-red-600 hover:bg-red-700 rounded-md focus:outline-none focus:ring-2 focus:ring-red-600 transition duration-200"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section("scripts")
    <script>
        // const rows = document.querySelectorAll('tr[data-href]');
        // rows.forEach(row => {
        //     row.addEventListener('click', function() {
        //         window.location = row.getAttribute('data-href');
        //     });
        // });
    </script>
@endsection
