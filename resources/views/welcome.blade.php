
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Jastip</title>
    
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

        .card-jastip {
            border-radius: 1.5rem; /* .rounded-5 */
        }

        .card-jastip .img-illustrator {
            position: absolute;
            width: 70px;
            opacity: 0.7;
        }

        #illustrator-left {
            top: 1rem;
            left: 1rem;
        }

        #illustrator-right {
            bottom: 0.5rem;
            right: 1rem;
        }

        .btn-orange {
            background-color: #F7A01B;
            color: #432818; /* Warna teks gelap agar kontras */
            font-weight: 700;
            border: none;
        }

        .btn-orange:hover {
            background-color: #e09118;
            color: #432818;
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
            /* Tidak menggunakan transform, biarkan sejajar
               karena di prototipe dia tidak menonjol ke atas */
        }
    </style>
</head>
<body class="bg-light">

    <div class="mobile-screen-container">
        
        <main class="container-fluid pt-4">
            
            <h4 class="fw-bold mb-4 px-2">Halo, John!</h4>

            <div class="card card-jastip border-0 shadow-sm mx-2">
                <div class="card-body text-center p-4 position-relative">
                    
                    <img src="./images/jastipinkiri.png" 
                         alt="Gambar 1" 
                         class="img-illustrator" 
                         id="illustrator-left">
                    <img src="./images/jastipinkanan.png" 
                         alt="Gambar 2" 
                         class="img-illustrator" 
                         id="illustrator-right">

                    <div class="my-3">
                        <h5 class="fw-bold" style="color: #432818;">Jastip kamu belum buka nih. Atur dulu yuk!</h5>
                    </div>
                    
                    <a href="#" class="btn btn-orange rounded-pill w-100 py-2 fs-5">
                        Buka Jastip
                    </a>
                </div>
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