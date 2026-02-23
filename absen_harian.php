<?php 
include 'koneksi.php';
include 'auth.php'; 
?>
<!DOCTYPE html>
<html>

<head>
    <title>Absen Harian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-success text-white">
            Input Absensi Harian
        </div>

        <div class="card-body">

            <form action="simpan_harian.php" method="POST">

                <div class="mb-3">
                    <label>Tanggal Absensi</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama Peserta</th>
                            <th>Kelompok</th>
                            <th>Status Kehadiran</th>
                            <th>Keterangan Tugas</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php
                    $data = mysqli_query($conn, "SELECT * FROM peserta ORDER BY nama ASC");
                    while ($d = mysqli_fetch_assoc($data)) {
                    ?>
                        <tr>
                            <td><?= $d['nama']; ?></td>
                            <td><?= $d['kelompok']; ?></td>

                            <!-- Status Hadir -->
                            <td>
                                <select name="status[<?= $d['id']; ?>]" class="form-select">
                                    <option value="Hadir">Hadir</option>
                                    <option value="Tidak Hadir">Tidak Hadir</option>
                                </select>
                            </td>

                            <!-- Keterangan -->
                            <td>
                                <select name="keterangan[<?= $d['id']; ?>]" class="form-select">
                                    <option value="">-- Pilih Tugas --</option>
                                    <option value="Pemukul">Pemukul</option>
                                    <option value="Dorong Gerobak">Dorong Gerobak</option>
                                </select>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>

                <button class="btn btn-success">💾 Simpan Absensi</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>

</body>
</html>