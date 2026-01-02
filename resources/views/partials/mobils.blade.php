<div class="row g-3 mb-4">
@foreach($mobils as $mobil)
    <div class="col-lg-4 col-md-6">
        <div class="card shadow-sm rounded-3 h-100 card-hover-effect">
            <div class="card-body d-flex justify-content-between align-items-center p-3">
                <div>
                    <h5 class="card-title text-muted mb-0 small">{{ $mobil->nama_mobil }}</h5>
                    <p class="fs-3 fw-bold text-brown mb-0">{{ $mobil->stok }}</p>
                </div>
                <i class="bi bi-car-front-fill fs-2 text-brown"></i>
            </div>
        </div>
    </div>
@endforeach
</div>
