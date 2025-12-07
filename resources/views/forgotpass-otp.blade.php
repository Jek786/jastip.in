<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Periksa Email - Verifikasi OTP</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --brand-orange: #F7941D;
            --brand-orange-light: #FCEFDB;
            --brand-bg-light: #F8F8F8;
            --brand-text-dark: #333333;
            --brand-text-muted: #828282;
            --font-family-sans-serif: 'Poppins', sans-serif;
        }

        body {
            font-family: var(--font-family-sans-serif);
            background-color: var(--brand-bg-light);
            color: var(--brand-text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

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
            text-decoration: none;
        }

        .app-header .header-title {
            font-weight: 500;
            font-size: 1.15rem;
            margin-bottom: 0;
        }

        .main-content {
            flex-grow: 1;
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
            color: var(--brand-orange);
            font-weight: 600;
        }

        .otp-input-group {
            display: flex;
            justify-content: space-between;
            gap: 0.5rem;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .otp-input {
            width: 50px;
            height: 50px;
            font-size: 1.5rem;
            text-align: center;
            border: 1px solid #E0E0E0;
            border-radius: 0.75rem;
            background-color: #FFFFFF;
            -moz-appearance: textfield;
        }

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

        .otp-input.is-invalid {
            border-color: #dc3545;
        }

        .btn-brand {
            background-color: var(--brand-orange);
            border-color: var(--brand-orange);
            color: #FFFFFF;
            font-weight: 700;
            padding-top: 0.8rem;
            padding-bottom: 0.8rem;
            border-radius: 50rem;
        }

        .btn-brand:hover, .btn-brand:focus {
            background-color: #e08110;
            border-color: #e08110;
            color: #FFFFFF;
        }

        .btn-brand:disabled {
            background-color: #cccccc;
            border-color: #cccccc;
            cursor: not-allowed;
        }

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

        .alert {
            border-radius: 1rem;
            padding: 1rem 1.5rem;
            margin-bottom: 1rem;
        }

        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid #ffffff;
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            margin-left: 0.5rem;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .resend-link {
            color: var(--brand-orange);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .resend-link:hover {
            text-decoration: underline;
        }

        .resend-link:disabled {
            color: var(--brand-text-muted);
            cursor: not-allowed;
            pointer-events: none;
        }
    </style>
</head>

<body class="d-flex flex-column">

    <header class="app-header">
        <div class="container d-flex align-items-center">
            <a href="javascript:history.back()" class="back-link"><i class="bi bi-arrow-left"></i></a>
            <h1 class="header-title">Periksa Email</h1>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5 col-xl-4">
                    
                    <p class="email-info mb-4">
                        Kami mengirim kode OTP ke <strong id="emailDisplay">{{ $email ?? 'email@example.com' }}</strong>
                        masukkan kode 6 digit yang disebutkan di email
                    </p>

                    <!-- Alert untuk error/success message -->
                    <div id="alertMessage" class="alert alert-danger d-none" role="alert">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        <span id="alertText"></span>
                    </div>

                    <form id="otpForm">
                        <input type="hidden" id="emailInput" name="email" value="{{ $email ?? '' }}">
                        
                        <div class="otp-input-group">
                            <input type="number" class="form-control otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric" data-index="0" autofocus>
                            <input type="number" class="form-control otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric" data-index="1">
                            <input type="number" class="form-control otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric" data-index="2">
                            <input type="number" class="form-control otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric" data-index="3">
                            <input type="number" class="form-control otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric" data-index="4">
                            <input type="number" class="form-control otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric" data-index="5">
                        </div>

                        <div class="text-center mb-3">
                            <span class="text-muted" style="font-size: 0.9rem;">Tidak menerima kode? </span>
                            <a href="#" class="resend-link" id="resendLink">Kirim Ulang</a>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-brand" id="submitBtn">
                                <span id="btnText">Verifikasi</span>
                                <span class="loading-spinner" id="loadingSpinner"></span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>

    <footer class="register-link text-center">
        <div class="container">
            <p>Belum punya akun? <a href="/daftar">Daftar</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const otpInputs = document.querySelectorAll('.otp-input');
            const otpForm = document.getElementById('otpForm');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const loadingSpinner = document.getElementById('loadingSpinner');
            const alertMessage = document.getElementById('alertMessage');
            const alertText = document.getElementById('alertText');
            const resendLink = document.getElementById('resendLink');
            const emailInput = document.getElementById('emailInput');

            // Auto-focus ke input berikutnya
            otpInputs.forEach((input, index) => {
                input.addEventListener('input', function(e) {
                    // Hanya ambil digit pertama
                    if (this.value.length > 1) {
                        this.value = this.value.charAt(0);
                    }
                    
                    if (this.value.length === 1 && index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }

                    // Reset error state
                    this.classList.remove('is-invalid');
                    alertMessage.classList.add('d-none');
                });

                input.addEventListener('keydown', function(event) {
                    // Jika Backspace ditekan dan input kosong, fokus ke input sebelumnya
                    if (event.key === 'Backspace' && this.value.length === 0 && index > 0) {
                        otpInputs[index - 1].focus();
                    }
                });

                // Prevent paste with multiple digits
                input.addEventListener('paste', function(e) {
                    e.preventDefault();
                    const pastedData = e.clipboardData.getData('text');
                    const digits = pastedData.replace(/\D/g, '').split('');
                    
                    digits.forEach((digit, i) => {
                        if (index + i < otpInputs.length) {
                            otpInputs[index + i].value = digit;
                        }
                    });
                    
                    if (index + digits.length < otpInputs.length) {
                        otpInputs[index + digits.length].focus();
                    }
                });
            });

            // Form submit
            otpForm.addEventListener('submit', async function(e) {
                e.preventDefault();

                // Ambil nilai OTP dari semua input
                let otp = '';
                otpInputs.forEach(input => {
                    otp += input.value;
                });

                // Validasi OTP harus 6 digit
                if (otp.length !== 6) {
                    alertMessage.classList.remove('d-none');
                    alertMessage.classList.remove('alert-success');
                    alertMessage.classList.add('alert-danger');
                    alertText.textContent = 'Masukkan kode OTP 6 digit lengkap.';
                    otpInputs.forEach(input => input.classList.add('is-invalid'));
                    return;
                }

                const email = emailInput.value;

                // Show loading state
                submitBtn.disabled = true;
                btnText.textContent = 'Memverifikasi...';
                loadingSpinner.style.display = 'inline-block';
                alertMessage.classList.add('d-none');

                try {
                    // Send OTP verification request
                    const response = await fetch('/api/verify-otp', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ 
                            email: email,
                            otp: otp 
                        })
                    });

                    const data = await response.json();

                    if (response.ok && data.success) {
                        // OTP benar, redirect ke halaman new password
                        alertMessage.classList.remove('d-none');
                        alertMessage.classList.remove('alert-danger');
                        alertMessage.classList.add('alert-success');
                        alertText.textContent = 'Verifikasi berhasil! Mengalihkan...';
                        
                        setTimeout(() => {
                            window.location.href = '/newpass?email=' + encodeURIComponent(email);
                        }, 1000);
                    } else {
                        // OTP salah atau error
                        alertMessage.classList.remove('d-none');
                        alertMessage.classList.remove('alert-success');
                        alertMessage.classList.add('alert-danger');
                        alertText.textContent = data.message || 'Kode OTP tidak valid.';
                        
                        otpInputs.forEach(input => {
                            input.classList.add('is-invalid');
                            input.value = '';
                        });
                        otpInputs[0].focus();

                        // Reset loading state
                        submitBtn.disabled = false;
                        btnText.textContent = 'Verifikasi';
                        loadingSpinner.style.display = 'none';
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alertMessage.classList.remove('d-none');
                    alertMessage.classList.add('alert-danger');
                    alertText.textContent = 'Terjadi kesalahan. Silakan coba lagi.';

                    // Reset loading state
                    submitBtn.disabled = false;
                    btnText.textContent = 'Verifikasi';
                    loadingSpinner.style.display = 'none';
                }
            });

            // Resend OTP
            resendLink.addEventListener('click', async function(e) {
                e.preventDefault();
                
                const email = emailInput.value;
                
                if (!email) {
                    alertMessage.classList.remove('d-none');
                    alertMessage.classList.add('alert-danger');
                    alertText.textContent = 'Email tidak ditemukan.';
                    return;
                }

                // Disable resend link
                resendLink.classList.add('disabled');
                resendLink.textContent = 'Mengirim...';

                try {
                    const response = await fetch('/api/forgot-password', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ email: email })
                    });

                    const data = await response.json();

                    if (response.ok && data.success) {
                        alertMessage.classList.remove('d-none');
                        alertMessage.classList.remove('alert-danger');
                        alertMessage.classList.add('alert-success');
                        alertText.textContent = 'Kode OTP baru telah dikirim ke email Anda.';
                        
                        // Clear OTP inputs
                        otpInputs.forEach(input => {
                            input.value = '';
                            input.classList.remove('is-invalid');
                        });
                        otpInputs[0].focus();

                        // Enable resend link after 60 seconds
                        setTimeout(() => {
                            resendLink.classList.remove('disabled');
                            resendLink.textContent = 'Kirim Ulang';
                        }, 60000);
                    } else {
                        alertMessage.classList.remove('d-none');
                        alertMessage.classList.add('alert-danger');
                        alertText.textContent = data.message || 'Gagal mengirim ulang kode.';
                        
                        resendLink.classList.remove('disabled');
                        resendLink.textContent = 'Kirim Ulang';
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alertMessage.classList.remove('d-none');
                    alertMessage.classList.add('alert-danger');
                    alertText.textContent = 'Terjadi kesalahan. Silakan coba lagi.';
                    
                    resendLink.classList.remove('disabled');
                    resendLink.textContent = 'Kirim Ulang';
                }
            });
        });
    </script>
</body>
</html>