@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')
<div class="container">
    <h1>Tambah Peminjaman</h1>
    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_buku">Buku</label>
            <select name="id_buku" id="id_buku" class="form-control" required>
                @foreach($buku as $item)
                    <option value="{{ $item->id_buku }}">{{ $item->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_pengguna">Pengguna</label>
            <select name="id_pengguna" id="id_pengguna" class="form-control" required>
                @foreach($pengguna as $item)
                    <option value="{{ $item->id_pengguna }}">{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_pinjam">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>
@endsection
