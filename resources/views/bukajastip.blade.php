<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buka Jastip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F5F6FA; /* Abu muda agar card terlihat menonjol */
            max-width: 480px; /* Lebar ala HP */
            margin: 0 auto;
            min-height: 100vh;
            padding: 20px;
        }

        /* HEADER */
        .header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            margin-top: 10px;
        }
        
        /* CARD UTAMA */
        .main-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            min-height: 80vh; /* Agar card terlihat panjang penuh */
        }

        /* INPUT ROW (Baris Menu) */
        .input-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #f0f0f0;
            cursor: pointer;
            transition: 0.2s;
        }
        .input-row:hover { opacity: 0.7; }
        
        .input-label { color: #888; font-size: 14px; }
        .input-value { font-weight: 600; color: #333; }

        /* SEARCH BAR */
        .search-box {
            background: #F8F9FA;
            border-radius: 50px;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        .search-box input { border: none; background: transparent; width: 100%; outline: none; font-size: 14px; }

        /* RESTO CARD */
        .resto-card {
            background: #F8F9FA;
            border-radius: 12px;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        /* TOMBOL UTAMA */
        .btn-orange {
            background-color: #FF9F43;
            color: white;
            width: 100%;
            padding: 12px;
            border-radius: 50px;
            border: none;
            font-weight: 600;
        }
        .btn-orange:hover { background-color: #e68a30; color: white; }

        /* TOMBOL STATE AKTIF */
        .btn-outline-orange { 
            background: white; 
            color: #FF9F43; 
            border: 1px solid #FF9F43; 
            width: 100%; 
            padding: 10px; 
            border-radius: 50px; 
            font-weight: 600; 
            margin-bottom: 10px; 
            transition: 0.2s;
        }
        .btn-outline-orange:hover { background-color: #FFF8E1; }

        .btn-outline-red { 
            background: white; 
            color: #dc3545; 
            border: 1px solid #dc3545; 
            width: 100%; 
            padding: 10px; 
            border-radius: 50px; 
            font-weight: 600; 
            transition: 0.2s;
        }
        .btn-outline-red:hover { background-color: #ffeaea; }

        /* MODAL STYLE */
        .modal-content { border-radius: 20px; border: none; position: relative; overflow: hidden; }
        .bg-bubbles::before, .bg-bubbles::after {
            content: ''; position: absolute; border-radius: 50%; background: rgba(255, 159, 67, 0.1); z-index: 0;
        }
        .bg-bubbles::before { width: 100px; height: 100px; top: -20px; left: -20px; }
        .bg-bubbles::after { width: 80px; height: 80px; bottom: -10px; right: -10px; }
        .modal-body { position: relative; z-index: 1; }
        
        .form-control-lg-custom { font-size: 1.5rem; font-weight: bold; text-align: center; border: none; background: #f8f9fa; border-radius: 10px; }
        
        /* Utility */
        .hide { display: none !important; }
    </style>
</head>
<body>

    <div class="header">
        <a href="javascript:history.back()" class="text-dark"><i class="bi bi-arrow-left fs-4"></i></a>
        <h5 class="fw-bold mb-0">Buka Jastip</h5>
    </div>

    <div class="main-card">
        <h6 class="fw-bold mb-4">Atur Jastip Anda!</h6>

        <div class="input-row" data-bs-toggle="modal" data-bs-target="#modalWaktu">
            <span class="input-label">Waktu Order</span>
            <span class="input-value" id="txtWaktu">11:00 - 16:00</span>
        </div>

        <div class="input-row" data-bs-toggle="modal" data-bs-target="#modalSlot">
            <span class="input-label">Jumlah Slot</span>
            <span class="input-value"><span id="txtSlot">12</span> Slot</span>
        </div>

        <div class="input-row mb-4" data-bs-toggle="modal" data-bs-target="#modalBiaya">
            <span class="input-label">Biaya Pengantaran</span>
            <span class="input-value" id="txtBiaya">Rp 2.000</span>
        </div>

        <div class="search-box">
            <i class="bi bi-search text-muted"></i>
            <input type="text" placeholder="Cari restoran tujuan...">
        </div>

        <div class="resto-card">
            <div class="d-flex align-items-center gap-2">
                <img src="https://placehold.co/40x40/orange/white?text=A" class="rounded-circle">
                <div style="line-height: 1.2;">
                    <div class="fw-bold small">Ayam Joder</div>
                    <div class="text-muted" style="font-size: 10px;">Gebang</div>
                </div>
            </div>
            <i class="bi bi-dash-circle text-secondary" style="cursor: pointer;"></i>
        </div>

        <div id="btn-area-awal">
            <button class="btn-orange" onclick="cekValidasi()">Mulai Jastip</button>
        </div>

        <div id="btn-area-aktif" class="hide">
            <button class="btn-outline-orange" onclick="window.location.href='{{ route('pesananMasuk') }}'">Cek Pesanan</button>
            
            <button class="btn-outline-red" onclick="tampilKonfirmasiAkhiri()">Akhiri Jastip</button>
        </div>

    </div>


    <div class="modal fade" id="modalTersimpan">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-bubbles p-4 text-center">
                <div class="modal-body">
                    <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 60px; height: 60px; font-size: 30px;">
                        <i class="bi bi-check-lg"></i>
                    </div>
                    <h5 class="fw-bold text-success">Data Jastip Telah Tersimpan</h5>
                    <p class="text-muted small">Jastip akan segera dibuka</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAkhiri">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-bubbles p-4 text-center">
                <div class="modal-body">
                    <h5 class="fw-bold mb-4">Akhiri Sesi Jastip?</h5>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-warning text-white rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Batalkan</button>
                        <button class="btn btn-warning text-white rounded-pill px-4 fw-bold" onclick="prosesAkhiri()">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalBerakhir">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-bubbles p-4 text-center">
                <div class="modal-body">
                    <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 60px; height: 60px; font-size: 30px;">
                        <i class="bi bi-check-lg"></i>
                    </div>
                    <h5 class="fw-bold text-success">Sesi jastip berakhir</h5>
                    <p class="text-muted small">Ditunggu sesi jastip berikutnya ya!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalWaktu" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content p-3 text-center">
                <h6>Atur Waktu</h6>
                <div class="d-flex gap-2 justify-content-center my-3">
                    <input type="time" id="valJamBuka" class="form-control text-center" value="11:00">
                    <span class="align-self-center">-</span>
                    <input type="time" id="valJamTutup" class="form-control text-center" value="16:00">
                </div>
                <button class="btn btn-sm btn-warning text-white w-100 fw-bold" onclick="simpanWaktu()">Simpan</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalSlot" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content p-3 text-center">
                <h6>Jumlah Slot</h6>
                <input type="number" id="valSlot" class="form-control form-control-lg-custom mb-3" value="12">
                <button class="btn btn-sm btn-warning text-white w-100 fw-bold" onclick="simpanSlot()">Simpan</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalBiaya" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content p-3 text-center">
                <h6>Biaya Kirim</h6>
                <input type="number" id="valBiaya" class="form-control form-control-lg-custom mb-3" value="2000">
                <button class="btn btn-sm btn-warning text-white w-100 fw-bold" onclick="simpanBiaya()">Simpan</button>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        
        // --- LOGIC UTAMA TOMBOL MULAI & AKHIRI ---

        // 1. Saat tombol "Mulai Jastip" diklik
        function cekValidasi() {
            // Tampilkan Modal "Data Jastip Telah Tersimpan"
            var modalSimpan = new bootstrap.Modal(document.getElementById('modalTersimpan'));
            modalSimpan.show();

            // Tunggu 2 detik, lalu tutup modal & ganti tombol
            setTimeout(function() {
                modalSimpan.hide();
                ubahKeModeAktif(); // Panggil fungsi ganti tombol
            }, 2000);
        }

        // 2. Fungsi Mengganti Tombol (Mulai -> Cek Pesanan & Akhiri)
        function ubahKeModeAktif() {
            document.getElementById('btn-area-awal').classList.add('hide'); // Sembunyikan tombol awal
            document.getElementById('btn-area-aktif').classList.remove('hide'); // Munculkan tombol aktif
        }

        // 3. Saat tombol "Akhiri Jastip" diklik
        function tampilKonfirmasiAkhiri() {
            var modalAkhiri = new bootstrap.Modal(document.getElementById('modalAkhiri'));
            modalAkhiri.show();
        }

        // 4. Saat pilih "Ya" di konfirmasi Akhiri
        function prosesAkhiri() {
            // Tutup modal konfirmasi
            var modalAkhiriEl = document.getElementById('modalAkhiri');
            var modalAkhiri = bootstrap.Modal.getInstance(modalAkhiriEl);
            modalAkhiri.hide();

            // Tampilkan modal "Sesi Berakhir"
            var modalBerakhir = new bootstrap.Modal(document.getElementById('modalBerakhir'));
            modalBerakhir.show();

            // Tunggu 2 detik, lalu refresh halaman (Reset ke awal)
            setTimeout(function() {
                modalBerakhir.hide();
                location.reload(); 
            }, 2000);
        }

        // --- LOGIC INPUT DATA (WAKTU/SLOT/BIAYA) ---
        function simpanWaktu() {
            let t1 = document.getElementById('valJamBuka').value;
            let t2 = document.getElementById('valJamTutup').value;
            document.getElementById('txtWaktu').innerText = t1 + ' - ' + t2;
            bootstrap.Modal.getInstance(document.getElementById('modalWaktu')).hide();
        }
        function simpanSlot() {
            document.getElementById('txtSlot').innerText = document.getElementById('valSlot').value;
            bootstrap.Modal.getInstance(document.getElementById('modalSlot')).hide();
        }
        function simpanBiaya() {
            let rp = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(document.getElementById('valBiaya').value);
            document.getElementById('txtBiaya').innerText = rp;
            bootstrap.Modal.getInstance(document.getElementById('modalBiaya')).hide();
        }
    </script>

</body>
</html>