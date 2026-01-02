@extends('layouts.main')
@section('title', 'Riwayat Transaksi')
@section('content')
<h2 class="mb-3 text-brown">Riwayat Transaksi 🚗</h2>
<hr>
<div class="row mb-3">
    <div class="col-md-4">
        <h6>Jumlah Transaksi : <span class="badge bg-primary">{{ $totalTransaksi }}</span></h6>
    </div>
</div>
<div class="container-fluid p-0" id="mobil-container">
    <div class="row gx-4 gy-4">
        @forelse ($transaksis as $trx)
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="card shadow-lg rounded-3 h-100 overflow-hidden card-hover-effect">
                <div class="aspect-ratio-4x3">
                    <img src="{{ Storage::url($trx->mobil->foto_mobil ?? 'default.jpg') }}"
                        class="card-img-top img-fluid"
                        alt="{{ $trx->mobil->nama_mobil ?? 'Mobil' }}">
                </div>
                <div class="card-body p-2">
                    <h5 class="text-dark fw-bold mb-1">{{ $trx->mobil->nama_mobil ?? 'Tidak Diketahui' }}</h5>
                    <h6 class="text-brown fw-bolder mb-2">Rp {{ number_format($trx->total_pembelian, 0, ',', '.') }}</h6>
                    <div class="d-flex justify-content-start mb-1 small text-muted">
                        <span>
                            <i class="bi bi-person me-1"></i>
                            Pembeli: {{ $trx->nama_pembeli }}
                            <p class="mb-0"><i class="bi bi-telephone me-1"></i>{{ $trx->nomor_telepon }}</p>
                            <p class="mb-0"><i class="bi bi-geo-alt me-1"></i>{{ $trx->alamat }}</p>
                        </span>

                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-1 border-bottom small text-muted pb-1">
                        <span>Tipe : {{ $trx->tipe_transaksi }}</span>
                        <span class="badge 
                            {{ $trx->status_penjualan == 'Selesai' ? 'bg-success' : ($trx->status_penjualan == 'Pending' ? 'bg-warning' : 'bg-danger') }} 
                            rounded-pill px-3 py-1 fw-bold">
                            {{ $trx->status_penjualan }}
                        </span>
                    </div>
                    <p class="text-brown fw-bold mb-0" style="font-size:0.7rem;">Keterangan:</p>
                    <p class="mb-2 small text-muted text-truncate border-bottom pb-1" title="{{ $trx->keterangan }}">
                        {{ $trx->keterangan ?? '-' }}
                    </p>
                    @if($trx->bukti)
                    <div class="d-flex flex-wrap gap-2">
                        <!-- Tombol Edit Transaksi -->
                        <a class="btn btn-outline-warning flex-fill btn-sm rounded-pill fw-bold"
                            data-bs-toggle="modal"
                            data-bs-target="#editTransaksi{{ $trx->id }}">
                            <i class="bi bi-pencil-square me-1"></i> Edit
                        </a>

                        <!-- Tombol Lihat Bukti Transaksi -->
                        <a href="{{ asset('storage/' . $trx->bukti) }}" target="_blank"
                            class="btn btn-outline-primary flex-fill btn-sm rounded-pill fw-bold">
                            <i class="bi bi-file-earmark-text me-1"></i> Lihat Bukti Transaksi
                        </a>

                        <!-- Tombol Cetak Struk -->
                        <a href="{{ route('transaksi.struk', $trx->id) }}" target="_blank"
                            class="btn btn-outline-success flex-fill btn-sm rounded-pill fw-bold">
                            <i class="bi bi-printer me-1"></i> Cetak Struk
                        </a>

                        <!-- Opsional: Unduh PDF -->
                        <a href="{{ route('transaksi.pdf', $trx->id) }}" target="_blank"
                            class="btn btn-outline-info flex-fill btn-sm rounded-pill fw-bold">
                            <i class="bi bi-file-earmark-pdf me-1"></i> Unduh PDF
                        </a>
                    </div>
                    @endif

                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning mt-3" role="alert">
                Belum ada transaksi
            </div>
        </div>
        @endforelse
    </div>
