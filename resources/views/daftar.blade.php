@extends('app')

@section('title', 'Daftar Sub Divisi')

@section('content')
<div class="container mt-5">
    <div class="container">
    <div class="d-flex justify-content-center align-items-center mb-5" style="margin-top: 80px;">
        <p class="me-5" style="font-size: 24px; margin-top: 20px;">
            Daftar Sub Divisi
        </p>

        <!-- Marker garis vertikal -->
        <div style="width: 2px; height: 30px; background-color: #000;"></div>

        <a href="{{ url('/divisi') }}" class="text-dark ms-5" style="font-size: 24px;  text-decoration: none;">Tambah Sub Divisi</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="px-5">
        @forelse ($subDivisis as $index => $item)
            <div class="card mb-3 shadow-sm" style="background-color: #E8F5E9; border-left: 5px solid #66BB6A;">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Sub Divisi {{ $index + 1 }} ({{ $item->wilayah }})</h5>
                    <p class="card-text">{{ $item->deskripsi }}</p>
                </div>
            </div>
        @empty
            <div class="alert alert-info text-center">
                Belum ada data Sub Divisi
            </div>
        @endforelse
    </div>
</div>
@endsection
