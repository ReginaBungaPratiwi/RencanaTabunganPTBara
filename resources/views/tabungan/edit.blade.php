@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">✏️ Edit Rencana Tabungan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tabungan.update', $tabungan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">📝 Judul Tabungan</label>
            <input type="text" class="form-control" name="judul" id="judul" value="{{ old('judul', $tabungan->judul) }}" required>
        </div>

        <div class="mb-3">
            <label for="target_nominal" class="form-label">💰 Target Nominal</label>
            <input type="number" class="form-control" name="target_nominal" id="target_nominal" value="{{ old('target_nominal', $tabungan->target_nominal) }}" required>
        </div>

        <div class="mb-3">
            <label for="target_tanggal" class="form-label">📅 Target Tanggal</label>
            <input type="date" class="form-control" name="target_tanggal" id="target_tanggal" value="{{ old('target_tanggal', $tabungan->target_tanggal->format('Y-m-d')) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="foto" class="form-label">📷 Ganti Foto (opsional)</label>
            <input type="file" name="foto" id="foto" class="form-control">
            @if ($tabungan->foto)
                <small>Foto saat ini:</small><br>
                <img src="{{ asset('storage/' . $tabungan->foto) }}" alt="Foto Tabungan" width="150">
            @endif
        </div>

        <div class="text-end">
            <a href="{{ route('tabungan.index') }}" class="btn btn-secondary">← Kembali</a>
            <button type="submit" class="btn btn-warning">💾 Update</button>
        </div>
    </form>
</div>
@endsection
