@extends('layouts.app')

@section('title', 'Buat Reservasi')

@section('content')
    <h1 class="page-title">Buat Reservasi</h1>

    <form class="form-card" method="POST" action="{{ route('appointments.store') }}">
        @csrf

        <div class="form-group">
            <label for="barber_id">Pilih barber</label>
            <select name="barber_id" id="barber_id" required>
                <option value="">-- Pilih barber --</option>
                @foreach ($barbers as $barber)
                    <option value="{{ $barber->id }}" @selected(old('barber_id') == $barber->id)>
                        {{ $barber->nama_tampilan }}
                    </option>
                @endforeach
            </select>
            @error('barber_id')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="service_id">Pilih layanan</label>
            <select name="service_id" id="service_id" required>
                <option value="">-- Pilih layanan --</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" @selected(old('service_id') == $service->id)>
                        {{ $service->nama }} — Rp{{ number_format($service->harga, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
            @error('service_id')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tanggal_mulai">Tanggal dan waktu</label>
            <input
                type="datetime-local"
                name="tanggal_mulai"
                id="tanggal_mulai"
                value="{{ old('tanggal_mulai') }}"
                required
            >
            @error('tanggal_mulai')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="catatan">Catatan (opsional)</label>
            <textarea name="catatan" id="catatan">{{ old('catatan') }}</textarea>
            @error('catatan')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <button class="primary-button" type="submit">Buat reservasi</button>
    </form>
@endsection