<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubDivisiController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('beranda');
});

Route::get('/divisi', [DivisiController::class, 'index'])->name('divisi.index');
Route::post('/divisi', [DivisiController::class, 'store'])->name('divisi.store');
Route::put('/divisi/{id}', [DivisiController::class, 'update'])->name('divisi.update');
Route::delete('/divisi/{id}', [DivisiController::class, 'destroy'])->name('divisi.destroy');

Route::get('/beranda', [DashboardController::class, 'index']);

Route::get('/daftar', [SubDivisiController::class, 'index']);

Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
Route::post('/anggota', [AnggotaController::class, 'store'])->name('anggota.store');
Route::get('/anggota/{id}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::put('/anggota/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
Route::delete('/anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');

// Tambah route untuk ubah status
Route::patch('/anggota/{id}/toggle-status', [AnggotaController::class, 'toggleStatus'])->name('anggota.toggleStatus');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::patch('/profil/update-password', [ProfilController::class, 'updatePassword'])->name('profil.updatePassword');
});
