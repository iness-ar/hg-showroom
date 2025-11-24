<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Stok Mobil Showroom Mewah</title>
    <!-- Bootstrap 5.3 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (Untuk ikon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* ======================== LUXURY DARK THEME VARIABLES ======================== */
        :root {
            --bs-body-bg: #101524; /* Background: Deep Midnight Blue */
            --bs-body-color: #f8f9fa; /* Text: White */
            --bs-primary: #91746c; /* Accent: Burn Orange (Sporty & Agressive) */
            --bs-secondary: #3b4257; /* Secondary Dark: For borders & subtle background */
            --card-bg: #1c2336; /* Card/Sidebar: Slightly Lighter Dark */
            --sidebar-width: 260px;
        }

        body {
            background-color: var(--bs-body-bg);
            color: var(--bs-body-color);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            margin: 0;
            padding: 0;
        }

        /* ======================== SIDEBAR STYLING ======================== */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--card-bg);
            border-right: 1px solid var(--bs-secondary);
            flex-shrink: 0;
            position: fixed;
            top: 0;
            bottom: 0;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            padding: 0;
        }

        .sidebar-header {
            padding: 2rem 1.5rem 1.5rem 1.5rem;
            border-bottom: 1px solid var(--bs-secondary);
            margin-bottom: 1rem;
        }

        .sidebar-nav {
            padding: 0 1rem;
        }

        .sidebar .nav-link {
            color: #ccc;
            padding: 0.75rem 1rem;
            margin-bottom: 0.5rem;
            border-radius: 0.75rem;
            transition: background-color 0.2s, color 0.2s, box-shadow 0.2s;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link:hover {
            background-color: var(--bs-secondary);
            color: #fff;
        }

        .sidebar .nav-link.active {
            background-color: var(--bs-primary);
            color: #fff;
            font-weight: 600;

        }

        .sidebar-footer {
            margin-top: auto;
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--bs-secondary);
        }

        /* ======================== CONTENT STYLING ======================== */
        .main-content-area {
            flex-grow: 1;
            padding: 2rem;
            margin-left: var(--sidebar-width);
            transition: margin-left 0.3s;
        }

        .card-elegant {
            background-color: var(--card-bg);
            border: 1px solid var(--bs-secondary);
            border-radius: 1.25rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.4);
        }

        .text-accent {
            color: var(--bs-primary) !important;
        }

        .btn-accent {
            background-color: var(--bs-primary);
            border-color: var(--bs-primary);
            color: #fff;
            font-weight: 600;
            transition: background-color 0.2s, transform 0.1s;
        }

        .btn-accent:hover {
            background-color:  #91746c;;
            border-color:  #91746c;;
            transform: translateY(-1px);
        }

        /* Mobile adjustments */
        @media (max-width: 991.98px) {
            .sidebar {
                display: none !important; /* Sembunyikan sidebar di mobile */
            }
            .main-content-area {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar (Hanya Desktop) -->
    <div class="sidebar d-none d-lg-flex">
        <div class="sidebar-header">
            <h4 class="text-center text-white font-extrabold text-xl flex items-center justify-center" style="letter-spacing: 1px;">
                <!-- Logo Gambar Eksternal (URL) -->
                <img
                    src="https://images.seeklogo.com/logo-png/9/2/nissan-logo-png_seeklogo-99769.png"

                    class="w-8 h-8 me-2 inline-block align-middle rounded-full border-2 border-white shadow-lg"
                alt="showroom logo"/>
            </h4>
        </div>

        <ul class="nav sidebar-nav flex-column mb-auto">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <i class="fas fa-home me-3 fa-fw"></i> Beranda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tambah">
                    <i class="fas fa-plus-circle me-3 fa-fw"></i> Tambah Mobil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-archive me-3 fa-fw"></i> Arsip Terjual
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <a class="nav-link text-danger" href="#">
                <i class="fas fa-sign-out-alt me-3 fa-fw"></i> Logout
            </a>
        </div>
    </div>

    <!-- Main Content Wrapper -->
    <div class="main-content-area w-100">
        <!-- Top Navbar (Hanya Mobile) -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-lg-none sticky-top border-bottom border-secondary mb-4">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold text-accent" href="#">Showroom App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavMobile" aria-controls="navbarNavMobile" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavMobile">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Tambah Mobil</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Arsip Terjual</a></li>
                        <li class="nav-item"><a class="nav-link text-danger" href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center mb-5 pb-2 border-bottom border-secondary">
                    <!-- Jumlah mobil akan diisi oleh JS -->
                    <h1 class="h2 mb-0 text-light fw-bold">Stok Mobil Tersedia (<span id="car-count">0</span>)</h1>

                    <!-- Tombol Tambah Mobil -->
                    <a href="#" class="btn btn-accent rounded-pill px-4 py-2 shadow-lg" onclick="alert('Ini akan mengarahkan ke halaman Tambah Mobil.'); return false;">
                        <i class="fas fa-plus me-2"></i> Tambah Mobil Baru
                    </a>
                </div>

                <!-- Kontainer untuk Daftar Mobil -->
                <div id="car-list" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                    <!-- Cards mobil akan diinjeksikan di sini oleh JavaScript -->
                </div>

                <!-- Template Kosong jika tidak ada data (diisi oleh JS) -->
                <div id="empty-state" class="text-center p-5 card-elegant d-none">
                    <i class="fas fa-car-crash fa-5x text-secondary mb-3"></i>
                    <h4 class="text-light mt-3">Stok Mobil Kosong</h4>
                    <p class="text-muted">Tambahkan mobil baru untuk menampilkan inventaris showroom Anda.</p>
                    <a href="#" class="btn btn-accent rounded-pill mt-4 px-5 py-2" onclick="alert('Ini akan mengarahkan ke halaman Tambah Mobil.'); return false;">
                        <i class="fas fa-plus me-2"></i> Tambah Mobil Pertama
                    </a>
                </div>
            </div>
        </main>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Data Dummy Mobil (Data Frontend Saja)
        const carsData = [
            { id: 1, brand: 'Lamborghini', model: 'Aventador', year: 2022, fuel_type: 'Bensin', mileage: 5000, price: 15000000000 },
            { id: 2, brand: 'Porsche', model: '911 Carrera', year: 2023, fuel_type: 'Bensin', mileage: 2500, price: 4500000000 },
            { id: 3, brand: 'Mercedes-Benz', model: 'S-Class', year: 2021, fuel_type: 'Diesel', mileage: 18000, price: 2200000000 },
            { id: 4, brand: 'Tesla', model: 'Model Y', year: 2024, fuel_type: 'Listrik', mileage: 1200, price: 1400000000 },
            { id: 5, brand: 'Ferrari', model: 'Roma', year: 2023, fuel_type: 'Bensin', mileage: 1500, price: 9800000000 },
            { id: 6, brand: 'BMW', model: 'M4 Competition', year: 2022, fuel_type: 'Bensin', mileage: 7000, price: 1800000000 },
            { id: 7, brand: 'BMW', model: 'M2 Competition', year: 2025, fuel_type: 'Bensin', mileage: 4000, price: 1870000000 },
        ];

        // Fungsi untuk memformat angka menjadi format Rupiah
        const formatRupiah = (number) => {
            return 'Rp ' + new Intl.NumberFormat('id-ID').format(number);
        };

        // Fungsi untuk merender daftar mobil
        const renderCars = (data) => {
            const carListContainer = document.getElementById('car-list');
            const carCountElement = document.getElementById('car-count');
            const emptyState = document.getElementById('empty-state');

            // Perbarui jumlah mobil
            carCountElement.textContent = data.length;

            if (data.length === 0) {
                // Tampilkan state kosong
                carListContainer.innerHTML = '';
                emptyState.classList.remove('d-none');
                return;
            }

            emptyState.classList.add('d-none');
            carListContainer.innerHTML = data.map(car => `
                <div class="col">
                    <div class="card card-elegant h-100 overflow-hidden shadow-lg border-0">
                        <div class="position-relative">
                            <!-- Placeholder Gambar Mobil -->
                            <img src="https://placehold.co/600x400/1c2336/ff5722?text=${encodeURIComponent(car.brand + ' ' + car.model)}"
                                 class="card-img-top"
                                 alt="${car.brand} ${car.model}"
                                 style="height: 200px; object-fit: cover; border-bottom: 3px solid var(--bs-primary);">
                            <span class="badge rounded-pill bg-primary position-absolute top-0 start-0 m-3 p-2 fw-bold">${car.year}</span>
                        </div>

                        <div class="card-body pb-0">
                            <h5 class="card-title text-light fw-bolder mb-1">${car.brand} <span class="text-accent">${car.model}</span></h5>
                            <p class="card-text small text-muted mb-3">
                                <i class="fas fa-road me-1"></i> ${new Intl.NumberFormat('id-ID').format(car.mileage)} km &bull;
                                <i class="fas fa-gas-pump me-1"></i> ${car.fuel_type}
                            </p>
                            <p class="h4 fw-bolder text-accent mb-3">
                                ${formatRupiah(car.price)}
                            </p>
                        </div>

                        <div class="card-footer bg-transparent border-top border-secondary d-flex justify-content-between p-3">
                            <button class="btn btn-sm btn-outline-light flex-grow-1 me-2 rounded-pill" onclick="alert('Mengedit mobil ID: ${car.id}')">
                                <i class="fas fa-pen-to-square"></i> Edit
                            </button>
                            <button class="btn btn-sm btn-danger rounded-pill" onclick="if(confirm('Apakah Anda yakin ingin menghapus mobil ini? (ID: ${car.id})')) { alert('Mobil dihapus!'); }">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
        };

        // Render saat DOM sudah siap
        document.addEventListener('DOMContentLoaded', () => {
            renderCars(carsData);
            // Anda bisa mencoba dengan array kosong untuk melihat state kosong:
            // renderCars([]);
        });
    </script>
</body>
</html>
