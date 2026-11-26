<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Layanan BarberFlow</title>
</head>
<body>
    <h1>Layanan BarberFlow</h1>

    <p><a href="{{ route('services.create') }}">Tambah layanan</a></p>

    @forelse ($services as $service)
        <article>
            <h2>{{ $service->nama }}</h2>
            <p>{{ $service->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
            <p>{{ $service->durasi_menit }} menit — Rp{{ number_format($service->harga, 0, ',', '.') }}</p>
        </article>
    @empty
        <p>Belum ada layanan. Pastikan ServiceSeeder sudah dijalankan.</p>
    @endforelse

    {{ $services->links() }}
</body>
</html>