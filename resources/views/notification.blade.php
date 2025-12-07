<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --brand-orange: #F7941D;
            --brand-teal: #429E8F; /* Warna hijau tosca untuk saldo */
            --brand-bg-light: #FFFFFF;
            --text-dark: #1A1A1A;
            --text-muted: #999999;
            --border-color: #F0F0F0;
            --font-family-sans: 'Poppins', sans-serif;
        }

        body {
            font-family: var(--font-family-sans);
            background-color: var(--brand-bg-light);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* --- Header --- */
        .app-header {
            background-color: #FFFFFF;
            padding: 1rem 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .back-btn {
            color: var(--text-dark);
            font-size: 1.5rem;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .header-title {
            font-weight: 700;
            font-size: 1.25rem;
            margin-bottom: 0;
        }

        /* --- Notification List --- */
        .notification-list {
            flex-grow: 1;
            padding-bottom: 2rem;
        }

        .notif-item {
            padding: 1rem 1.5rem;
            display: flex;
            align-items: flex-start; /* Align items to top if text wraps */
            gap: 1rem;
            border-bottom: 1px solid var(--border-color);
            transition: background-color 0.2s;
            cursor: pointer;
        }

        .notif-item:hover {
            background-color: #FAFAFA;
        }

        /* Icon Circle Wrapper */
        .notif-icon-wrapper {
            flex-shrink: 0;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .bg-orange {
            background-color: var(--brand-orange);
        }

        .bg-teal {
            background-color: var(--brand-teal);
        }

        /* Content */
        .notif-content {
            flex-grow: 1;
            padding-top: 0.2rem; /* Visual alignment fix */
        }

        .notif-title {
            font-weight: 700;
            font-size: 0.95rem;
            margin-bottom: 0.1rem;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .notif-time {
            font-size: 0.7rem;
            color: #C4C4C4; /* Light gray per image */
            font-weight: 400;
            margin-left: 0.5rem;
            white-space: nowrap;
        }

        .notif-desc {
            font-size: 0.85rem;
            color: #555;
            margin-bottom: 0;
            line-height: 1.4;
        }

    </style>
</head>
<body>

    <header class="app-header">
        <a href="#" onclick="history.back()" class="back-btn">
            <i class="bi bi-chevron-left"></i>
        </a>
        <h1 class="header-title">Notifikasi</h1>
    </header>

    <main class="notification-list">

        <div class="notif-item">
            <div class="notif-icon-wrapper bg-orange">
                <i class="bi bi-bag-fill"></i>
            </div>
            <div class="notif-content">
                <div class="notif-title">
                    Pesanan Masuk
                    <span class="notif-time">Hari ini, 12:15</span>
                </div>
                <p class="notif-desc">Bambang membuat pesanan</p>
            </div>
        </div>

        <div class="notif-item">
            <div class="notif-icon-wrapper bg-orange">
                <i class="bi bi-bag-fill"></i>
            </div>
            <div class="notif-content">
                <div class="notif-title">
                    Pesanan Masuk
                    <span class="notif-time">Hari ini, 11:45</span>
                </div>
                <p class="notif-desc">Jeremi Siahaan membuat pesanan</p>
            </div>
        </div>

        <div class="notif-item">
            <div class="notif-icon-wrapper bg-orange">
                <i class="bi bi-bag-fill"></i>
            </div>
            <div class="notif-content">
                <div class="notif-title">
                    Pesanan Masuk
                    <span class="notif-time">Hari ini, 11:43</span>
                </div>
                <p class="notif-desc">Keysha Julia membuat pesanan</p>
            </div>
        </div>

        <div class="notif-item">
            <div class="notif-icon-wrapper bg-orange">
                <i class="bi bi-bag-fill"></i>
            </div>
            <div class="notif-content">
                <div class="notif-title">
                    Pesanan Masuk
                    <span class="notif-time">Hari ini, 11:42</span>
                </div>
                <p class="notif-desc">Jessica Jung membuat pesanan</p>
            </div>
        </div>

        <div class="notif-item">
            <div class="notif-icon-wrapper bg-teal">
                <i class="bi bi-currency-dollar" style="font-size: 1.5rem;"></i>
            </div>
            <div class="notif-content">
                <div class="notif-title">
                    Saldo dicairkan
                    <span class="notif-time">Kemarin, 16:00</span>
                </div>
                <p class="notif-desc">Rp 500.000 berhasil dicairkan</p>
            </div>
        </div>

        <div class="notif-item">
            <div class="notif-icon-wrapper bg-orange">
                <i class="bi bi-bag-fill"></i>
            </div>
            <div class="notif-content">
                <div class="notif-title">
                    Pesanan Masuk
                    <span class="notif-time">Hari ini, 11:42</span>
                </div>
                <p class="notif-desc">Siti Maharani membuat pesanan</p>
            </div>
        </div>

        <div class="notif-item">
            <div class="notif-icon-wrapper bg-orange">
                <i class="bi bi-bag-fill"></i>
            </div>
            <div class="notif-content">
                <div class="notif-title">
                    Pesanan Masuk
                    <span class="notif-time">Kemarin, 13:45</span>
                </div>
                <p class="notif-desc">Ervina Yanuar membuat pesanan</p>
            </div>
        </div>

        <div class="notif-item">
            <div class="notif-icon-wrapper bg-orange">
                <i class="bi bi-bag-fill"></i>
            </div>
            <div class="notif-content">
                <div class="notif-title">
                    Pesanan Masuk
                    <span class="notif-time">Kemarin, 13:45</span>
                </div>
                <p class="notif-desc">Nabila Sin membuat pesanan</p>
            </div>
        </div>
        
        <div class="notif-item">
            <div class="notif-icon-wrapper bg-orange">
                <i class="bi bi-bag-fill"></i>
            </div>
            <div class="notif-content">
                <div class="notif-title">
                    Pesanan Masuk
                    <span class="notif-time">Kemarin, 13:40</span>
                </div>
                <p class="notif-desc">Ghandiiii membuat pesanan</p>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>