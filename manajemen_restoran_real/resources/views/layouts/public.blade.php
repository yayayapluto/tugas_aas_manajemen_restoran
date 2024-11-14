<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset("scripts/app.js")}}"></script>
    <title>Manajemen Restoran | @yield('title')</title>
</head>
<body>
    @include("components.navbar")

    @yield("content")
    
    @yield("scripts")

    @include("components.footer")
</body>
</html>