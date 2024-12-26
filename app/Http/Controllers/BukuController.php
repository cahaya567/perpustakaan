<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // Tampilkan daftar buku
    public function index()
    {
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    // Form tambah buku
    public function create()
    {
        return view('buku.create');
    }

    // Simpan buku baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_buku' => 'required|string|unique:buku,id_buku',
            'judul' => 'required|string|max:255',
            'penulis' => 'nullable|string|max:255',
            'penerbit' => 'nullable|string|max:255',
            'tahun_terbit' => 'required|integer',
            'stok' => 'required|integer|min:1',
        ]);

        Buku::create($validated);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    // Form edit buku
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    // Update data buku di database
    public function update(Request $request, Buku $buku)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'nullable|string|max:255',
            'penerbit' => 'nullable|string|max:255',
            'tahun_terbit' => 'required|integer',
            'stok' => 'required|integer|min:1',
        ]);

        $buku->update($validated);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    // Hapus buku dari database
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}
