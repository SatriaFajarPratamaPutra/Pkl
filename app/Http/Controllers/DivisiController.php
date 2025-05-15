<?php

namespace App\Http\Controllers;

use App\Models\SubDivisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {
        $subDivisis = SubDivisi::all();
        return view('divisi', compact('subDivisis'));
    }

    public function store(Request $request)
    {
        SubDivisi::create($request->validate([
            'deskripsi' => 'nullable|string',
            'wilayah' => 'required|string|max:255'
        ]));

        return redirect()->back()->with('success', 'Sub Divisi berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'wilayah' => 'required|string|max:255',
        ]);

        $subDivisi = SubDivisi::findOrFail($id);
        $subDivisi->update($validated);

        return redirect()->route('divisi.index')->with('success', 'Sub Divisi berhasil diperbarui!');
    }


    public function destroy($id)
    {
        SubDivisi::destroy($id);
        return redirect()->back()->with('success', 'Sub Divisi berhasil dihapus.');
    }
}
