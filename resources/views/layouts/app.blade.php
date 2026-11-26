<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'BarberFlow')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="site-header">
        <nav class="site-nav">
            <a class="brand" href="{{ route('services.index') }}">BarberFlow</a>
            <div class="nav-links">
                <a href="{{ route('services.index') }}">Layanan</a>
                <a href="{{ route('barbers.index') }}">Barber</a>
                <a href="{{ route('appointments.create') }}">Reservasi</a>
            </div>
        </nav>
    </header>

    <main class="container">
        @yield('content')
    </main>
</body>
</html>