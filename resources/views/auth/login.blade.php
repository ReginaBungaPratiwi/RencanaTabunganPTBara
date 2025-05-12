@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-center">
          <h3>Masuk ke Rencana Tabungan</h3>
        </div>

        <div class="card-body">
          <form action="{{ url('/login') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" required>
              @error('email')
                <div class="text-danger mt-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </form>

          @if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif


          <div class="text-center mt-3">
            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
