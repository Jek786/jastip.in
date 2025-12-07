<!DOCTYPE html> <!-- 5026231038 - Nabila Shinta Luthfia | Halaman Login -->
<html lang="id">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jastip.in - Masuk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS Login -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FFA51F;
            margin: 0;
        }
        .login-page {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-card {
            background-color: #fff;
            border-radius: 20px;
            padding: 40px 25px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 380px;
        }

        /* Input */
        .input-group-text {
            background-color: #fff;
            border: 1.5px solid #F8991D;
            border-right: none;
            border-radius: 10px 0 0 10px;
        }
        .form-control {
            border: 1.5px solid #F8991D;
            border-left: none;
            border-radius: 0 10px 10px 0;
        }

        /* Tombol Masuk */
        .btn-orange {
            background-color: #F8991D;
            color: #fff;
            font-weight: 600;
            border-radius: 10px;
            border: none;
            padding: 12px;
            width: 100%;
            display: block;
            transition: 0.3s;
        }
        .btn-orange:hover {
            background-color: #e68712;
        }

        .text-orange {
            color: #F8991D;
            text-decoration: none;
        }
        .text-orange:hover {
            color: #e68712;
        }
    </style>
</head>

<body class="login-page">

    <div class="login-card text-center">

        <h2 class="fw-bold">Masuk</h2>
        <p class="mb-4">Yuk masuk dulu, biar bisa langsung titip makanan tanpa keluar asrama.</p>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="text-start">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="emailAddress" class="form-control" placeholder="Masukkan email anda" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Kata Sandi</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan kata sandi anda" required>
                </div>
                <!-- Revisi: Link lupa kata sandi mengarah ke halaman forgot password -->
                <a href="{{ route('forgot.password') }}" class="d-block mt-2 small text-orange text-end">Lupa kata sandi?</a>
            </div>

            <button type="submit" class="btn-orange mt-3">Masuk</button>

            <p class="text-center mt-3">
                Belum punya akun?
                <a href="{{ route('daftar') }}" class="text-orange fw-bold">Daftar</a>
            </p>
        </form>

    </div>

</body>
</html>
