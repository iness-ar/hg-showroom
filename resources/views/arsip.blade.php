@extends('main')
@section('title', 'Arsip Mobil Terjual')
@section('content')

<h2 class="mb-3 text-brown">Arsip Mobil Terjual 🚗💨</h2>

<div class="container-fluid p-0">
    <div class="row gx-4 gy-4">
        @php
            $mobilTerjual = [
                [
                    'nama' => 'Honda Jazz',
                    'tahun' => '2020',
                    'harga' => '250.000.000',
                    'status' => 'Terjual',
                    'tanggal_jual' => '2025-10-15',
                    'foto' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjV4zxhyfTEfKBgCjJNzmYZiyYKhsR_VOiUw&s'
                ],
                [
                    'nama' => 'Suzuki Ertiga',
                    'tahun' => '2019',
                    'harga' => '180.000.000',
                    'status' => 'Terjual',
                    'tanggal_jual' => '2025-09-28',
                    'foto' => 'https://images.unsplash.com/photo-1597003808204-0f272d3e02cb?crop=entropy&cs=tinysrgb&fit=crop&h=300&w=400'
                ],
                [
                    'nama' => 'Toyota Yaris',
                    'tahun' => '2021',
                    'harga' => '285.000.000',
                    'status' => 'Terjual',
                    'tanggal_jual' => '2025-10-01',
                    'foto' => 'https://images.unsplash.com/photo-1617120365675-f94d2f2c6362?crop=entropy&cs=tinysrgb&fit=crop&h=300&w=400'
                ],
                [
                    'nama' => 'Daihatsu Xenia',
                    'tahun' => '2018',
                    'harga' => '150.000.000',
                    'status' => 'Terjual',
                    'tanggal_jual' => '2025-11-05',
                    'foto' => 'https://images.unsplash.com/photo-1615549336930-2f1e9efb19d8?crop=entropy&cs=tinysrgb&fit=crop&h=300&w=400'
                ],
                [
                    'nama' => 'Isuzu Panther',
                    'tahun' => '2015',
                    'harga' => '120.000.000',
                    'status' => 'Terjual',
                    'tanggal_jual' => '2025-08-01',
                    'foto' => 'https://images.unsplash.com/photo-1580226685084-25e1a2f9f8f4?crop=entropy&cs=tinysrgb&fit=crop&h=300&w=400'
                ],
            ];
        @endphp
        
        @foreach ($mobilTerjual as $mobil)
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="card shadow-lg rounded-3 h-100 overflow-hidden card-hover-effect">
                
                <div class="aspect-ratio-4x3">
                    <img src="{{ $mobil['foto'] }}" class="card-img-top img-fluid" alt="{{ $mobil['nama'] }}" onerror="this.onerror=null;this.src='https://placehold.co/400x300/A52A2A/fff?text=SOLD';">
                </div>
                
                <div class="card-body p-2">
                    <h5 class="text-dark fw-bold mb-1 fs-6">{{ $mobil['nama'] }}</h5>
                    
                    <p class="mb-1 text-muted small">Tipe Mobil</p>
                    <h6 class="text-brown fw-bolder mb-2 small">Rp {{ number_format(str_replace('.', '', $mobil['harga']), 0, ',', '.') }}</h6>
                    
                    <div class="d-flex justify-content-between mb-2 pb-1 border-bottom smaller text-muted">
                        <span><i class="bi bi-calendar-event me-1"></i> Tahun: **{{ $mobil['tahun'] }}**</span>
                        <span><i class="bi bi-calendar-check me-1"></i> Terjual: **{{ $mobil['tanggal_jual'] }}**</span> 
                    </div>

                    <div class="mb-3">
                        <span class="badge bg-danger me-1 rounded-pill"><i class="bi bi-hand-thumbs-up-fill me-1"></i> {{ $mobil['status'] }}</span>
                    </div>
                    
                    <div class="d-grid">
                        <button class="btn btn-outline-brown btn-sm rounded-pill fw-bold">Lihat Detail Arsip</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    @if (empty($mobilTerjual))
        <div class="alert alert-info text-center mt-5">
            <i class="bi bi-info-circle-fill me-2"></i> Belum ada data mobil yang ditandai sebagai 'Terjual' di arsip.
        </div>
    @endif
</div>
@endsection