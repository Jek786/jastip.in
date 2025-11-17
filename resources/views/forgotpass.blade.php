<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Prototipe</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        /* * 1. Definisi Variabel Warna & Font
         * Menyesuaikan dengan palet warna dari prototipe.
        */
        :root {
            --brand-orange: #F7941D;
            --brand-orange-light: #FCEFDB;
            --brand-bg-light: #F8F8F8; /* Latar belakang utama */
            --brand-text-dark: #333333;
            --brand-text-muted: #828282;
            --font-family-sans-serif: 'Poppins', sans-serif; /* Menggunakan font yang lebih mirip */
        }

        /* * 2. Pengaturan Dasar (Body & Layout)
        */
        body {
            font-family: var(--font-family-sans-serif);
            background-color: var(--brand-bg-light);
            color: var(--brand-text-dark);
            /* vh-100 membuat body mengisi seluruh tinggi viewport */
        }

        /* * 3. Kustomisasi Header (Bagian Oranye)
        */
        .brand-header {
            background-color: var(--brand-orange);
            padding: 1.5rem 1rem;
            /* Trik untuk membuat lingkaran "bokeh" menggunakan CSS */
            background-image: 
                radial-gradient(circle at 15% 20%, var(--brand-orange-light, #fff) 20px, transparent 21px),
                radial-gradient(circle at 75% 30%, var(--brand-orange-light, #fff) 40px, transparent 41px),
                radial-gradient(circle at 40% 60%, var(--brand-orange-light, #fff) 30px, transparent 31px),
                radial-gradient(circle at 80% 80%, var(--brand-orange-light, #fff) 25px, transparent 26px),
                radial-gradient(circle at 10% 85%, var(--brand-orange-light, #fff) 35px, transparent 36px);
            background-size: cover;
            background-position: center;
            /* Memberi sedikit lengkungan di bagian bawah seperti prototipe */
            border-bottom-left-radius: 30% 20%;
            border-bottom-right-radius: 30% 20%;
            min-height: 150px;
        }

        .brand-header a {
            color: white;
            font-size: 1.75rem; /* Memperbesar ikon panah */
            text-decoration: none;
        }

        /* * 4. Kustomisasi Form (Bagian Utama)
        */
        .login-container {
            /* Margin negatif untuk "menarik" form ke atas header */
            margin-top: -50px;
            background-color: var(--brand-bg-light);
            /* Menyesuaikan border radius agar pas dengan header */
            border-top-left-radius: 2rem;
            border-top-right-radius: 2rem;
            padding-top: 2rem;
            /* Pastikan konten tidak menempel di bawah */
            padding-bottom: 2rem;
            flex-grow: 1;
        }

        .form-label {
            font-weight: 600; /* Lebih tebal */
            color: var(--brand-text-dark);
            margin-bottom: 0.5rem;
            margin-left: 0.5rem;
        }

        /* * 5. Kustomisasi Input dengan Ikon di Dalam
         * Ini adalah cara modern untuk menempatkan ikon di dalam input
         * tanpa menggunakan Bootstrap "input-group" yang kaku.
        */
        .form-icon-wrapper {
            position: relative;
        }

        .form-icon-wrapper .form-icon {
            position: absolute;
            top: 50%;
            /* Posisi ikon dari kiri */
            left: 1.25rem; 
            transform: translateY(-50%);
            color: var(--brand-orange); /* Warna ikon oranye */
            font-size: 1.1rem;
        }

        .form-icon-wrapper .form-control {
            /* Padding kiri untuk memberi ruang pada ikon */
            padding-left: 3.25rem; 
            padding-top: 0.8rem;
            padding-bottom: 0.8rem;
            border-radius: 50rem; /* Membuat input menjadi "pill" */
            border: 1px solid #E0E0E0;
            background-color: #FFFFFF;
        }

        .form-control:focus {
            border-color: var(--brand-orange);
            box-shadow: 0 0 0 0.25rem var(--brand-orange-light);
        }

        .link-forgot {
            font-size: 0.9rem;
            color: var(--brand-text-muted);
            text-decoration: none;
        }
        .link-forgot:hover {
            color: var(--brand-orange);
        }

        /* * 6. Kustomisasi Tombol "Masuk"
        */
        .btn-brand {
            background-color: var(--brand-orange);
            border-color: var(--brand-orange);
            color: #FFFFFF; /* Teks putih */
            font-weight: 700;
            padding-top: 0.8rem;
            padding-bottom: 0.8rem;
        }

        .btn-brand:hover, .btn-brand:focus {
            background-color: #e08110; /* Oranye lebih gelap saat hover */
            border-color: #e08110;
            color: #FFFFFF;
        }

        /* * 7. Link Pendaftaran (Footer)
        */
        .register-link p {
            color: var(--brand-text-muted);
        }
        .register-link a {
            color: var(--brand-text-dark); /* Teks "Daftar" tebal dan gelap */
            font-weight: 700;
            text-decoration: none;
        }
        .register-link a:hover {
            color: var(--brand-orange);
        }

    </style>
</head>

<body class="d-flex flex-column vh-100">

    <header class="brand-header">
        <div class="container">
            <a href="#"><i class="bi bi-arrow-left"></i></a>
        </div>
    </header>

    <main class="login-container flex-grow-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5 col-xl-4">
                    
                    <h1 class="h2 fw-bold">Masuk</h1>
                    <p class="text-muted mb-4">
                        Yuk masuk dulu, biar bisa langsung titip makanan tanpa keluar asrama.
                    </p>

                    <form>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="form-icon-wrapper">
                                <i class="bi bi-envelope form-icon"></i>
                                <input type="email" class="form-control" id="email" placeholder="Masukkan email anda">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <div class="form-icon-wrapper">
                                <i class="bi bi-lock-fill form-icon"></i>
                                <input type="password" class="form-control" id="password" placeholder="Masukkan kata sandi anda">
                            </div>
                            <div class="text-end mt-2">
                                <a href="#" class="link-forgot">Lupa kata sandi?</a>
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-brand rounded-pill">Masuk</button>
                        </div>
                    </form>

                    <div class="text-center mt-4 register-link">
                        <p>Belum punya akun? <a href="#">Daftar</a></p>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>