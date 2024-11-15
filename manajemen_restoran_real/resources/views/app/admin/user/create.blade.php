@extends('layouts.private')

@section('title', 'Tambah Pengguna')

@section('content')
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md sm:w-11/12 md:w-1/3 mx-auto">
        <h2 class="text-3xl font-semibold text-center text-[#333333] mb-5">Tambah Pengguna Baru</h2>

        <form action="{{ route('users.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Pengguna</label>
                <input type="text" id="name" name="name" required 
                    class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-[#333333] focus:border-[#333333] focus:outline-none transition duration-200 ease-in-out">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-[#333333] focus:border-[#333333] focus:outline-none transition duration-200 ease-in-out">
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
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
                <a href="{{ route('users.index') }}" class="text-[#333333] hover:text-[#222222] font-semibold">Kembali ke Daftar Pengguna</a>
            </p>
        </div>
    </div>
@endsection
