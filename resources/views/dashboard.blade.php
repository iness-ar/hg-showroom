    @extends('main')
    @section('title', 'Dashboard Admin')
    @section('content')

    <h2 class="mb-3 text-brown mt-0">Dashboard</h2>
    <div class="row g-3 mb-4">
        <div class="col-lg-4 col-md-6">
            <div class="card shadow-sm rounded-3 h-100 card-hover-effect">
                <div class="card-body d-flex justify-content-between align-items-center p-3">
                    <div>
                        <h5 class="card-title text-muted mb-0 small">Total Mobil</h5>
                        <p class="fs-3 fw-bold text-brown mb-0">120</p>
                    </div>
                    <i class="bi bi-car-front-fill fs-2 text-brown"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card shadow-sm rounded-3 h-100 card-hover-effect">
                <div class="card-body d-flex justify-content-between align-items-center p-3">
                    <div>
                        <h5 class="card-title text-muted mb-0 small">Transaksi Bulan Ini</h5>
                        <p class="fs-3 fw-bold text-brown mb-0">34</p>
                    </div>
                    <i class="bi bi-receipt-cutoff fs-2 text-brown"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="card shadow-sm rounded-3 h-100 card-hover-effect">
                <div class="card-body d-flex justify-content-between align-items-center p-3">
                    <div>
                        <h5 class="card-title text-muted mb-0 small">Pelanggan Aktif</h5>
                        <p class="fs-3 fw-bold text-brown mb-0">56</p>
                    </div>
                    <i class="bi bi-person-check-fill fs-2 text-brown"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-brown mb-0"><i class="bi bi-box-seam me-1"></i> Stok Mobil Terbaru</h4>

        <div class="tombol-wrapper">

            <button class="btn btn-white-to-outline shadow-sm fw-bold" data-bs-toggle="modal" data-bs-target="#tambahMobilModal">
                <i class="bi bi-plus-circle me-1"></i> Tambah Data Mobil
            </button>
        </div>
    </div>

    <div class="container-fluid p-0">
        <div class="row gx-4 gy-4">
            @isset($mobils)
            @foreach ($mobils as $mobil)
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="card shadow-lg rounded-3 h-100 overflow-hidden card-hover-effect">
                    <div class="aspect-ratio-4x3">
                        <img src="{{ Storage::url($mobil->foto_mobil) }}" class="card-img-top img-fluid" alt="">
                    </div>
                    <div class="card-body p-2">
                        <h5 class="text-dark fw-bold mb-1 fs-6">{{ $mobil->nama_mobil }}</h5>

                        <p class="mb-1 text-muted small">{{ $mobil->tipe_mobil }}</p>
                        <h6 class="text-brown fw-bolder mb-2 small">Rp {{ number_format($mobil->harga_jual, 0, ',', '.') }}</h6>

                        <div class="d-flex justify-content-between mb-2 pb-1 border-bottom smaller text-muted">
                            <span><i class="bi bi-calendar-event me-1"></i> Tahun: {{ $mobil->tahun }}</span>
                            <span><i class="bi bi-box me-1"></i> Stok: {{ $mobil->stok }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="badge {{ $mobil->status == 'Ready' ? 'bg-success' : ($mobil->status == 'Sold Out' ? 'bg-danger' : 'bg-primary') }} me-1 rounded-pill">{{ $mobil->status }}</span>
                            <span class="badge bg-primary rounded-pill">Baru</span>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="{{ route('mobil.edit', $mobil->id) }}" class="btn btn-outline-warning w-50 btn-sm rounded-pill fw-bold">
                                <i class="bi bi-pencil-square me-1"></i> Edit
                            </a>

                            <button class="btn btn-outline-brown w-50 btn-sm rounded-pill fw-bold">
                                <i class="bi bi-archive me-1"></i> Arsip
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-12">
                <div class="alert alert-danger mt-3" role="alert">
                    <strong>Kesalahan Data:</strong> Variabel data mobil (<code>$mobils</code>) tidak terdefinisi. Ini biasanya terjadi jika Anda mengakses halaman ini melalui route yang tidak melewati `DashboardController`.
                </div>
            </div>
            @endisset
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="tambahMobilModal" tabindex="-1" aria-labelledby="tambahMobilModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-brown text-white">
                    <h5 class="modal-title" id="tambahMobilModalLabel"><i class="bi bi-car-front me-2"></i> Tambah Mobil Baru</h5>
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
                                    <option value="{{ $merk->id }}">{{ $merk->nama_merk }}</option>
                                    @endforeach
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
                                <label for="tahun" class="form-label">Tahun Produksi</label>
                                <input type="number" class="form-control" id="tahun" name="tahun" min="1900" max="{{ date('Y') + 1 }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="stok" class="form-label">Stok Unit</label>
                                <input type="number" class="form-control" id="stok" name="stok" min="1" required>
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
                                    <option value="Pre Order">Pre Order</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="deskripsi" class="form-label">Deskripsi Mobil</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="foto_mobil" class="form-label">Foto Mobil</label>
                                <input type="file" class="form-control" id="foto_mobil" name="foto_mobil" accept="image/*" required>
                                <div class="form-text">Maksimal ukuran file: 2MB. Format: JPG, PNG.</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" form="form-tambah-mobil" class="btn btn-outline-brown">Simpan Data Mobil</button>
                </div>
            </div>
        </div>
    </div>
    @endsection