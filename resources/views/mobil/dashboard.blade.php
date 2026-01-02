@extends('layouts.main')
@section('title', 'Dashboard Admin')
@section('content')

<h2 class="mb-3 text-brown mt-0">Data Mobil yang Tersedia</h2>
<hr>
<div class="row g-3 mb-4" id="mobil-container">
    <div class="col-lg-4 col-md-6">
        <a href="{{ route('mobil.dashboard') }}" class="text-decoration-none text-dark">
            <div class="card shadow-sm rounded-3 h-100 card-hover-effect">
                <div class="card-body d-flex justify-content-between align-items-center p-3">
                    <div>
                        <h5 class="card-title text-muted mb-0 small">Total Mobil Tersedia</h5>
                        <p class="fs-3 fw-bold text-brown mb-0">{{ $totalMobilTersedia }}</p>
                    </div>
                    <i class="bi bi-car-front-fill fs-2 text-brown"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-6">
        <a href="{{ route('mobil.arsip') }}" class="text-decoration-none text-dark">
            <div class="card shadow-sm rounded-3 h-100 card-hover-effect">
                <div class="card-body d-flex justify-content-between align-items-center p-3">
                    <div>
                        <h5 class="card-title text-muted mb-0 small">Total Mobil terjual</h5>
                        <p class="fs-3 fw-bold text-brown mb-0">{{ $mobilTerjual }}</p>
                    </div>
                    <i class="bi bi-receipt-cutoff fs-2 text-brown"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-12">
        <a href="{{ route('transaksi.riwayat') }}" class="text-decoration-none text-dark">
            <div class="card shadow-sm rounded-3 h-100 card-hover-effect">
                <div class="card-body d-flex justify-content-between align-items-center p-3">
                    <div>
                        <h5 class="card-title text-muted mb-0 small">Jumlah Transaksi</h5>
                        <p class="fs-3 fw-bold text-brown mb-0">{{ $totalTransaksi }}</p>
                    </div>
                    <i class="bi bi-person-check-fill fs-2 text-brown"></i>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="text-brown mb-0">
        <i class="bi-car-front-fill me-1"></i> Stok Mobil Tersedia
    </h4>
    <div class="tombol-wrapper">
        <button class="btn btn-white-to-outline shadow-sm fw-bold" data-bs-toggle="modal" data-bs-target="#tambahMobilModal"><i class="bi bi-plus-circle me-1"></i> Tambah Data Mobil </button>
    </div>
