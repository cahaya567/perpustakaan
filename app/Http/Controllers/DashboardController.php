<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Pengguna;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count(); // Hitung total buku
        $totalPengguna = Pengguna::count(); // Hitung total pengguna
        $totalDipinjam = Peminjaman::where('status', 'dipinjam')->count(); // Hitung buku yang sedang dipinjam

        return view('dashboard.index', compact('totalBuku', 'totalPengguna', 'totalDipinjam'));
    }
}
