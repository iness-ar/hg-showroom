<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Showroom Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
<div class="login-card">

    <h3 class="text-center fw-bold mb-4 text-brown">
        <i class="bi bi-shield-lock-fill me-2"></i> Admin Login
    </h3>
<form method="POST" action="{{ route('login.submit') }}" id="loginForm">
        @csrf

        <div class="form-floating mb-3 position-relative">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            <label for="email">Email</label>
            <i class="bi bi-envelope-fill input-icon"></i>
        </div>

    <div class="form-floating mb-4 position-relative">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        <label for="password">Password</label>
     <i class="bi bi-eye-slash-fill input-icon" id="togglePassword" style="cursor:pointer; pointer-events: auto;"></i>
    </div>

    <button type="submit" class="btn btn-premium w-100" id="loginBtn">
        <span id="btnText"><i class="bi bi-box-arrow-in-right me-1"></i> Login</span>
        <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
    </button>
    </form>
    <p class="text-center text-muted small mt-3">
        © {{ date('Y') }} Showroom Mobil — Admin Panel
    </p>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/login.js') }}"></script>

 
</body>

</html>
