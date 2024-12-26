@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Buku</h5>
                    <p class="card-text display-4">{{ $totalBuku }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Pengguna</h5>
                    <p class="card-text display-4">{{ $totalPengguna }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Buku yang Dipinjam</h5>
                    <p class="card-text display-4">{{ $totalDipinjam }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
