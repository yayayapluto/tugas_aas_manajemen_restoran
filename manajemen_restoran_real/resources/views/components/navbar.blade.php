<nav>
    <p>ini navbar</p>
    @guest
        <li>
            <a href="{{route("login")}}">Masuk</a>
        </li>
        <li>
            <a href="{{route("register")}}">Daftar</a>
        </li>
    @endguest

    @auth
        <li>
            <a href="{{URL::previous()}}">Balik</a>
        </li>
        <li>
            <a href="{{route("logout")}}">Keluar</a>
        </li>
    @endauth
    <hr>
</nav>