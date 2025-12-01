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

  <style>
    :root{
      --brand:#ff9f1a;
      --brand-dark:#f28b00;
      --soft:#f5f7fb;
      --text:#2b2b2b;
      --muted:#6c757d;
      --field-bg:#f5f5f5;
      --field-border:#ff9f1a;
    }

    body{
      margin: 0;
      background: var(--brand);
      font-family: "Poppins", system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji","Segoe UI Emoji";
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
      display: block;
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
      color: #d98f10f7;
      font-weight: 800;
      font-size: 28px;
      margin-bottom: 4px;
    }

    .subtitle{
      color: #7b7b7b;
      margin-bottom: 8px;
      font-size: 14px;
      font-weight: 400;
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
      font-weight: 600;
      font-size: 13px;
      color: #000;
      margin-bottom: 6px;
    }

    .input-group{
      border-radius: 999px;
      border: 2px solid var(--field-border);
      background: var(--field-bg);
      overflow: hidden;
      position: relative;
      align-items: center;
    }

    .input-group .input-group-text{
      border: 0;
      background: transparent;
      padding-left: 16px;
      padding-right: 4px;
    }

    /* ikon pakai gambar langsung, tanpa lingkaran */
    .field-icon{
      width: 20px;
      height: 20px;
      object-fit: contain;
      display: block;
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

    /* teks error: bahasa Indo, kecil, posisinya mepet input */
    .input-group + .invalid-feedback{
      padding-left: 0;
      margin-left: 50px;   /* sejajar dengan teks input setelah ikon */
      margin-top: -4px;
      margin-bottom: 0;
      font-size: 11px;
      line-height: 1.25;
      color: #ff4b6a;
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
      font-weight: 400;
    }

    .already a{
      color: var(--brand-dark);
      text-decoration: none;
      font-weight: 600;
    }

    .foot-note{
      font-size: 11px;
      color: var(--muted);
      text-align: center;
      line-height: 1.4;
      font-weight: 400;
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
      <div class="topbar" onclick="window.location.href='/welcome'">
        <i class="bi bi-chevron-left fs-5"></i>
      </div>

      <svg class="hero-wave" viewBox="0 0 1440 80" preserveAspectRatio="none">
        <path
          d="M0,60
             C90,50 170,35 250,40
             C330,45 390,65 470,64
             C560,63 620,45 700,40
             C780,35 860,45 930,55
             C1010,67 1100,72 1180,60
             C1260,48 1350,40 1440,50
             L1440,80 L0,80 Z"
          fill="#f5f7fb" />
      </svg>
    </div>

    <section class="sheet">
      <h1 class="heading">Daftar</h1>
      <p class="subtitle">Gabung bareng kami dan nikmati kemudahan titip makanan favoritmu</p>
      <div class="heading-accent"></div>

      <div class="form-card">
        <form action="{{ route('daftar.submit') }}" method="POST">
          @csrf

          <!-- NAMA -->
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <div class="input-group">
              <span class="input-group-text">
                <img src="{{ asset('images/nama.png') }}" alt="Nama" class="field-icon">
              </span>
              <input type="text" name="name" class="form-control"
                     placeholder="Masukkan nama anda"
                     value="{{ old('name') }}" required>
            </div>
            @error('name')
              <div class="invalid-feedback d-block">Nama wajib diisi.</div>
            @enderror
          </div>

          <!-- EMAIL -->
          <div class="mb-3">
            <label class="form-label">Email</label>
            <div class="input-group">
              <span class="input-group-text">
                <img src="{{ asset('images/email.png') }}" alt="Email" class="field-icon">
              </span>
              <input type="email" name="emailAddress" class="form-control"
                     placeholder="Masukkan email anda"
                     value="{{ old('emailAddress') }}" required>
            </div>
            @error('emailAddress')
              <div class="invalid-feedback d-block">
                Email tidak valid atau sudah terdaftar.
              </div>
            @enderror
          </div>

          <!-- PASSWORD -->
          <div class="mb-3">
            <label class="form-label">Kata Sandi</label>
            <div class="input-group">
              <span class="input-group-text">
                <img src="{{ asset('images/sandi.png') }}" alt="Kata sandi" class="field-icon">
              </span>
              <input type="password" name="password" class="form-control"
                     placeholder="Masukkan kata sandi anda"
                     minlength="6" required>
            </div>
            @error('password')
              <div class="invalid-feedback d-block">
                Kata sandi minimal 6 karakter.
              </div>
            @enderror
          </div>

          <!-- KONFIRM PASSWORD -->
          <div class="mb-3">
            <label class="form-label">Konfirmasi Kata Sandi</label>
            <div class="input-group">
              <span class="input-group-text">
                <img src="{{ asset('images/sandi.png') }}" alt="Konfirmasi sandi" class="field-icon">
              </span>
              <input type="password" name="password_confirmation" class="form-control"
                     placeholder="Masukkan ulang kata sandi anda"
                     minlength="6" required>
            </div>
          </div>

          <button type="submit" class="btn btn-brand mt-3">Daftar</button>

          <p class="already mt-3">
            Sudah punya akun?
            <a href="{{ route('login') }}">Masuk</a>
          </p>

          <p class="foot-note mt-3 mb-0">
            Dengan mendaftar, kamu menyetujui<br>
            <a href="#">Syarat &amp; Ketentuan</a> dan
            <a href="#">Kebijakan Privasi</a> kami.
          </p>
        </form>
      </div>
    </section>
  </main>

</body>
</html>
