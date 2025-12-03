<!DOCTYPE html> <!-- 5026231038 - Nabila Shinta Luthfia -->
<html lang="id">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Dashboard - Jastip.in</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <style>
        body { background-color: #f2f4f7; font-family: 'Poppins', sans-serif; } 
        .option-card { border-radius: 20px; background: #ffffff; } 
        .icon-wrapper { width: 80px; height: 80px; border-radius: 50%; display: flex; justify-content: center; align-items: center; margin: auto; }
        .bg-teal { background-color: #60c4b5; } 
        .btn-outline-teal { border: 2px solid #60c4b5; color: #60c4b5; } 
        .btn-outline-teal:hover { background-color: #60c4b5; color: #fff; } 
        .btn-outline-warning { border: 2px solid #FFC107; color: #FFC107; } 
        .btn-outline-warning:hover { background-color: #FFC107; color: #fff; } 
    </style>
</head>
<body class="bg-light"> 

    <div class="container py-4"> 

        <div class="text-center mt-4"> <!-- Header selamat datang -->
            <h2 class="fw-bold text-warning">Selamat Datang {{ $user->name }}!</h2> <!-- Nama user dari session -->
            <h5 class="text-secondary mt-1">Kamu mau jadi apa?</h5>
            <p class="text-muted small">Pilih Peran Anda di Jastip.in</p>
        </div>

        <div class="row justify-content-center mt-4"> <!-- Pilihan role -->

            <div class="col-11 col-md-6 mb-4"> <!-- Card buka jastip -->
                <div class="option-card shadow p-4 text-center">
                    <div class="icon-wrapper bg-warning mb-3"> <!-- Ikon -->
                        <img src="https://cdn-icons-png.flaticon.com/512/3448/3448610.png" width="48" alt="">
                    </div>
                    <h5 class="fw-bold">Saya Mau Buka Jastip</h5>
                    <p class="text-muted small">Dapatkan penghasilan tambahan dengan menjadi jastiper terpercaya.</p>
                    <a href="#" class="btn btn-outline-warning fw-semibold px-4 w-100 rounded-pill">Mulai Jastip</a> <!-- Tombol -->
                </div>
            </div>

            <div class="col-11 col-md-6 mb-4"> <!-- Card titip makanan -->
                <div class="option-card shadow p-4 text-center">
                    <div class="icon-wrapper bg-teal mb-3">
                        <img src="https://cdn-icons-png.flaticon.com/512/2331/2331970.png" width="48" alt="">
                    </div>
                    <h5 class="fw-bold">Saya Mau Titip Makanan</h5>
                    <p class="text-muted small">Jelajahi berbagai jastiper dan temukan makanan favoritmu dari mana saja.</p>
                    <a href="#" class="btn btn-outline-teal fw-semibold px-4 w-100 rounded-pill">Mulai Pesan</a>
                </div>
            </div>

        </div>

        <form action="{{ route('logout') }}" method="POST"> <!-- Form logout -->
            @csrf
            <button type="submit" class="btn btn-danger mt-3">Logout</button> <!-- Tombol logout -->
        </form>

    </div>

</body>
</html>
