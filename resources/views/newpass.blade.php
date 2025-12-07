<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kata Sandi Baru</title>
    
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
            z-index: 10;
        }

        .form-icon-wrapper .toggle-password {
            position: absolute;
            top: 50%;
            right: 1.25rem;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--brand-text-muted);
            font-size: 1.1rem;
            z-index: 10;
        }

        .form-icon-wrapper .toggle-password:hover {
            color: var(--brand-orange);
        }

        .form-icon-wrapper .form-control {
            padding-left: 3.25rem; 
            padding-right: 3.25rem;
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

        .password-requirements {
            font-size: 0.85rem;
            color: var(--brand-text-muted);
            margin-top: 0.5rem;
            margin-left: 0.5rem;
        }

        .password-requirements ul {
            margin: 0.5rem 0 0 0;
            padding-left: 1.5rem;
        }

        .password-requirements li {
            margin-bottom: 0.25rem;
        }

        .password-requirements li.valid {
            color: #28a745;
        }

        .password-requirements li.valid::marker {
            content: "✓ ";
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
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>

<body class="d-flex flex-column">

    <header class="app-header">
        <div class="container d-flex align-items-center">
            <a href="javascript:history.back()" class="back-link"><i class="bi bi-arrow-left"></i></a>
            <h1 class="header-title">Kata Sandi Baru</h1>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5 col-xl-4">
                    
                    <p class="text-muted mb-4">
                        Silahkan atur ulang kata sandi Anda
                    </p>

                    <!-- Alert untuk error/success message -->
                    <div id="alertMessage" class="alert alert-danger d-none" role="alert">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        <span id="alertText"></span>
                    </div>

                    <form id="newPasswordForm">
                        <input type="hidden" id="emailInput" name="email" value="{{ $email ?? '' }}">

                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi Baru</label>
                            <div class="form-icon-wrapper">
                                <i class="bi bi-lock-fill form-icon"></i>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi baru" required>
                                <i class="bi bi-eye toggle-password" id="togglePassword"></i>
                            </div>
                            <div class="invalid-feedback" id="passwordError">
                                Password tidak valid
                            </div>
                            <div class="password-requirements">
                                <small>Password harus memenuhi:</small>
                                <ul id="passwordReqs">
                                    <li id="req-length">Minimal 6 karakter</li>
                                    <li id="req-letter">Mengandung huruf</li>
                                </ul>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="confirm-password" class="form-label">Konfirmasi Kata Sandi</label>
                            <div class="form-icon-wrapper">
                                <i class="bi bi-lock-fill form-icon"></i>
                                <input type="password" class="form-control" id="confirm-password" name="password_confirmation" placeholder="Masukkan ulang kata sandi" required>
                                <i class="bi bi-eye toggle-password" id="toggleConfirmPassword"></i>
                            </div>
                            <div class="invalid-feedback" id="confirmPasswordError">
                                Password tidak cocok
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-brand" id="submitBtn">
                                <span id="btnText">Simpan Kata Sandi</span>
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
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('confirm-password');
            const togglePassword = document.getElementById('togglePassword');
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
            const newPasswordForm = document.getElementById('newPasswordForm');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const loadingSpinner = document.getElementById('loadingSpinner');
            const alertMessage = document.getElementById('alertMessage');
            const alertText = document.getElementById('alertText');
            const passwordError = document.getElementById('passwordError');
            const confirmPasswordError = document.getElementById('confirmPasswordError');

            // Toggle password visibility
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.classList.toggle('bi-eye');
                this.classList.toggle('bi-eye-slash');
            });

            toggleConfirmPassword.addEventListener('click', function() {
                const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPasswordInput.setAttribute('type', type);
                this.classList.toggle('bi-eye');
                this.classList.toggle('bi-eye-slash');
            });

            // Password validation on input
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                const reqLength = document.getElementById('req-length');
                const reqLetter = document.getElementById('req-letter');

                // Check length
                if (password.length >= 6) {
                    reqLength.classList.add('valid');
                } else {
                    reqLength.classList.remove('valid');
                }

                // Check letter
                if (/[a-zA-Z]/.test(password)) {
                    reqLetter.classList.add('valid');
                } else {
                    reqLetter.classList.remove('valid');
                }

                // Remove error state
                this.classList.remove('is-invalid');
                passwordError.classList.remove('d-block');
            });

            // Confirm password validation on input
            confirmPasswordInput.addEventListener('input', function() {
                this.classList.remove('is-invalid');
                confirmPasswordError.classList.remove('d-block');
            });

            // Form submit
            newPasswordForm.addEventListener('submit', async function(e) {
                e.preventDefault();

                // Reset error states
                passwordInput.classList.remove('is-invalid');
                confirmPasswordInput.classList.remove('is-invalid');
                passwordError.classList.remove('d-block');
                confirmPasswordError.classList.remove('d-block');
                alertMessage.classList.add('d-none');

                const email = document.getElementById('emailInput').value;
                const password = passwordInput.value;
                const confirmPassword = confirmPasswordInput.value;

                // Validate password
                if (password.length < 6) {
                    passwordInput.classList.add('is-invalid');
                    passwordError.textContent = 'Password minimal 6 karakter';
                    passwordError.classList.add('d-block');
                    return;
                }

                if (!/[a-zA-Z]/.test(password)) {
                    passwordInput.classList.add('is-invalid');
                    passwordError.textContent = 'Password harus mengandung huruf';
                    passwordError.classList.add('d-block');
                    return;
                }

                // Validate password match
                if (password !== confirmPassword) {
                    confirmPasswordInput.classList.add('is-invalid');
                    confirmPasswordError.textContent = 'Password tidak cocok';
                    confirmPasswordError.classList.add('d-block');
                    return;
                }

                // Show loading state
                submitBtn.disabled = true;
                btnText.textContent = 'Menyimpan...';
                loadingSpinner.style.display = 'inline-block';

                try {
                    // Send reset password request
                    const response = await fetch('/api/reset-password', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            email: email,
                            password: password,
                            password_confirmation: confirmPassword
                        })
                    });

                    const data = await response.json();

                    if (response.ok && data.success) {
                        // Password berhasil diubah
                        alertMessage.classList.remove('d-none');
                        alertMessage.classList.remove('alert-danger');
                        alertMessage.classList.add('alert-success');
                        alertText.textContent = 'Password berhasil diubah! Mengalihkan ke halaman login...';

                        // Redirect ke login setelah 2 detik
                        setTimeout(() => {
                            window.location.href = '/login';
                        }, 2000);
                    } else {
                        // Error
                        alertMessage.classList.remove('d-none');
                        alertMessage.classList.remove('alert-success');
                        alertMessage.classList.add('alert-danger');
                        alertText.textContent = data.message || 'Gagal mengubah password. Silakan coba lagi.';

                        // Reset loading state
                        submitBtn.disabled = false;
                        btnText.textContent = 'Simpan Kata Sandi';
                        loadingSpinner.style.display = 'none';
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alertMessage.classList.remove('d-none');
                    alertMessage.classList.add('alert-danger');
                    alertText.textContent = 'Terjadi kesalahan. Silakan coba lagi.';

                    // Reset loading state
                    submitBtn.disabled = false;
                    btnText.textContent = 'Simpan Kata Sandi';
                    loadingSpinner.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>