<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['buku', 'pengguna'])->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $buku = Buku::where('stok', '>', 0)->get(); // Buku dengan stok tersedia
        $pengguna = Pengguna::all();

        return view('peminjaman.create', compact('buku', 'pengguna'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_buku' => 'required|exists:buku,id_buku',
            'id_pengguna' => 'required|exists:pengguna,id_pengguna',
            'tanggal_pinjam' => 'required|date',
        ]);

        // Kurangi stok buku
        $buku = Buku::findOrFail($validated['id_buku']);
        if ($buku->stok < 1) {
            return redirect()->back()->withErrors(['stok' => 'Stok buku tidak mencukupi']);
        }
        $buku->decrement('stok');

        // Simpan data peminjaman
        Peminjaman::create($validated);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dilakukan.');
    }

    public function edit(Peminjaman $peminjaman)
    {
        return view('peminjaman.edit', compact('peminjaman'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validated = $request->validate([
            'tanggal_kembali' => 'required|date',
        ]);

        // Update status peminjaman
        $peminjaman->update([
            'tanggal_kembali' => $validated['tanggal_kembali'],
            'status' => 'dikembalikan',
        ]);

        // Tambahkan stok buku kembali
        $buku = $peminjaman->buku;
        $buku->increment('stok');

        return redirect()->route('peminjaman.index')->with('success', 'Pengembalian berhasil diproses.');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $buku = $peminjaman->buku;
        if ($peminjaman->status === 'dipinjam') {
            $buku->increment('stok'); // Tambahkan stok kembali jika status belum dikembalikan
        }
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus.');
    }
}
