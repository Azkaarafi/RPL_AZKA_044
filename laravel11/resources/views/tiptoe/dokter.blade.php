@include('tiptoe.navbar')
<?php echo "<link rel='stylesheet' href='" . asset('css/styleworker.css') . "'>"; ?>

<body class="home-login">
    <div class="form-container">
        <h2>Input Rekam Medis</h2>
        <form action="{{ route('dokter') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="nama_pasien">Nama Pasien:</label>
            <input type="text" name="nama_pasien" id="nama_pasien" required><br><br>


            <label for="Usia">Usia:</label>
            <input type="number" name="Usia" id="Usia" step="0.1" required><br><br>

            <label for="Biaya_Pengobatan">Biaya_Pengobatan:</label>
            <input type="number" name="Biaya_Pengobatan" id="Biaya_Pengobatan" step="0.01" required><br><br>

            <label for="image">Upload_Rekam_Medis:</label>
            <input type="file" name="image" id="image" accept="image/*" required><br><br>

            <label for="tanggal_periksa">Tanggal Pemasukan:</label>
            <input type="date" name="tanggal_periksa" id="tanggal_periksa" required><br><br>

            <label for="catatan">Catatan:</label>
            <textarea name="catatan" id="catatan" rows="4" placeholder="Tambahkan catatan atau keterangan tambahan"
                style="width: 100%;"></textarea><br><br>

            <button type="submit">Submit</button>
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