@include('tiptoe.navbar')
<?php echo "<link rel='stylesheet' href='" . asset('css/stylePerawat.css') . "'>"; ?>

<body class="home-login">
    <div class="container">
        <h2>Statistik Rekam Medis</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama_Pasien</th>
                    <th>Tanggal Periksa</th>
                    <th>Usia</th>
                    <th>Biaya_Pengobatan</th>
                    <th>Rekam Medis</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stats as $stat)
                    <tr>
                        <td>{{ $stat->nama_pasien}}</td>
                        <td>{{ \Carbon\Carbon::parse($stat->tanggal)->format('d M Y') }}</td>
                        <td>{{ $stat->total_Usia }}</td>
                        <td>{{ number_format($stat->total_Biaya_Pengobatan, 0, ',', '.') }}</td>
                        <td>
                            @if ($stat->image)
                                <a href="{{ asset('storage/' . $stat->image) }}" download>
                                    <img src="{{ asset('storage/' . $stat->image) }}" alt="Gambar rekam_medis"
                                        class="img-fluid">
                                </a>

                            @else
                                Tidak ada gambar
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Announcement Section -->
    <div class="announcement-container">
        <h3>Announcement</h3>
        @foreach ($announcements as $announcement)
            <div class="announcement-card">
                <div class="announcement-header">
                    <span
                        class="announcement-date">{{ \Carbon\Carbon::parse($announcement->tanggal)->format('d M Y') }}</span>
                </div>
                <div class="announcement-body">
                    <ul>
                        <li>{{ $announcement->catatan }}</li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
    <div class="navigation-container">
        <nav>
            <ul>
                <li><a href="{{ url('tiptoe/index') }}">Keluar</a></li>
                <li><a href="{{ url('tiptoe/login') }}">Edit</a></li>
            </ul>
        </nav>
    </div>
</body>