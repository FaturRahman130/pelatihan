<?php include 'koneksi.php';
include 'auth.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM absensi WHERE id='$id'"));
?>

<form action="update_absensi.php" method="POST" class="container mt-4">
    <input type="hidden" name="id" value="<?= $data['id']; ?>">

    <label>Tanggal</label>
    <input type="date" name="tanggal" class="form-control mb-2" value="<?= $data['tanggal']; ?>">

    <label>Status</label>
    <select name="status" class="form-select mb-2">
        <option <?= $data['status'] == "Hadir" ? "selected" : ""; ?>>Hadir</option>
        <option <?= $data['status'] == "Tidak" ? "selected" : ""; ?>>Tidak</option>
    </select>

    <button class="btn btn-success">Update</button>
</form>