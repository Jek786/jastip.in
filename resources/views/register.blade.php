<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jastip.in - Daftar</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FFA51F;
            margin: 0;
        }

        .register-page {
            background-color: #FFA51F;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .register-card {
            background: #fff;
            padding: 40px 25px;
            border-radius: 20px;
            max-width: 420px;
            width: 100%;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .register-card h2 {
            font-weight: 700;
            color: #F8991D;
        }

        .register-card p {
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

        @media (max-width: 768px) {
            .register-card {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body class="register-page">

    <div class="register-card text-center">
        <h2 class="fw-bold mb-2">Daftar Akun</h2>
        <p class="mb-4">Buat akun dulu ya, biar bisa langsung titip makanan tanpa ribet.</p>

        <form action="#" method="POST" class="text-start">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" placeholder="Masukkan nama anda" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" placeholder="Masukkan email anda" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Kata Sandi</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" placeholder="Masukkan kata sandi" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Ulangi Kata Sandi</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" class="form-control" placeholder="Ulangi kata sandi" required>
                </div>
            </div>

            <button type="submit" class="btn-orange mt-2">Daftar</button>

            <p class="text-center mt-3 mb-0">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-orange fw-bold">Masuk</a>
            </p>
        </form>

    </div>

</body>
</html>
