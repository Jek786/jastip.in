<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jastip.in - Titip makanan tanpa drama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FFA51F;
            margin: 0;
        }
        .welcome-page {
            background-color: #FFA51F;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .tagline {
            color: #002147;
            font-weight: 500;
            font-size: 1rem;
        }
        .btn-primary {
            background-color: #004AAD;
            border: none;
            border-radius: 25px;
            font-weight: 500;
            transition: 0.3s;
        }
        .btn-primary:hover { background-color: #003580; }
        .btn-outline-dark {
            border-radius: 25px;
            border-color: #002147;
            color: #002147;
            font-weight: 500;
            transition: 0.3s;
        }
        .btn-outline-dark:hover { background-color: #002147; color: white; }
        img { border-radius: 10px; }
    </style>
</head>
<body class="welcome-page">
    <div class="container text-center">
        <img src="{{ asset('images/Croods Party Time.png') }}" alt="Croods Party Time" class="img-fluid mb-4" style="max-width: 280px;">
        <img src="{{ asset('images/logo-jastipin.png') }}" alt="Logo Jastip.in" class="img-fluid mb-3 mx-auto d-block" style="max-width: 200px;">
        <p class="tagline mb-4">Titip makanan tanpa drama,<br>langsung sampai ke asrama</p>
        <div class="d-flex justify-content-center gap-3 mb-4">
            <a href="{{ route('login') }}" class="btn btn-primary px-4 py-2">Masuk</a>
            <a href="{{ route('register') }}" class="btn btn-outline-dark px-4 py-2">Daftar</a>
        </div>
        <p class="text-dark-50 mb-2">Atau lanjut dengan akun sosial media:</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="#"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/facebook/facebook-original.svg" width="28"></a>
            <a href="#"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" width="28"></a>
            <a href="#"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/apple/apple-original.svg" width="28"></a>
            <a href="#"><img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/x.svg" width="28"></a>
        </div>
    </div>
</body>
</html>
