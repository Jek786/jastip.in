<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengantaran</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #F2F4F7;
            font-family: 'Poppins', sans-serif;
        }

        .header-icon {
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }

        .date-box {
            background: #E8EAED;
            padding: 16px;
            border-radius: 10px;
        }

        .stat-card {
            background: white;
            border-radius: 14px;
            padding: 20px 0;
        }

        .stat-number {
            font-size: 26px;
            font-weight: 700;
            color: #F5A700;
        }

        .building-card {
            background: white;
            border-radius: 16px;
            padding: 16px;
        }

        .building-img {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            object-fit: cover;
        }

        .list-item {
            padding: 12px 0;
            border-bottom: 1px solid #dcdcdc;
            font-size: 15px;
        }

        .done-btn {
            background-color: #F5A700;
            color: white;
            font-weight: 600;
            border-radius: 30px;
            padding: 12px 0;
        }

        .bottom-bar {
            background: #C7EDE3;
            padding: 22px;
            border-radius: 20px 20px 0 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

    </style>

</head>
<body>

    <!-- Header -->
    <div class="d-flex align-items-center p-3">
        <span class="me-3 header-icon">‹</span>
        <h5 class="fw-bold m-0">Pengantaran</h5>
        <div class="ms-auto header-icon">🔔</div>
    </div>

    <!-- Date Section -->
    <div class="px-3">
        <div class="date-box mb-3">
            <p class="m-0 fw-bold">Kamis, 15 Mei 2025</p>
            <small class="text-muted">🏍️ Total Pengantaran : 2</small>
        </div>

        <!-- Stats -->
        <div class="row text-center mb-3">
            <div class="col-6">
                <div class="stat-card shadow-sm">
                    <div class="stat-number">3</div>
                    <p class="m-0 text-muted small">Pengantaran Tersisa</p>
                </div>
            </div>

            <div class="col-6">
                <div class="stat-card shadow-sm">
                    <div class="stat-number">6</div>
                    <p class="m-0 text-muted small">Pengantaran Selesai</p>
                </div>
            </div>
        </div>

        <!-- Building Cards -->
        <div class="building-card shadow-sm mb-3">
            <div class="d-flex align-items-center mb-2">
                <img src="https://img.freepik.com/free-photo/futuristic-tower_23-2151094095.jpg" class="building-img me-2">
                <div>
                    <h6 class="fw-bold m-0">Gedung 1</h6>
                    <small class="text-muted">3 Pesanan</small>
                </div>
            </div>

            <div class="list-item d-flex justify-content-between">
                <span>Soobin</span>
                <small class="text-muted">1 Pesanan Selesai ▼</small>
            </div>

            <div class="list-item d-flex justify-content-between">
                <span>Yeonjun</span>
                <small class="text-muted">1 Pesanan Tersisa ▼</small>
            </div>

            <div class="list-item d-flex justify-content-between">
                <span>Beomgyu</span>
                <small class="text-muted">1 Pesanan Tersisa ▼</small>
            </div>
        </div>

        <div class="building-card shadow-sm mb-5">
            <div class="d-flex align-items-center mb-2">
                <img src="https://img.freepik.com/free-photo/night-market-scene_23-2150477999.jpg" class="building-img me-2">
                <div>
                    <h6 class="fw-bold m-0">TW-1</h6>
                    <small class="text-muted">3 Pesanan</small>
                </div>
            </div>

            <div class="list-item d-flex justify-content-between">
                <span>Siti Maharani</span>
                <small class="text-muted">1 Pesanan Selesai ▼</small>
            </div>

            <div class="list-item d-flex justify-content-between">
                <span>Bambang</span>
                <small class="text-muted">1 Pesanan Selesai ▼</small>
            </div>

            <div class="list-item d-flex justify-content-between">
                <span>Jessica Jung</span>
                <small class="text-muted">1 Pesanan Tersisa ▼</small>
            </div>
        </div>

    </div>

    <!-- Bottom Bar -->
    <div class="bottom-bar text-center shadow-lg">
        <button class="btn done-btn w-100">Pengantaran Selesai</button>
    </div>

</body>
</html>
