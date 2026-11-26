@extends('layouts.app')

@section('title', 'Daftar Barber')

@section('content')
    <h1 class="page-title">Daftar Barber</h1>

    <p>
        <a class="secondary-button" href="{{ route('barbers.create') }}">Tambah barber</a>
    </p>

    @if ($barbers->isEmpty())
        <p class="empty-message">Belum ada data barber.</p>
    @else
        <div class="card-grid">
            @foreach ($barbers as $barber)
                <article class="card">
                    <h2>{{ $barber->nama_tampilan }}</h2>
                    <p>{{ $barber->bio ?? 'Belum ada bio.' }}</p>
                    <p>Status: {{ $barber->aktif ? 'Aktif' : 'Tidak aktif' }}</p>
                </article>
            @endforeach
        </div>

        <div class="pagination">
            {{ $barbers->links() }}
        </div>
    @endif
@endsection