@extends("layouts.public")

@section("title", "Masuk")

@section("content")
<div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md sm:w-11/12 md:w-1/3 mx-auto">
    <h2 class="text-3xl font-semibold text-center text-[#333333] mb-5">Masuk ke Akun Anda</h2>

    <form action="{{ route("login.submit") }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" id="name" name="name" required 
                class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-[#333333] focus:border-[#333333] focus:outline-none transition duration-200 ease-in-out">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" required
                class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-[#333333] focus:border-[#333333] focus:outline-none transition duration-200 ease-in-out">
        </div>

        <div>
            <button type="submit" 
                class="w-full px-4 py-2 text-white bg-[#333333] rounded-md hover:bg-[#222222] focus:outline-none focus:ring-2 focus:ring-gray-600 transition duration-200 ease-in-out">
                Login
            </button>
        </div>
    </form>
</div>
@endsection
