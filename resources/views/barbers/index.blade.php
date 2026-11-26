<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Barber BarberFlow</title>
</head>
<body>
    <h1>Barber BarberFlow</h1>

    <p><a href="{{ route('barbers.create') }}">Tambah barber</a></p>

    @forelse ($barbers as $barber)
        <article>
            <h2>{{ $barber->nama_tampilan }}</h2>
            <p>{{ $barber->bio ?? 'Belum ada bio.' }}</p>
            <p>Status: {{ $barber->aktif ? 'Aktif' : 'Tidak aktif' }}</p>
        </article>
    @empty
        <p>Belum ada data barber.</p>
    @endforelse

    {{ $barbers->links() }}
</body>
</html>