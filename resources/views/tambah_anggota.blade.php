@extends('app')

@section('title', 'Tambah Anggota')

@section('content')
<div class="container mt-5" style="max-width: 600px;">
    <h2>Tambah Anggota</h2>
    <form action="{{ route('anggota.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" 
                   class="form-control @error('nama') is-invalid @enderror" 
                   value="{{ old('nama') }}" required>
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="wilayah_id" class="form-label">Pilih Wilayah</label>
            <select name="wilayah_id" id="wilayah_id" 
                    class="form-select @error('wilayah_id') is-invalid @enderror" required>
                <option value="" disabled selected>-- Pilih Wilayah --</option>
                @foreach ($subDivisis as $subDivisi)
                    <option value="{{ $subDivisi->id }}" {{ old('wilayah_id') == $subDivisi->id ? 'selected' : '' }}>
                        {{ $subDivisi->wilayah }}
                    </option>
                @endforeach
            </select>
            @error('wilayah_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" 
                    class="form-select @error('status') is-invalid @enderror" required>
                <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Non Aktif" {{ old('status') == 'Non Aktif' ? 'selected' : '' }}>Non Aktif</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
