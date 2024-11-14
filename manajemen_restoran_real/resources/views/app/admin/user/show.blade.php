@extends("layouts.private")

@section("title", "Detail Pengguna")

@section("content")
<h1>Detail Pengguna</h1>

<div>
    <p><strong>Nama Pengguna:</strong> {{ $user->name }}</p>
    <p><strong>Peran:</strong> {{ ucfirst($user->role) }}</p>
    <p><strong>Terdaftar pada:</strong> {{ $user->created_at->format('d M Y, H:i') }}</p>
</div>

<div>
    <a href="{{ route('users.edit', $user->id) }}">Ubah Pengguna</a>
    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus Pengguna</button>
    </form>
</div>

@endsection
