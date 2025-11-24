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
    <div class="d-flex" id="wrapper">

        <div id="sidebar-wrapper" class="bg-white shadow-xl">
            <div class="sidebar-heading border-bottom text-center text-brown fw-bold d-flex align-items-center justify-content-start p-3">
                <i class="bi bi-speedometer2 fs-4 me-2"></i>
                <span class="sidebar-item-text fs-6">Showroom Admin</span>
            </div>

            <div class="list-group list-group-flush pt-2">
                <a href="#" class="list-group-item list-group-item-action bg-brown-light text-brown py-3">
                    <i class="bi bi-grid-fill me-3 fs-5"></i>
                    <span class="sidebar-item-text fw-bold">Dashboard</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action text-brown py-3">
                    <i class="bi bi-car-front me-3 fs-5"></i>
                    <span class="sidebar-item-text">Data Mobil (Stok)</span>
                </a>
                <a href="arsip_terjual.blade.php" class="list-group-item list-group-item-action text-brown py-3">
                    <i class="bi bi-archive-fill me-3 fs-5"></i>
                    <span class="sidebar-item-text">Arsip Terjual</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action text-brown py-3">
                    <i class="bi bi-receipt me-3 fs-5"></i>
                    <span class="sidebar-item-text">Transaksi</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action text-brown py-3">
                    <i class="bi bi-people me-3 fs-5"></i>
                    <span class="sidebar-item-text">Pelanggan</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action text-danger mt-3 py-3">
                    <i class="bi bi-box-arrow-right me-3 fs-5"></i>
                    <span class="sidebar-item-text">Logout</span>
                </a>
            </div>
        </div>

        <div id="page-content-wrapper">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
                <div class="container-fluid">
                    <!-- Tombol toggle sidebar -->
                    <button class="btn btn-light me-2" id="sidebarToggle" type="button">
                        <i class="bi bi-list fs-4 text-brown"></i>
                    </button>

                    <a class="navbar-brand fw-bold d-flex align-items-center text-brown" href="#">
                        Admin Dashboard
                    </a>

                    <div class="collapse navbar-collapse" id="navbarContent">
                        <button class="btn btn-light ms-auto me-3" id="darkModeToggle" title="Toggle Dark Mode">
                            <i class="bi bi-moon-stars-fill fs-5" id="darkModeIcon"></i>
                        </button>

                        <form class="d-flex me-3" role="search">
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
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li><a class="dropdown-item" href="#">Settings</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
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

            <footer class="bg-brown text-white mt-5">
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