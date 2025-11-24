<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pesanan Masuk</title>

  <!-- Google Font Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #F2F4F7;
      font-family: Poppins, sans serif;
      padding-bottom: 140px;
    }

    .header-bar{
      background:#ffffff;
      padding:14px 28px;
      display:flex;
      align-items:center;
      justify-content:space-between;
      box-shadow:0 2px 10px rgba(0,0,0,.04);
    }

    .header-left{
      display:flex;
      align-items:center;
      gap:14px;
    }

    .header-icon{
      font-size:18px;
      cursor:pointer;
    }

    .page-title{
      font-size:20px;
      font-weight:600;
    }

    .header-time{
      font-size:16px;
      font-weight:500;
      color:#7b8088;
    }

    .date-strip{
      background:#ECEFF4;
      padding:16px 28px;
      display:flex;
      align-items:center;
      justify-content:space-between;
      font-size:14px;
    }

    .date-text{
      font-weight:600;
    }

    .status-pill{
      padding:4px 16px;
      border-radius:999px;
      background:#28d060;
      color:#ffffff;
      font-size:13px;
      font-weight:600;
    }

    .content-wrapper{
      padding:20px 28px 0;
      margin:0;
    }

    .stat-card{
      background:white;
      border-radius:12px;
      padding:18px 0;
      text-align:center;
      box-shadow:0 4px 14px rgba(0,0,0,.04);
    }

    .stat-number{
      font-size:26px;
      font-weight:700;
      color:#F5A700;
      line-height:1;
    }

    .stat-label{
      font-size:14px;
      color:#7c8390;
      margin-top:6px;
    }

    .merchant-card{
      background:white;
      border-radius:16px;
      padding:16px 18px 10px;
      margin-top:18px;
      box-shadow:0 6px 18px rgba(0,0,0,.05);
    }

    .merchant-header{
      display:flex;
      align-items:center;
      justify-content:space-between;
      padding-bottom:10px;
    }

    .merchant-info{
      display:flex;
      align-items:center;
      gap:12px;
    }

    .merchant-img{
      width:52px;
      height:52px;
      border-radius:50%;
      object-fit:cover;
    }

    .merchant-name{
      font-size:16px;
      font-weight:700;
    }

    .merchant-sub{
      font-size:12px;
      color:#8a8f99;
    }

    .merchant-toggle{
      border:0;
      background:transparent;
      font-size:16px;
      padding:0;
    }

    .merchant-toggle i{
      transition:transform .2s ease;
    }

    .merchant-toggle:not(.collapsed) i{
      transform:rotate(180deg);
    }

    .menu-block{
      border-top:1px solid #e4e6ec;
      padding-top:6px;
      margin-top:2px;
    }

    .menu-row{
      display:flex;
      align-items:center;
      justify-content:space-between;
      padding:10px 0 6px;
    }

    .menu-title{
      font-size:15px;
      font-weight:600;
    }

    .menu-sub{
      font-size:11px;
      color:#8a8f99;
    }

    .menu-toggle{
      border:0;
      background:transparent;
      font-size:14px;
      padding:0;
      margin-left:10px;
    }

    .menu-toggle i{
      transition:transform .2s ease;
    }

    .menu-toggle:not(.collapsed) i{
      transform:rotate(180deg);
    }

    .customer-list{
      list-style:none;
      margin:0;
      padding:0;
      border-top:1px solid #f0f0f2;
    }

    .customer-item{
      display:flex;
      align-items:center;
      gap:10px;
      padding:7px 0 8px;
    }

    .customer-avatar{
      width:40px;
      height:40px;
      border-radius:50%;
      object-fit:cover;
    }

    .customer-name{
      font-size:14px;
      font-weight:500;
    }

    .bottom-bar{
      position:fixed;
      left:0;
      right:0;
      bottom:0;
      background:#ffffff;
      border-top:1px solid #e4e4e4;
      box-shadow:0 -6px 16px rgba(0,0,0,.15);
      padding:14px 0 18px;
    }

    .bottom-inner{
      padding:0 28px;
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:18px;
    }

    .bottom-left{
      display:flex;
      align-items:center;
      gap:14px;
    }

    .bottom-logo{
      width:60px;
      height:auto;
      object-fit:contain;
    }

    .bottom-info-title{
      font-size:14px;
      font-weight:600;
    }

    .bottom-amount{
      font-size:18px;
      font-weight:700;
      color:#F5A700;
      margin-bottom:2px;
    }

    .bottom-items{
      font-size:12px;
      color:#7c8390;
    }

    .bottom-btn{
      border-radius:30px;
      border:2px solid #F5A700;
      background:transparent;
      color:#F5A700;
      font-weight:600;
      font-size:14px;
      padding:9px 28px;
      white-space:nowrap;
    }

    .bottom-btn:hover{
      background:#F5A700;
      color:#ffffff;
    }

    @media (max-width:768px){
      .content-wrapper{
        padding:16px 16px 0;
      }
      .bottom-inner{
        flex-direction:column;
        align-items:flex-start;
      }
      .bottom-btn{
        width:100%;
        text-align:center;
      }
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header class="header-bar">
    <div class="header-left">
      <span class="header-icon">&larr;</span>
      <span class="page-title">Pesanan Masuk</span>
    </div>

    <!-- data-elapsed diisi durasi awal dalam detik dari backend, misal 0 -->
    <span id="liveTime" class="header-time" data-elapsed="0">00:00:00</span>
  </header>

  <!-- Date strip -->
  <div class="date-strip">
    <span class="date-text">Kamis, 15 Mei 2025</span>
    <span class="status-pill">Aktif</span>
  </div>

  <div class="content-wrapper">

    <!-- Stats -->
    <div class="row g-3">
      <div class="col-md-6">
        <div class="stat-card">
          <div class="stat-number">4</div>
          <div class="stat-label">Pesanan</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="stat-card">
          <div class="stat-number">2</div>
          <div class="stat-label">Lokasi</div>
        </div>
      </div>
    </div>

    <!-- Merchant McD -->
    <section class="merchant-card">
      <div class="merchant-header">
        <div class="merchant-info">
          <img src="images/McD.jpg" alt="McD" class="merchant-img">
          <div>
            <div class="merchant-name">McDonald's - Central Park Mulyosari</div>
            <div class="merchant-sub">2 Pesanan Masuk</div>
          </div>
        </div>
        <button class="merchant-toggle collapsed" type="button"
                data-bs-toggle="collapse" data-bs-target="#mcBlock"
                aria-expanded="false">
          <i class="bi bi-chevron-down"></i>
        </button>
      </div>

      <div id="mcBlock" class="collapse show menu-block">

        <!-- Panas 1 -->
        <div class="menu-row">
          <div>
            <div class="menu-title">Panas 1</div>
            <div class="menu-sub">1 Pesanan Masuk</div>
          </div>
          <button class="menu-toggle collapsed" type="button"
                  data-bs-toggle="collapse" data-bs-target="#mcPanas1"
                  aria-expanded="false">
            <i class="bi bi-caret-down-fill"></i>
          </button>
        </div>
        <div id="mcPanas1" class="collapse">
          <ul class="customer-list">
            <li class="customer-item">
              <img src="images/pemesan1.jpg" class="customer-avatar" alt="Mary">
              <span class="customer-name">Mary</span>
            </li>
          </ul>
        </div>

        <!-- Panas Spesial -->
        <div class="menu-row">
          <div>
            <div class="menu-title">Panas Spesial</div>
            <div class="menu-sub">1 Pesanan Masuk</div>
          </div>
          <button class="menu-toggle collapsed" type="button"
                  data-bs-toggle="collapse" data-bs-target="#mcPanasSpesial"
                  aria-expanded="false">
            <i class="bi bi-caret-down-fill"></i>
          </button>
        </div>
        <div id="mcPanasSpesial" class="collapse">
          <ul class="customer-list">
            <li class="customer-item">
              <img src="images/pemesan2.jpg" class="customer-avatar" alt="Jiwon">
              <span class="customer-name">Kim Jiwon</span>
            </li>
          </ul>
        </div>

      </div>
    </section>

    <!-- Merchant Juice Barokah -->
    <section class="merchant-card">
      <div class="merchant-header">
        <div class="merchant-info">
          <img src="images/Juice.jpg" alt="Juice Barokah" class="merchant-img">
          <div>
            <div class="merchant-name">Juice Barokah</div>
            <div class="merchant-sub">2 Pesanan Masuk</div>
          </div>
        </div>
        <button class="merchant-toggle collapsed" type="button"
                data-bs-toggle="collapse" data-bs-target="#juiceBlock"
                aria-expanded="false">
          <i class="bi bi-chevron-down"></i>
        </button>
      </div>

      <div id="juiceBlock" class="collapse show menu-block">

        <!-- Jus Mangga -->
        <div class="menu-row">
          <div>
            <div class="menu-title">Jus Mangga</div>
            <div class="menu-sub">1 Pesanan Masuk</div>
          </div>
          <button class="menu-toggle collapsed" type="button"
                  data-bs-toggle="collapse" data-bs-target="#juiceMangga"
                  aria-expanded="false">
            <i class="bi bi-caret-down-fill"></i>
          </button>
        </div>
        <div id="juiceMangga" class="collapse">
          <ul class="customer-list">
            <li class="customer-item">
              <img src="images/pemesan3.jpg" class="customer-avatar" alt="Pemesan 3">
              <span class="customer-name">Gong Myung</span>
            </li>
          </ul>
        </div>

        <!-- Jus Alpukat -->
        <div class="menu-row">
          <div>
            <div class="menu-title">Jus Alpukat</div>
            <div class="menu-sub">1 Pesanan Masuk</div>
          </div>
          <button class="menu-toggle collapsed" type="button"
                  data-bs-toggle="collapse" data-bs-target="#juiceAlpukat"
                  aria-expanded="false">
            <i class="bi bi-caret-down-fill"></i>
          </button>
        </div>
        <div id="juiceAlpukat" class="collapse">
          <ul class="customer-list">
            <li class="customer-item">
              <img src="images/pemesan4.jpg" class="customer-avatar" alt="Pemesan 4">
              <span class="customer-name">Ryeo un</span>
            </li>
          </ul>
        </div>

      </div>
    </section>

  </div>

  <!-- Bottom bar -->
  <div class="bottom-bar">
    <div class="bottom-inner">
      <div class="bottom-left">
        <img src="images/delivery-logo.png" class="bottom-logo" alt="Delivery logo">
        <div>
          <div class="bottom-info-title">Total Pesanan</div>
          <div class="bottom-amount">Rp 75.000,00</div>
          <div class="bottom-items">4 Item</div>
        </div>
      </div>
      <button id="btnMulaiJastip" class="bottom-btn" type="button">Mulai Jastip</button>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Timer durasi pesanan (HH:MM:SS) berbasis detik
    const timeEl = document.getElementById("liveTime");
    let elapsedSeconds = parseInt(timeEl.dataset.elapsed || "0", 10);
    let timerId = null;

    function pad2(n){
      return String(n).padStart(2, "0");
    }

    function renderTimer(){
      const h = Math.floor(elapsedSeconds / 3600);
      const m = Math.floor((elapsedSeconds % 3600) / 60);
      const s = elapsedSeconds % 60;
      timeEl.textContent = pad2(h) + ":" + pad2(m) + ":" + pad2(s);
    }

    function tick(){
      elapsedSeconds += 1;
      renderTimer();
    }

    // mulai hitung saat halaman dibuka
    renderTimer();
    timerId = setInterval(tick, 1000);

    // berhenti saat klik Mulai Jastip
    const btnMulai = document.getElementById("btnMulaiJastip");
    if (btnMulai){
      btnMulai.addEventListener("click", function(){
        if (timerId !== null){
          clearInterval(timerId);
          timerId = null;
        }
        // kalau mau kirim elapsedSeconds ke backend, bisa tambahkan ajax di sini
      });
    }
  </script>
</body>
</html>