</div>
<div class="container-fluid p-0" id="mobil-list">
    <div class="row gx-4 gy-4" id="mobil-container">
        @forelse ($mobils as $mobil)
        <div class="col-xl-3 col-lg-3 col-md-6" id="mobil-card-{{ $mobil->id }}">
            <div class="card shadow-lg rounded-3 h-100 overflow-hidden card-hover-effect">
                <div class="aspect-ratio-4x3">
                    <img
                        src="{{ Storage::url($mobil->foto_mobil) }}"
                        class="card-img-top img-fluid"
                        alt="">
                </div>
                <div class="card-body p-2">

                    <!-- Merk + Plat Nomor -->
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <p class="mb-0 text-muted small">
                            {{ $mobil->merk->nama_merk ?? '-' }}
                        </p>

                        <div class="plate-number">
                            {{ $mobil->no_polisi ?? '-' }}
                        </div>
                    </div>

                    <h5 class="text-dark mb-0 fw-bold large">
                        {{ $mobil->nama_mobil }}
                    </h5>

                    <!-- Tipe Mobil -->
                    <p class="mb-0 text-muted small">
                        {{ $mobil->tipe_mobil }}
                    </p>

                    <!-- Harga -->
                    <h6 class="text-brown mb-1 fw-bolder medium">
                        Rp {{ number_format($mobil->harga_jual, 0, ',', '.') }}
                    </h6>

                    <!-- Tahun & Warna -->
                    <div class="d-flex justify-content-start mb-1 small text-muted">
                        <span>
                            <i class="bi bi-calendar-event"></i>
                            Tahun : {{$mobil->tahun }}
                        </span>
                        <span class="ms-1">
                            | <i class="bi bi-droplet"></i>
                            Warna : {{$mobil->warna }}
                        </span>
                    </div>

                    <!-- Badge Status Tetap di sini -->
                    <div class="d-flex justify-content-start align-items-center mb-1 border-bottom small text-muted pb-1">
                        <span class="badge {{ $mobil->status == 'Ready' ? 'bg-success' : ($mobil->status == 'Sold Out' ? 'bg-danger' : 'bg-primary') }} rounded-pill px-3 py-1 fw-bold">
                            {{ $mobil->status }}
                        </span>
                    </div>

                    <!-- Deskripsi -->
                    <p class="text-brown fw-bold mb-0" style="font-size:0.7rem;">
                        Deskripsi:
                    </p>
                    <p class="mb-2 small text-muted deskripsi-mobil border-bottom pb-1 cursor-pointer"
                        data-bs-toggle="modal"
                        data-bs-target="#deskripsiModal{{ $mobil->id }}">
                        {{ $mobil->deskripsi }}
                    </p>

                    <!-- Info Audit -->
                    <p class="mb-1 text-muted cursor-pointer fst-italic" style="font-size:0.65rem;"
                        data-bs-toggle="modal"
                        data-bs-target="#auditModal{{ $mobil->id }}">
                        *Klik untuk melihat Info Audit
                    </p>

                    <!-- Tombol Edit & Transaksi -->
                    <div class="d-flex gap-2">
                        <a class="btn btn-outline-warning w-50 btn-sm rounded-pill fw-bold" data-bs-toggle="modal" data-bs-target="#editMobil{{ $mobil->id }}">
                            <i class="bi bi-pencil-square me-1"></i> Edit
                        </a>
                        <a class="btn btn-outline-brown w-50 btn-sm rounded-pill fw-bold" data-bs-toggle="modal" data-bs-target="#transaksiModal" data-id="{{ $mobil->id }}">
                            <i class="bi bi-receipt me-1"></i> Transaksi
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal Audit -->
        <div class="modal fade" id="auditModal{{ $mobil->id }}" tabindex="-1" aria-labelledby="auditModalLabel{{ $mobil->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-brown text-white">
                        <h5 class="modal-title" id="auditModalLabel{{ $mobil->id }}">
                            Info Audit: {{ $mobil->nama_mobil }}
                        </h5>

                    </div>
                    <div class="modal-body">
                        <p class="mb-1 text-muted">
                            Dibuat oleh: <strong>{{ $mobil->created_by->name ?? 'System' }}</strong><br>
                            Terakhir diubah oleh: <strong>{{ $mobil->updated_by->name ?? 'System' }}</strong><br>
                            Pada: {{ $mobil->updated_at ? $mobil->updated_at->format('d M Y H:i') : '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal deskripsi -->
        <div class="modal fade" id="deskripsiModal{{ $mobil->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-brown text-white">
                        <h5 class="modal-title">
                            Deskripsi {{ $mobil->nama_mobil }}
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <p class="text-muted mb-0">
                            {{ $mobil->deskripsi }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-danger mt-3" role="alert">
                <strong>Kesalahan Data : </strong>
                Variabel data mobil (<code>$mobils</code>) tidak terdefinisi.
            </div>
        </div>
        @endforelse
    </div>
    <!-- Pagination -->
    <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
        <div class="text-muted small">
            Showing {{ $mobils->firstItem() }} to {{ $mobils->lastItem() }} of {{ $mobils->total() }} results
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-sm mb-0">
                {{-- Previous --}}
                @if ($mobils->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
                @else
                <li class="page-item">
                    <a class="page-link" href="{{ $mobils->previousPageUrl() }}">&laquo;</a>
                </li>
                @endif

                {{-- Angka halaman --}}
                @foreach ($mobils->getUrlRange(1, $mobils->lastPage()) as $page => $url)
                <li class="page-item {{ $mobils->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
                @endforeach

                {{-- Next --}}
                @if ($mobils->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $mobils->nextPageUrl() }}">&raquo;</a>
                </li>
                @else
                <li class="page-item disabled">
                    <span class="page-link">&raquo;</span>
                </li>
                @endif
            </ul>
        </nav>
    </div>
    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahMobilModal" tabindex="-1" aria-labelledby="tambahMobilModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-brown text-white">
                    <h5 class="modal-title" id="tambahMobilModalLabel">
                        <i class="bi bi-car-front me-2"> </i> Tambah Mobil Baru
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-tambah-mobil" action="{{ route('mobil.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="id_merk" class="form-label">Merk Mobil</label>
                                <select class="form-select" id="id_merk" name="id_merk" required>
                                    <option value="" disabled selected>Pilih Merk...</option>
                                    @foreach ($merks as $merk)
                                    <option value="{{ $merk->id }}">{{ $merk->nama_merk }}</option> @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="nama_mobil" class="form-label">Nama Mobil (Model)</label>
                                <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" required>
                            </div>
                            <div class="col-md-6">
                                <label for="tipe_mobil" class="form-label">Tipe/Varian Mobil</label>
                                <input type="text" class="form-control" id="tipe_mobil" name="tipe_mobil" required>
                            </div>
                            <div class="col-md-6">
                                <label for="no_polisi" class="form-label">Plat Nomor</label>
                                <input type="text" class="form-control" id="no_polisi" name="no_polisi" required>
                            </div>
                            <div class="col-md-6">
                                <label for="warna" class="form-label">Warna</label>
                                <input type="text" class="form-control" id="warna" name="warna" required>
                            </div>
                            <div class="col-md-6">
                                <label for="tahun" class="form-label">Tahun Produksi</label>
                                <input type="number" class="form-control" id="tahun" name="tahun" min="1900" max="{{ date('Y') + 1 }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="harga_jual" class="form-label">Harga Jual (Rp)</label>
                                <input type="number" class="form-control" id="harga_jual" name="harga_jual" required>
                            </div>
                            <div class="col-md-6">
                                <label for="harga_beli" class="form-label">Harga Beli (Rp)</label>
                                <input type="number" class="form-control" id="harga_beli" name="harga_beli" required>
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status Unit</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="Ready">Ready</option>
                                    <option value="Sold Out">Sold Out</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="deskripsi" class="form-label">Deskripsi Mobil</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                            </div>
                            <!-- <div class="col-md-12">
                            <label for="foto_mobil" class="form-label">Foto Mobil</label>
                            <input type="file" class="form-control" id="foto_mobil" name="foto_mobil" accept="image/*" required>
                            <div class="form-text">Maksimal ukuran file: 2MB. Format: JPG, PNG.
                            </div>
                        </div> -->
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">
                                    Foto Mobil
                                </label>
                                <input type="file" id="foto_mobil" name="foto_mobil" accept="image/*" hidden required>
                                <label for="foto_mobil"
                                    class="form-control d-flex flex-column justify-content-center align-items-center text-center py-1"
                                    style="cursor:pointer;">
                                    <i class="bi bi-cloud-upload fs-6 text-primary mb-0"></i>
                                    <div id="nama-file" class="small">
                                        Upload foto mobil
                                    </div>
                                    <small class="text-muted" style="font-size: 11px;">
                                        JPG / PNG • 2MB
                                    </small>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary fw-semibold" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" form="form-tambah-mobil" class="btn btn-outline-brown fw-semibold">Simpan Data Mobil</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit -->
    @foreach ($mobils as $mobil)
    <div class="modal fade" id="editMobil{{ $mobil->id }}" tabindex="-1" aria-labelledby="editMobilLabel{{ $mobil->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content text-start">
                <div class="modal-header bg-brown text-white">
                    <h5 class="modal-title" id="editMobilLabel{{ $mobil->id }}">
                        <i class="bi bi-pencil-square me-2"></i> Edit Data Mobil : {{ $mobil->nama_mobil }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('mobil.update', $mobil->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="id_merk{{ $mobil->id }}" class="form-label">Merk Mobil</label>
                                <select class="form-select" id="id_merk{{ $mobil->id }}" name="id_merk" required>
                                    <option value="" disabled>Pilih Merk...</option>
                                    @foreach ($merks as $merk)
                                    <option value="{{ $merk->id }}" {{ $mobil->id_merk == $merk->id ? 'selected' : '' }}>
                                        {{ $merk->nama_merk }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="nama_mobil{{ $mobil->id }}" class="form-label">Nama Mobil (Model)</label>
                                <input type="text" class="form-control" id="nama_mobil{{ $mobil->id }}" name="nama_mobil" value="{{ $mobil->nama_mobil }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="tipe_mobil{{ $mobil->id }}" class="form-label">Tipe/Varian Mobil</label>
                                <input type="text" class="form-control" id="tipe_mobil{{ $mobil->id }}" name="tipe_mobil" value="{{ $mobil->tipe_mobil }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="no_polisi" class="form-label">Plat Nomor</label>
                                <input type="text" class="form-control" id="no_polisi" name="no_polisi" value="{{ $mobil->no_polisi }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="warna{{ $mobil->id }}" class="form-label">Warna Mobil</label>
                                <input type="text" class="form-control" id="warna{{ $mobil->id }}" name="warna" value="{{ $mobil->warna }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="tahun{{ $mobil->id }}" class="form-label">Tahun Produksi</label>
                                <input type="number" class="form-control" id="tahun{{ $mobil->id }}" name="tahun" min="1900" max="{{ date('Y') + 1 }}" value="{{ $mobil->tahun }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="harga_jual{{ $mobil->id }}" class="form-label">Harga Jual (Rp)</label>
                                <input type="text" class="form-control" id="harga_jual{{ $mobil->id }}" name="harga_jual" value="{{ intval($mobil->harga_jual) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="harga_beli{{ $mobil->id }}" class="form-label">Harga Beli (Rp)</label>
                                <input type="text" class="form-control" id="harga_beli{{ $mobil->id }}" name="harga_beli" value="{{ intval($mobil->harga_beli) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="status{{ $mobil->id }}" class="form-label">Status Unit</label>
                                <select class="form-select" id="status{{ $mobil->id }}" name="status" required>
                                    <option value="Ready" {{ $mobil->status == 'Ready' ? 'selected' : '' }}>Ready</option>
                                    <option value="Sold Out" {{ $mobil->status == 'Sold Out' ? 'selected' : '' }}>Sold Out</option>
                                    <option value="Pre Order" {{ $mobil->status == 'Pre Order' ? 'selected' : '' }}>Pre Order</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="deskripsi{{ $mobil->id }}" class="form-label">Deskripsi Mobil</label>
                                <textarea class="form-control" id="deskripsi{{ $mobil->id }}" name="deskripsi" rows="3">{{ $mobil->deskripsi }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="foto_mobil{{ $mobil->id }}" class="form-label">Foto Mobil</label>
                                @if($mobil->foto_mobil)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($mobil->foto_mobil) }}" alt="Foto Mobil" class="img-thumbnail" style="max-height: 100px;">
                                </div>
                                @endif
                                <input type="file" class="form-control" id="foto_mobil{{ $mobil->id }}" name="foto_mobil" accept="image/*">
                                <div class="form-text">Kosongkan jika tidak ingin mengganti foto.</div>
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

    <!-- Modal Transaksi -->
    <div class="modal fade" id="transaksiModal" tabindex="-1" aria-labelledby="transaksiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-brown text-white">
                    <h5 class="modal-title" id="transaksiModalLabel">
                        <i class="bi bi-receipt me-2"></i> Input Data Transaksi
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formTransaksi" action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="mobil_id" id="mobil_id">
                        <input type="hidden" name="created_by" value="{{ auth()->id() }}">

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama Pembeli</label>
                                <input type="text" class="form-control" name="nama_pembeli" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" name="nomor_telepon" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" rows="3" required></textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Transaksi</label>
                                <input type="datetime-local" class="form-control" name="tanggal_transaksi" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Tipe Transaksi</label>
                                <select name="tipe_transaksi" class="form-select" required>
                                    <option value="" disabled selected>Pilih...</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Kredit">Kredit</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Total Pembelian (Rp)</label>
                                <input type="number" class="form-control" name="total_pembelian" min="0" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Status Penjualan</label>
                                <select name="status_penjualan" class="form-select" required>
                                    <option value="" disabled selected>Pilih...</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Selesai">Selesai</option>
                                    <option value="Batal">Batal</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea class="form-control" name="keterangan" rows="2"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bukti Transaksi</label>
                            <input type="file" class="form-control" name="bukti" accept=".jpg,.jpeg,.png,.pdf" required>
                            <small class="text-muted">JPG / PNG / PDF • Maks 2MB</small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary fw-semibold" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-outline-brown fw-semibold" form="formTransaksi">Simpan Transaksi</button>
                </div>
            </div>
        </div>
    </div>
    @endsection