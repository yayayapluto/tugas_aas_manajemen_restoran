@extends("layouts.public")

@section("title", "Daftar")

@section("content")
<form action="{{ route("register.submit") }}" method="POST">
    @csrf
    <div>
        <label for="name">Nama Pengguna</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <label for="password_confirmation">Konfirmasi Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
    </div>
    <div>
        <button type="submit">Daftar</button>
    </div>
</form>
@endsection
