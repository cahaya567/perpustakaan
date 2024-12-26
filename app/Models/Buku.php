<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    public $incrementing = false;
    public $timestamps = false; // Nonaktifkan timestamps

    protected $fillable = ['id_buku', 'judul', 'penulis', 'penerbit', 'tahun_terbit', 'stok'];
}
