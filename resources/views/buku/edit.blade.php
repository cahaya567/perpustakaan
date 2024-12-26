@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<div class="container">
    <h1>Edit Buku</h1>
    <form action="{{ route('buku.update', $buku->id_buku) }}" method="POST">
        @csrf
        @method('PUT') <!-- Menggunakan metode PUT untuk update -->
        <div class="form-group">
            <label for="id_buku">ID Buku</label>
            <input type="text" name="id_buku" id="id_buku" class="form-control" value="{{ $buku->id_buku }}" readonly>
        </div>
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ $buku->judul }}" required>
        </div>
        <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" name="penulis" id="penulis" class="form-control" value="{{ $buku->penulis }}">
        </div>
        <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input type="text" name="penerbit" id="penerbit" class="form-control" value="{{ $buku->penerbit }}">
        </div>
        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control" value="{{ $buku->tahun_terbit }}" required>
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" value="{{ $buku->stok }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
        <a href="{{ route('buku.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>
@endsection