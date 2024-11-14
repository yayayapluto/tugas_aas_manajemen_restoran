@extends("layouts.private")

@section("title", "Tambah Pengguna")

@section("content")
<h1>Tambah Pengguna Baru</h1>

<form action="{{ route('users.store') }}" route="users.index" method="POST">
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
        <button type="submit">Simpan</button>
    </div>
</form>
@endsection
