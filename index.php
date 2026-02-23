<?php include 'koneksi.php';
include 'auth.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Absen Bedug Sahur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow">
        <div class="container">
            <a class="navbar-brand">🕌 Bedug Sahur</a>
            <a href="absen_harian.php" class="btn btn-warning">📅 Absen Harian</a>
            <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </nav>

    <div class="container mt-4">

        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                Input Kehadiran Peserta
            </div>

            <div class="card-body">
                <form action="simpan.php" method="POST">

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>Nama Peserta</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Kelompok</label>
                            <input type="text" name="kelompok" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control">
                        </div>
                    </div>

                    <button class="btn btn-success">✅ Absen Hadir</button>
                    <a href="data.php" class="btn btn-primary">📊 Lihat Rekap</a>

                </form>
            </div>
        </div>

    </div>
</body>

</html>