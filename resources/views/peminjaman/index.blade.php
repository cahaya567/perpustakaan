@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
<div class="container">
    <h1>Daftar Peminjaman</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary mb-3">Tambah Peminjaman</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Buku</th>
                <th>Pengguna</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjaman as $item)
                <tr>
                    <td>{{ $item->id_peminjaman }}</td>
                    <td>{{ $item->buku->judul }}</td>
                    <td>{{ $item->pengguna->nama }}</td>
                    <td>{{ $item->tanggal_pinjam }}</td>
                    <td>{{ $item->tanggal_kembali ?? '-' }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                    <td>
                        @if($item->status === 'dipinjam')
                        <form action="{{ route('peminjaman.update', ['peminjaman' => $item->id_peminjaman]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PUT')
                            <input type="date" name="tanggal_kembali" required>
                            <button class="btn btn-success btn-sm">Kembalikan</button>
                        </form>                        
                        @endif
                        <form action="{{ route('peminjaman.destroy', ['peminjaman' => $item->id_peminjaman]) }}" method="POST" style="display: inline;">
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
