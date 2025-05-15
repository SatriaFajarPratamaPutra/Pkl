@extends('app')

@section('title', 'Edit Anggota')

@section('content')
<div class="container mt-5">
    <h2>Edit Anggota</h2>
    <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $anggota->nama) }}" required>
        </div>
        <div class="mb-3">
            <label for="wilayah_id" class="form-label">Wilayah</label>
            <select class="form-select" id="wilayah_id" name="wilayah_id" required>
                @foreach ($subDivisis as $subDivisi)
                    <option value="{{ $subDivisi->id }}" {{ $anggota->wilayah_id == $subDivisi->id ? 'selected' : '' }}>
                        {{ $subDivisi->wilayah }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="Aktif" {{ $anggota->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Non Aktif" {{ $anggota->status == 'Non Aktif' ? 'selected' : '' }}>Non Aktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Anggota</button>
        <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
