<?php
include 'koneksi.php';
include 'auth.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM peserta WHERE id='$id'"));
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Peserta</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: linear-gradient(135deg, #0d6efd, #0dcaf0);
            color: white;
            border-radius: 15px 15px 0 0 !important;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">✏️ Edit Data Peserta Bedug Sahur</h4>
            </div>

            <div class="card-body">
                <form action="update_peserta.php" method="POST">

                    <input type="hidden" name="id" value="<?= $data['id']; ?>">

                    <div class="mb-3">
                        <label class="form-label">Nama Peserta</label>
                        <input type="text" name="nama" class="form-control" value="<?= $data['nama']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kelompok</label>
                        <input type="text" name="kelompok" class="form-control" value="<?= $data['kelompok']; ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" value="<?= $data['keterangan']; ?>">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="data_peserta.php" class="btn btn-secondary">← Kembali</a>
                        <button class="btn btn-primary">💾 Update Data</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>