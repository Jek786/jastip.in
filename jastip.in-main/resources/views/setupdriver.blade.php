<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setup Seller</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* Custom Styles */
        body {
            background-color: #f0f2f5; /* Light gray background to mimic app environment */
        }

        :root {
            --brand-orange: #F97316; /* Extracted orange color from prototype */
        }

        .mobile-app-frame {
            max-width: 450px;
            margin: 2rem auto;
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background-color: #ffffff;
        }

        .app-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #eee;
        }

        .app-header .title {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 0;
        }

        .app-header .back-icon {
            font-size: 1.5rem;
            font-weight: bold;
            cursor: pointer;
        }

        .app-header .cancel-link {
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            color: #6c757d;
        }
        
        /* Tab/Wizard Styling */
        .nav-pills .nav-link {
            border-radius: 50rem;
            color: #6c757d;
            font-weight: 500;
            background-color: #f8f9fa;
        }

        .nav-pills .nav-link.active {
            background-color: var(--brand-orange);
            color: #fff;
        }

        /* Profile Picture */
        .profile-pic-wrapper {
            position: relative;
            width: 100px;
            height: 100px;
            margin: 0 auto;
        }

        .profile-pic {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .profile-pic-edit {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 30px;
            height: 30px;
            background-color: var(--brand-orange);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #fff;
            cursor: pointer;
        }

        /* Form Styling */
        .form-floating > .form-control {
            border-radius: 0.75rem;
        }
        .form-floating > label {
            font-size: 0.9rem;
        }
        .form-floating > textarea.form-control {
            height: 100px;
        }

        .form-section-title {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 0.5rem;
            color: #333;
        }

        /* File Upload Zone */
        .file-upload-zone {
            border: 2px dashed #ddd;
            border-radius: 1rem;
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            background-color: #fcfcfc;
        }
        .file-upload-zone:hover {
            background-color: #f8f9fa;
            border-color: var(--brand-orange);
        }
        .file-upload-zone .bi-file-earmark-image {
            font-size: 3rem;
            color: var(--brand-orange);
        }
        .file-upload-zone p {
            margin-bottom: 0;
            color: #6c757d;
        }

        /* Button */
        .btn-brand {
            background-color: var(--brand-orange);
            color: white;
            font-weight: 600;
            padding: 0.75rem;
            border-radius: 50rem;
            border: none;
        }
        .btn-brand:hover {
            background-color: #E65100;
            color: white;
        }

        /* Modal */
        .modal-content {
            border-radius: 1.5rem;
            border: none;
        }
        .modal-success-icon {
            font-size: 5rem;
            color: #28a745;
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="mobile-app-frame">
            
            <div class="app-header">
                <i class="bi bi-chevron-left back-icon"></i>
                <h5 class="title">Mulai Jastip</h5>
                <a href="#" class="cancel-link">Batalkan</a>
            </div>

            <div class="card-body p-4">
                
                <ul class="nav nav-pills nav-fill mb-4" id="setupTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="step1-tab" data-bs-toggle="tab" data-bs-target="#step1" type="button" role="tab" aria-controls="step1" aria-selected="true">Langkah 1/2</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="step2-tab" data-bs-toggle="tab" data-bs-target="#step2" type="button" role="tab" aria-controls="step2" aria-selected="false">Langkah 2/2</button>
                    </li>
                </ul>

                <div class="tab-content" id="setupTabsContent">
                    
                    <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step1-tab">
                        
                        <h5 class="form-section-title">Foto Profil</h5>
                        <div class="profile-pic-wrapper mb-3">
                            <img src="https://i.pravatar.cc/150?img=68" alt="Profile Picture" class="profile-pic">
                            <div class="profile-pic-edit">
                                <i class="bi bi-pencil-fill" style="font-size: 0.8rem;"></i>
                            </div>
                        </div>
                        <div class="text-center mb-4">
                            <button class="btn btn-sm btn-outline-secondary rounded-pill">Ubah</button>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="namaToko" placeholder="Nama Jastip/Toko">
                            <label for="namaToko">Nama Jastip/Toko</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Bio Singkat" id="bioSingkat"></textarea>
                            <label for="bioSingkat">Bio Singkat</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="alamatAsal" placeholder="Alamat Asal (Kota/Negara)">
                            <label for="alamatAsal">Alamat Asal (Kota/Negara)</label>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2-tab">
                        
                        <h5 class="form-section-title">Verifikasi Identitas (KTP)</h5>
                        <p class="small text-muted mb-3">Informasi dienkripsi dengan aman untuk keperluan pencairan dana.</p>

                        <div class="file-upload-zone mb-4">
                            <input type="file" class="form-control-file" id="ktpUpload" hidden>
                            <label for="ktpUpload" class="w-100" style="cursor: pointer;">
                                <i class="bi bi-file-earmark-image"></i>
                                <p class="fw-bold mt-2">Upload KTP/Port ID</p>
                                <p class="small">File Tipe: JPG, PNG</p>
                            </label>
                        </div>
                        
                        <h5 class="form-section-title mt-4">Informasi Rekening Bank</h5>
                        
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="namaBank" placeholder="Nama Bank">
                            <label for="namaBank">Nama Bank</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nomorRekening" placeholder="Nomor Rekening">
                            <label for="nomorRekening">Nomor Rekening</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="namaPemilik" placeholder="Nama Pemilik Rekening">
                            <label for="namaPemilik">Nama Pemilik Rekening</label>
                        </div>

                        <button class="btn btn-brand w-100 mt-3" data-bs-toggle="modal" data-bs-target="#successModal">
                            Simpan
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <i class="bi bi-check-circle-fill modal-success-icon mb-3"></i>
                    <h5 class="modal-title" id="successModalLabel">Biodata Berhasil</h5>
                    <p class="text-muted">Enkripsi untuk keperluan identitas</p>
                    <button type="button" class="btn btn-brand w-100 mt-3" data-bs-dismiss="modal">Selesai</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>