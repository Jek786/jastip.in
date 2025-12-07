{{-- 5026231010 - Daniel Setiawan Yulius Putra --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Bahasa</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa; 
        }
        .mobile-screen-container {
            max-width: 450px;
            margin: auto;
        }
        .rounded-custom {
            border-radius: 1rem; 
        }
        .dot-icon {
            font-size: 12px;
        }

    </style>
</head>
<body>

    <div class="mobile-screen-container">
        
        <header class="d-flex align-items-center p-3 bg-white shadow-sm">
            <a href="welcome" class="text-dark text-decoration-none me-3" aria-label="Kembali">
                <i class="bi bi-arrow-left fs-4"></i>
            </a>
            <h5 class="mb-0 fw-bold">Bahasa</h5>
        </header>

        <main class="p-3">
            
            <div class="card border-0 rounded-custom shadow-sm">
                
                <ul class="list-group list-group-flush rounded-custom overflow-hidden">

                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <span class="fw-semibold">Bahasa Indonesia</span>
                        <i class="bi bi-circle-fill text-dark dot-icon"></i>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <span>English (UK)</span>
                        <i class="bi bi-circle-fill text-body-tertiary dot-icon"></i>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <span>English (US)</span>
                        <i class="bi bi-circle-fill text-body-tertiary dot-icon"></i>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <span>Bahasa Jawa</span>
                        <i class="bi bi-circle-fill text-body-tertiary dot-icon"></i>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <span>Bahasa Sunda</span>
                        <i class="bi bi-circle-fill text-body-tertiary dot-icon"></i>
                    </li>

                </ul>
            </div>
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>