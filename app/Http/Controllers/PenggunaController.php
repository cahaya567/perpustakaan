<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::all();
        return view('pengguna.index', compact('pengguna'));
    }

    public function create()
    {
        return view('pengguna.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_pengguna' => 'required|in:siswa,dosen',
            'alamat' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:20',
        ]);

        Pengguna::create($validated);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit(Pengguna $pengguna)
    {
        return view('pengguna.edit', compact('pengguna'));
    }

    public function update(Request $request, Pengguna $pengguna)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_pengguna' => 'required|in:siswa,dosen',
            'alamat' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:20',
        ]);

        $pengguna->update($validated);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}