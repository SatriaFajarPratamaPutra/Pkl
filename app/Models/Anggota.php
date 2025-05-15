<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'wilayah_id', 'status'];

    public function subDivisi()
    {
        return $this->belongsTo(SubDivisi::class, 'wilayah_id');
    }
}
