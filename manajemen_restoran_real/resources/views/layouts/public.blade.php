<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('scripts/app.js') }}"></script>
    <title>Manajemen Restoran | @yield('title')</title>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">

    @include('components.navbar')

    <main class="flex-1 flex items-center justify-center">
        @yield('content')
    </main>

    @yield('scripts')

    @include('components.footer')

</body>
</html>
