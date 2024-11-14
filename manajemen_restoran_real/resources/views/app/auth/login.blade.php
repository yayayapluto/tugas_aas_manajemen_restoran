@extends("layouts.public")

@section("title", "Masuk")

@section("content")
<form action="{{ route("login.submit") }}" method="POST">
    @csrf
    <div>
        <label for="name">Username</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <button type="submit">Login</button>
    </div>
</form>
@endsection
