@extends("layouts.private")

@section("title", "Dashboard")

@section("content")
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Daftar Rute:</h2>

        <ul class="space-y-4">
            <li>
                <a href="{{ route('users.index') }}" class="w-full inline-block text-white bg-[#333] hover:bg-black transition-all duration-200 py-2 px-4 rounded-md text-center">
                    Pengguna
                </a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}" class="w-full inline-block text-white bg-[#333] hover:bg-black transition-all duration-200 py-2 px-4 rounded-md text-center">
                    Kategori
                </a>
            </li>
            <li>
                <a href="{{ route('menus.index') }}" class="w-full inline-block text-white bg-[#333] hover:bg-black transition-all duration-200 py-2 px-4 rounded-md text-center">
                    Menu
                </a>
            </li>
        </ul>
    </div>
@endsection
