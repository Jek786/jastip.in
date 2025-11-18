<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Detail - Bambang Gemoy (Complaint)</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --brand-orange: #F7941D;
            --brand-bg-light: #EBEBEB; /* Disamakan dengan Ongoing Chat agar konsisten */
            --chat-bubble-sender: #F7941D;
            --chat-bubble-receiver: #D9D9D9; 
            --chat-bubble-system: #C4C4C4;
            --text-dark: #333333;
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
        .chat-header {
            background-color: #FFFFFF;
            padding: 1rem 1rem 0.5rem 1rem;
            border-bottom-left-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            flex-direction: column;
        }

        .chat-header-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #eee;
        }

        .user-info h5 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0;
            color: var(--text-dark);
        }

        .header-dropdown-trigger {
            width: 100%;
            text-align: center;
            cursor: pointer;
            margin-top: 5px;
            color: var(--text-dark);
            transition: color 0.2s;
        }

        .header-dropdown-trigger:hover {
            color: var(--brand-orange);
        }

        /* --- Area Chat --- */
        .chat-content {
            flex-grow: 1;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            overflow-y: auto;
            padding-bottom: 100px; 
        }

        .message-bubble {
            max-width: 80%;
            padding: 0.75rem 1rem;
            position: relative;
            font-size: 0.95rem;
            line-height: 1.4;
        }

        .message-time {
            font-size: 0.7rem;
            margin-top: 4px;
            display: block;
            text-align: right;
            opacity: 0.7;
        }

        .message-received {
            align-self: flex-start;
            background-color: var(--chat-bubble-receiver);
            color: var(--text-dark);
            border-radius: 0 1rem 1rem 1rem; 
        }

        .message-sent {
            align-self: flex-end;
            background-color: var(--chat-bubble-sender);
            color: #000; 
            border-radius: 1rem 0 1rem 1rem; 
        }
        
        .message-system {
            align-self: center;
            background-color: #C4C4C4;
            width: 100%;
            max-width: 100%;
            border-radius: 0.5rem;
            font-style: italic;
            color: #333;
            font-size: 0.9rem;
        }

        /* --- Input Bar (UPDATED: Gaya Baru Konsisten) --- */
        .chat-input-area {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #F9F9F9;
            padding: 1rem;
            border-top: 1px solid #eee;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .input-wrapper {
            flex-grow: 1;
            background-color: #FFFFFF;
            border-radius: 2rem;
            padding: 0.3rem 0.5rem 0.3rem 1.2rem;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.02);
            border: 1px solid #e0e0e0;
        }

        .chat-input-field {
            border: none;
            background: transparent;
            flex-grow: 1;
            outline: none;
            font-size: 0.95rem;
        }

        .btn-send-mini {
            color: var(--text-dark);
            padding: 0.5rem;
            cursor: pointer;
        }

        .action-icon {
            font-size: 1.4rem;
            color: #1A1A1A;
            cursor: pointer;
        }

        /* --- Modal Pesanan Bermasalah --- */
        .modal-content {
            border-radius: 1.5rem;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 1rem;
        }

        .btn-modal-primary {
            background-color: var(--brand-orange);
            color: white;
            border-radius: 2rem;
            font-weight: 600;
            border: 1px solid var(--brand-orange);
        }
        
        .btn-modal-outline {
            background-color: white;
            color: var(--text-dark);
            border: 1px solid var(--brand-orange);
            border-radius: 2rem;
            font-weight: 600;
        }
        
        .dashed-line {
            border-top: 2px dashed #ccc;
            margin: 1.5rem 0;
        }
    </style>
</head>
<body>

    <header class="chat-header">
        <div class="chat-header-top">
            <div class="d-flex align-items-center gap-3">
                <a href="#" class="text-dark"><i class="bi bi-chevron-left fs-4"></i></a>
                <img src="https://i.pravatar.cc/150?u=bambang" alt="Avatar" class="user-avatar">
                <div class="user-info">
                    <h5>Bambang Gemoy</h5>
                </div>
            </div>
            <div>
                <i class="bi bi-telephone fs-4"></i>
            </div>
        </div>

        <div class="header-dropdown-trigger" data-bs-toggle="modal" data-bs-target="#orderIssueModal">
            <i class="bi bi-chevron-down fs-5"></i>
        </div>
    </header>

    <main class="chat-content">
        <div class="message-bubble message-system">
            Pesanan Siti telah dikonfirmasi<br>
            <span class="opacity-75">[Pesan ini dibuat secara otomatis]</span>
            <span class="message-time text-end">11.50</span>
        </div>

        <div class="message-bubble message-received">
            Halo kak, pesanan saya sudah masuk sesuai aplikasi ya.
            <span class="message-time">11.50</span>
        </div>

        <div class="message-bubble message-sent">
            Baik, ditunggu ya kakk!!
            <span class="message-time">11.52</span>
        </div>

        <div class="message-bubble message-received">
            Oh iya kak, buat gula di jusnya juga sedikit aja yaaaa
            <span class="message-time">11.53</span>
        </div>

        <div class="message-bubble message-sent">
            Oke kakk, amann. Ada lagi?
            <span class="message-time">11.55</span>
        </div>
        
        <div class="message-bubble message-received text-uppercase">
            KAK MASA MINUM AKU TUMPAH? RUGI DONG AKU KALO GINI
            <span class="message-time">12.11</span>
        </div>

        <div class="message-bubble message-received text-uppercase">
            BACA GA
            <span class="message-time">12.11</span>
        </div>

        <div class="message-bubble message-sent">
            Kalo aku refund aja gimana kaa? Aman kaahh?
            <span class="message-time">12.12</span>
        </div>
        
        <div style="height: 100px;"></div> 
    </main>

    <div class="chat-input-area">
        <i class="bi bi-plus-lg action-icon"></i>
        <div class="input-wrapper">
            <input type="text" class="chat-input-field" placeholder="">
            <i class="bi bi-send-fill btn-send-mini"></i>
        </div>
        <i class="bi bi-camera-fill action-icon"></i>
        <i class="bi bi-mic-fill action-icon"></i>
    </div>

    <div class="modal fade" id="orderIssueModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-body p-0">
                    <h5 class="fw-bold mb-4">Pesanan yang bermasalah</h5>
                    
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <div style="background-color: #FFAD5C; width: 50px; height: 50px; border-radius: 50%; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                <img src="https://images.unsplash.com/photo-1603569283847-aa295f0d016a?w=100&q=80" alt="Jus" class="w-100 h-100 object-fit-cover">
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">Nisa Juice</h6>
                                <small class="text-muted">Jus Jeruk</small>
                            </div>
                        </div>
                        <div class="text-end">
                            <span class="d-block text-muted">1X</span>
                            <span class="fw-bold text-warning">Rp 10.000</span>
                        </div>
                    </div>

                    <div class="dashed-line"></div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="fw-bold">Total</span>
                        <div class="text-end">
                            <span class="text-muted me-2">1X</span>
                            <span class="fw-bold fs-5 text-warning">Rp 10.000</span>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-6">
                            <button class="btn btn-modal-primary w-100 py-2">Refund</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-modal-outline w-100 py-2">Akhiri</button>
                        </div>
                    </div>
                    
                    <div class="text-center mt-3" style="cursor: pointer;" data-bs-dismiss="modal">
                        <i class="bi bi-chevron-double-down text-muted fs-5"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>