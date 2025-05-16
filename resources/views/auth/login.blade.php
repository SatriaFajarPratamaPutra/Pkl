@extends('app')

@section('title', 'Login')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Login</h3>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username" required value="{{ old('username') }}">
            @error('username')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
        <a href="{{ route('register') }}" class="btn btn-link">Belum punya akun? Daftar</a>
    </form>
</div>
@endsection
