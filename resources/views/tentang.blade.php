<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang Showroom</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bg-showroom {
            background: url('https://wallpapers.com/images/hd/car-showroom-background-tzjh4h9fzh84hrqf.jpg') no-repeat center center/cover;
            height: 100vh;
        }
        .about-text {
            background: rgba(0,0,0,0.6);
            color: #fff;
            padding: 15px;
            border-radius: 8px;
        }
        .image-box img {
            width: 100%;
            height: 260px;
            object-fit: cover;
            border-radius: 15px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">Showroom</a>
        <div>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="/arsip">Arsip</a></li>
                <li class="nav-item"><a class="nav-link active fw-bold" href="/tentang">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="bg-showroom d-flex flex-column align-items-center justify-content-center text-center">

    <h2 class="text-white fw-bold mt-5">Tentang Showroom</h2>

    <div class="container mt-4">
        <div class="row justify-content-center g-3">
            <div class="col-md-4 image-box">
                <img src="https://i.ibb.co/rM8d2wy/showroom1.jpg" alt="img1">
            </div>
            <div class="col-md-4 image-box">
                <img src="https://i.ibb.co/MgsfC14/showroom2.jpg" alt="img2">
            </div>
            <div class="col-md-4 image-box">
                <img src="https://i.ibb.co/Jy0NMX4/showroom3.jpg" alt="img3">
            </div>
        </div>

        <p class="about-text mt-3">
            Aplikasi Pengelolaan Showroom adalah sistem berbasis web yang dirancang untuk
            membantu pengelola showroom mobil dalam menambahkan, menyimpan, dan mengatur
            data kendaraan secara efisien, cepat, dan akurat.
        </p>

        <a href="/" class="btn btn-outline-light px-4 mt-2">Kembali ke Beranda</a>
    </div>

    <footer class="text-white mt-4">
        <small>2025 SHOWROOM - Semua Hak Dilindungi</small>
    </footer>
</section>

</body>
</html>
