@extends("layouts.private")

@section("title", "Dashboard")

@section("content")
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Daftar Rute:</h2>

        <ul class="space-y-4">
            <li>
                <a href="{{ route('users.index') }}" class="w-full inline-block text-white bg-[#333] hover:bg-black transition-all duration-200 py-4 px-6 rounded-md text-center">
                    <span class="block text-lg font-bold mb-1">Pengguna</span>
                    <span class="block text-sm text-gray-300">Jumlah pengguna: {{$summary["user"]}}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}" class="w-full inline-block text-white bg-[#333] hover:bg-black transition-all duration-200 py-4 px-6 rounded-md text-center">
                    <span class="block text-lg font-bold mb-1">Kategori</span>
                    <span class="block text-sm text-gray-300">Jumlah kategori: {{$summary["kategori"]}}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('menus.index') }}" class="w-full inline-block text-white bg-[#333] hover:bg-black transition-all duration-200 py-4 px-6 rounded-md text-center">
                    <span class="block text-lg font-bold mb-1">Menu</span>
                    <span class="block text-sm text-gray-300">Jumlah menu: {{$summary["menu"]}}</span>
                </a>
            </li>
            <li>
                <a href="{{ route("orders") }}" class="w-full inline-block text-white bg-[#333] hover:bg-black transition-all duration-200 py-4 px-6 rounded-md text-center">
                    <span class="block text-lg font-bold mb-1">Laporan</span>
                    <span class="block text-sm text-gray-300">Jumlah penghasilan: {{$summary["laporan"]}}</span>
                </a>
            </li>
        </ul>
    </div>
@endsection
