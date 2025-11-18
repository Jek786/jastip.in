<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buka Jastip</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f2f5;
            max-width: 430px;
            margin: auto;
            padding: 1rem;
        }

        /* Header */
        .header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 1.5rem;
        }
        .header h5 {
            margin: 0 auto;
            font-weight: 700;
        }

        /* Card section */
        .card-jastip {
            background: #ffffff;
            border-radius: 20px;
            padding: 1.3rem;
            box-shadow: 0 5px 14px rgba(0,0,0,0.05);
        }

        .menu-item {
            padding: 0.8rem 0;
            border-bottom: 1px solid #ececec;
        }
        .menu-item:last-child {
            border-bottom: none;
        }
        .menu-item:hover { background-color: #fafafa; cursor: pointer; }

        /* Buttons */
        .btn-main {
            width: 100%;
            border-radius: 50px;
            font-weight: 600;
            padding: 0.7rem;
            background-color: #ffb300;
            color: white;
        }

        .btn-stop {
            width: 100%;
            border-radius: 50px;
            font-weight: 600;
            padding: 0.7rem;
        }

        /* Modals rounded */
        .modal-content {
            border-radius: 20px !important;
        }

        /* Notification Modal */
        .notif-container {
            padding: 2rem;
            text-align: center;
        }
        .notif-icon {
            font-size: 4rem;
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <div class="header">
        <i class="bi bi-arrow-left fs-5"></i>
        <h5>Buka Jastip</h5>
        <span></span>
    </div>

    <!-- PROFILE -->
    <div class="d-flex align-items-center mb-4">
        <img src="https://via.placeholder.com/55" class="rounded-circle">
        <div class="ms-3">
            <h6 class="fw-bold mb-0">Halo, Ruddy</h6>
            <small class="text-muted">Atur Jastip Anda!</small>
        </div>
    </div>

    <!-- CARD ATUR JASTIP -->
    <div class="card-jastip">

        <!-- Waktu -->
        <div class="menu-item d-flex justify-content-between align-items-center" data-bs-toggle="modal" data-bs-target="#modalWaktu">
            <div>
                <small class="text-muted">Waktu Order</small>
                <h6 class="fw-bold mb-0">Belum diatur</h6>
            </div>
            <i class="bi bi-chevron-right"></i>
        </div>

        <!-- Slot -->
        <div class="menu-item d-flex justify-content-between align-items-center" data-bs-toggle="modal" data-bs-target="#modalSlot">
            <div>
                <small class="text-muted">Jumlah Slot</small>
                <h6 class="fw-bold mb-0">0 Slot</h6>
            </div>
            <i class="bi bi-chevron-right"></i>
        </div>

        <!-- Biaya -->
        <div class="menu-item d-flex justify-content-between align-items-center" data-bs-toggle="modal" data-bs-target="#modalBiaya">
            <div>
                <small class="text-muted">Biaya Pengiriman</small>
                <h6 class="fw-bold mb-0">Rp 0</h6>
            </div>
            <i class="bi bi-chevron-right"></i>
        </div>

        <!-- START BUTTON -->
        <button class="btn btn-main mt-3" data-bs-toggle="modal" data-bs-target="#notifBerhasil">Mulai Jastip</button>

    </div>

    <!-- MODAL WAKTU -->
    <div class="modal fade" id="modalWaktu">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <h6 class="fw-bold mb-3">Jam Buka & Tutup</h6>

                <label class="form-label">Jam Buka</label>
                <input type="time" class="form-control mb-3">

                <label class="form-label">Jam Tutup</label>
                <input type="time" class="form-control mb-3">

                <button class="btn btn-main mt-2">Simpan</button>
            </div>
        </div>
    </div>

    <!-- MODAL SLOT -->
    <div class="modal fade" id="modalSlot">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <h6 class="fw-bold mb-3">Jumlah Slot</h6>

                <input type="number" class="form-control mb-3" min="1">

                <button class="btn btn-main mt-2">Simpan</button>
            </div>
        </div>
    </div>

    <!-- MODAL BIAYA -->
    <div class="modal fade" id="modalBiaya">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <h6 class="fw-bold mb-3">Biaya Pengiriman</h6>

                <div class="input-group mb-3">
                    <span class="input-group-text">Rp</span>
                    <input type="number" class="form-control" min="0">
                </div>

                <button class="btn btn-main mt-1">Simpan</button>
            </div>
        </div>
    </div>

    <!-- NOTIFIKASI BERHASIL -->
    <div class="modal fade" id="notifBerhasil">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content notif-container">
                <i class="bi bi-check-circle-fill text-success notif-icon"></i>
                <h5 class="fw-bold mt-3">Sesi Jastip Berhasil Dibuka</h5>
                <p class="text-muted">Pengguna sudah bisa mulai memesan.</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
