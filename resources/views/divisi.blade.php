@extends('app')

@section('title', 'Sub Divisi')

@section('content')
<div class="container">
    <!-- Header dengan marker -->
    <div class="d-flex justify-content-center align-items-center mb-5" style="margin-top: 80px;">
        <a href="{{ url('/daftar') }}" class="text-dark me-5" style="font-size: 24px; text-decoration: none;">
            Daftar Sub Divisi
        </a>

        <!-- Marker garis vertikal -->
        <div style="width: 2px; height: 30px; background-color: #000;"></div>

        <p class="ms-5" style="font-size: 24px; margin-top: 17px;">Tambah Sub Divisi</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="text-end">
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
            Tambah Sub Divisi
        </button>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th style="width: 15%">Nomor Sub Divisi</th>
                <th style="width: 50%">Deskripsi</th>
                <th>Wilayah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($subDivisis as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->wilayah }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <button class="btn btn-sm btn-warning" 
                                data-bs-toggle="modal" 
                                data-bs-target="#editModal" 
                                data-id="{{ $item->id }}" 
                                data-deskripsi="{{ $item->deskripsi }}" 
                                data-wilayah="{{ $item->wilayah }}">
                                Edit
                            </button>

                            <form action="{{ route('divisi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">Belum ada data</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('divisi.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header"><h5 class="modal-title">Tambah Sub Divisi</h5></div>
            <div class="modal-body">
                <input type="text" name="wilayah" class="form-control" placeholder="Wilayah" required>
                <textarea name="deskripsi" class="form-control mb-2" placeholder="Deskripsi"></textarea>    
            </div>
            <div class="modal-footer"><button class="btn btn-success">Simpan</button></div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" class="modal-content" id="editForm">
            @csrf
            @method('PUT')
            <div class="modal-header"><h5 class="modal-title">Edit Sub Divisi</h5></div>
            <div class="modal-body">
                <input type="text" name="wilayah" id="edit-wilayah" class="form-control" required>
                <textarea name="deskripsi" id="edit-deskripsi" class="form-control mb-2"></textarea>          
            </div>
            <div class="modal-footer"><button class="btn btn-success">Update</button></div>
        </form>
    </div>
</div>

<script>
    const editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const wilayah = button.getAttribute('data-wilayah');
        const deskripsi = button.getAttribute('data-deskripsi');
        
        const form = document.getElementById('editForm');
        form.action = `/divisi/${id}`;
        document.getElementById('edit-deskripsi').value = deskripsi;
        document.getElementById('edit-wilayah').value = wilayah;
    });
</script>
@endsection
