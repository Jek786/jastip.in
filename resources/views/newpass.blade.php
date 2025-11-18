<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kata Sandi Baru - Prototipe</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        /* * 1. Definisi Variabel Warna & Font
         * Menggunakan variabel yang sama dengan halaman login sebelumnya untuk konsistensi.
        */
        :root {
            --brand-orange: #F7941D;
            --brand-orange-light: #FCEFDB;
            --brand-bg-light: #F8F8F8; /* Latar belakang utama */
            --brand-text-dark: #333333;
            --brand-text-muted: #828282;
            --font-family-sans-serif: 'Poppins', sans-serif;
        }

        /* * 2. Pengaturan Dasar (Body & Layout)
        */
        body {
            font-family: var(--font-family-sans-serif);
            background-color: var(--brand-bg-light);
            color: var(--brand-text-dark);
            min-height: 100vh; /* Agar footer tetap di bawah */
            display: flex;
            flex-direction: column;
        }

        /* * 3. Kustomisasi Header (Bagian Atas)
         * Header putih minimalis dengan tombol kembali dan judul.
        */
        .app-header {
            background-color: #FFFFFF;
            padding: 1rem 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .app-header .back-link {
            color: var(--brand-text-dark);
            font-size: 1.5rem;
            margin-right: 1rem;
        }

        .app-header .header-title {
            font-weight: 500;
            font-size: 1.15rem;
            margin-bottom: 0;
        }

        /* * 4. Kustomisasi Konten Utama
        */
        .main-content {
            flex-grow: 1; /* Konten utama mengambil ruang sisa */
            padding-top: 2rem;
            padding-bottom: 2rem;
            background-color: var(--brand-bg-light);
        }

        /* * 5. Kustomisasi Form (Input dengan Ikon)
         * Menggunakan gaya yang sama dengan halaman login.
        */
        .form-label {
            font-weight: 600;
            color: var(--brand-text-dark);
            margin-bottom: 0.5rem;
            margin-left: 0.5rem;
        }

        .form-icon-wrapper {
            position: relative;
        }

        .form-icon-wrapper .form-icon {
            position: absolute;
            top: 50%;
            left: 1.25rem; 
            transform: translateY(-50%);
            color: var(--brand-orange);
            font-size: 1.1rem;
        }

        .form-icon-wrapper .form-control {
            padding-left: 3.25rem; 
            padding-top: 0.8rem;
            padding-bottom: 0.8rem;
            border-radius: 50rem; /* Bentuk pil */
            border: 1px solid #E0E0E0;
            background-color: #FFFFFF;
        }

        .form-control:focus {
            border-color: var(--brand-orange);
            box-shadow: 0 0 0 0.25rem var(--brand-orange-light);
        }

        /* * 6. Kustomisasi Tombol "Kirim"
        */
        .btn-brand {
            background-color: var(--brand-orange);
            border-color: var(--brand-orange);
            color: #FFFFFF;
            font-weight: 700;
            padding-top: 0.8rem;
            padding-bottom: 0.8rem;
            border-radius: 50rem; /* Bentuk pil */
        }

        .btn-brand:hover, .btn-brand:focus {
            background-color: #e08110;
            border-color: #e08110;
            color: #FFFFFF;
        }

        /* * 7. Link Pendaftaran (Footer)
        */
        .register-link {
            padding: 1.5rem 0;
            background-color: #FFFFFF;
            border-top: 1px solid #EEEEEE;
        }

        .register-link p {
            color: var(--brand-text-muted);
            margin-bottom: 0;
        }
        .register-link a {
            color: var(--brand-text-dark);
            font-weight: 700;
            text-decoration: none;
        }
        .register-link a:hover {
            color: var(--brand-orange);
        }
    </style>
</head>

<body class="d-flex flex-column">

    <header class="app-header">
        <div class="container d-flex align-items-center">
            <a href="#" class="back-link"><i class="bi bi-arrow-left"></i></a>
            <h1 class="header-title">Kata Sandi Baru</h1>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5 col-xl-4">
                    
                    <p class="text-muted mb-4">
                        Silahkan atur ulang kata sandi Anda
                    </p>

                    <form>
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <div class="form-icon-wrapper">
                                <i class="bi bi-lock-fill form-icon"></i>
                                <input type="password" class="form-control" id="password" placeholder="Masukkan ulang kata sandi anda">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="confirm-password" class="form-label">Konfirmasi Kata Sandi</label>
                            <div class="form-icon-wrapper">
                                <i class="bi bi-lock-fill form-icon"></i>
                                <input type="password" class="form-control" id="confirm-password" placeholder="Masukkan ulang kata sandi anda">
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-brand">Kirim</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>

    <footer class="register-link text-center">
        <div class="container">
            <p>Belum punya akun? <a href="#">Daftar</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>