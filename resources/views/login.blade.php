<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jastip.in - Masuk</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FFA51F;
            margin: 0;
        }

        .login-page {
            background-color: #FFA51F;
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

        .login-card h2 {
            color: #F8991D;
            font-weight: 700;
        }

        .login-card p {
            color: #6c757d;
            font-size: 0.95rem;
        }

        .form-label {
            font-weight: 600;
            color: #333;
        }

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

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(248,153,29,0.25);
            border-color: #F8991D;
        }

        .btn-orange {
            background-color: #F8991D;
            color: #fff;
            font-weight: 600;
            border-radius: 10px;
            padding: 10px;
            border: none;
            width: 100%;
            transition: .3s;
        }

        .btn-orange:hover {
            background-color: #e68712;
        }

        .text-orange {
            color: #F8991D;
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

        {{-- Show error if login fails --}}
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="text-start">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="emailAddress" class="form-control" id="email" placeholder="Masukkan email anda" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan kata sandi anda" required>
                </div>
                <a href="#" class="d-block mt-2 small text-orange text-end">Lupa kata sandi?</a>
            </div>

            <button type="submit" class="btn-orange mt-3">Masuk</button>

            <p class="text-center mt-3">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-orange fw-bold">Daftar</a>
            </p>
        </form>
    </div>

</body>
</html>
