<nav class="bg-white text-[#333] p-4 shadow-md border-b border-[#333]">
    <div class="flex justify-between items-center">
        <p class="text-xl font-semibold">Ini Navbar</p>

        <ul class="flex space-x-4">
            @guest
                <li>
                    <a href="{{ route('login') }}" class="text-[#333] hover:text-[#562707]">Masuk</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="text-[#333] hover:text-[#562707]">Daftar</a>
                </li>
            @endguest

            @auth
                <li>
                    <a href="{{ URL::previous() }}" class="text-[#333] hover:text-[#562707]">Balik</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="text-[#333] hover:text-[#562707]">Keluar</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
