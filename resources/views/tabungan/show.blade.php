@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>📁 Detail Tabungan</h2>

    {{-- Foto Tabungan --}}
    <div class="mb-4">
        <img src="{{ $tabungan->foto_url }}" alt="Foto Tabungan" class="img-thumbnail" style="max-width: 300px;">
    </div>

    {{-- Informasi Tabungan --}}
    <ul class="list-group mb-4">
        <li class="list-group-item"><strong>📝 Judul:</strong> {{ $tabungan->judul }}</li>
        <li class="list-group-item"><strong>💰 Target Nominal:</strong> Rp {{ number_format($tabungan->target_nominal, 0, ',', '.') }}</li>
        <li class="list-group-item"><strong>💵 Terkumpul:</strong> Rp {{ number_format($tabungan->nominal_terkumpul, 0, ',', '.') }}</li>
        <li class="list-group-item"><strong>📅 Target Tanggal:</strong> {{ $tabungan->target_tanggal->format('d-m-Y') }}</li>
        <li class="list-group-item"><strong>✅ Status:</strong> {{ $tabungan->status_text }}</li>
    </ul>

    {{-- Form Tambah Setoran --}}
    <h4 class="mt-4">➕ Tambah Setoran</h4>
    <form action="{{ route('menabung.store', $tabungan->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nominal" class="form-label">💵 Nominal yang Ditabung</label>
            <input type="number" name="nominal" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">📅 Tanggal Menabung</label>
            <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">💾 Simpan Setoran</button>
    </form>
    <a href="{{ route('home') }}" class="btn btn-secondary mt-3">🔙 Kembali ke Home</a>


    {{-- Riwayat Setoran --}}
    <h4 class="mt-5">📜 Riwayat Setoran</h4>
    @if ($tabungan->menabungs->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tabungan->menabungs as $setoran)
                    <tr>
                        <td>{{ $setoran->tanggal->format('d-m-Y') }}</td>
                        <td>Rp {{ number_format($setoran->nominal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-muted">Belum ada setoran.</p>
    @endif
</div>
@endsection
