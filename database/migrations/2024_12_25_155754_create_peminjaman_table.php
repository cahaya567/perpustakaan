<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('id_peminjaman'); // Primary key
            $table->foreignId('id_buku')->constrained('buku')->onDelete('cascade'); // Relasi ke tabel buku
            $table->foreignId('id_pengguna')->constrained('pengguna')->onDelete('cascade'); // Relasi ke tabel pengguna
            $table->date('tanggal_pinjam'); // Tanggal peminjaman
            $table->date('tanggal_kembali')->nullable(); // Tanggal pengembalian
            $table->enum('status', ['dipinjam', 'dikembalikan'])->default('dipinjam'); // Status peminjaman
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}