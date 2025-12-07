<!DOCTYPE html>
<html lang="id">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Kata Sandi</title>
    
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
        }

        .brand-header {
            background-color: var(--brand-orange);
            padding: 1.5rem 1rem;
            background-image: 
                radial-gradient(circle at 15% 20%, var(--brand-orange-light, #fff) 20px, transparent 21px),
                radial-gradient(circle at 75% 30%, var(--brand-orange-light, #fff) 40px, transparent 41px),
                radial-gradient(circle at 40% 60%, var(--brand-orange-light, #fff) 30px, transparent 31px),
                radial-gradient(circle at 80% 80%, var(--brand-orange-light, #fff) 25px, transparent 26px),
                radial-gradient(circle at 10% 85%, var(--brand-orange-light, #fff) 35px, transparent 36px);
            background-size: cover;
            background-position: center;
            border-bottom-left-radius: 30% 20%;
            border-bottom-right-radius: 30% 20%;
            min-height: 150px;
        }

        .brand-header a {
            color: white;
            font-size: 1.75rem;
            text-decoration: none;
        }

        .forgot-container {
            margin-top: -50px;
            background-color: var(--brand-bg-light);
            border-top-left-radius: 2rem;
            border-top-right-radius: 2rem;
            padding-top: 2rem;
            padding-bottom: 2rem;
            flex-grow: 1;
        }

        .form-label {
            font-weight: 600;
            color: var(--brand-text-dark);
            margin-bottom: 0.5rem;
            margin-left: 0.5rem;
        }

        .form-icon-wrapper {
            position: relative;
        }

        .form-icon-wrapper .form-icon {
            position: absolute;
            top: 50%;
            left: 1.25rem; 
            transform: translateY(-50%);
            color: var(--brand-orange);
            font-size: 1.1rem;
        }

        .form-icon-wrapper .form-control {
            padding-left: 3.25rem; 
            padding-top: 0.8rem;
            padding-bottom: 0.8rem;
            border-radius: 50rem;
            border: 1px solid #E0E0E0;
            background-color: #FFFFFF;
        }

        .form-control:focus {
            border-color: var(--brand-orange);
            box-shadow: 0 0 0 0.25rem var(--brand-orange-light);
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            display: none;
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            margin-left: 0.5rem;
        }

        .invalid-feedback.d-block {
            display: block;
        }

        .btn-brand {
            background-color: var(--brand-orange);
            border-color: var(--brand-orange);
            color: #FFFFFF;
            font-weight: 700;
            padding-top: 0.8rem;
            padding-bottom: 0.8rem;
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

        .back-link {
            color: var(--brand-text-muted);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .back-link:hover {
            color: var(--brand-orange);
        }

        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid #ffffff;
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .alert {
            border-radius: 1rem;
            padding: 1rem 1.5rem;
        }
    </style>
</head>

<body class="d-flex flex-column vh-100">

    <header class="brand-header">
        <div class="container">
            <a href="javascript:history.back()"><i class="bi bi-arrow-left"></i></a>
        </div>
    </header>

    <main class="forgot-container flex-grow-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5 col-xl-4">
                    
                    <h1 class="h2 fw-bold">Lupa Kata Sandi</h1>
                    <p class="text-muted mb-4">
                        Masukkan email yang terdaftar untuk menerima kode OTP verifikasi.
                    </p>

                    <!-- Alert untuk error message -->
                    <div id="alertMessage" class="alert alert-danger d-none" role="alert">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        <span id="alertText"></span>
                    </div>

                    <form id="forgotPasswordForm">
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <div class="form-icon-wrapper">
                                <i class="bi bi-envelope form-icon"></i>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email anda" required>
                            </div>
                            <div class="invalid-feedback" id="emailError">
                                Email tidak valid
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-brand rounded-pill" id="submitBtn">
                                <span id="btnText">Kirim Kode OTP</span>
                                <span class="loading-spinner" id="loadingSpinner"></span>
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <a href="/login" class="back-link">
                            <i class="bi bi-arrow-left"></i>
                            <span>Kembali ke Masuk</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.getElementById('forgotPasswordForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Reset error states
            const emailInput = document.getElementById('email');
            const emailError = document.getElementById('emailError');
            const alertMessage = document.getElementById('alertMessage');
            const alertText = document.getElementById('alertText');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const loadingSpinner = document.getElementById('loadingSpinner');
            
            emailInput.classList.remove('is-invalid');
            emailError.classList.remove('d-block');
            alertMessage.classList.add('d-none');
            
            // Get email value
            const email = emailInput.value.trim();
            
            // Basic email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                emailInput.classList.add('is-invalid');
                emailError.textContent = 'Format email tidak valid';
                emailError.classList.add('d-block');
                return;
            }
            
            // Show loading state
            submitBtn.disabled = true;
            btnText.style.display = 'none';
            loadingSpinner.style.display = 'inline-block';
            
            try {
                // Send request to check email and send OTP
                const response = await fetch('/api/forgot-password', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                    },
                    body: JSON.stringify({ email: email })
                });
                
                const data = await response.json();
                
                if (response.ok && data.success) {
                    // Email ditemukan, redirect ke halaman OTP
                    window.location.href = '/forgotpass-otp?email=' + encodeURIComponent(email);
                } else {
                    // Email tidak ditemukan atau error lainnya
                    alertMessage.classList.remove('d-none');
                    alertText.textContent = data.message || 'Email tidak terdaftar dalam sistem kami.';
                    
                    // Reset loading state
                    submitBtn.disabled = false;
                    btnText.style.display = 'inline';
                    loadingSpinner.style.display = 'none';
                }
            } catch (error) {
                console.error('Error:', error);
                alertMessage.classList.remove('d-none');
                alertText.textContent = 'Terjadi kesalahan. Silakan coba lagi.';
                
                // Reset loading state
                submitBtn.disabled = false;
                btnText.style.display = 'inline';
                loadingSpinner.style.display = 'none';
            }
        });
    </script>
</body>
</html>