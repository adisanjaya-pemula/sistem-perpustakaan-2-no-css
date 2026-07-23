<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    // Kolom yang boleh diisi lewat mass assignment (create()/update())
    protected $fillable = [
        'kode_buku',
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'stok',
    ];

    // Relasi: satu buku bisa punya banyak riwayat peminjaman
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
