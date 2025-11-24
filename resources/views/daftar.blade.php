<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root{
      --brand:#ff9f1a;
      --brand-dark:#f28b00;
      --soft:#f5f7fb;
      --text:#2b2b2b;
      --muted:#6c757d;
      --field-bg:#f5f5f5;
      --field-border:#ff9f1a;
      --link:#0d6efd;
    }

    /* Latar belakang website seperti sebelumnya */
    body{
      margin: 0;
      background: var(--brand);
      font-family: system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji","Segoe UI Emoji";
      color: var(--text);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 32px 16px;
    }

    /* Kartu utama konten di tengah */
    .auth-shell{
      width: 100%;
      max-width: 460px;
      background: var(--soft);
      border-radius: 30px;
      box-shadow: 0 18px 40px rgba(0,0,0,.16);
      overflow: hidden;
      display: flex;
      flex-direction: column;
    }

    /* Bagian header dengan bubble dan gelombang */
    .hero-top{
      position: relative;
      height: 160px;
      background:
        radial-gradient(circle at 20% 35%, #ffc76a 18px, transparent 19px),
        radial-gradient(circle at 40% 25%, #ffc76a 10px, transparent 11px),
        radial-gradient(circle at 65% 40%, #ffc76a 22px, transparent 23px),
        radial-gradient(circle at 85% 25%, #ffc76a 14px, transparent 15px),
        radial-gradient(circle at 10% 70%, #ffc76a 12px, transparent 13px),
        radial-gradient(circle at 35% 80%, #ffc76a 16px, transparent 17px),
        radial-gradient(circle at 60% 75%, #ffc76a 10px, transparent 11px),
        radial-gradient(circle at 85% 75%, #ffc76a 20px, transparent 21px);
      background-color: var(--brand);
    }

    .hero-top::after{
      content:"";
      position:absolute;
      left:0;
      right:0;
      bottom:-1px;
      height:50px;
      background: var(--soft);
      border-top-left-radius:45% 100%;
      border-top-right-radius:45% 100%;
    }

    .topbar{
      position: absolute;
      inset: 12px 16px auto 16px;
      display: flex;
      align-items: center;
      gap: 8px;
      color: #fff;
      cursor: pointer;
      z-index: 2;
    }

    .sheet{
      padding: 24px 20px 32px;
      flex: 1;
    }

    .heading{
      color: var(--brand-dark);
      font-weight: 800;
      font-size: 28px;
      margin-bottom: 4px;
    }

    .subtitle{
      color: #7b7b7b;
      margin-bottom: 8px;
      font-size: 14px;
    }

    .heading-accent{
      width: 60px;
      height: 4px;
      border-radius: 999px;
      background: var(--brand-dark);
      margin-bottom: 18px;
    }

    .form-card{
      background: transparent;
      border-radius: 18px;
      padding: 4px 0 0;
    }

    .form-label{
      font-weight: 700;
      font-size: 13px;
      color: #000;
      margin-bottom: 6px;
    }

    .input-group{
      border-radius: 999px;
      border: 2px solid var(--field-border);
      background: var(--field-bg);
      overflow: hidden;
    }

    .input-group .input-group-text{
      border: 0;
      background: transparent;
      padding-left: 16px;
      padding-right: 4px;
      color: var(--brand-dark);
      font-size: 16px;
    }

    .input-group .icon-circle{
      width: 30px;
      height: 30px;
      border-radius: 999px;
      background: var(--brand);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 14px;
    }

    .form-control{
      border: 0;
      background: transparent;
      padding-top: 10px;
      padding-bottom: 10px;
      padding-left: 10px;
      font-size: 13px;
      box-shadow: none;
    }

    .form-control:focus{
      box-shadow: none;
    }

    .form-control::placeholder{
      color: var(--brand-dark);
      font-size: 13px;
    }

    .btn-brand{
      background: var(--brand);
      color: #fff;
      border: none;
      border-radius: 999px;
      padding: 12px 18px;
      font-weight: 700;
      width: 100%;
      font-size: 15px;
    }

    .btn-brand:active,
    .btn-brand:hover{
      background: var(--brand-dark);
      color: #fff;
    }

    .already{
      text-align: center;
      font-size: 14px;
      margin-top: 12px;
      color: #555;
    }

    .already a{
      color: var(--brand-dark);
      text-decoration: none;
      font-weight: 700;
    }

    .foot-note{
      font-size: 11px;
      color: var(--muted);
      text-align: center;
    }

    .foot-note a{
      color: #1677ff;
      text-decoration: none;
      font-weight: 600;
    }

    @media (max-width: 576px){
      .auth-shell{
        border-radius: 0;
        max-width: 480px;
      }
    }
  </style>
</head>
<body>

  <main class="auth-shell">
    <div class="hero-top">
      <div class="topbar" onclick="window.location.href='/'">
        <i class="bi bi-chevron-left fs-5"></i>
      </div>
    </div>

    <section class="sheet">
      <h1 class="heading">Daftar</h1>
      <p class="subtitle">Gabung bareng kami dan nikmati kemudahan titip makanan favoritmu</p>
      <div class="heading-accent"></div>

      <div class="form-card">
        <form class="needs-validation" novalidate>
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <div class="input-group">
              <span class="input-group-text">
                <span class="icon-circle">
                  <i class="bi bi-pencil"></i>
                </span>
              </span>
              <input type="text" class="form-control" placeholder="Masukkan nama anda" required>
              <div class="invalid-feedback">Nama wajib diisi</div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <div class="input-group">
              <span class="input-group-text">
                <span class="icon-circle">
                  <i class="bi bi-envelope"></i>
                </span>
              </span>
              <input type="email" class="form-control" placeholder="Masukkan email anda" required>
              <div class="invalid-feedback">Email tidak valid</div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Kata Sandi</label>
            <div class="input-group">
              <span class="input-group-text">
                <span class="icon-circle">
                  <i class="bi bi-lock"></i>
                </span>
              </span>
              <input id="password" type="password" class="form-control" placeholder="Masukkan kata sandi anda" minlength="6" required>
              <div class="invalid-feedback">Minimal 6 karakter</div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Konfirmasi Kata Sandi</label>
            <div class="input-group">
              <span class="input-group-text">
                <span class="icon-circle">
                  <i class="bi bi-lock-fill"></i>
                </span>
              </span>
              <input id="confirm" type="password" class="form-control" placeholder="Masukkan ulang kata sandi anda" minlength="6" required>
              <div class="invalid-feedback">Harus sama dengan kata sandi</div>
            </div>
          </div>

          <button type="submit" class="btn btn-brand mt-3">Daftar</button>

          <p class="already mt-3">
            Sudah punya akun
            <a href="#">Masuk</a>
          </p>

          <p class="foot-note mt-3 mb-0">
            Dengan mendaftar, kamu menyetujui
            <a href="#">Syarat & Ketentuan</a> dan
            <a href="#">Kebijakan Privasi</a> kami.
          </p>
        </form>
      </div>
    </section>
  </main>

  <script>
    // Validasi sederhana termasuk cek konfirmasi password
    (() => {
      const form = document.querySelector(".needs-validation");
      const password = document.getElementById("password");
      const confirmPassword = document.getElementById("confirm");

      form.addEventListener("submit", e => {
        if (password.value !== confirmPassword.value) {
          confirmPassword.setCustomValidity("Mismatch");
        } else {
          confirmPassword.setCustomValidity("");
        }
        if (!form.checkValidity()) {
          e.preventDefault();
          e.stopPropagation();
        }
        form.classList.add("was-validated");
      });
    })();
  </script>
</body>
</html>
