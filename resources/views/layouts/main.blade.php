<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Showroom Admin')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<div id="toast-box" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"></div>
<body data-toast-success="{{ session('success') ?? '' }}" 
    data-toast-error="{{ session('error') ?? '' }}" id="page-body">
   
    <div id="mobile-warning">
        Maaf, tampilan admin tidak mendukung layar kecil. Silakan buka di layar yang lebih besar.
    </div>
    <div id="wrapper" class="d-flex toggled">
        <div id="sidebar-wrapper" class="bg-white shadow-xl">
            <div class="sidebar-heading border-bottom text-center text-brown fw-bold d-flex align-items-center justify-content-start p-3">
                <img src="{{ asset('storage/logo-hg-sr.png') }}" alt="Showroom Admin" class="img-fluid flex-grow-1 sidebar-logo" style="max-height: 2.1rem; object-fit: contain;">
                <i class="bi bi-house-door-fill sidebar-icon-small fs-4"></i>
            </div>
            <div class="list-group list-group-flush pt-2">
                <a href="{{ route('mobil.dashboard') }}" class="list-group-item list-group-item-action text-brown py-3">
                    <i class="bi bi-car-front-fill me-2 fs-5"></i>
                    <span class="sidebar-item-text">Dashboard (Data Mobil)</span>
                </a>

                <a href="{{ route('mobil.arsip') }}" class="list-group-item list-group-item-action text-brown py-3">
                    <i class="bi bi-archive-fill me-2 fs-5"></i>
                    <span class="sidebar-item-text">Arsip (Mobil Terjual)</span>
                </a>

                <a href="{{ route('transaksi.riwayat') }}" class="list-group-item list-group-item-action text-brown py-3">
                    <i class="bi bi-receipt me-2 fs-5"></i>
                    <span class="sidebar-item-text">Riwayat Transaksi</span>
                </a>

                <a href="" class="list-group-item list-group-item-action">
                </a>
            </div>
        </div>
        <div id="page-content-wrapper">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow">
                <div class="container-fluid">
                    <button class="btn bg-brown-light me-2" id="sidebarToggle" type="button">
                        <i class="bi bi-list fs-4 text-brown"></i>
                    </button>
                    <div class="navbar-brand fw-bold d-flex align-items-center text-brown" href="#">
                        Dashboard Admin
                    </div>
                    <div class="collapse navbar-collapse" id="navbarContent">
                        <form class="d-flex ms-auto me-3" role="search">
                            <div class="input-group rounded-pill shadow-sm overflow-hidden" style="max-width: 350px; transition: all 0.3s;">
                                <input
                                    id="cardSearch"
                                    class="form-control form-control-sm border-0"
                                    type="search"
                                    placeholder="Cari mobil..."
                                    aria-label="Search"
                                    style="padding-left: 15px; font-size: 0.9rem;">
                                <button class="btn btn-brown d-flex align-items-center justify-content-center" type="submit" style="background-color:#5D4037; color:#fff; width: 45px; transition: all 0.2s;">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>

                        <div id="search-results" class="mt-3"></div>

                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center text-brown" href="#" role="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-person-circle me-1 fs-5"></i> Admin
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" style="display: none;" id="logout-form">
                                            @csrf
                                        </form>

                                        <a class="dropdown-item text-danger" href="#"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid p-4">
                @yield('content')
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <div id="mobile-sidebar-overlay"></div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="{{ asset('js/layout.js') }}"></script>
            <script type="module" src="{{ asset('js/firebase-init.js') }}"></script>

            <script>
                $(document).ready(function() {
                    // pastikan #cardSearch ada
                    if ($('#cardSearch').length) {
                        $('#cardSearch').on('keyup', function() {
                            var query = $(this).val().toLowerCase();

                            // pastikan ada container
                            if ($('#mobil-container').length) {
                                if (query.length > 0) {
                                    $('#mobil-container .col-xl-3').each(function() {
                                        var nama = $(this).find('h5').text().toLowerCase();
                                        var tipe = $(this).find('p.mb-0.text-muted.mb-1').text().toLowerCase();

                                        if (nama.includes(query) || tipe.includes(query)) {
                                            $(this).show();
                                        } else {
                                            $(this).hide();
                                        }
                                    });
                                } else {
                                    // jika input kosong, tampilkan semua card
                                    $('#mobil-container .col-xl-3').show();
                                }
                            }
                        });
                    }
                });
            </script>
            


</body>

</html>