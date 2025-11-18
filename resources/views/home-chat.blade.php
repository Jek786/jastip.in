<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Chat Driver</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --brand-orange: #F7941D;
            --brand-bg-light: #F8F8F8;
            --text-dark: #333333;
            --text-muted: #828282;
            --system-gold: #D4AF37;
            --font-family-sans: 'Poppins', sans-serif;
        }

        body {
            font-family: var(--font-family-sans);
            background-color: #FFFFFF;
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .top-section {
            background-color: #FFFFFF;
            padding: 1.5rem 1.5rem 0.5rem 1.5rem;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;
            background-color: var(--brand-orange);
            width: 10px;
            height: 10px;
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .search-container {
            position: relative;
            margin-top: 1rem;
        }
        
        .search-icon {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
            color: #999;
        }

        .search-input {
            padding-left: 2.5rem;
            border-radius: 0.75rem;
            background-color: var(--brand-bg-light);
            border: none;
            padding-top: 0.7rem;
            padding-bottom: 0.7rem;
        }

        .filter-chips {
            display: flex;
            gap: 0.75rem;
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .chip {
            border-radius: 50rem;
            padding: 0.4rem 1.5rem;
            font-size: 0.9rem;
            font-weight: 500;
            border: 1px solid transparent;
            transition: all 0.2s;
        }

        .chip-active {
            background-color: var(--brand-orange);
            color: white;
        }

        .chip-inactive {
            background-color: transparent;
            border-color: #ccc;
            color: var(--text-muted);
        }

        .chat-list {
            flex-grow: 1;
            overflow-y: auto;
            padding-bottom: 100px;
            background-color: #FFFFFF;
        }

        .chat-item {
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            border-bottom: 1px solid #f0f0f0;
            cursor: pointer;
            position: relative;
            transition: background-color 0.2s;
        }

        .chat-item:hover {
            background-color: #fafafa;
        }

        /* --- LOGIKA BARU: COMPLAINT / PINNED --- */
        /* Hanya muncul jika customer komplain */
        .chat-item-complaint {
            background-color: #FFF; /* Tetap putih atau bisa sedikit di-highlight */
        }

        /* Garis Oranye di kiri sebagai penanda 'PINNED/COMPLAINT' */
        .chat-item-complaint::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 6px; /* Sedikit lebih tebal agar jelas */
            background-color: var(--brand-orange);
        }

        /* Opsional: Menambahkan ikon pin kecil secara visual jika diinginkan */
        .pin-icon {
            font-size: 0.7rem;
            color: var(--brand-text-muted);
            margin-right: 4px;
            transform: rotate(45deg);
        }

        .avatar {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            object-fit: cover;
        }

        .chat-info {
            flex-grow: 1;
            min-width: 0;
        }

        .chat-name {
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 0.1rem;
            display: flex;
            align-items: center;
        }

        .chat-preview {
            font-size: 0.85rem;
            color: var(--text-muted);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .text-system-gold {
            color: var(--system-gold) !important;
            font-style: italic;
        }

        .chat-meta {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 0.3rem;
            min-width: 50px;
        }

        .chat-time {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        .unread-badge {
            background-color: var(--brand-orange);
            color: white;
            font-size: 0.7rem;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .bottom-nav {
            background-color: #FFFFFF;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
            padding: 0.75rem 2rem;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-center-btn {
            background-color: #FFFFFF;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 -5px 10px rgba(0,0,0,0.05);
            margin-top: -40px;
            color: #D4AF37;
            font-size: 1.5rem;
            border: 1px solid #eee;
        }

        .nav-btn-active {
            background-color: var(--brand-orange);
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 50rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="top-section">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="fw-bold mb-0">Halo, John!</h4>
            <div class="position-relative">
                <i class="bi bi-bell fs-4"></i>
                <span class="notification-badge"></span>
            </div>
        </div>

        <div class="search-container">
            <i class="bi bi-search search-icon"></i>
            <input type="text" class="form-control search-input" placeholder="Cari pesan atau nama....">
        </div>

        <div class="filter-chips">
            <button class="chip chip-active">All</button>
            <button class="chip chip-inactive">Unread</button>
        </div>
    </div>

    <div class="chat-list">
        
        <div class="chat-item chat-item-complaint">
            <img src="https://i.pravatar.cc/150?u=bambang" alt="User" class="avatar">
            <div class="chat-info">
                <div class="chat-name">
                    Bambang Gemoy
                </div>
                <div class="chat-preview text-dark fw-bold">BACA GA</div>
            </div>
            <div class="chat-meta">
                <span class="chat-time">12:11</span>
                <span class="unread-badge">2</span>
            </div>
        </div>

        <div class="chat-item">
            <img src="https://i.pravatar.cc/150?u=jessica" alt="User" class="avatar">
            <div class="chat-info">
                <div class="chat-name">Jessica Jung</div>
                <div class="chat-preview">Janlup minta sendok ya kak nanti....</div>
            </div>
            <div class="chat-meta">
                <span class="chat-time">12.15</span>
                <span class="unread-badge">2</span>
            </div>
        </div>

        <div class="chat-item">
            <img src="https://i.pravatar.cc/150?u=siti" alt="User" class="avatar">
            <div class="chat-info">
                <div class="chat-name">Siti Maharani</div>
                <div class="chat-preview">Halo kak, pesanan saya sudah masuk...</div>
            </div>
            <div class="chat-meta">
                <span class="chat-time">11:50</span>
                <span class="unread-badge">1</span>
            </div>
        </div>

        <div class="chat-item">
            <img src="https://i.pravatar.cc/150?u=jeremi" alt="User" class="avatar">
            <div class="chat-info">
                <div class="chat-name">Jeremi Siahaan</div>
                <div class="chat-preview text-system-gold">Pesanan Jeremi terkonfirmasi</div>
            </div>
            <div class="chat-meta">
                <span class="chat-time">11:45</span>
            </div>
        </div>

    </div>

    <div class="bottom-nav">
        <a href="#" class="nav-btn-active">
            <i class="bi bi-chat-left-text-fill"></i>
            <span>Chat</span>
        </a>

        <a href="#" class="nav-center-btn text-decoration-none">
            <i class="bi bi-shop"></i>
        </a>

        <a href="#" class="text-decoration-none">
            <i class="bi bi-person-fill fs-2" style="color: var(--brand-orange);"></i>
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>