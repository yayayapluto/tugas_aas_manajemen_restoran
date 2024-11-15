@extends("layouts.private")

@section("title", "Detail Pengguna")

@section("content")
    <div class="w-full max-w-3xl p-5 bg-white rounded-lg shadow-md mx-auto">
        <h1 class="text-3xl font-semibold text-[#333333] mb-5">Detail Pengguna</h1>

        <div class="space-y-4 mb-6">
            <p class="text-lg"><strong>Nama Pengguna:</strong> {{ $user->name }}</p>
            <p class="text-lg"><strong>Peran:</strong> {{ ucfirst($user->role) }}</p>
            <p class="text-lg"><strong>Terdaftar pada:</strong> {{ $user->created_at->format('d M Y, H:i') }}</p>
        </div>

        <div class="flex space-x-4">
            <a href="{{ route('users.edit', $user->id) }}" 
                class="inline-block px-6 py-2 text-white bg-[#333333] rounded-md hover:bg-[#222222] focus:outline-none focus:ring-2 focus:ring-[#333333] transition duration-200 ease-in-out">
                Ubah Pengguna
            </a>

            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" 
                    class="inline-block px-6 py-2 text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-200 ease-in-out">
                    Hapus Pengguna
                </button>
            </form>
        </div>
    </div>
@endsection