@extends("layouts.private")

@section("title", "Ubah Pengguna")

@section("content")
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md sm:w-11/12 md:w-1/3 mx-auto">
        <h2 class="text-3xl font-semibold text-center text-[#333333] mb-5">Ubah Pengguna</h2>

        <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Pengguna</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" required 
                    class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-[#333333] focus:border-[#333333] focus:outline-none transition duration-200 ease-in-out">
                
                @error('name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-[#333333] focus:border-[#333333] focus:outline-none transition duration-200 ease-in-out">
                
                @error('password')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-[#333333] focus:border-[#333333] focus:outline-none transition duration-200 ease-in-out">
                
                @error('password_confirmation')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <button type="submit" 
                    class="w-full px-4 py-2 text-white bg-[#333333] rounded-md hover:bg-[#222222] focus:outline-none focus:ring-2 focus:ring-[#333333] transition duration-200 ease-in-out">
                    Perbarui
                </button>
            </div>
        </form>

        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">
                <a href="{{ route('users.index') }}" class="text-[#333333] hover:text-[#222222] font-semibold">Kembali ke Daftar Pengguna</a>
            </p>
        </div>
    </div>
@endsection