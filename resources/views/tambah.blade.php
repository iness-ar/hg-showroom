<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showroom Mobil | Dashboard & Manajemen Stok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --bs-body-bg: #101524;
            --bs-body-color: #f8f9fa;
            --bs-primary: #ff5722;
            --bs-secondary: #3b4257;
            --card-bg: #1c2336;
            --input-bg: #2a334c;
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
            box-shadow: 0 5px 15px rgba(255, 87, 34, 0.3);
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--bs-secondary);
        }

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
            background-color: #e64a19;
            border-color: #e64a19;
            transform: translateY(-1px);
        }

        .form-control, .form-select, .form-control:focus, .form-select:focus {
            background-color: var(--input-bg);
            border: 1px solid var(--bs-secondary);
            color: var(--bs-body-color);
            border-radius: 0.5rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--bs-primary);
            box-shadow: 0 0 0 0.25rem rgba(255, 87, 34, 0.25);
            background-color: var(--input-bg);
        }

        @media (max-width: 991.98px) {
            .sidebar {
                display: none !important;
            }
            .main-content-area {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <div class="sidebar d-none d-lg-flex">
        <div class="sidebar-header">
            <h4 class="text-center fw-bolder text-accent" style="letter-spacing: 1px;">
                <i class="fas fa-car-side me-2"></i> Showroom App
            </h4>
        </div>

        <ul id="sidebar-nav" class="nav sidebar-nav flex-column mb-auto">
            <li class="nav-item">
                <a id="nav-dashboard" class="nav-link active" href="#" onclick="navigateTo('dashboard')">
                    <i class="fas fa-home me-3 fa-fw"></i> Beranda
                </a>
            </li>
            <li class="nav-item">
                <a id="nav-create" class="nav-link" href="#" onclick="navigateTo('create')">
                    <i class="fas fa-plus-circle me-3 fa-fw"></i> Tambah Mobil
                </a>
            </li>
            <li class="nav-item">
                <a id="nav-archive" class="nav-link" href="#" onclick="navigateTo('archive')">
                    <i class="fas fa-archive me-3 fa-fw"></i> Arsip Terjual
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <a class="nav-link text-danger" href="#" onclick="alert('Simulasi Logout')">
                <i class="fas fa-sign-out-alt me-3 fa-fw"></i> Logout
            </a>
        </div>
    </div>

    <div class="main-content-area w-100">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-lg-none sticky-top border-bottom border-secondary mb-4">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold text-accent" href="#">Showroom App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavMobile" aria-controls="navbarNavMobile" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavMobile">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="#" onclick="navigateTo('dashboard')">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="#" onclick="navigateTo('create')">Tambah Mobil</a></li>
                        <li class="nav-item"><a class="nav-link" href="#" onclick="navigateTo('archive')">Arsip Terjual</a></li>
                        <li class="nav-item"><a class="nav-link text-danger" href="#" onclick="alert('Simulasi Logout')">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <main id="app-content">
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const carsData = [
            { id: 1, brand: 'Lamborghini', model: 'Aventador', year: 2022, fuel_type: 'Bensin', mileage: 5000, price: 15000000000 },
            { id: 2, brand: 'Porsche', model: '911 Carrera', year: 2023, fuel_type: 'Bensin', mileage: 2500, price: 4500000000 },
            { id: 3, brand: 'Mercedes-Benz', model: 'S-Class', year: 2021, fuel_type: 'Diesel', mileage: 18000, price: 2200000000 },
            { id: 4, brand: 'Tesla', model: 'Model Y', year: 2024, fuel_type: 'Listrik', mileage: 1200, price: 1400000000 },
        ];

        const archivedCarsData = [
            { id: 101, brand: 'Audi', model: 'R8', year: 2020, sold_price: 3500000000, sold_date: '2024-05-10', buyer: 'Bapak Rudi' },
            { id: 102, brand: 'Toyota', model: 'Fortuner', year: 2018, sold_price: 450000000, sold_date: '2024-04-22', buyer: 'Ibu Anita' },
        ];

        let currentPage = 'dashboard';

        const formatRupiah = (number) => {
            return 'Rp ' + new Intl.NumberFormat('id-ID').format(number);
        };

        const showAlert = (message) => {
            const contentArea = document.getElementById('app-content');

            document.querySelectorAll('.app-alert').forEach(el => el.remove());

            const alertHtml = `
                <div class="app-alert alert alert-success alert-dismissible fade show card-elegant mb-4" role="alert">
                    <strong class="text-success"><i class="fas fa-check-circle me-2"></i> Berhasil!</strong> ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;

            contentArea.insertAdjacentHTML('afterbegin', alertHtml);
        }

        const navigateTo = (page) => {
            currentPage = page;
            updateActiveNav(page);
            renderContent(page);
        };

        const updateActiveNav = (activePage) => {
            const navs = ['dashboard', 'create', 'archive'];
            navs.forEach(page => {
                const navElement = document.getElementById(`nav-${page}`);
                if (navElement) {
                    navElement.classList.remove('active');
                }
            });

            const activeElement = document.getElementById(`nav-${activePage}`);
            if (activeElement) {
                activeElement.classList.add('active');
            }
        };

        const renderContent = (page) => {
            const contentArea = document.getElementById('app-content');

            document.querySelectorAll('.app-alert').forEach(el => el.remove());

            switch (page) {
                case 'dashboard':
                    contentArea.innerHTML = renderDashboard(carsData);
                    break;
                case 'create':
                    contentArea.innerHTML = renderCreateCarForm();
                    break;
                case 'archive':
                    contentArea.innerHTML = renderArchive(archivedCarsData);
                    break;
                default:
                    contentArea.innerHTML = 'Halaman tidak ditemukan.';
            }
        };

        const renderDashboard = (data) => {
            const count = data.length;
            let listContent;

            if (count === 0) {
                listContent = `
                    <div id="empty-state" class="text-center p-5 card-elegant">
                        <i class="fas fa-car-crash fa-5x text-secondary mb-3"></i>
                        <h4 class="text-light mt-3">Stok Mobil Kosong</h4>
                        <p class="text-muted">Tambahkan mobil baru untuk menampilkan inventaris showroom Anda.</p>
                        <a href="#" class="btn btn-accent rounded-pill mt-4 px-5 py-2" onclick="navigateTo('create')">
                            <i class="fas fa-plus me-2"></i> Tambah Mobil Pertama
                        </a>
                    </div>
                `;
            } else {
                const cards = data.map(car => `
                    <div class="col">
                        <div class="card card-elegant h-100 overflow-hidden shadow-lg border-0">
                            <div class="position-relative">
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
                                <button class="btn btn-sm btn-outline-light flex-grow-1 me-2 rounded-pill" onclick="showAlert('Simulasi Edit Mobil ID: ${car.id}')">
                                    <i class="fas fa-pen-to-square"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-danger rounded-pill" onclick="if(confirm('Yakin hapus ${car.model}?')) { showAlert('Mobil ${car.model} berhasil dihapus (Simulasi)'); }">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                `).join('');

                listContent = `<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">${cards}</div>`;
            }

            return `
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-5 pb-2 border-bottom border-secondary">
                        <h1 class="h2 mb-0 text-light fw-bold">Stok Mobil Tersedia (${count})</h1>
                        <a href="#" class="btn btn-accent rounded-pill px-4 py-2 shadow-lg" onclick="navigateTo('create')">
                            <i class="fas fa-plus me-2"></i> Tambah Mobil Baru
                        </a>
                    </div>
                    ${listContent}
                </div>
            `;
        };

        const renderCreateCarForm = () => {
            const handleSubmit = () => {
                showAlert('Data mobil baru berhasil ditambahkan! (Simulasi)');
                navigateTo('dashboard');
                return false;
            };

            setTimeout(() => {
                const form = document.getElementById('add-car-form');
                if (form) {
                    form.onsubmit = (e) => {
                        e.preventDefault();
                        handleSubmit();
                    };
                }
            }, 0);

            return `
                <div class="container-fluid">
                    <h1 class="h2 mb-5 pb-2 border-bottom border-secondary text-light fw-bold">
                        <i class="fas fa-plus-circle me-2 text-accent"></i> Tambah Mobil Baru ke Stok
                    </h1>

                    <div class="card card-elegant p-4 p-md-5 mx-auto" style="max-width: 800px;">
                        <form id="add-car-form">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="brand" class="form-label">Merk Mobil</label>
                                    <input type="text" class="form-control" id="brand" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="model" class="form-label">Model Mobil</label>
                                    <input type="text" class="form-control" id="model" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="year" class="form-label">Tahun Produksi</label>
                                    <input type="number" class="form-control" id="year" min="1900" max="${new Date().getFullYear()}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="fuel_type" class="form-label">Tipe Bahan Bakar</label>
                                    <select id="fuel_type" class="form-select" required>
                                        <option value="">Pilih...</option>
                                        <option value="Bensin">Bensin</option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="Listrik">Listrik</option>
                                        <option value="Hybrid">Hybrid</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="mileage" class="form-label">Jarak Tempuh (km)</label>
                                    <input type="number" class="form-control" id="mileage" required>
                                </div>

                                <div class="col-12">
                                    <label for="price" class="form-label">Harga Jual (Rp)</label>
                                    <input type="number" class="form-control" id="price" required>
                                </div>

                                <div class="col-12">
                                    <label for="description" class="form-label">Deskripsi & Fitur Utama</label>
                                    <textarea class="form-control" id="description" rows="4"></textarea>
                                </div>

                                <div class="col-12 mt-4 text-center">
                                    <button type="submit" class="btn btn-accent btn-lg rounded-pill px-5 shadow">
                                        <i class="fas fa-save me-2"></i> Simpan Mobil
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            `;
        };

        const renderArchive = (data) => {
            const count = data.length;
            let tableContent;

            if (count === 0) {
                tableContent = `
                    <div class="text-center p-5 card-elegant">
                        <i class="fas fa-box-open fa-5x text-secondary mb-3"></i>
                        <h4 class="text-light mt-3">Arsip Kosong</h4>
                        <p class="text-muted">Belum ada data mobil yang ditandai sebagai terjual.</p>
                    </div>
                `;
            } else {
                const rows = data.map(car => `
                    <tr>
                        <td class="fw-bold">${car.brand} ${car.model}</td>
                        <td>${car.year}</td>
                        <td class="text-accent fw-bold">${formatRupiah(car.sold_price)}</td>
                        <td>${car.sold_date}</td>
                        <td>${car.buyer}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-danger" onclick="if(confirm('Hapus arsip ini?')) { showAlert('Arsip ${car.model} dihapus! (Simulasi)'); }">
                                <i class="fas fa-times"></i>
                            </button>
                        </td>
                    </tr>
                `).join('');

                tableContent = `
                    <div class="card card-elegant p-4">
                        <div class="table-responsive">
                            <table class="table table-dark table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Mobil</th>
                                        <th>Tahun</th>
                                        <th>Harga Terjual</th>
                                        <th>Tanggal Jual</th>
                                        <th>Pembeli</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${rows}
                                </tbody>
                            </table>
                        </div>
                    </div>
                `;
            }

            return `
                <div class="container-fluid">
                    <h1 class="h2 mb-5 pb-2 border-bottom border-secondary text-light fw-bold">
                        <i class="fas fa-archive me-2 text-accent"></i> Arsip Mobil Terjual (${count})
                    </h1>
                    ${tableContent}
                </div>
            `;
        };


        document.addEventListener('DOMContentLoaded', () => {
            navigateTo(currentPage);
        });

    </script>
</body>
</html>
