<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Showroom Mobil</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
</head>
<body>

    <div class="card login-card p-4">
        <div class="card-body">
            <h3 class="card-title text-center text-brown fw-bold mb-4">
                <i class="bi bi-lock-fill me-2"></i> Admin Login
            </h3>
            
            <!-- Tampilkan pesan error jika ada -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show small" role="alert">
                    @foreach ($errors->all() as $error)
                        <span class="d-block">{{ $error }}</span>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="">
                @csrf
                
                <div class="mb-3">
                    <label for="email" class="form-label small fw-bold">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Masukkan Email Admin">
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="password" class="form-label small fw-bold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-key"></i></span>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan Password">
                    </div>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn bg-brown text-white fw-bold py-2 rounded-pill">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Login
                    </button>
                </div>
            </form>
            
            <p class="text-center text-muted mt-3 small">&copy; {{ date('Y') }} Showroom Mobil</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>