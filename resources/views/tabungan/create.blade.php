@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">➕ Tambah Rencana Tabungan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tabungan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="foto" class="form-label">📷 Foto Tabungan</label>
            <input type="file" class="form-control" name="foto" id="foto" required>
        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">📝 Judul Tabungan</label>
            <input type="text" class="form-control" name="judul" id="judul" value="{{ old('judul') }}" required>
        </div>

        <div class="mb-3">
            <label for="target_nominal" class="form-label">💰 Target Nominal</label>
            <input type="number" class="form-control" name="target_nominal" id="target_nominal" value="{{ old('target_nominal') }}" required>
        </div>

        <div class="mb-3">
            <label for="target_tanggal" class="form-label">📅 Target Tanggal Tercapai</label>
            <input type="date" class="form-control" name="target_tanggal" id="target_tanggal" value="{{ old('target_tanggal') }}" required>
        </div>

        <div class="mb-3">
            <label for="tercapai" class="form-label">✅ Status</label>
            <select class="form-select" name="tercapai" id="tercapai" required>
                <option value="0" {{ old('tercapai') == '0' ? 'selected' : '' }}>❌ Belum Tercapai</option>
                <option value="1" {{ old('tercapai') == '1' ? 'selected' : '' }}>✅ Tercapai</option>
            </select>
        </div>

        <div class="text-end">
            <a href="{{ route('home') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
@endsection
