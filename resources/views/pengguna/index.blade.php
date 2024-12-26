@extends('layouts.app')

@section('title', 'Daftar Pengguna')

@section('content')
<div class="container">
    <h1>Daftar Pengguna</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('pengguna.create') }}" class="btn btn-primary mb-3">Tambah Pengguna</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jenis Pengguna</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengguna as $item)
                <tr>
                    <td>{{ $item->id_pengguna }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jenis_pengguna }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_telepon }}</td>
                    <td>
                        <a href="{{ route('pengguna.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pengguna.destroy', $item) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection