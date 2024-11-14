@extends('layouts.public')

@section('title', 'Masuk')

@section('content')
    @auth
        <p>
            Hallo, {{ Auth::user()->name }}
        </p>
    @endauth
@endsection
