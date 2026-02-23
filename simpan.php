<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$kelompok = $_POST['kelompok'];
$keterangan = $_POST['keterangan'];
$tanggal = date('Y-m-d');

$cek = mysqli_query($conn, "SELECT * FROM peserta WHERE nama='$nama'");
$data = mysqli_fetch_assoc($cek);

if ($data) {
    $id = $data['id'];
} else {
    mysqli_query($conn, "INSERT INTO peserta VALUES(NULL,'$nama','$kelompok','$keterangan')");
    $id = mysqli_insert_id($conn);
}

mysqli_query($conn, "INSERT INTO absensi VALUES(NULL,'$id','$tanggal')");

header("Location:index.php");
?>