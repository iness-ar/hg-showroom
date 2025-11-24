@extends('main')
@section('title', 'Edit Mobil: ' . $mobil->nama_mobil)
@section('content')

<h2 class="mb-4 text-brown mt-0"><i class="bi bi-pencil-square me-2"></i> Edit Data Mobil</h2>

<div class="card shadow-lg rounded-3 p-4">
    <div class="card-body">
        
        <form action="{{ route('mobil.update', $mobil->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row g-4">
                {{-- Kolom Kiri: Detail Mobil --}}
                <div class="col-md-8">
                    <h5 class="text-brown mb-3 border-bottom pb-2">Informasi Utama</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nama_mobil" class="form-label">Nama Mobil (Model)</label>
                            <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" value="{{ old('nama_mobil', $mobil->nama_mobil) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="id_merk" class="form-label">Merk Mobil</label>
                            <select class="form-select" id="id_merk" name="id_merk" required>
                                {{-- Loop Merk, $merks dikirim dari Controller --}}
                                @foreach ($merks as $merk)
                                    <option value="{{ $merk->id }}" {{ old('id_merk', $mobil->id_merk) == $merk->id ? 'selected' : '' }}>
                                        {{ $merk->nama_merk }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_merk')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="tipe_mobil" class="form-label">Tipe/Varian Mobil</label>
                            <input type="text" class="form-control" id="tipe_mobil" name="tipe_mobil" value="{{ old('tipe_mobil', $mobil->tipe_mobil) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tahun" class="form-label">Tahun Produksi</label>
                            <input type="number" class="form-control" id="tahun" name="tahun" min="1900" max="{{ date('Y') + 1 }}" value="{{ old('tahun', $mobil->tahun) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="stok" class="form-label">Stok Unit</label>
                            <input type="number" class="form-control" id="stok" name="stok" min="1" value="{{ old('stok', $mobil->stok) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="harga_beli" class="form-label">Harga Beli (Rp)</label>
                            <input type="number" class="form-control" id="harga_beli" name="harga_beli" value="{{ old('harga_beli', $mobil->harga_beli) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="harga_jual" class="form-label">Harga Jual (Rp)</label>
                            <input type="number" class="form-control" id="harga_jual" name="harga_jual" value="{{ old('harga_jual', $mobil->harga_jual) }}" required>
                        </div>
                        <div class="col-md-12">
                            <label for="status" class="form-label">Status Unit</label>
                            <select class="form-select" id="status" name="status" required>
                                @foreach (['Ready', 'Sold Out', 'Pre Order'] as $status)
                                    <option value="{{ $status }}" {{ old('status', $mobil->status) == $status ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="deskripsi" class="form-label">Deskripsi Mobil</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $mobil->deskripsi) }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="keterangan" class="form-label">Keterangan Tambahan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="2">{{ old('keterangan', $mobil->keterangan) }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Kolom Kanan: Foto --}}
                <div class="col-md-4">
                    <h5 class="text-brown mb-3 border-bottom pb-2">Foto Mobil</h5>
                    <div class="mb-3 text-center">
                        <p class="small text-muted mb-1">Foto Saat Ini:</p>
                        <img src="{{ Storage::url($mobil->foto_mobil) }}" class="img-fluid rounded-3 shadow-sm" alt="Foto {{ $mobil->nama_mobil }}" style="max-height: 200px; object-fit: cover;" onerror="this.onerror=null;this.src='https://placehold.co/300x200/5D4037/ffffff?text=No+Image';">
                    </div>

                    <label for="foto_mobil_baru" class="form-label">Ganti Foto Baru</label>
                    <input type="file" class="form-control" id="foto_mobil_baru" name="foto_mobil_baru" accept="image/*">
                    <div class="form-text">Biarkan kosong jika tidak ingin mengganti foto. Maks: 2MB.</div>
                    @error('foto_mobil_baru')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Batal / Kembali</a>
                <button type="submit" class="btn btn-brown fw-bold">
                    <i class="bi bi-floppy me-1"></i> Simpan Perubahan
                </button>
            </div>
        </form>

    </div>
</div>

@endsection