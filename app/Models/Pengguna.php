<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'pengguna'; // Nama tabel
    protected $primaryKey = 'id_pengguna'; // Primary key
    protected $fillable = ['nama', 'jenis_pengguna', 'alamat', 'no_telepon']; // Kolom yang dapat diisi
}