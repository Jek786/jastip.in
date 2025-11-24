<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar</title>

  <!-- Google Fonts Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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

    body{
      margin: 0;
      background: var(--brand);
      font-family: "Poppins", sans-serif;
      color: var(--text);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 32px 16px;
    }

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

    .hero-wave{
      position: absolute;
      left: 0;
      bottom: -1px;
      width: 100%;
      height: 70px;
    }

    .topbar{
      position: absolute;
      inset: 12px 16px auto 16px;
      color: #fff;
      cursor: pointer;
      z-index: 2;
    }

    .sheet{
      padding: 24px 20px 32px;
    }

    .heading{
      color: var(--brand-dark);
      font-weight: 800;
      font-size: 28px;
    }

    .subtitle{
      color: #7b7b7b;
      font-size: 14px;
      margin-top: 4px;
      margin-bottom: 10px;
    }

    .heading-accent{
      width: 60px;
      height: 4px;
      border-radius: 999px;
      background: var(--brand-dark);
      margin-bottom: 18px;
    }

    .form-label{
      font-weight: 600;
      margin-bottom: 6px;
    }

    .input-group{
      border-radius: 999px;
      border: 2px solid var(--field-border);
      background: var(--field-bg);
      position: relative;
      padding-right: 38px;
    }

    .input-group-text{
      background: transparent;
      border: none;
      padding-left: 14px;
      padding-right: 4px;
    }

    .icon-circle{
      width: 30px;
      height: 30px;
      background: var(--brand);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 14px;
    }

    .form-control{
      border: none;
      background: transparent;
      padding-left: 10px;
      padding-top: 10px;
      padding-bottom: 10px;
      font-size: 14px;
    }

    .form-control:focus{
      box-shadow: none;
    }

    .form-control.is-valid,
    .form-control.is-invalid,
    .was-validated .form-control:valid,
    .was-validated .form-control:invalid{
      background-image: none;
    }

    .valid-icon, .error-icon{
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 17px;
      display: none;
    }

    .valid-icon{ color: #22c55e; }
    .error-icon{ color: #ff4b6a; }

    .was-validated .form-control:valid ~ .valid-icon{
      display: block;
    }
    .was-validated .form-control:invalid ~ .error-icon{
      display: block;
    }

    /* posisi tulisan merah harus sejajar dengan input text */
    .invalid-feedback{
      font-size: 11px;
      color: #ff4b6a;
      margin-left: 44px;  /* ⬅️ sejajar dengan input */
      margin-top: -2px;   /* dekat tapi tidak nempel */
      line-height: 1.25;
    }

    .btn-brand{
      width: 100%;
      background: var(--brand);
      color: white;
      border: none;
      border-radius: 999px;
      padding: 12px;
      font-weight: 700;
      font-size: 15px;
      margin-top: 4px;
    }

    .already{
      text-align: center;
      font-size: 14px;
      margin-top: 14px;
      color: #555;
    }

    .already a{
      color: var(--brand-dark);
      font-weight: 600;
      text-decoration: none;
    }

    .foot-note{
      font-size: 11px;
      text-align: center;
      margin-top: 10px;
      line-height: 1.4;
    }

    .foot-note a{
      color: #1677ff;
      text-decoration: none;
      font-weight: 600;
    }
  </style>
</head>
<body>

  <main class="auth-shell">
    <div class="hero-top">
      <div class="topbar" onclick="window.location.href='/welcome'">
        <i class="bi bi-chevron-left fs-5"></i>
      </div>

      <svg class="hero-wave" viewBox="0 0 1440 80">
        <path d="M0,60 C90,50 170,35 250,40 C330,45 390,65 470,64 C560,63 620,45 700,40 C780,35 860,45 930,55 C1010,67 1100,72 1180,60 C1260,48 1350,40 1440,50 L1440,80 L0,80 Z" fill="#f5f7fb"/>
      </svg>
    </div>

    <section class="sheet">
      <h1 class="heading">Daftar</h1>
      <p class="subtitle">Gabung bareng kami dan nikmati kemudahan titip makanan favoritmu</p>
      <div class="heading-accent"></div>

      <form class="needs-validation" novalidate>
        
        <!-- NAMA -->
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <div class="input-group">
            <span class="input-group-text"><span class="icon-circle"><i class="bi bi-pencil"></i></span></span>
            <input type="text" class="form-control" required>
            <span class="valid-icon bi bi-check2"></span>
            <span class="error-icon bi bi-info-circle"></span>
            <div class="invalid-feedback">Nama wajib diisi</div>
          </div>
        </div>

        <!-- EMAIL -->
        <div class="mb-3">
          <label class="form-label">Email</label>
          <div class="input-group">
            <span class="input-group-text"><span class="icon-circle"><i class="bi bi-envelope"></i></span></span>
            <input type="email" class="form-control" required>
            <span class="valid-icon bi bi-check2"></span>
            <span class="error-icon bi bi-info-circle"></span>
            <div class="invalid-feedback">Email tidak valid</div>
          </div>
        </div>

        <!-- PASSWORD -->
        <div class="mb-3">
          <label class="form-label">Kata Sandi</label>
          <div class="input-group">
            <span class="input-group-text"><span class="icon-circle"><i class="bi bi-lock"></i></span></span>
            <input id="password" type="password" minlength="6" class="form-control" required>
            <span class="valid-icon bi bi-check2"></span>
            <span class="error-icon bi bi-info-circle"></span>
            <div class="invalid-feedback">Minimal 6 karakter</div>
          </div>
        </div>

        <!-- CONFIRM -->
        <div class="mb-3">
          <label class="form-label">Konfirmasi Kata Sandi</label>
          <div class="input-group">
            <span class="input-group-text"><span class="icon-circle"><i class="bi bi-lock-fill"></i></span></span>
            <input id="confirm" type="password" minlength="6" class="form-control" required>
            <span class="valid-icon bi bi-check2"></span>
            <span class="error-icon bi bi-info-circle"></span>
            <div class="invalid-feedback">Harus sama dengan kata sandi</div>
          </div>
        </div>

        <button class="btn-brand" type="submit">Daftar</button>

        <p class="already">
          Sudah punya akun <a href="/login">Masuk</a>
        </p>

        <p class="foot-note">
          Dengan mendaftar, kamu menyetujui<br>
          <a href="#">Syarat & Ketentuan</a> dan <a href="#">Kebijakan Privasi</a> kami.
        </p>

      </form>
    </section>
  </main>

  <script>
    (() => {
      const form = document.querySelector(".needs-validation");
      const pass = document.getElementById("password");
      const confirm = document.getElementById("confirm");

      form.addEventListener("submit", e => {
        if (pass.value !== confirm.value) {
          confirm.setCustomValidity("Mismatch");
        } else {
          confirm.setCustomValidity("");
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
