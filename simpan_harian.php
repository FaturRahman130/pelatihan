<?php
include 'koneksi.php';

$tanggal     = $_POST['tanggal'];
$status      = $_POST['status'];
$keterangan  = $_POST['keterangan'];

foreach ($status as $id_peserta => $st) {

    $ket = $keterangan[$id_peserta];

    mysqli_query($conn, "INSERT INTO absensi 
        (id_peserta, tanggal, status, keterangan)
        VALUES 
        ('$id_peserta', '$tanggal', '$st', '$ket')
    ");
}

header("Location: index.php?pesan=berhasil");
exit;
?>