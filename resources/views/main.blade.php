<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Showroom Admin')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
</head>

<body id="page-body">
    <div id="mobile-warning">
        Maaf, tampilan admin tidak mendukung layar kecil. Silakan buka di layar yang lebih besar.
    </div>
    <div id="wrapper" class="d-flex toggled">
        <div id="sidebar-wrapper" class="bg-white shadow-xl">
            <div class="sidebar-heading border-bottom text-center text-brown fw-bold d-flex align-items-center justify-content-start p-3">
                <img src="{{ asset('storage/logo-hg-sr.png') }}" alt="Showroom Admin" class="img-fluid flex-grow-1 sidebar-logo" style="max-height: 2.1rem; object-fit: contain;">
                <i class="bi bi-house-door sidebar-icon-small fs-4"></i>
            </div>
            <div class="list-group list-group-flush pt-2">
                <a href="dashboard" class="list-group-item list-group-item-action bg-brown-light text-brown py-3">
                    <i class="bi bi-car-front me-2 fs-5"></i>
                    <span class="sidebar-item-text">Dashboard (Data Mobil)</span>
                </a>
                <a href="arsip" class="list-group-item list-group-item-action text-brown py-3">
                    <i class="bi bi-archive me-2 fs-5"></i>
                    <span class="sidebar-item-text">Arsip (Mobil Terjual)</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action text-brown py-3">
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

                    <a class="navbar-brand fw-bold d-flex align-items-center text-brown" href="#">
                        Dashboard Admin
                    </a>

                    <div class="collapse navbar-collapse" id="navbarContent">
                        <form class="d-flex me-3 ms-auto me-3" role="search">
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="search" placeholder="Search..." aria-label="Search">
                                <button class="btn btn-outline-brown btn-sm" type="submit"><i class="bi bi-search"></i></button>
                            </div>
                        </form>

                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center text-brown" href="#" role="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-person-circle me-1 fs-5"></i> Admin
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                   
                                    <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid p-4">
                @yield('content')
            </div>

            <footer class="bg-brown text-white mt-5 sticky-bottom">
                <div class="container py-3 d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div>
                        &copy; {{ date('Y') }} Marcc. All rights reserved.
                    </div>
                    <div>
                        <a href="#" class="text-white text-decoration-none me-3">Privacy Policy</a>
                        <a href="#" class="text-white text-decoration-none">Terms of Service</a>
                    </div>
                </div>
            </footer>

        </div>
    </div>
    <div id="mobile-sidebar-overlay"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/layout.js') }}"></script>
    <script type="module" src="{{ asset('js/firebase-init.js') }}"></script>

</body>

</html>