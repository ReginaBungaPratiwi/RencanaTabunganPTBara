@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">📋 Daftar Tabungan</h2>

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
    <div class="card mb-3">
        <img src="{{ $tabungan->foto_url }}" alt="Foto" width="100">
        <div class="card-body">
            <h5 class="card-title">{{ $tabungan->judul }}</h5>
            <p class="card-text">Target: Rp{{ number_format($tabungan->target_nominal) }}</p>
            <p class="card-text">Status: {{ $tabungan->status_text }}</p>
        </div>
    </div>
@endforeach

        </div>
    @endif
</div>
@endsection
