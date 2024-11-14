@extends("layouts.private")

@section("title", "Ubah Pengguna")

@section("content")
<h1>Ubah Pengguna</h1>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div>
        <label for="name">Nama Pengguna</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
    </div>
    <div>
        <label for="password_confirmation">Konfirmasi Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation">
    </div>
    <div>
        <button type="submit">Perbarui</button>
    </div>
</form>
@endsection
