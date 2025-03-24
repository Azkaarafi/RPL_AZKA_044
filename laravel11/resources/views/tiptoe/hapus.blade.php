@include('tiptoe.navbar')


<link rel="stylesheet" href="{{ asset('css/styleworker.css') }}">

<body class="home-login">
    <div class="form-container">
        <h2>Hapus Data Rekam Medis</h2>
        <form action="{{ route('hapusrekam_medis') }}" method="POST">
            @csrf


            <label for="nama_pasien">Nama Pasien:</label>
            <input type="text" name="nama_pasien" id="nama_pasien" required><br><br>



            <label for="tanggal_periksa">Tanggal Periksa:</label>
            <input type="date" name="tanggal_periksa" id="tanggal_pemasukan" required><br><br>


            <button type="submit">Hapus Data</button>
        </form>
    </div>

    <div class="navigation-container">
        <nav>
            <ul>
                <li><a href="{{ url('tiptoe/Perawat') }}">Data Statistik</a></li>
                <li><a href="{{ url('tiptoe/hapus') }}">Hapus Data</a></li>
                <li><a href="{{ url('tiptoe/update') }}">Update Data</a></li>
                <li><a href="{{ url('tiptoe/dokter') }}">Input Data</a></li>
            </ul>
        </nav>
    </div>
</body>

</html>