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
            --brand-bg-light: #EBEBEB;
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
            transition: all 0.3s;
        }

        .btn-modal-primary:hover {
            background-color: #e68519;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(247, 148, 29, 0.3);
        }
        
        .btn-modal-outline {
            background-color: white;
            color: var(--text-dark);
            border: 1px solid var(--brand-orange);
            border-radius: 2rem;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-modal-outline:hover {
            background-color: var(--brand-orange);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(247, 148, 29, 0.3);
        }
        
        .dashed-line {
            border-top: 2px dashed #ccc;
            margin: 1.5rem 0;
        }

        .typing-indicator {
            align-self: flex-start;
            background-color: var(--chat-bubble-receiver);
            color: var(--text-dark);
            border-radius: 0 1rem 1rem 1rem;
            padding: 0.75rem 1rem;
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

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 0.5rem;
            text-align: center;
            margin-top: 1rem;
            display: none;
        }

        .success-message.show {
            display: block;
            animation: slideIn 0.3s ease-out;
        }
    </style>
</head>
<body>

    <header class="chat-header">
        <div class="chat-header-top">
            <div class="d-flex align-items-center gap-3">
                <a href="#" onclick="history.back()" class="text-dark"><i class="bi bi-chevron-left fs-4"></i></a>
                <img src="https://i.pravatar.cc/150?u=bambang" alt="Avatar" class="user-avatar">
                <div class="user-info">
                    <h5>Bambang Gemoy</h5>
                </div>
            </div>
            <div>
                <a href="call" class="text-dark"><i class="bi bi-telephone fs-4"></i></a>
            </div>
        </div>

        <div class="header-dropdown-trigger" data-bs-toggle="modal" data-bs-target="#orderIssueModal">
            <i class="bi bi-chevron-down fs-5"></i>
        </div>
    </header>

    <main class="chat-content" id="chatContent">
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
                            <button class="btn btn-modal-primary w-100 py-2" id="btnRefund">Refund</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-modal-outline w-100 py-2" id="btnEnd">Akhiri</button>
                        </div>
                    </div>

                    <div class="success-message" id="successMessage">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span id="successText"></span>
                    </div>
                    
                    <div class="text-center mt-3" style="cursor: pointer;" data-bs-dismiss="modal">
                        <i class="bi bi-chevron-double-down text-muted fs-5"></i>
                    </div>

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
        const btnRefund = document.getElementById('btnRefund');
        const btnEnd = document.getElementById('btnEnd');
        const successMessage = document.getElementById('successMessage');
        const successText = document.getElementById('successText');

        let orderIssueModal;

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

        function createSystemMessage(text) {
            const bubble = document.createElement('div');
            bubble.className = 'message-bubble message-system';
            bubble.innerHTML = `
                ${text}<br>
                <span class="opacity-75">[Pesan ini dibuat secara otomatis]</span>
                <span class="message-time text-end">${getCurrentTime()}</span>
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

            // Simulasi balasan dari customer yang sedang complaint
            setTimeout(() => {
                typingIndicator.classList.add('show');
                scrollToBottom();

                setTimeout(() => {
                    typingIndicator.classList.remove('show');
                    
                    const complaintReplies = [
                        'Iya kak, terima kasih sudah cepat tanggap',
                        'Oke deh kak, tapi lain kali hati-hati ya',
                        'MASIH LAMA GAK SIH?',
                        'Oke kak, ditunggu refundnya',
                        'Makasih kak sudah membantu'
                    ];
                    
                    const randomReply = complaintReplies[Math.floor(Math.random() * complaintReplies.length)];
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

        // Handle Refund Button
        btnRefund.addEventListener('click', () => {
            successText.textContent = 'Refund berhasil diproses!';
            successMessage.classList.add('show');

            setTimeout(() => {
                const systemMsg = createSystemMessage('Refund sebesar Rp 10.000 telah diproses');
                chatContent.insertBefore(systemMsg, typingIndicator);
                scrollToBottom();

                setTimeout(() => {
                    successMessage.classList.remove('show');
                    
                    if (orderIssueModal) {
                        orderIssueModal.hide();
                    }

                    setTimeout(() => {
                        typingIndicator.classList.add('show');
                        scrollToBottom();

                        setTimeout(() => {
                            typingIndicator.classList.remove('show');
                            const thankYouMsg = createMessageBubble('Makasih ya kak sudah refund. Maaf ya merepotkan 🙏', 'received');
                            chatContent.insertBefore(thankYouMsg, typingIndicator);
                            scrollToBottom();
                        }, 2000);
                    }, 500);
                }, 1500);
            }, 2000);
        });

        // Handle End Button
        btnEnd.addEventListener('click', () => {
            successText.textContent = 'Percakapan telah diakhiri';
            successMessage.classList.add('show');

            setTimeout(() => {
                const systemMsg = createSystemMessage('Chat dengan Bambang Gemoy telah diakhiri');
                chatContent.insertBefore(systemMsg, typingIndicator);
                scrollToBottom();

                setTimeout(() => {
                    successMessage.classList.remove('show');
                    
                    if (orderIssueModal) {
                        orderIssueModal.hide();
                    }

                    messageInput.disabled = true;
                    messageInput.placeholder = 'Chat telah diakhiri';
                }, 1500);
            }, 2000);
        });

        // Initialize modal
        document.addEventListener('DOMContentLoaded', () => {
            const modalElement = document.getElementById('orderIssueModal');
            orderIssueModal = new bootstrap.Modal(modalElement);
            
            scrollToBottom();
        });
    </script>
</body>
</html>