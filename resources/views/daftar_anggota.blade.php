@extends('app')

@section('title', 'Daftar Anggota')

<style>
.pagination {
    font-size: 0.85rem;
}
.pagination .page-link {
    padding: 0.3rem 0.5rem;
}
</style>

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h3>Daftar Anggota</h3>
        <a href="{{ route('anggota.create') }}" class="btn btn-success">Tambah Anggota</a>
    </div>

    <!-- Form Pencarian -->
    <form method="GET" action="{{ route('anggota.index') }}" class="row g-2 mb-4">
        <div class="col-md-3">
            <input type="text" name="nama" class="form-control" placeholder="Cari Nama" value="{{ request('nama') }}">
        </div>
        <div class="col-md-3">
    <select name="wilayah" class="form-select">
        <option value="">Semua Wilayah</option>
        @foreach($wilayahList as $wilayah)
            <option value="{{ $wilayah }}" {{ request('wilayah') == $wilayah ? 'selected' : '' }}>
                {{ $wilayah }}
            </option>
        @endforeach
    </select>
</div>

        <div class="col-md-3">
            <select name="status" class="form-select">
                <option value="">Semua Status</option>
                <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Non Aktif</option>
            </select>
        </div>
        <div class="col-md-3 d-flex gap-2">
            <button type="submit" class="btn btn-primary flex-grow-1">Cari</button>
            <a href="{{ route('anggota.index') }}" class="btn btn-secondary flex-grow-1">Reset</a>
        </div>
    </form>

    <!-- Tabel Daftar Anggota -->
    <table class="table table-bordered table-striped">
        <thead class="table-success text-center">
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Wilayah</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($anggotaList as $index => $anggota)
            <tr>
                <td class="text-center">{{ $anggotaList->firstItem() + $index }}</td>
                <td>{{ $anggota->nama }}</td>
                <td>{{ $anggota->subDivisi->wilayah ?? '-' }}</td>
                <td class="text-center">
                    @if(strtolower($anggota->status) === 'aktif')
                        <span class="badge bg-success">Aktif</span>
                    @else
                        <span class="badge bg-secondary">Nonaktif</span>
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn btn-primary btn-sm">Edit</a>

                    <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                    </form>

                    <form action="{{ route('anggota.toggleStatus', $anggota->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-warning btn-sm">
                            {{ strtolower($anggota->status) === 'aktif' ? 'Nonaktifkan' : 'Aktifkan' }}
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada data anggota.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    
</div>
@endsection
