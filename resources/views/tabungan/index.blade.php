@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>📋 Daftar Tabungan</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-danger">🚪 Logout</button>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3 text-end">
        <a href="{{ route('tabungan.create') }}" class="btn btn-primary">➕ Tambah Tabungan</a>
    </div>

    @if($tabungans->isEmpty())
        <p>Tidak ada tabungan. Yuk mulai menabung!</p>
    @else
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($tabungans as $tabungan)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $tabungan->foto_url }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Foto Tabungan">
                    <div class="card-body">
                        <h5 class="card-title">{{ $tabungan->judul }}</h5>
                        <p class="card-text">🎯 Target: Rp{{ number_format($tabungan->target_nominal, 0, ',', '.') }}</p>
                        <p class="card-text">📅 Tanggal: {{ \Carbon\Carbon::parse($tabungan->target_tanggal)->translatedFormat('d F Y') }}</p>
                        <p class="card-text">💰 Nominal Terkumpul Saat Ini: <strong>Rp{{ number_format($tabungan->nominal_terkumpul, 0, ',', '.') }}</strong></p>
                        <p class="card-text">📌 Status: {{ $tabungan->status_text }}</p>
                    </div>
                    <div class="card-footer bg-white text-end">
                        <a href="{{ route('tabungan.show', $tabungan->id) }}" class="btn btn-info btn-sm">👁️ Detail</a>
                        <a href="{{ route('tabungan.edit', $tabungan->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                        <form action="{{ route('tabungan.destroy', $tabungan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus tabungan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">🗑️ Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

