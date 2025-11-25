<!DOCTYPE html>  <!-- 5026231038 - Nabila Shinta Luthfia -->
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
            border: none;
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

        /* POPUP KONFIRMASI */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.45);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .popup-box {
            background: white;
            padding: 25px;
            border-radius: 18px;
            width: 80%;
            max-width: 360px;
            text-align: center;
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
        }

        .popup-title {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .popup-btn-ya {
            background: #F5A700;
            color: white;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 30px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .popup-btn-tidak {
            background: #D3D3D3;
            color: black;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 30px;
            font-weight: 600;
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
            <small class="text-muted">🏍️ Total Pengantaran : <span id="totalDay">6</span></small>
        </div>

        <!-- Stats -->
        <div class="row text-center mb-3">
            <div class="col-6">
                <div class="stat-card shadow-sm">
                    <div id="statRemaining" class="stat-number">3</div>
                    <p class="m-0 text-muted small">Pengantaran Tersisa</p>
                </div>
            </div>

            <div class="col-6">
                <div class="stat-card shadow-sm">
                    <div id="statDone" class="stat-number">3</div>
                    <p class="m-0 text-muted small">Pengantaran Selesai</p>
                </div>
            </div>
        </div>


        <!-- ========================== GEDUNG 1 ========================== -->
        <!-- (SEMUA BAGIAN DI BAWAH TIDAK DIUBAH, SAMA PERSIS PUNYAMU) -->

        <div class="building-card shadow-sm mb-3">
            <div class="d-flex align-items-center mb-2">
                <img src="images/gedung1.png" class="building-img me-2">
                <div>
                    <h6 class="fw-bold m-0">Gedung 1</h6>
                    <small class="text-muted">
                        <span id="gedung1Count">3</span> Pesanan
                    </small>
                </div>
            </div>

            <!-- Dropdowns users -->
            <!-- Soobin -->
            <div class="list-header d-flex justify-content-between" onclick="toggleDropdown('drop1','arrow1')">
                <span>Mary</span>
                <small class="text-muted">
                    <span id="label-soobin">1 Pesanan Selesai</span>
                    <span id="arrow1">▼</span>
                </small>
            </div>

            <div id="drop1" class="px-2 d-none">
                <div class="list-item d-flex align-items-center">
                    <input type="checkbox" class="form-check-input me-2 order-check" data-user="soobin" data-status="done">
                    <img src="images/ayampenyet.jpg" class="user-img me-3">
                    <div>
                        <p class="m-0 fw-semibold">Panas1</p>
                        <small>Status: <span class="status-text text-success fw-bold">Selesai</span></small>
                    </div>
                </div>
            </div>

            <!-- Yeonjun -->
            <div class="list-header d-flex justify-content-between" onclick="toggleDropdown('drop2','arrow2')">
                <span>Yeonjun</span>
                <small class="text-muted">
                    <span id="label-yeonjun">1 Pesanan Tersisa</span>
                    <span id="arrow2">▼</span>
                </small>
            </div>

            <div id="drop2" class="px-2 d-none">
                <div class="list-item d-flex align-items-center">
                    <input type="checkbox" class="form-check-input me-2 order-check" data-user="yeonjun" data-status="pending">
                    <img src="images/user2.jpg" class="user-img me-3">
                    <div>
                        <p class="m-0 fw-semibold">Panas Spesial</p>
                        <small>Status: <span class="status-text text-warning fw-bold">Tersisa</span></small>
                    </div>
                </div>
            </div>

            <!-- Beomgyu -->
            <div class="list-header d-flex justify-content-between" onclick="toggleDropdown('drop3','arrow3')">
                <span>Beomgyu</span>
                <small class="text-muted">
                    <span id="label-beomgyu">1 Pesanan Tersisa</span>
                    <span id="arrow3">▼</span>
                </small>
            </div>

            <div id="drop3" class="px-2 d-none">
                <div class="list-item d-flex align-items-center">
                    <input type="checkbox" class="form-check-input me-2 order-check" data-user="beomgyu" data-status="pending">
                    <img src="images/user3.jpg" class="user-img me-3">
                    <div>
                        <p class="m-0 fw-semibold">Burger Premium</p>
                        <small>Status: <span class="status-text text-warning fw-bold">Tersisa</span></small>
                    </div>
                </div>
            </div>
        </div>


        <!-- ========================== TW 1 ========================== -->

        <div class="building-card shadow-sm mb-5">
            <div class="d-flex align-items-center mb-2">
                <img src="images/gedung2.png" class="building-img me-2">
                <div>
                    <h6 class="fw-bold m-0">TW-1</h6>
                    <small class="text-muted">
                        <span id="tw1Count">3</span> Pesanan
                    </small>
                </div>
            </div>

            <!-- Siti -->
            <div class="list-header d-flex justify-content-between" onclick="toggleDropdown('drop4','arrow4')">
                <span>Siti Maharani</span>
                <small class="text-muted">
                    <span id="label-siti">1 Pesanan Selesai</span>
                    <span id="arrow4">▼</span>
                </small>
            </div>

            <div id="drop4" class="px-2 d-none">
                <div class="list-item d-flex align-items-center">
                    <input type="checkbox" class="form-check-input me-2 order-check" data-user="siti" data-status="done">
                    <img src="images/user1.jpg" class="user-img me-3">
                    <div>
                        <p class="m-0 fw-semibold">Nasi Telur</p>
                        <small>Status: <span class="status-text text-success fw-bold">Selesai</span></small>
                    </div>
                </div>
            </div>

            <!-- Bambang -->
            <div class="list-header d-flex justify-content-between" onclick="toggleDropdown('drop5','arrow5')">
                <span>Bambang</span>
                <small class="text-muted">
                    <span id="label-bambang">1 Pesanan Selesai</span>
                    <span id="arrow5">▼</span>
                </small>
            </div>

            <div id="drop5" class="px-2 d-none">
                <div class="list-item d-flex align-items-center">
                    <input type="checkbox" class="form-check-input me-2 order-check" data-user="bambang" data-status="done">
                    <img src="images/user2.jpg" class="user-img me-3">
                    <div>
                        <p class="m-0 fw-semibold">Ayam Geprek</p>
                        <small>Status: <span class="status-text text-success fw-bold">Selesai</span></small>
                    </div>
                </div>
            </div>

            <!-- Jessica -->
            <div class="list-header d-flex justify-content-between" onclick="toggleDropdown('drop6','arrow6')">
                <span>Jessica Jung</span>
                <small class="text-muted">
                    <span id="label-jessica">1 Pesanan Tersisa</span>
                    <span id="arrow6">▼</span>
                </small>
            </div>

            <div id="drop6" class="px-2 d-none">
                <div class="list-item d-flex align-items-center">
                    <input type="checkbox" class="form-check-input me-2 order-check" data-user="jessica" data-status="pending">
                    <img src="images/user3.jpg" class="user-img me-3">
                    <div>
                        <p class="m-0 fw-semibold">Kopi Latte</p>
                        <small>Status: <span class="status-text text-warning fw-bold">Tersisa</span></small>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Bottom Bar -->
    <div class="bottom-bar shadow-lg d-flex justify-content-between align-items-center">
        <button class="btn done-btn px-4" onclick="openPopup()">Pengantaran Selesai</button>
        <img src="images/delivery-logo.png" width="65" class="me-2">
    </div>

    <!-- POPUP KONFIRMASI -->
    <div id="popup" class="popup-overlay">
        <div class="popup-box">
            <div class="popup-title">Apakah ingin mengakhiri sesi jastip?</div>

            <button class="popup-btn-ya">Ya</button>
            <button class="popup-btn-tidak" onclick="closePopup()">Tidak</button>
        </div>
    </div>

    <script>
        function toggleDropdown(id, arrowId) {
            document.getElementById(id).classList.toggle("d-none");
            document.getElementById(arrowId).classList.toggle("rotate");
        }

        function openPopup() {
            document.getElementById("popup").style.display = "flex";
        }

        function closePopup() {
            document.getElementById("popup").style.display = "none";
        }

        const checkboxes = document.querySelectorAll(".order-check");

        function updateCounters() {
            let done = 0, pending = 0;

            checkboxes.forEach(cb => {
                if (cb.checked) done++;
                else pending++;
            });

            document.getElementById("statDone").innerText = done;
            document.getElementById("statRemaining").innerText = pending;
            document.getElementById("totalDay").innerText = done + pending;
        }

        function updateUserLabels() {
            const users = {
                soobin:  { count: 0, done: 0 },
                yeonjun: { count: 0, done: 0 },
                beomgyu: { count: 0, done: 0 },
                siti:    { count: 0, done: 0 },
                bambang: { count: 0, done: 0 },
                jessica: { count: 0, done: 0 }
            };

            checkboxes.forEach(cb => {
                let user = cb.dataset.user;
                users[user].count++;
                if (cb.checked) users[user].done++;
            });

            for (let u in users) {
                let label = document.getElementById(`label-${u}`);
                let d = users[u].done;
                let c = users[u].count;

                if (d === c) label.innerText = `${c} Pesanan Selesai`;
                else if (d === 0) label.innerText = `${c} Pesanan Tersisa`;
                else label.innerText = `${d} Selesai, ${c - d} Tersisa`;
            }
        }

        function updateItemStatus() {
            checkboxes.forEach(cb => {
                const statusText = cb.closest(".list-item").querySelector(".status-text");

                if (cb.checked) {
                    statusText.textContent = "Selesai";
                    statusText.className = "status-text text-success fw-bold";
                } else {
                    statusText.textContent = "Tersisa";
                    statusText.className = "status-text text-warning fw-bold";
                }
            });
        }

        checkboxes.forEach(cb => {
            cb.addEventListener("change", function() {
                updateItemStatus();
                updateCounters();
                updateUserLabels();
            });
        });

        updateCounters();
        updateUserLabels();
    </script>

</body>
</html>