</div>
<!-- Modal Edit Transaksi -->
@foreach ($transaksis as $trx)
<div class="modal fade" id="editTransaksi{{ $trx->id }}" tabindex="-1" aria-labelledby="editTransaksiLabel{{ $trx->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content text-start">
            <div class="modal-header bg-brown text-white">
                <h5 class="modal-title" id="editTransaksiLabel{{ $trx->id }}">
                    <i class="bi bi-pencil-square me-2"></i> Edit Transaksi : {{ $trx->mobil->nama_mobil }}
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('transaksi.update', $trx->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nama_pembeli{{ $trx->id }}" class="form-label">Nama Pembeli</label>
                            <input type="text" class="form-control" id="nama_pembeli{{ $trx->id }}" name="nama_pembeli" value="{{ $trx->nama_pembeli }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nomor_telepon{{ $trx->id }}" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="nomor_telepon{{ $trx->id }}" name="nomor_telepon" value="{{ $trx->nomor_telepon }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="alamat{{ $trx->id }}" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat{{ $trx->id }}" name="alamat" value="{{ $trx->alamat }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal_transaksi{{ $trx->id }}" class="form-label">Tanggal Transaksi</label>
                            <input type="date" class="form-control" id="tanggal_transaksi{{ $trx->id }}" name="tanggal_transaksi" value="{{ date('Y-m-d', strtotime($trx->tanggal_transaksi)) }}" required>

                        </div>
                        <div class="col-md-6">
                            <label for="tipe_transaksi{{ $trx->id }}" class="form-label">Tipe Transaksi</label>
                            <select class="form-select" id="tipe_transaksi{{ $trx->id }}" name="tipe_transaksi" required>
                                <option value="Cash" {{ $trx->tipe_transaksi == 'Cash' ? 'selected' : '' }}>Cash</option>
                                <option value="Kredit" {{ $trx->tipe_transaksi == 'Kredit' ? 'selected' : '' }}>Kredit</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="total_pembelian{{ $trx->id }}" class="form-label">Total Pembelian (Rp)</label>
                            <input type="number" class="form-control" id="total_pembelian{{ $trx->id }}" name="total_pembelian" value="{{ $trx->total_pembelian }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="status_penjualan{{ $trx->id }}" class="form-label">Status Penjualan</label>
                            <select class="form-select" id="status_penjualan{{ $trx->id }}" name="status_penjualan" required>
                                <option value="Pending" {{ $trx->status_penjualan == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Selesai" {{ $trx->status_penjualan == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="Batal" {{ $trx->status_penjualan == 'Batal' ? 'selected' : '' }}>Batal</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="keterangan{{ $trx->id }}" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan{{ $trx->id }}" name="keterangan" rows="2">{{ $trx->keterangan }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="bukti{{ $trx->id }}" class="form-label">Bukti Transaksi</label>
                            @if($trx->bukti)
                            <div class="mb-2">
                                <a href="{{ asset('storage/' . $trx->bukti) }}" target="_blank" class="btn btn-outline-primary btn-sm w-100 mb-1">
                                    <i class="bi bi-file-earmark-text me-1"></i> Lihat Bukti
                                </a>
                            </div>
                            @endif
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">
                                    Bukti Transaksi Baru (jika ada)
                                </label>
                                <input type="file" id="foto_mobil" name="foto_mobil" accept="image/*" hidden required>
                                <label for="foto_mobil"
                                    class="form-control d-flex flex-column justify-content-center align-items-center text-center py-1"
                                    style="cursor:pointer;">
                                    <i class="bi bi-cloud-upload fs-6 text-primary mb-0"></i>
                                    <div id="nama-file" class="small">
                                        Upload bukti transaksi
                                    </div>
                                    <small class="text-muted" style="font-size: 11px;">
                                        JPG / PNG • 2MB
                                    </small>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-outline-secondary fw-semibold" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-outline-brown fw-semibold">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection