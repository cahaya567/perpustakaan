<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman'; // Nama tabel
    protected $primaryKey = 'id_peminjaman'; // Primary key yang benar
    public $incrementing = true; // Jika primary key menggunakan auto-increment
    protected $keyType = 'int'; // Tipe data primary key

    protected $fillable = [
        'id_buku',
        'id_pengguna',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];

    // Relasi ke Buku
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    // Relasi ke Pengguna
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }
}
