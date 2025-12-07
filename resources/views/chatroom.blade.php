<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - Ongoing Order</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --brand-orange: #F7941D;
            --brand-bg-light: #EBEBEB;
            --chat-bubble-sender: #F7941D;
            --chat-bubble-receiver: #C4C4C4; 
            --text-dark: #1A1A1A;
            --font-family-sans: 'Poppins', sans-serif;
        }

        body {
            font-family: var(--font-family-sans);
            background-color: var(--brand-bg-light);
            color: var(--text-dark);
            height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            overflow: hidden;
        }

        .chat-header {
            background-color: #FFFFFF;
            padding: 1rem 1rem 0.5rem 1rem;
            border-bottom-left-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
        }

        .header-dropdown-trigger {
            width: 100%;
            text-align: center;
            cursor: pointer;
            margin-top: 5px;
            color: var(--text-dark);
        }

        .header-dropdown-trigger:hover {
            color: var(--brand-orange);
        }

        .chat-content {
            flex-grow: 1;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
            overflow-y: auto;
            padding-bottom: 100px; 
        }

        .message-bubble {
            max-width: 80%;
            padding: 0.8rem 1.2rem;
            font-size: 0.9rem;
            line-height: 1.4;
            position: relative;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .message-time {
            font-size: 0.7rem;
            margin-top: 5px;
            display: block;
            text-align: right;
            opacity: 0.6;
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
            background-color: var(--chat-bubble-receiver);
            width: fit-content;
            max-width: 90%;
            border-radius: 1rem;
            margin-bottom: 0.5rem;
        }

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
            transition: color 0.2s;
        }

        .btn-send-mini:hover {
            color: var(--brand-orange);
        }

        .action-icon {
            font-size: 1.4rem;
            color: #1A1A1A;
            cursor: pointer;
            transition: color 0.2s;
        }

        .action-icon:hover {
            color: var(--brand-orange);
        }

        .modal-content-order {
            border-radius: 1.5rem;
            border: none;
            box-shadow: 0 10px 40px rgba(0,0,0,0.15);
            padding: 1.5rem;
        }

        .order-img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
        }

        .dashed-line {
            border-top: 2px dashed #C4C4C4;
            margin: 1.5rem 0;
        }
        
        .order-price {
            color: var(--brand-orange);
            font-weight: 600;
        }

        .typing-indicator {
            align-self: flex-start;
            background-color: var(--chat-bubble-receiver);
            color: var(--text-dark);
            border-radius: 0 1rem 1rem 1rem;
            padding: 0.8rem 1.2rem;
            display: none;
        }

        .typing-indicator.show {
            display: block;
        }

        .typing-dots {
            display: inline-flex;
            gap: 4px;
        }

        .typing-dots span {
            width: 8px;
            height: 8px;
            background-color: var(--text-dark);
            border-radius: 50%;
            animation: typing 1.4s infinite;
            opacity: 0.4;
        }

        .typing-dots span:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-dots span:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes typing {
            0%, 60%, 100% {
                transform: translateY(0);
                opacity: 0.4;
            }
            30% {
                transform: translateY(-10px);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

    <header class="chat-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <a href="#" onclick="history.back()" class="text-dark"><i class="bi bi-chevron-left fs-4"></i></a>
                
                <img src="https://i.pravatar.cc/300?u=siti" alt="Avatar" class="user-avatar">
                <h5 class="fw-bold mb-0">Siti Maharani</h5>
            </div>
            
            <a href="call" class="text-dark"><i class="bi bi-telephone fs-4"></i></a>
        </div>

        <div class="header-dropdown-trigger" data-bs-toggle="modal" data-bs-target="#orderDetailModal">
            <i class="bi bi-chevron-down fs-5"></i>
        </div>
    </header>

    <main class="chat-content" id="chatContent">
        
        <div class="message-bubble message-system">
            <span>Pesanan Siti telah dikonfirmasi</span><br>
            <em style="font-size: 0.85rem;">[Pesan ini dibuat secara otomatis]</em>
            <span class="message-time">11.50</span>
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

        <div class="message-bubble message-received">
            KAKK, Aku lupa bilang. Buat jusnya bisa minta dua sedotan gaaa
            <span class="message-time">11.55</span>
        </div>

        <div class="message-bubble message-received">
            Biar bs minum berdua pcr ^ ^
            <span class="message-time">11.55</span>
        </div>

        <div class="typing-indicator" id="typingIndicator">
            <div class="typing-dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

    </main>

    <div class="chat-input-area">
        <i class="bi bi-plus-lg action-icon" id="btnAttach"></i>
        
        <div class="input-wrapper">
            <input type="text" class="chat-input-field" id="messageInput" placeholder="Ketik pesan...">
            <i class="bi bi-send-fill btn-send-mini" id="btnSend"></i>
        </div>
        
        <i class="bi bi-camera-fill action-icon" id="btnCamera"></i>
        <i class="bi bi-mic-fill action-icon" id="btnMic"></i>
    </div>

    <div class="modal fade" id="orderDetailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-order">
                
                <h4 class="fw-bold mb-4">Pesanan</h4>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center gap-3">
                        <div style="background: #FFC107; width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                            <img src="https://images.unsplash.com/photo-1603569283847-aa295f0d016a?w=100&q=80" alt="Jus" class="w-100 h-100 object-fit-cover">
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0">Nisa Juice</h6>
                            <small class="text-muted">Jus Jeruk</small>
                        </div>
                    </div>
                    <div class="text-end">
                        <span class="text-muted d-block">3X</span>
                        <span class="order-price">Rp 30.000</span>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-3">
                        <div style="background: #E0E0E0; width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                             <img src="https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?w=100&q=80" alt="Ayam" class="w-100 h-100 object-fit-cover">
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0">Joder</h6>
                            <small class="text-muted">Ayam Geprek</small>
                        </div>
                    </div>
                    <div class="text-end">
                        <span class="text-muted d-block">4X</span>
                        <span class="order-price">Rp 50.000</span>
                    </div>
                </div>

                <div class="dashed-line"></div>

                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">Total</h5>
                    <div class="text-end">
                        <span class="text-muted me-2">7X</span>
                        <span class="fw-bold fs-4 text-warning">Rp 80.000</span>
                    </div>
                </div>

                <div class="text-center mt-4" data-bs-dismiss="modal" style="cursor: pointer;">
                    <i class="bi bi-chevron-double-down fs-4 text-dark"></i>
                </div>

            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        const chatContent = document.getElementById('chatContent');
        const messageInput = document.getElementById('messageInput');
        const btnSend = document.getElementById('btnSend');
        const typingIndicator = document.getElementById('typingIndicator');
        const btnAttach = document.getElementById('btnAttach');
        const btnCamera = document.getElementById('btnCamera');
        const btnMic = document.getElementById('btnMic');

        function getCurrentTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            return `${hours}.${minutes}`;
        }

        function scrollToBottom() {
            chatContent.scrollTop = chatContent.scrollHeight;
        }

        function createMessageBubble(text, type = 'sent') {
            const bubble = document.createElement('div');
            bubble.className = `message-bubble message-${type}`;
            bubble.innerHTML = `
                ${text}
                <span class="message-time">${getCurrentTime()}</span>
            `;
            return bubble;
        }

        function sendMessage() {
            const text = messageInput.value.trim();
            if (text === '') return;

            const messageBubble = createMessageBubble(text, 'sent');
            chatContent.insertBefore(messageBubble, typingIndicator);
            
            messageInput.value = '';
            scrollToBottom();

            // Simulasi balasan otomatis
            setTimeout(() => {
                typingIndicator.classList.add('show');
                scrollToBottom();

                setTimeout(() => {
                    typingIndicator.classList.remove('show');
                    
                    const replies = [
                        'Oke kak, siap!',
                        'Baik, sudah dicatat ya kak',
                        'Siap kak, nanti kami proses',
                        'Terima kasih infonya kak!',
                        'Oke noted kak 👍'
                    ];
                    
                    const randomReply = replies[Math.floor(Math.random() * replies.length)];
                    const replyBubble = createMessageBubble(randomReply, 'received');
                    chatContent.insertBefore(replyBubble, typingIndicator);
                    scrollToBottom();
                }, 2000);
            }, 500);
        }

        btnSend.addEventListener('click', sendMessage);

        messageInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });

        btnAttach.addEventListener('click', () => {
            alert('Fitur attachment akan segera hadir!');
        });

        btnCamera.addEventListener('click', () => {
            alert('Fitur kamera akan segera hadir!');
        });

        btnMic.addEventListener('click', () => {
            alert('Fitur voice message akan segera hadir!');
        });

        scrollToBottom();
    </script>
</body>
</html>