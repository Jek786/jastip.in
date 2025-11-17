<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pesanan Masuk</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root{
      --brand:#ff9f1a;
      --brand-2:#eb8a00;
      --soft:#f5f7fb;
      --text:#222;
      --muted:#6c6f7b;
      --chip:#eef2f6;
      --card:#ffffff;
      --badge:#22c55e;
    }

    body{
      background:#fff;
      color:var(--text);
      font-family: system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji","Segoe UI Emoji";
    }

    .phone{
      max-width:420px;
      margin:0 auto;
      min-height:100svh;
      display:flex;
      flex-direction:column;
      background:var(--soft);
    }

    .appbar{
      display:flex;
      align-items:center;
      justify-content:space-between;
      padding:14px 16px;
      background:#fff;
    }
    .appbar .title{
      font-weight:700;
      font-size:18px;
    }
    .timer{
      font-variant-numeric: tabular-nums;
      color:#9aa0a6;
      font-weight:600;
      font-size:14px;
    }

    .sheet{
      background:var(--soft);
      border-top-left-radius:24px;
      border-top-right-radius:24px;
      padding:16px;
      flex:1;
    }

    .day-row{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:8px;
      margin-bottom:12px;
    }
    .date-chip{
      background:var(--chip);
      padding:8px 12px;
      border-radius:12px;
      font-weight:600;
      font-size:13px;
      color:#374151;
    }
    .badge-on{
      background:var(--badge);
      color:#fff;
      padding:6px 10px;
      font-size:12px;
      border-radius:999px;
      font-weight:700;
    }

    .stats{
      display:grid;
      grid-template-columns:1fr 1fr;
      gap:12px;
      margin-bottom:14px;
    }
    .stat-card{
      background:#fff;
      border-radius:16px;
      padding:14px;
      text-align:center;
      box-shadow:0 4px 18px rgba(0,0,0,.05);
    }
    .stat-card .value{
      color:var(--brand);
      font-weight:800;
      font-size:22px;
      line-height:1;
      margin-bottom:4px;
    }
    .stat-card .label{
      color:#667085;
      font-size:12px;
      font-weight:600;
    }

    .merchant{
      background:#fff;
      border-radius:16px;
      padding:10px;
      box-shadow:0 4px 18px rgba(0,0,0,.05);
    }
    .m-item{
      border-radius:12px;
      padding:8px 6px;
    }
    .m-head{
      display:flex;
      align-items:center;
      gap:10px;
      cursor:pointer;
    }
    .m-avatar{
      width:42px;
      height:42px;
      border-radius:50%;
      background:#e2e8f0;
      display:flex;
      align-items:center;
      justify-content:center;
      overflow:hidden;
      flex:0 0 42px;
    }
    .m-title{
      flex:1;
      font-weight:700;
      font-size:15px;
    }
    .m-sub{
      font-size:12px;
      color:#8b95a1;
      margin-top:2px;
    }
    .caret{
      color:#8b95a1;
    }
    .order-card{
      background:#fff;
      border-radius:18px;
      padding:14px;
      margin-top:14px;
      display:flex;
      align-items: center;
      gap:12px;
      box-shadow:0 4px 18px rgba(0,0,0,.05);
    }
    .total-left{
      flex:1;
    }
    .total-title{
      color:#6b7280;
      font-size:13px;
      margin-bottom:2px;
      font-weight:600;
    }
    .total-amount{
      color:var(--brand);
      font-size:18px;
      font-weight:900;
      line-height:1.1;
    }
    .total-desc{
      font-size:12px;
      color:#94a3b8;
      font-weight:600;
    }
    .btn-brand{
      background:var(--brand);
      color:#fff;
      font-weight:800;
      padding:10px 18px;
      border-radius:999px;
      border:0;
      white-space:nowrap;
    }
    .btn-brand:hover{ background:var(--brand-2); color:#fff; }

    .mascot{
      width:62px;
      height:62px;
      border:2px dashed #f7c37c;
      border-radius:14px;
      display:flex;
      align-items:center;
      justify-content:center;
      font-size:26px;
      color:#f0a23c;
      flex:0 0 62px;
    }
  </style>
</head>
<body>
  <main class="phone">
    <header class="appbar">
      <div class="d-flex align-items-center gap-2">
        <a href="#" class="text-dark"><i class="bi bi-chevron-left fs-5"></i></a>
        <div class="title">Pesanan Masuk</div>
      </div>
      <div class="timer" id="timer">02:20:02</div>
    </header>

    <section class="sheet">
      <div class="day-row">
        <div class="date-chip">Kamis, 15 Mei 2025</div>
        <span class="badge-on">Aktif</span>
      </div>

      <div class="stats">
        <div class="stat-card">
          <div class="value">4</div>
          <div class="label">Pesanan</div>
        </div>
        <div class="stat-card">
          <div class="value">2</div>
          <div class="label">Lokasi</div>
        </div>
      </div>

      <div class="merchant">
        <div class="m-item">
          <div class="m-head" data-bs-toggle="collapse" data-bs-target="#m1">
            <div class="m-avatar"><i class="bi bi-basket"></i></div>
            <div class="w-100">
              <div class="m-title">Joder</div>
              <div class="m-sub">3 Pesanan Masuk</div>
            </div>
            <i class="bi bi-caret-down-fill caret"></i>
          </div>
          <div class="collapse" id="m1">
            <div class="ps-5 pt-2 small text-secondary">• Ayam Geprek x1</div>
            <div class="ps-5 small text-secondary">• Nasi Telur x2</div>
          </div>
        </div>

        <div class="m-item">
          <div class="m-head" data-bs-toggle="collapse" data-bs-target="#m2">
            <div class="m-avatar"><i class="bi bi-cup-straw"></i></div>
            <div class="w-100">
              <div class="m-title">Jus Ganteng</div>
              <div class="m-sub">1 Pesanan Masuk</div>
            </div>
            <i class="bi bi-caret-down-fill caret"></i>
          </div>
          <div class="collapse" id="m2">
            <div class="ps-5 pt-2 small text-secondary">• Alpukat Kocok x1</div>
          </div>
        </div>

        <div class="m-item">
          <div class="m-head" data-bs-toggle="collapse" data-bs-target="#m3">
            <div class="m-avatar"><i class="bi bi-fire"></i></div>
            <div class="w-100">
              <div class="m-title">Panas 1</div>
            </div>
            <i class="bi bi-caret-down-fill caret"></i>
          </div>
          <div class="collapse" id="m3">
            <div class="ps-5 pt-2 small text-secondary">• Nasi Panas x1</div>
          </div>
        </div>

        <div class="m-item">
          <div class="m-head" data-bs-toggle="collapse" data-bs-target="#m4">
            <div class="m-avatar"><i class="bi bi-egg-fried"></i></div>
            <div class="w-100">
              <div class="m-title">Panas Spesial</div>
              <div class="m-sub">1 Pesanan Masuk</div>
            </div>
            <i class="bi bi-caret-down-fill caret"></i>
          </div>
          <div class="collapse" id="m4">
            <div class="ps-5 pt-2 d-flex align-items-center gap-2">
              <img src="https://i.pravatar.cc/40?img=5" alt="Mary Jane" class="rounded-circle" width="28" height="28">
              <span class="small text-secondary">Mary Jane</span>
            </div>
          </div>
        </div>
      </div>

      <div class="order-card">
        <div class="mascot"><i class="bi bi-bag-check"></i></div>
        <div class="total-left">
          <div class="total-title">Total Pesanan</div>
          <div class="total-amount">Rp 75.000,00</div>
          <div class="total-desc">4 Item</div>
        </div>
        <button class="btn btn-brand">Mulai Jastip</button>
      </div>
    </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // optional ticking timer mock
    const el = document.getElementById('timer');
    function toHHMMSS(sec){
      const h = String(Math.floor(sec/3600)).padStart(2,'0');
      const m = String(Math.floor((sec%3600)/60)).padStart(2,'0');
      const s = String(sec%60).padStart(2,'0');
      return `${h}:${m}:${s}`;
    }
    let t = 2*3600 + 20*60 + 2;
    setInterval(()=>{ t = (t+1)%(24*3600); el.textContent = toHHMMSS(t); },1000);
  </script>
</body>
</html>
