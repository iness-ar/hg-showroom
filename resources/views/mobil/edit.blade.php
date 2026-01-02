@extends('main')
@section('title', 'Edit Mobil')
@section('content')
<div class="container-fluid p-4">
    <h2 class="mb-4 text-brown"><i class="bi bi-pencil-square me-2"></i> Edit Data Mobil</h2>
    <div class="card shadow-sm rounded-3">
        <div class="card-body">
            <form action="{{ route('mobil.update', $mobil->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="id_merk" class="form-label">Merk Mobil</label>
                        <select class="form-select" id="id_merk" name="id_merk" required>
                            <option value="" disabled>Pilih Merk...</option>
                            @foreach ($merks as $merk)
                            <option value="{{ $merk->id }}" {{ $mobil->id_merk == $merk->id ? 'selected' : '' }}>
                                {{ $merk->nama_merk }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="nama_mobil" class="form-label">Nama Mobil (Model)</label>
                        <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" value="{{ $mobil->nama_mobil }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tipe_mobil" class="form-label">Tipe/Varian Mobil</label>
                        <input type="text" class="form-control" id="tipe_mobil" name="tipe_mobil" value="{{ $mobil->tipe_mobil }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="warna" class="form-label">Warna Mobil</label>
                        <input type="text" class="form-control" id="warna" name="warna" value="{{ $mobil->warna }}" required>
                    </div>

                    <div class="col-md-6">
                        <label for="tahun" class="form-label">Tahun Produksi</label>
                        <input type="number" class="form-control" id="tahun" name="tahun" min="1900" max="{{ date('Y') + 1 }}" value="{{ $mobil->tahun }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="stok" class="form-label">Stok Unit</label>
                        <input type="number" class="form-control" id="stok" name="stok" min="1" value="{{ $mobil->stok }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="harga_jual" class="form-label">Harga Jual (Rp)</label>
                        <input type="text" class="form-control" id="harga_jual" name="harga_jual" value="{{ intval($mobil->harga_jual) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="harga_beli" class="form-label">Harga Beli (Rp)</label>
                        <input type="text" class="form-control" id="harga_beli" name="harga_beli" value="{{ intval($mobil->harga_beli) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label">Status Unit</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="Ready" {{ $mobil->status == 'Ready' ? 'selected' : '' }}>Ready</option>
                            <option value="Sold Out" {{ $mobil->status == 'Sold Out' ? 'selected' : '' }}>Sold Out</option>
                            <option value="Pre Order" {{ $mobil->status == 'Pre Order' ? 'selected' : '' }}>Pre Order</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="deskripsi" class="form-label">Deskripsi Mobil</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $mobil->deskripsi }}</textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="foto_mobil" class="form-label">Foto Mobil</label>
                        @if($mobil->foto_mobil)
                        <div class="mb-2">
                            <img src="{{ Storage::url($mobil->foto_mobil) }}" alt="Foto Mobil" class="img-thumbnail" style="max-height: 200px;">
                        </div>
                        @endif
                        <input type="file" class="form-control" id="foto_mobil" name="foto_mobil_baru" accept="image/*">
                        <div class="form-text">Kosongkan jika tidak ingin mengganti foto. Maksimal 2MB, JPG/PNG.</div>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-between">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Kembali</a>
                    <button type="submit" class="btn btn-outline-brown">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection