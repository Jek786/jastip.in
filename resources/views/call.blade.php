<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panggilan - Siti Maharani</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --brand-bg-light: #FFFFFF;
            --text-dark: #000000;
            --text-muted: #828282;
            --control-bar-bg: #EAEAEA; /* Abu-abu terang untuk wadah tombol */
            --btn-gray: #787878; /* Abu-abu gelap untuk tombol utilitas */
            --btn-red: #FF3B30; /* Merah standar iOS untuk tutup telepon */
            --font-family-sans: 'Poppins', sans-serif;
        }

        body {
            font-family: var(--font-family-sans);
            background-color: var(--brand-bg-light);
            color: var(--text-dark);
            height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden; /* Mencegah scroll saat menelpon */
        }

        /* --- 1. Header --- */
        .call-header {
            padding: 1rem;
            position: relative;
            text-align: center;
            margin-top: 1rem;
        }

        .back-btn {
            position: absolute;
            left: 1.5rem;
            top: 1.2rem;
            color: var(--text-dark);
            font-size: 1.5rem;
            text-decoration: none;
            z-index: 10;
        }

        .caller-name {
            font-weight: 700;
            font-size: 1.25rem;
            margin-bottom: 0;
        }

        .call-status {
            color: var(--text-muted);
            font-size: 0.9rem;
            font-style: italic;
            margin-bottom: 0;
        }

        /* --- 2. Area Avatar (Tengah) --- */
        .main-stage {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-bottom: 100px; /* Memberi ruang agar tidak tertutup tombol bawah */
        }

        .avatar-circle {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            overflow: hidden;
            /* Sedikit bayangan agar tidak terlalu flat */
            box-shadow: 0 10px 25px rgba(0,0,0,0.05); 
        }

        .avatar-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Efek denyut nadi (opsional - agar terlihat sedang memanggil) */
        .avatar-pulse {
            animation: pulse-animation 2s infinite;
        }

        @keyframes pulse-animation {
            0% { box-shadow: 0 0 0 0 rgba(247, 148, 29, 0.2); }
            70% { box-shadow: 0 0 0 20px rgba(247, 148, 29, 0); }
            100% { box-shadow: 0 0 0 0 rgba(247, 148, 29, 0); }
        }

        /* --- 3. Control Panel (Bawah) --- */
        .control-container {
            padding: 0 1.5rem 3rem 1.5rem; /* Padding bawah besar untuk area aman HP */
        }

        .control-bar {
            background-color: var(--control-bar-bg);
            border-radius: 2rem; /* Sudut membulat besar */
            padding: 1.2rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-call-control {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            transition: transform 0.1s;
        }

        .btn-call-control:active {
            transform: scale(0.95);
        }

        /* Warna Tombol */
        .btn-gray {
            background-color: var(--btn-gray);
        }

        .btn-red {
            background-color: var(--btn-red);
        }

    </style>
</head>
<body>

    <header class="call-header">
        <a href="#" onclick="history.back()" class="back-btn">
            <i class="bi bi-chevron-left"></i>
        </a>
        
        <div>
            <h1 class="caller-name">Siti Maharani</h1>
            <p class="call-status">Memanggil...</p>
        </div>
    </header>

    <main class="main-stage">
        <div class="avatar-circle avatar-pulse">
            <img src="https://i.pravatar.cc/300?u=siti" alt="Siti Maharani">
        </div>
    </main>

    <footer class="control-container">
        <div class="control-bar">
            
            <button class="btn-call-control btn-gray">
                <i class="bi bi-three-dots"></i>
            </button>

            <button class="btn-call-control btn-gray">
                <i class="bi bi-volume-up-fill"></i>
            </button>

            <button class="btn-call-control btn-gray">
                <i class="bi bi-mic-mute-fill"></i>
            </button>

            <button class="btn-call-control btn-red" onclick="history.back()">
                <i class="bi bi-telephone-x-fill"></i>
            </button>

        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>