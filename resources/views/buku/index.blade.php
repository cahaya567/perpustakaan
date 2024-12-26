@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<div class="container">
    <h1>Daftar Buku</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buku as $item)
                <tr>
                    <td>{{ $item->id_buku }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->penulis }}</td>
                    <td>{{ $item->penerbit }}</td>
                    <td>{{ $item->tahun_terbit }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>
                        <a href="{{ route('buku.edit', $item) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('buku.destroy', $item) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
