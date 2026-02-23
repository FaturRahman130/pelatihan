<?php
include 'koneksi.php';
include 'auth.php';

// CEK KONEKSI
if (!$conn) {
    die("Koneksi database gagal.");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Rekap Kehadiran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h5 class="mb-0">Rekap Kehadiran Bedug Sahur</h5>
                <a href="absen_harian.php" class="btn btn-warning btn-sm">Input Absensi</a>
            </div>

            <div class="card-body">

                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelompok</th>
                            <th>Total Hadir</th>
                            <th>Detail</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $no = 1;

                        // QUERY REKAP (AMAN)
                        $sql = "SELECT peserta.id,peserta.nama,peserta.kelompok,COUNT(CASE WHEN absensi.status='Hadir' THEN 1 END) as total FROM peserta LEFT JOIN absensi ON peserta.id = absensi.id_peserta GROUP BY peserta.id ORDER BY peserta.nama ASC";

                        $q = mysqli_query($conn, $sql);

                        // CEK ERROR QUERY
                        if (!$q) {
                            die("Query Error: " . mysqli_error($conn));
                        }

                        while ($r = mysqli_fetch_assoc($q)) {
                            ?>

                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $r['nama']; ?></td>
                                <td><?= $r['kelompok']; ?></td>
                                <td><span class="badge bg-success"><?= $r['total']; ?> Hari</span></td>

                                <td>
                                    <button class="btn btn-info btn-sm" data-bs-toggle="collapse"
                                        data-bs-target="#detail<?= $r['id']; ?>">
                                        Lihat Detail
                                    </button>

                                    <div class="collapse mt-2" id="detail<?= $r['id']; ?>">

                                        <table class="table table-sm table-bordered">
                                            <thead class="table-secondary">
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Status</th>
                                                    <th>Keterangan Tugas</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php
                                                $detail = mysqli_query($conn, "SELECT * FROM absensi WHERE id_peserta='" . $r['id'] . "'ORDER BY tanggal ASC");

                                                // CEK ERROR DETAIL
                                                if (!$detail) {
                                                    echo "<tr><td colspan='3'>Query detail error</td></tr>";
                                                } else {
                                                    while ($d = mysqli_fetch_assoc($detail)) {
                                                        $warna = ($d['status'] == "Hadir") ? "success" : "danger";
                                                        ?>
                                                        <tr>
                                                            <td><?= date('d-m-Y', strtotime($d['tanggal'])); ?></td>
                                                            <td><span class="badge bg-<?= $warna; ?>"><?= $d['status']; ?></span>
                                                            </td>
                                                            <td><?= $d['keterangan'] ? $d['keterangan'] : '-'; ?></td>
                                                        </tr>
                                                    <?php }
                                                } ?>

                                            </tbody>
                                        </table>

                                    </div>
                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>
                </table>

                <?php
                $totalPeserta = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM peserta"));
                $totalHadir = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM absensi WHERE status='Hadir'"));
                ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-info">
                            Total Peserta : <b><?= $totalPeserta; ?> Orang</b>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="alert alert-success">
                            Total Kehadiran : <b><?= $totalHadir['total']; ?></b>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>