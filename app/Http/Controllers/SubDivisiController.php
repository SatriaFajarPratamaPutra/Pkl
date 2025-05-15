<?php

namespace App\Http\Controllers;

use App\Models\SubDivisi;

class SubDivisiController extends Controller
{
    public function index()
    {
        $subDivisis = SubDivisi::all();  // Ambil semua data sub divisi
        return view('daftar', compact('subDivisis'));  // Kirim data ke view
    }
}
