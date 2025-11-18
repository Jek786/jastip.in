<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periksa Email - Prototipe</title>
    
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
            /* vh-100 membuat body mengisi seluruh tinggi viewport */
            min-height: 100vh; /* Agar footer tetap di bawah */
            display: flex;
            flex-direction: column;
        }

        /* * 3. Kustomisasi Header (Bagian Atas)
         * Header untuk halaman ini lebih sederhana, hanya dengan judul dan tombol kembali.
        */
        .app-header {
            background-color: #FFFFFF; /* Latar putih untuk header */
            padding: 1rem 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05); /* Sedikit shadow */
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .app-header .back-link {
            color: var(--brand-text-dark);
            font-size: 1.5rem; /* Ukuran ikon panah */
            margin-right: 1rem;
        }

        .app-header .header-title {
            font-weight: 500; /* Medium weight */
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

        .email-info {
            font-size: 0.95rem;
            color: var(--brand-text-dark);
            line-height: 1.5;
        }

        .email-info strong {
            color: var(--brand-orange); /* Menyorot email dengan warna oranye */
            font-weight: 600;
        }

        /* * 5. Input Kode OTP (5 Digit)
        */
        .otp-input-group {
            display: flex;
            justify-content: space-between;
            gap: 0.5rem; /* Spasi antar input */
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .otp-input {
            width: 50px; /* Lebar tetap untuk setiap kotak */
            height: 50px; /* Tinggi yang sama */
            font-size: 1.5rem;
            text-align: center;
            border: 1px solid #E0E0E0;
            border-radius: 0.75rem; /* Sudut sedikit membulat */
            background-color: #FFFFFF;
            /* Hapus spin box di Firefox */
            -moz-appearance: textfield; 
        }

        /* Hapus spin box di Chrome/Safari/Edge */
        .otp-input::-webkit-outer-spin-button,
        .otp-input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .otp-input:focus {
            border-color: var(--brand-orange);
            box-shadow: 0 0 0 0.25rem var(--brand-orange-light);
            outline: none;
        }

        /* * 6. Kustomisasi Tombol "Kirim"
         * Menggunakan gaya tombol yang sama dengan halaman login.
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
         * Menggunakan gaya yang sama dengan halaman login.
        */
        .register-link {
            padding: 1.5rem 0;
            background-color: #FFFFFF; /* Latar putih untuk footer */
            border-top: 1px solid #EEEEEE; /* Garis tipis di atas */
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
            <h1 class="header-title">Periksa Email</h1>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5 col-xl-4">
                    
                    <p class="email-info mb-4">
                        Kami mengirim tautan reset ke <strong>johndoe@gmail.com</strong>
                        masukkan kode 5 digit yang disebutkan di email
                    </p>

                    <form>
                        <div class="otp-input-group">
                            <input type="number" class="form-control otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric" autofocus>
                            <input type="number" class="form-control otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric">
                            <input type="number" class="form-control otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric">
                            <input type="number" class="form-control otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric">
                            <input type="number" class="form-control otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric">
                        </div>

                        <div class="d-grid">
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
    <script>
        // JavaScript untuk otomatis fokus ke input berikutnya
        document.addEventListener('DOMContentLoaded', function() {
            const otpInputs = document.querySelectorAll('.otp-input');

            otpInputs.forEach((input, index) => {
                input.addEventListener('input', function() {
                    if (this.value.length === 1 && index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }
                });

                input.addEventListener('keydown', function(event) {
                    // Jika Backspace ditekan dan input kosong, fokus ke input sebelumnya
                    if (event.key === 'Backspace' && this.value.length === 0 && index > 0) {
                        otpInputs[index - 1].focus();
                    }
                });
            });
        });
    </script>
</body>
</html>