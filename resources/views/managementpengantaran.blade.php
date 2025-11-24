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

        .list-header {
            padding: 12px 0;
            border-bottom: 1px solid #dcdcdc;
            cursor: pointer;
        }

        .list-item {
            padding: 10px 0;
            font-size: 15px;
        }

        .user-img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
        }

        .done-btn {
            background-color: #F5A700;
            color: white;
            border-radius: 30px;
            font-weight: 600;
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

        .rotate {
            transform: rotate(180deg);
            transition: 0.3s;
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

    <div class="px-3 pb-5">

        <!-- Date Section -->
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

        <!-- GEDUNG 1 -->
        <div class="building-card shadow-sm mb-3">
            <div class="d-flex align-items-center mb-2">
                <img src="images/gedung1.png" class="building-img me-2">
                <div>
                    <h6 class="fw-bold m-0">Gedung 1</h6>
                    <small class="text-muted">3 Pesanan</small>
                </div>
            </div>

            <!-- Soobin -->
            <div class="list-header d-flex justify-content-between align-items-center" onclick="toggleDropdown('drop1', 'arrow1')">
                <span>Soobin</span>
                <span class="text-muted small">
                    1 Pesanan Selesai 
                    <span id="arrow1">▼</span>
                </span>
            </div>

            <div id="drop1" class="px-2 d-none">
                <div class="list-item d-flex">
                    <img src="images/user1.jpg" class="user-img me-3">
                    <div>
                        <p class="m-0 fw-semibold">Ayam Penyet</p>
                        <small>Status: <span class="text-success fw-bold">Selesai</span></small>
                    </div>
                </div>
            </div>

            <!-- Yeonjun -->
            <div class="list-header d-flex justify-content-between align-items-center" onclick="toggleDropdown('drop2','arrow2')">
                <span>Yeonjun</span>
                <span class="text-muted small">1 Pesanan Tersisa <span id="arrow2">▼</span></span>
            </div>

            <div id="drop2" class="px-2 d-none">
                <div class="list-item d-flex">
                    <img src="images/user2.jpg" class="user-img me-3">
                    <div>
                        <p class="m-0 fw-semibold">Bebek Penyet</p>
                        <small>Status: <span class="text-warning fw-bold">Tersisa</span></small>
                    </div>
                </div>
            </div>

            <!-- Beomgyu -->
            <div class="list-header d-flex justify-content-between align-items-center" onclick="toggleDropdown('drop3','arrow3')">
                <span>Beomgyu</span>
                <span class="text-muted small">1 Pesanan Tersisa <span id="arrow3">▼</span></span>
            </div>

            <div id="drop3" class="px-2 d-none">
                <div class="list-item d-flex">
                    <img src="images/user3.jpg" class="user-img me-3">
                    <div>
                        <p class="m-0 fw-semibold">Burger Premium</p>
                        <small>Status: <span class="text-warning fw-bold">Tersisa</span></small>
                    </div>
                </div>
            </div>
        </div>

        <!-- TW-1 -->
        <div class="building-card shadow-sm mb-5">
            <div class="d-flex align-items-center mb-2">
                <img src="images/gedung2.png" class="building-img me-2">
                <div>
                    <h6 class="fw-bold m-0">TW-1</h6>
                    <small class="text-muted">3 Pesanan</small>
                </div>
            </div>

            <!-- Siti -->
            <div class="list-header d-flex justify-content-between align-items-center" onclick="toggleDropdown('drop4','arrow4')">
                <span>Siti Maharani</span>
                <span class="text-muted small">1 Pesanan Selesai <span id="arrow4">▼</span></span>
            </div>

            <div id="drop4" class="px-2 d-none">
                <div class="list-item d-flex">
                    <img src="images/user1.jpg" class="user-img me-3">
                    <div>
                        <p class="m-0 fw-semibold">Nasi Telur</p>
                        <small>Status: <span class="text-success fw-bold">Selesai</span></small>
                    </div>
                </div>
            </div>

            <!-- Bambang -->
            <div class="list-header d-flex justify-content-between align-items-center" onclick="toggleDropdown('drop5','arrow5')">
                <span>Bambang</span>
                <span class="text-muted small">1 Pesanan Selesai <span id="arrow5">▼</span></span>
            </div>

            <div id="drop5" class="px-2 d-none">
                <div class="list-item d-flex">
                    <img src="images/user2.jpg" class="user-img me-3">
                    <div>
                        <p class="m-0 fw-semibold">Ayam Geprek</p>
                        <small>Status: <span class="text-success fw-bold">Selesai</span></small>
                    </div>
                </div>
            </div>

            <!-- Jessica -->
            <div class="list-header d-flex justify-content-between align-items-center" onclick="toggleDropdown('drop6','arrow6')">
                <span>Jessica Jung</span>
                <span class="text-muted small">1 Pesanan Tersisa <span id="arrow6">▼</span></span>
            </div>

            <div id="drop6" class="px-2 d-none">
                <div class="list-item d-flex">
                    <img src="images/user3.jpg" class="user-img me-3">
                    <div>
                        <p class="m-0 fw-semibold">Kopi Latte</p>
                        <small>Status: <span class="text-warning fw-bold">Tersisa</span></small>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bottom Bar -->
   <div class="bottom-bar shadow-lg d-flex justify-content-between align-items-center">
    <button class="btn done-btn px-4">Pengantaran Selesai</button>
    <img src="images/delivery-logo.png" width="65" class="me-2">
</div>


    <script>
        function toggleDropdown(id, arrowId) {
            let drop = document.getElementById(id);
            let arrow = document.getElementById(arrowId);

            drop.classList.toggle("d-none");
            arrow.classList.toggle("rotate");
        }
    </script>

</body>
</html>
