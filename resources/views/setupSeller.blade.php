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
        /* --- GLOBAL STYLE (SAMA SEPERTI SEBELUMNYA) --- */
        body { font-family: 'Poppins', sans-serif; background-color: #F5F6FA; max-width: 480px; margin: 0 auto; min-height: 100vh; background: #fff; color: #333; }
        .header { padding: 20px; display: flex; align-items: center; gap: 15px; border-bottom: 1px solid #f0f0f0; position: sticky; top: 0; background: white; z-index: 10; }
        .step-indicator { padding: 15px 20px; background: #fff; }
        .progress { height: 6px; background-color: #eee; border-radius: 10px; margin-top: 5px; }
        .progress-bar { background-color: #FF9F43; border-radius: 10px; transition: width 0.4s ease; }
        .step-text { display: flex; justify-content: space-between; font-size: 12px; color: #888; font-weight: 500; }
        .form-section { padding: 20px; animation: fadeIn 0.4s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .form-label { font-size: 13px; font-weight: 600; margin-bottom: 5px; }
        .required { color: #dc3545; margin-left: 2px; }
        .form-control { border-radius: 8px; padding: 10px 15px; font-size: 14px; border: 1px solid #ddd; }
        .form-control:focus { border-color: #FF9F43; box-shadow: 0 0 0 0.2rem rgba(255, 159, 67, 0.25); }
        
        /* FOTO PROFIL UPLOADER */
        .profile-upload-area { display: flex; flex-direction: column; align-items: center; margin-bottom: 25px; }
        .profile-circle { width: 100px; height: 100px; border-radius: 50%; background-color: #f8f9fa; border: 2px solid #eee; display: flex; justify-content: center; align-items: center; overflow: hidden; position: relative; }
        .profile-circle img { width: 100%; height: 100%; object-fit: cover; display: none; }
        .btn-edit-foto { margin-top: -15px; background: #FF9F43; color: white; border: none; font-size: 11px; padding: 5px 15px; border-radius: 20px; z-index: 2; font-weight: 600; cursor: pointer;}
        
        /* KTP UPLOADER */
        .ktp-upload-area { border: 2px dashed #ddd; border-radius: 10px; padding: 30px; text-align: center; background: #fcfcfc; cursor: pointer; transition: 0.2s; position: relative; overflow: hidden;}
        .ktp-upload-area:hover { border-color: #FF9F43; background: #fffbf5; }
        .ktp-icon { font-size: 30px; color: #aaa; margin-bottom: 10px; }
        .ktp-text { font-size: 12px; color: #888; }
        .ktp-link { color: #0d6efd; font-weight: 600; text-decoration: none; font-size: 12px; }
        #ktp-preview { width: 100%; height: 100%; object-fit: cover; position: absolute; top:0; left:0; }

        .btn-orange { background-color: #FF9F43; color: white; width: 100%; padding: 12px; border-radius: 50px; border: none; font-weight: 600; margin-top: 20px; }
        .btn-orange:hover { background-color: #e68a30; color: white; }
        .btn-outline-secondary { border-radius: 50px; padding: 12px; }
        .d-none { display: none !important; }
    </style>
</head>
<body>

    <div class="header">
        <a href="javascript:history.back()" class="text-dark"><i class="bi bi-chevron-left fs-5"></i></a>
        <h6 class="fw-bold mb-0">Mulai Jastip</h6>
    </div>

    <form action="{{ route('seller.store') }}" method="POST" enctype="multipart/form-data" id="sellerForm">
        @csrf

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
                <div class="profile-circle mb-2">
                    <i class="bi bi-camera-fill text-muted fs-2" id="iconCamera"></i>
                    <img src="" id="profileImagePreview">
                </div>
                <input type="file" name="foto_profil" id="inputFotoProfil" class="d-none" accept="image/*" onchange="previewFoto(this)">
                <button type="button" class="btn-edit-foto" onclick="document.getElementById('inputFotoProfil').click()">Upload Foto</button>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Jastip/Toko <span class="required">*</span></label>
                <input type="text" name="nama_toko" class="form-control" placeholder="Jastip Yuk" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Bio Singkat <span class="required">*</span></label>
                <textarea name="bio" class="form-control" rows="3" placeholder="Ayo Jastip di Kami" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Lokasi Asal/Basecamp <span class="required">*</span></label>
                <input type="text" name="lokasi" class="form-control" placeholder="Pilih Lokasi" required>
            </div>

            <button type="button" class="btn-orange" onclick="nextStep()">Lanjut</button>
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
                
                <input type="file" name="foto_ktp" id="inputKTP" class="d-none" accept="image/*" onchange="previewKTP(this)">
                
                <div class="ktp-upload-area" onclick="document.getElementById('inputKTP').click()">
                    <div id="ktp-placeholder">
                        <i class="bi bi-card-heading ktp-icon"></i>
                        <div class="ktp-text">Unggah KTP/Kartu ID</div>
                        <div class="ktp-link">Pilih File</div>
                    </div>
                    <img src="" id="ktp-preview" class="d-none">
                </div>
            </div>

            <hr class="border-secondary opacity-10 my-4">

            <h6 class="fw-bold mb-1" style="font-size: 14px;">Informasi Rekening Bank <span class="required">*</span></h6>

            <div class="mb-3">
                <label class="form-label">Nama Bank</label>
                <input type="text" name="nama_bank" class="form-control" placeholder="Bank BCA" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor Rekening</label>
                <input type="number" name="no_rekening" class="form-control" placeholder="1000010000" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Pemilik Rekening</label>
                <input type="text" name="atas_nama" class="form-control" placeholder="Jaehyun" required>
            </div>

            <div class="d-flex gap-2">
                <button type="button" class="btn btn-outline-secondary w-50 fw-bold mt-3" onclick="prevStep()">Kembali</button>
                <button type="submit" class="btn-orange w-50 mt-3">Simpan</button>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // --- LOGIC WIZARD ---
        function nextStep() {
            // Validasi sederhana (opsional)
            document.getElementById('step-1').classList.add('d-none');
            document.getElementById('step-2').classList.remove('d-none');
            window.scrollTo(0, 0);
        }

        function prevStep() {
            document.getElementById('step-2').classList.add('d-none');
            document.getElementById('step-1').classList.remove('d-none');
            window.scrollTo(0, 0);
        }

        // --- PREVIEW FOTO PROFIL ---
        function previewFoto(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profileImagePreview').src = e.target.result;
                    document.getElementById('profileImagePreview').style.display = 'block';
                    document.getElementById('iconCamera').style.display = 'none';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // --- PREVIEW KTP ---
        function previewKTP(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('ktp-preview').src = e.target.result;
                    document.getElementById('ktp-preview').classList.remove('d-none');
                    document.getElementById('ktp-placeholder').classList.add('d-none');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>
</html>