<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jastip.in - Masuk</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="login-page d-flex align-items-center justify-content-center vh-100">

    <div class="login-card p-4 shadow rounded-4 bg-white text-center" style="max-width: 380px; width: 100%;">
        <h2 class="fw-bold text-dark mb-2">Masuk</h2>
        <p class="text-secondary mb-4">Yuk masuk dulu, biar bisa langsung titip makanan tanpa keluar asrama.</p>

        <form action="#" method="POST" class="text-start">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" id="email" placeholder="Masukkan email anda" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" id="password" placeholder="Masukkan kata sandi anda" required>
                </div>
                <a href="#" class="text-end d-block mt-2 small text-orange">Lupa kata sandi?</a>
            </div>

            <button type="submit" class="btn btn-orange w-100 mt-3">Masuk</button>

            <p class="text-center mt-3 mb-0">Belum punya akun? 
                <a href="{{ route('register') }}" class="text-orange fw-bold">Daftar</a>
            </p>

        
        </form>
    </div>

</body>
</html>
