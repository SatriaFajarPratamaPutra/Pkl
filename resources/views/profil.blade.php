@extends('app')

@section('title', 'Ubah Password')

@section('content')
<div class="container mt-5" style="max-width: 500px;">
    <h3 class="mb-4">Ubah Password</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('profil.updatePassword') }}">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" class="form-control" value="{{ auth()->user()->username }}" readonly>
        </div>

        <div class="mb-3">
            <label for="current_password" class="form-label">Password Lama</label>
            <input type="password" id="current_password" name="current_password" class="form-control" required>
            @error('current_password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="new_password" class="form-label">Password Baru</label>
            <input type="password" id="new_password" name="new_password" class="form-control" required>
            @error('new_password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
            <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
            @error('new_password_confirmation')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
