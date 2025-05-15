<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDivisi extends Model
{
    use HasFactory;

    // Nama tabel sesuai yang kamu sebutkan: 'sub_divisis'
    protected $table = 'sub_divisis';

    // Kolom yang bisa diisi massal
    protected $fillable = ['wilayah', 'deskripsi'];

    // Jika kamu ingin mendefinisikan relasi ke anggota
    public function anggotas()
    {
        return $this->hasMany(Anggota::class, 'wilayah_id');
    }
}
