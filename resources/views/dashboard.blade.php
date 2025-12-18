<!DOCTYPE html>
<!-- 5026231038 - Nabila Shinta Luthfia -->
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Jastip.in</title>

    <!-- Bootstrap & Font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f2f4f7;
            font-family: 'Poppins', sans-serif;
        }

        .dashboard-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 16px;
        }

        .card-role {
            background: #fff;
            border-radius: 22px;
            padding: 32px 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
            text-align: center;
            height: 100%;
        }

        .icon-circle {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }

        .icon-warning { background: #ffc107; }
        .icon-teal { background: #60c4b5; }

        .icon-circle img {
            width: 46px;
        }

        .btn-warning-custom {
            border: 2px solid #ffc107;
            color: #ffc107;
            border-radius: 999px;
            padding: 10px;
            font-weight: 600;
        }

        .btn-warning-custom:hover {
            background: #ffc107;
            color: #fff;
        }

        .btn-teal-custom {
            border: 2px solid #60c4b5;
            color: #60c4b5;
            border-radius: 999px;
            padding: 10px;
            font-weight: 600;
        }

        .btn-teal-custom:hover {
            background: #60c4b5;
            color: #fff;
        }

        /* LOGOUT FIXED */
        .logout-fixed {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 999;
        }
    </style>
</head>
<body>

<div class="dashboard-wrapper">
    <div class="container">

        <!-- HEADER -->
        <div class="text-center mb-5">
            <h2 class="fw-bold text-warning">
                Selamat Datang {{ auth()->user()->name }}!
            </h2>
            <p class="text-secondary mb-0">Kamu mau jadi apa hari ini?</p>
        </div>

        <!-- CARD MENU -->
        <div class="row justify-content-center g-4">

            <!-- BUKA JASTIP -->
            <div class="col-12 col-md-5">
                <div class="card-role">
                    <div class="icon-circle icon-warning">
                        <img src="https://cdn-icons-png.flaticon.com/512/3448/3448610.png" alt="Buka Jastip">
                    </div>

                    <h5 class="fw-bold">Saya Mau Buka Jastip</h5>
                    <p class="text-muted small">
                        Dapatkan penghasilan tambahan dengan menjadi jastiper terpercaya.
                    </p>

                    <a href="{{ route('setupSeller') }}"
                       class="btn btn-warning-custom w-100 mt-3">
                        Mulai Jastip
                    </a>
                </div>
            </div>

            <!-- TITIP MAKANAN -->
            <div class="col-12 col-md-5">
                <div class="card-role">
                    <div class="icon-circle icon-teal">
                        <img src="https://cdn-icons-png.flaticon.com/512/2331/2331970.png" alt="Titip Makanan">
                    </div>

                    <h5 class="fw-bold">Saya Mau Titip Makanan</h5>
                    <p class="text-muted small">
                        Jelajahi berbagai jastiper dan temukan makanan favoritmu.
                    </p>

                    <a href="#"
                       class="btn btn-teal-custom w-100 mt-3">
                        Mulai Pesan
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- LOGOUT DI BAWAH KIRI -->
<div class="logout-fixed">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-danger rounded-pill px-4">
            Logout
        </button>
    </form>
</div>

</body>
</html>
