<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Med Log</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="navbar">
        <div class="logo">
            <a href="{{ route('index') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Med Log">
            </a>
        </div>

        <ul class="nav-links">
            <li><a href="{{ route('index') }}">Home</a></li>
            <li><a href="{{ route('login') }}">Rekam Medis</a></li>
            <a class="logout-btn" style="cursor:pointer;" onclick="muncul()">Masuk</a>
        </ul>
    </div>
    <div class="login" id="login-box" style="display: none;">
        <!-- <hr class="hr"> -->
        <h4>Masuk untuk Menikmati Layanan Eksklusif</h4>
        <a class="logi" style="cursor:pointer;" href="{{ route('login') }}">LOGIN/DAFTAR</a>
    </div>
    <script>
        function muncul() {
            const loginBox = document.getElementById('login-box');
            if (loginBox.style.display === 'none' || loginBox.style.display === '') {
                loginBox.style.display = 'block';
            } else {
                loginBox.style.display = 'none';
            }
        }
    </script>


</body>

</html>