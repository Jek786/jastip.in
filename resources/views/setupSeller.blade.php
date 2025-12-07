<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setup Seller</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* --- GLOBAL STYLE --- */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F5F6FA;
            max-width: 480px; /* Batas lebar tampilan HP */
            margin: 0 auto;
            min-height: 100vh;
            background: #fff;
            color: #333;
        }

        /* HEADER */
        .header {
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            border-bottom: 1px solid #f0f0f0;
            position: sticky;
            top: 0;
            background: white;
            z-index: 10;
        }

        /* PROGRESS BAR CUSTOM */
        .step-indicator { padding: 15px 20px; background: #fff; }
        .progress { height: 6px; background-color: #eee; border-radius: 10px; margin-top: 5px; }
        .progress-bar { background-color: #FF9F43; border-radius: 10px; transition: width 0.4s ease; }
        .step-text { display: flex; justify-content: space-between; font-size: 12px; color: #888; font-weight: 500; }

        /* FORM SECTION & ANIMASI */
        .form-section {
            padding: 20px;
            animation: fadeIn 0.4s ease-in-out;
        }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        
        .form-label { font-size: 13px; font-weight: 600; margin-bottom: 5px; }
        .required { color: #dc3545; margin-left: 2px; }

        .form-control {
            border-radius: 8px; padding: 10px 15px; font-size: 14px; border: 1px solid #ddd;
        }
        .form-control:focus {
            border-color: #FF9F43; box-shadow: 0 0 0 0.2rem rgba(255, 159, 67, 0.25);
        }

        /* FOTO PROFIL UPLOADER */
        .profile-upload-area { display: flex; flex-direction: column; align-items: center; margin-bottom: 25px; }
        .profile-circle {
            width: 100px; height: 100px; border-radius: 50%;
            background-color: #f8f9fa; border: 2px solid #eee;
            display: flex; justify-content: center; align-items: center;
            overflow: hidden; position: relative;
        }
        .profile-circle img { width: 100%; height: 100%; object-fit: cover; display: none; }
        .btn-edit-foto {
            margin-top: -15px; background: #FF9F43; color: white; border: none;
            font-size: 11px; padding: 5px 15px; border-radius: 20px;
            z-index: 2; font-weight: 600;
        }

        /* KTP UPLOADER */
        .ktp-upload-area {
            border: 2px dashed #ddd; border-radius: 10px; padding: 30px;
            text-align: center; background: #fcfcfc; cursor: pointer; transition: 0.2s;
        }
        .ktp-upload-area:hover { border-color: #FF9F43; background: #fffbf5; }
        .ktp-icon { font-size: 30px; color: #aaa; margin-bottom: 10px; }
        .ktp-text { font-size: 12px; color: #888; }
        .ktp-link { color: #0d6efd; font-weight: 600; text-decoration: none; font-size: 12px; }

        /* BUTTONS */
        .btn-orange {
            background-color: #FF9F43; color: white; width: 100%; padding: 12px;
            border-radius: 50px; border: none; font-weight: 600; margin-top: 20px;
        }
        .btn-orange:hover { background-color: #e68a30; color: white; }
        .btn-outline-secondary { border-radius: 50px; padding: 12px; }

        /* MODAL GALERI */
        .gallery-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; padding: 10px; }
        .gallery-item { aspect-ratio: 1; background: #eee; border-radius: 8px; cursor: pointer; overflow: hidden; position: relative; }
        .gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: 0.2s; }
        .gallery-item:hover img { transform: scale(1.1); }

        /* MODAL SUKSES STYLE */
        .modal-success-content { border-radius: 20px; border: none; overflow: hidden; position: relative; }
        .bg-bubbles::before, .bg-bubbles::after {
            content: ''; position: absolute; border-radius: 50%; background: rgba(76, 175, 80, 0.1); z-index: 0;
        }
        .bg-bubbles::before { width: 80px; height: 80px; top: -20px; left: -20px; }
        .bg-bubbles::after { width: 60px; height: 60px; bottom: -10px; right: -10px; }

        /* UTILITY */
        .d-none { display: none !important; }
    </style>
</head>
<body>

    <div class="header">
        <a href="javascript:history.back()" class="text-dark"><i class="bi bi-chevron-left fs-5"></i></a>
        <h6 class="fw-bold mb-0">Mulai Jastip</h6>
    </div>

    <div id="step-1" class="form-section">
        <div class="mb-4">
            <div class="step-text">
                <span class="text-warning fw-bold">Langkah 1/2</span>
                <span>Persiapan Profil</span>
            </div>
            <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
            </div>
        </div>

        <div class="profile-upload-area">
            <div class="profile-circle mb-2" id="previewContainer">
                <i class="bi bi-camera-fill text-muted fs-2" id="iconCamera"></i>
                <img src="" id="profileImagePreview">
            </div>
            <button class="btn-edit-foto" data-bs-toggle="modal" data-bs-target="#modalGaleri">Edit Foto</button>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Jastip/Toko <span class="required">*</span></label>
            <input type="text" class="form-control" placeholder="Masukan Nama Jastip/Toko Anda" value="Jastip Yuk">
        </div>

        <div class="mb-3">
            <label class="form-label">Bio Singkat <span class="required">*</span></label>
            <textarea class="form-control" rows="3" placeholder="Masukan Bio Anda">Ayo Jastip di Kami</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Lokasi Asal/Basecamp <span class="required">*</span></label>
            <input type="text" class="form-control" placeholder="Pilih Lokasi">
        </div>

        <button class="btn-orange" onclick="nextStep()">Lanjut</button>
    </div>


    <div id="step-2" class="form-section d-none">
        <div class="mb-4">
            <div class="step-text">
                <span class="text-warning fw-bold">Langkah 2/2</span>
                <span>Verifikasi & Bank</span>
            </div>
            <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label d-flex justify-content-between">
                <span>Verifikasi Identitas (KTP) <span class="required">*</span></span>
            </label>
            <small class="text-muted d-block mb-2" style="font-size: 11px;">Kami menjaga keamanan data anda</small>
            
            <div class="ktp-upload-area" onclick="uploadKTP()">
                <div id="ktp-placeholder">
                    <i class="bi bi-card-heading ktp-icon"></i>
                    <div class="ktp-text">Unggah KTP/Kartu ID</div>
                    <div class="ktp-link">Pilih File</div>
                </div>
                <img src="https://asset.kompas.com/crops/b-mXWLYmK6Q9F9eO1v8o8e6gWk8=/0x0:780x520/750x500/data/photo/2021/04/14/60768c728e5e8.jpg" id="ktp-preview" class="w-100 rounded d-none">
            </div>
        </div>

        <hr class="border-secondary opacity-10 my-4">

        <h6 class="fw-bold mb-1" style="font-size: 14px;">Informasi Rekening Bank <span class="required">*</span></h6>
        <small class="text-muted d-block mb-3" style="font-size: 11px;">Disimpan dengan aman untuk keperluan pencairan dana</small>

        <div class="mb-3">
            <label class="form-label">Nama Bank</label>
            <input type="text" class="form-control" placeholder="Masukan Nama Bank Anda" value="Bank BCA">
        </div>

        <div class="mb-3">
            <label class="form-label">Nomor Rekening</label>
            <input type="number" class="form-control" placeholder="Masukan Nomor Rekening Anda" value="1000010000">
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Pemilik Rekening</label>
            <input type="text" class="form-control" placeholder="Masukan Nama Pemilik Rekening Anda" value="Jaehyun">
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary w-50 fw-bold mt-3" onclick="prevStep()">Kembali</button>
            <button class="btn-orange w-50 mt-3" onclick="simpanData()">Simpan</button>
        </div>
    </div>


    <div class="modal fade" id="modalGaleri" tabindex="-1">
        <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content h-100">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn btn-link text-decoration-none text-secondary" data-bs-dismiss="modal">Batalkan</button>
                    <h6 class="modal-title fw-bold mx-auto">Pilih Item</h6>
                    <button type="button" class="btn btn-link text-decoration-none text-dark fw-bold" disabled>Album</button>
                </div>
                <div class="modal-body">
                    <p class="small fw-bold mb-2">Baru saja</p>
                    <div class="gallery-grid">
                        <div class="gallery-item" onclick="pilihFoto('https://i.pravatar.cc/300?img=11')"><img src="https://i.pravatar.cc/300?img=11"></div>
                        <div class="gallery-item" onclick="pilihFoto('https://i.pravatar.cc/300?img=12')"><img src="https://i.pravatar.cc/300?img=12"></div>
                        <div class="gallery-item" onclick="pilihFoto('https://i.pravatar.cc/300?img=33')"><img src="https://i.pravatar.cc/300?img=33"></div>
                        <div class="gallery-item" onclick="pilihFoto('https://i.pravatar.cc/300?img=59')"><img src="https://i.pravatar.cc/300?img=59"></div>
                        <div class="gallery-item" onclick="pilihFoto('https://i.pravatar.cc/300?img=68')"><img src="https://i.pravatar.cc/300?img=68"></div>
                        <div class="gallery-item bg-dark d-flex align-items-center justify-content-center text-white"><i class="bi bi-camera fs-4"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalSukses" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered px-4">
            <div class="modal-content modal-success-content bg-bubbles p-4 text-center">
                <div class="position-relative" style="z-index: 2;">
                    <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 60px; height: 60px;">
                        <i class="bi bi-check-lg fs-2"></i>
                    </div>
                    
                    <h5 class="fw-bold text-success">Biodata Berhasil Disimpan</h5>
                    <p class="text-muted small">Biodata anda berhasil diperbarui</p>
                    
                    <button class="btn-orange mt-2" onclick="window.location.href='{{ route('dashboard') }}'">Kembali ke Menu</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // --- LOGIC WIZARD (PINDAH LANGKAH) ---
        function nextStep() {
            document.getElementById('step-1').classList.add('d-none');
            document.getElementById('step-2').classList.remove('d-none');
            window.scrollTo(0, 0); // Scroll ke atas
        }

        function prevStep() {
            document.getElementById('step-2').classList.add('d-none');
            document.getElementById('step-1').classList.remove('d-none');
            window.scrollTo(0, 0);
        }

        // --- LOGIC FOTO PROFIL ---
        function pilihFoto(url) {
            const imgPreview = document.getElementById('profileImagePreview');
            imgPreview.src = url;
            imgPreview.style.display = 'block';
            document.getElementById('iconCamera').style.display = 'none'; // Sembunyikan ikon kamera
            
            // Tutup modal
            const modalEl = document.getElementById('modalGaleri');
            const modalInstance = bootstrap.Modal.getInstance(modalEl);
            modalInstance.hide();
        }

        // --- LOGIC UPLOAD KTP (SIMULASI) ---
        function uploadKTP() {
            document.getElementById('ktp-placeholder').classList.add('d-none');
            document.getElementById('ktp-preview').classList.remove('d-none');
        }

        // --- LOGIC SIMPAN (SHOW MODAL) ---
        function simpanData() {
            const modalSukses = new bootstrap.Modal(document.getElementById('modalSukses'));
            modalSukses.show();
        }
    </script>

</body>
</html>