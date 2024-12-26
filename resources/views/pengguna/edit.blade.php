@extends('layouts.app')

@section('title', 'Edit Pengguna')

@section('content')
<div class="container">
    <h1>Edit Pengguna</h1>
    <form action="{{ route('pengguna.update', $pengguna->id_pengguna) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $pengguna->nama }}" required>
        </div>
        <div class="form-group">
            <label for="jenis_pengguna">Jenis Pengguna</label>
            <select name="jenis_pengguna" id="jenis_pengguna" class="form-control" required>
                <option value="siswa" {{ $pengguna->jenis_pengguna == 'siswa' ? 'selected' : '' }}>Siswa</option>
                <option value="dosen" {{ $pengguna->jenis_pengguna == 'dosen' ? 'selected' : '' }}>Dosen</option>
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $pengguna->alamat }}">
        </div>
        <div class="form-group">
            <label for="no_telepon">No Telepon</label>
            <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="{{ $pengguna->no_telepon }}">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        <a href="{{ route('pengguna.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>
@endsection
