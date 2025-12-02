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
      --brand-dark:#ff8a00;
      --soft:#f5f7fb;
      --text:#2b2b2b;
      --muted:#6c757d;
      --field-bg:#ffffff;
      --field-border:#f3b664;
      --link:#0d6efd;
    }

    body{
      background: #ffffff;
      font-family: system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji","Segoe UI Emoji";
      color: var(--text);
    }

    .phone-frame{
      max-width: 420px;
      margin: 0 auto;
      min-height: 100svh;
      display: flex;
      flex-direction: column;
      background: var(--soft);
    }

    .hero-top{
      position: relative;
      height: 140px;
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

    .topbar{
      position: absolute;
      inset: 12px 12px auto 12px;
      display: flex;
      align-items: center;
      gap: 8px;
      color: #fff;
    }

    .sheet{
      margin-top: -28px;
      background: var(--soft);
      border-top-left-radius: 28px;
      border-top-right-radius: 28px;
      padding: 24px 18px 32px;
      box-shadow: 0 6px 24px rgba(0,0,0,.06);
      flex: 1;
    }

    .heading{
      color: var(--brand-dark);
      font-weight: 800;
      font-size: 28px;
      margin-bottom: 4px;
    }

    .subtitle{
      color: var(--muted);
      margin-bottom: 18px;
      font-size: 14px;
    }

    .form-card{
      background: #eef2f6;
      border-radius: 18px;
      padding: 16px;
    }

    .form-label{
      font-weight: 600;
      font-size: 13px;
      color: #4b5563;
      margin-bottom: 6px;
    }

    .input-group .input-group-text{
      background: var(--field-bg);
      border: 1px solid var(--field-border);
      border-right: 0;
      color: var(--brand-dark);
    }

    .form-control{
      background: var(--field-bg);
      border: 1px solid var(--field-border);
      padding-top: 10px;
      padding-bottom: 10px;
    }

    .form-control:focus{
      border-color: var(--brand);
      box-shadow: 0 0 0 .2rem rgba(255, 159, 26, .15);
    }

    .btn-brand{
      background: var(--brand);
      color: #fff;
      border: none;
      border-radius: 999px;
      padding: 12px 18px;
      font-weight: 700;
      width: 100%;
    }

    .btn-brand:active,
    .btn-brand:hover{
      background: var(--brand-dark);
      color: #fff;
    }

    .foot-note{
      font-size: 12px;
      color: var(--muted);
    }

    .foot-note a{
      color: var(--link);
      text-decoration: none;
      font-weight: 600;
    }

    .already{
      text-align: center;
      font-size: 14px;
      margin-top: 12px;
    }

    .already a{
      color: var(--link);
      text-decoration: none;
      font-weight: 700;
    }
  </style>
</head>
<body>

  <main class="phone-frame">
    <div class="hero-top">
      <div class="topbar">
        <i class="bi bi-chevron-left fs-5"></i>
        <span class="fw-semibold">Kembali</span>
      </div>
    </div>

    <section class="sheet">
      <h1 class="heading">Daftar</h1>
      <p class="subtitle">Gabung bareng kami dan nikmati kemudahan titip makanan favoritmu</p>

      <div class="form-card">
        <form class="needs-validation" novalidate>
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person"></i></span>
              <input type="text" class="form-control" placeholder="Masukkan nama anda" required>
              <div class="invalid-feedback">Nama wajib diisi</div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-envelope"></i></span>
              <input type="email" class="form-control" placeholder="Masukkan email anda" required>
              <div class="invalid-feedback">Email tidak valid</div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Kata Sandi</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-lock"></i></span>
              <input type="password" class="form-control" placeholder="Masukkan kata sandi anda" minlength="6" required>
              <div class="invalid-feedback">Minimal 6 karakter</div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Konfirmasi Kata Sandi</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-shield-check"></i></span>
              <input id="confirm" type="password" class="form-control" placeholder="Masukkan ulang kata sandi anda" minlength="6" required>
              <div class="invalid-feedback">Harus sama dengan kata sandi</div>
            </div>
          </div>

          <button type="submit" class="btn btn-brand mt-1">Daftar</button>

          <p class="already mt-3">Sudah punya akun
            <a href="#" tabindex="0">Masuk</a>
          </p>

          <p class="foot-note mt-2 mb-0">
            Dengan mendaftar, kamu menyetujui <a href="#">Syarat & Ketentuan</a> dan <a href="#">Kebijakan Privasi</a>
          </p>
        </form>
      </div>
    </section>
  </main>

  <script>
    // Bootstrap style validation and simple confirm check
    (() => {
      const form = document.querySelector(".needs-validation");
      const password = form.querySelector('input[type="password"]');
      const confirm = document.getElementById("confirm");

      form.addEventListener("submit", e => {
        if (password.value !== confirm.value) {
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
    //coba
  </script>
</body>
</html>
