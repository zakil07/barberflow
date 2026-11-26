@extends('layouts.app')

@section('title', 'Daftar Layanan')

@section('content')
    <h1 class="page-title">Daftar Layanan</h1>

    <p>
        <a class="secondary-button" href="{{ route('services.create') }}">
            Tambah layanan
        </a>
    </p>

    @if ($services->isEmpty())
        <p class="empty-message">Belum ada layanan.</p>
    @else
        <div class="card-grid">
            @foreach ($services as $service)
                <article class="card">
                    <h2>{{ $service->nama }}</h2>
                    <p>{{ $service->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                    <p>{{ $service->durasi_menit }} menit</p>
                    <p>
                        <strong>
                            Rp{{ number_format($service->harga, 0, ',', '.') }}
                        </strong>
                    </p>
                </article>
            @endforeach
        </div>

        <div class="pagination">
            {{ $services->links() }}
        </div>
    @endif
@endsection