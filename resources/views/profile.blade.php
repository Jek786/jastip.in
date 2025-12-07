{{-- 5026231010 - Daniel Setiawan --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        /* == CUSTOM STYLING == */

        /* * Latar belakang abu-abu untuk body 
         * dan padding-bottom agar konten tidak tertutup nav
        */
        body {
            background-color: #f8f9fa; /* Kelas .bg-light Bootstrap */
            padding-bottom: 120px; /* Memberi ruang untuk bottom nav */
        }

        /* * Wadah utama untuk membatasi lebar
         * agar terlihat seperti layar ponsel 
        */
        .mobile-screen-container {
            max-width: 450px;
            margin: auto;
            background-color: #f8f9fa;
        }

        /* * Gambar profil melingkar
         */
        .profile-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid white; /* Border putih tipis jika diperlukan */
        }

        /* * Card saldo dengan radius sudut besar 
         */
        .card-saldo {
            border-radius: 1.5rem; /* .rounded-5 */
            background-color: white;
            color: #432818; /* Warna teks gelap */
        }

        /* * Teks saldo yang besar dan oranye
         */
        .saldo-amount {
            color: #F7A01B;
            font-weight: 700;
            font-size: 2rem; /* Ukuran teks lebih besar dari h2 */
        }

        /* * Daftar menu dengan radius sudut besar 
         */
        .menu-list-group {
            border-radius: 1.5rem; /* .rounded-5 */
            overflow: hidden; /* Penting agar item pertama/terakhir mengikuti radius */
        }
        
        /* Item daftar menu */
        .menu-list-group .list-group-item {
            padding: 1rem 1.5rem;
            border-color: #e9ecef; /* Warna border lebih lembut */
            background-color: white;
        }

        /* * == STYLING BOTTOM NAVIGATION == 
         */

        /* Wrapper untuk menahan nav di bagian bawah */
        .bottom-nav-wrapper {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            padding-bottom: 1.5rem; /* Jarak aman dari bawah layar */
        }

        /* * Navigasi berbentuk pil putih.
         * Menggunakan d-flex untuk menyusun ikon.
        */
        .bottom-nav-pill {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 85%;
            max-width: 350px;
            margin: auto;
            background-color: white;
            border-radius: 50rem; /* .rounded-pill */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 0.75rem 1.25rem;
        }

        /* Tombol navigasi biasa (abu-abu) */
        .bottom-nav-pill .nav-link {
            color: #adb5bd; /* Warna abu-abu */
            padding: 0;
            text-decoration: none;
        }

        /* Tombol navigasi tengah yang besar dan oranye */
        .btn-nav-center {
            background-color: #F7A01B;
            color: #432818;
            width: 60px;
            height: 60px;
            border-radius: 50%; /* .rounded-circle */
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(247, 160, 27, 0.4);
        }

        /* Tombol 'Profile' yang aktif di nav bawah */
        .btn-profile-active {
            background-color: #F7A01B;
            color: #432818;
            font-weight: 600;
            border-radius: 50rem; /* rounded-pill */
            padding: 0.5rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
            text-decoration: none;
            box-shadow: 0 2px 5px rgba(247, 160, 27, 0.2);
        }
        .btn-profile-active i {
            font-size: 1.2rem;
        }
        .btn-profile-active span {
            font-size: 0.9rem;
        }
    </style>
</head>
<body class="bg-light">

    <div class="mobile-screen-container">
        
        <header class="d-flex align-items-center justify-content-between p-4">
            <div class="d-flex align-items-center">
                <img src="https://via.placeholder.com/70x70/E0E0E0/B0B0B0?text=ruddy" 
                     alt="Foto Profil" 
                     class="profile-img me-3">
                <div>
                    <span class="d-block text-secondary">Halo,</span>
                    <h4 class="fw-bold mb-0">Ruddy</h4>
                </div>
            </div>
            <a href="#" class="text-danger fs-3">
                <i class="bi bi-box-arrow-right"></i> </a>
        </header>

        <main class="container-fluid px-3">
            
            <div class="card card-saldo border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <p class="mb-1 text-secondary">Saldo sesi ini</p>
                    <h2 class="saldo-amount">Rp 75.000,00</h2>
                </div>
            </div>

            <div class="list-group menu-list-group shadow-sm">
                
                <a href="{{ route('detailtransaksi') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <span>Detail Transaksi</span>
                    <i class="bi bi-chevron-right text-secondary"></i>
                </a>
                
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <span>Buka Jastip</span>
                    <i class="bi bi-chevron-right text-secondary"></i>
                </a>
                
                <a href="{{ route('bahasa') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <span>Bahasa</span>
                    <i class="bi bi-chevron-right text-secondary"></i>
                </a>
                
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <span>FAQs</span>
                    <i class="bi bi-chevron-right text-secondary"></i>
                </a>

            </div>

        </main>

        <nav class="bottom-nav-wrapper">
            <div class="bottom-nav-pill">
                
                <a href="#" class="nav-link">
                    <i class="bi bi-chat-left fs-3"></i>
                </a>
                
                <a href="{{ route('welcome') }}" class="btn-nav-center">
                    <i class="bi bi-shop fs-2"></i>
                </a>
                
                <a href="{{ route('profile') }}"class="nav-link">
                    <i class="bi bi-person fs-3"></i>
                </a>

            </div>
        </nav>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>