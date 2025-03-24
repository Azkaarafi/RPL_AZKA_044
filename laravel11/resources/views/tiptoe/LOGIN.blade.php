@include('tiptoe.navbar')
<?php
echo "<link rel='stylesheet' href='" . asset('css/stylelogin.css') . "'>";
?>

<body class="home-login">

    <div class="home">
        <h1>Masuk</h1>
        <p style="font-size:22px;">Masuk Sebagai</p>
    </div>
    <div class="pilihan">
        <div class="dokter" onclick="pilih('dokter')">
            <img src="{{ asset('images/petugas.png') }}" width="400" height="420">
        </div>
        <div class="Perawat" onclick="pilih('Perawat')">
            <img src="{{ asset('images/Perawat.png') }}" width="400" height="420">
        </div>
    </div>
    <div id="form-login" style="display:none; text-align: center;">
        <div id="role-name"></div>

        <form action="{{ url('/tiptoe/login') }}" method="POST">
            @csrf
            <input type="hidden" name="role" id="role" value="dokter">
            <input type="text" id="login-username" name="username" placeholder="Username" required><br><br>
            <input type="password" id="login-password" name="password" placeholder="Password" required><br><br>
            <button type="submit">Login</button>
        </form>



    </div>


    <script>
        function pilih(role) {
            document.getElementById("form-login").style.display = "block";
            var roleName = (role === 'dokter') ? 'Login sebagai Dokter' : 'Login sebagai Perawat';
            document.getElementById("role-name").innerHTML = "<h1>" + roleName + "</h1>";


            document.getElementById("role").value = role;
        }



        function login() {
            var username = document.getElementById("login-username").value;
            var password = document.getElementById("login-password").value;

            if (username && password) {

                alert("Login berhasil");
            } else {
                alert("Username dan password harus diisi!");
            }
        }
    </script>

    <div class="pilihan">
        <p style="font-size:20px;">Belum punya akun? <a href="javascript:void(0)" onclick="tampilkanForm()">Daftar
                Sekarang</a></p>
    </div>


    <div id="modal-registrasi" class="modal">
        <div class="modal-content">
            <span class="close" onclick="tutupForm()">&times;</span>
            <h2>Formulir Registrasi</h2>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>

                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('/tiptoe/login') }}" method="POST">
                @csrf
                <input type="hidden" name="register" value="true">
                <label for="register-username">Username:</label>
                <input type="text" id="register-username" name="username" required><br><br>

                <label for="register-password">Password:</label>
                <input type="password" id="register-password" name="password" required><br><br>

                <label for="register-role">Daftar Sebagai:</label>
                <select id="register-role" name="role"
                    style="font-size: 20px; padding: 10px; width: 250px; height: 50px;" required>
                    <option value="" disabled selected>Pilih Role</option>
                    <option value="dokter">Dokter</option>
                    <option value="Perawat">Perawat</option>
                </select><br><br>



                <button type="submit">Daftar</button>
            </form>

        </div>
    </div>

    <script>

        function tampilkanForm() {
            document.getElementById('modal-registrasi').style.display = "flex";
        }


        function tutupForm() {
            document.getElementById('modal-registrasi').style.display = "none";
        }


        window.onclick = function (event) {
            if (event.target == document.getElementById('modal-registrasi')) {
                document.getElementById('modal-registrasi').style.display = "none";
            }
        }
    </script>

</body>

</html>