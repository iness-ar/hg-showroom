@extends('layouts.main')
@section('title', 'Arsip Mobil Terjual')
@section('content')
<h2 class="mb-3 text-brown">Arsip Mobil Terjual 🚗</h2>
<hr>
<div class="row mb-3">
    <div class="col-md-4">
        <h6 class="text-brown"> Total Mobil Terjual : <span class="badge bg-danger">{{ $mobilTerjual }}</span></h6>
    </div>
   
</div>
<div class="container-fluid p-0" id="mobil-container">
    <div class="row gx-4 gy-4"> @forelse ($mobils as $mobil) <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="card shadow-lg rounded-3 h-100 overflow-hidden card-hover-effect">
                <div class="aspect-ratio-4x3"> <img src="{{ Storage::url($mobil->foto_mobil) }}" class="card-img-top img-fluid" alt="{{ $mobil->nama_mobil }}"> </div>
                <div class="card-body p-2">
                    <h5 class="text-dark fw-bold mb-1">{{ $mobil->nama_mobil }}</h5>
                    <p class="mb-1 text-muted small">{{ $mobil->tipe_mobil }}</p>
                    <h6 class="text-brown fw-bolder mb-2">Rp {{ number_format($mobil->harga_jual, 0, ',', '.') }}</h6>
                    <div class="d-flex justify-content-start mb-1 small text-muted">
                        <span><i class="bi bi-calendar-event me-1">
                            </i>Tahun: {{ $mobil->tahun }}</span>
                        <span class="ms-2">
                            <i class="bi bi-box me-1"></i>Stok: {{ $mobil->stok }}</span>
                    </div>
                    <div class="d-flex justify-content-start align-items-center mb-1 border-bottom small text-muted pb-1">
                        <span class="me-2">
                            <i class="bi bi-palette me-1">
                            </i>Warna: {{ $mobil->warna }}</span>
                             <span class="badge bg-danger rounded-pill px-3 py-1 fw-bold">{{ $mobil->status }}</span>
                    </div>
                    <p class="text-brown fw-bold mb-0" style="font-size:0.7rem;">Deskripsi:</p>
                    <p class="mb-2 small text-muted text-truncate" title="{{ $mobil->deskripsi }}">{{ $mobil->deskripsi }}</p>
                </div>
            </div>
        </div> @empty <div class="col-12">
            <div class="alert alert-warning mt-3" role="alert"> Belum ada mobil terjual. </div>
        </div> @endforelse </div>
</div> @endsection