<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubDivisi;
use App\Models\Anggota;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahSubDivisi = SubDivisi::count();
        $jumlahAnggota = Anggota::count(); // Hitung jumlah baris di tabel sub_divisis
        return view('beranda', compact('jumlahSubDivisi', 'jumlahAnggota'));
    }
}
