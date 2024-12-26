@extends('layouts.app')

@section('title', 'Tambah Pengguna')

@section('content')
<div class="container">
    <h1>Tambah Pengguna</h1>
    <form action="{{ route('pengguna.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jenis_pengguna">Jenis Pengguna</label>
            <select name="jenis_pengguna" id="jenis_pengguna" class="form-control" required>
                <option value="siswa">Siswa</option>
                <option value="dosen">Dosen</option>
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control">
        </div>
        <div class="form-group">
            <label for="no_telepon">No Telepon</label>
            <input type="text" name="no_telepon" id="no_telepon" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        <a href="{{ route('pengguna.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>
@endsection