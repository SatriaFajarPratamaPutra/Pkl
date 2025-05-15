<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\SubDivisi;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    // Tampilkan daftar anggota dengan fitur pencarian
    public function index(Request $request)
    {
        $query = Anggota::query();

        if ($request->nama) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }

        if ($request->wilayah) {
            $query->whereHas('subDivisi', function ($q) use ($request) {
                $q->where('wilayah', $request->wilayah);
            });
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $anggotaList = $query->paginate(10)->withQueryString();

        // Ambil semua wilayah unik dari tabel sub_divisis
        $wilayahList = SubDivisi::select('wilayah')->distinct()->pluck('wilayah');

        return view('daftar_anggota', compact('anggotaList', 'wilayahList'));
    }


    // Tampilkan form tambah anggota
    public function create()
    {
        $subDivisis = SubDivisi::all();
        return view('tambah_anggota', compact('subDivisis'));
    }

    // Simpan data anggota baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'wilayah_id' => 'required|exists:sub_divisis,id',
            'status' => 'required|in:Aktif,Non Aktif',
        ]);

        Anggota::create($request->only('nama', 'wilayah_id', 'status'));

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    // Tampilkan form edit anggota
    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        $subDivisis = SubDivisi::all();
        return view('edit_anggota', compact('anggota', 'subDivisis'));
    }

    // Update data anggota
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'wilayah_id' => 'required|exists:sub_divisis,id',
            'status' => 'required|in:Aktif,Non Aktif',
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggota->update($request->only('nama', 'wilayah_id', 'status'));

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    // Hapus anggota
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }

    // Toggle status anggota Aktif / Non Aktif
    public function toggleStatus($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->status = $anggota->status === 'Aktif' ? 'Non Aktif' : 'Aktif';
        $anggota->save();

        return redirect()->route('anggota.index')->with('success', 'Status anggota berhasil diubah.');
    }
}
