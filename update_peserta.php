<?php
include 'koneksi.php';

mysqli_query($conn, "
UPDATE peserta SET
nama='$_POST[nama]',
kelompok='$_POST[kelompok]',
keterangan='$_POST[keterangan]'
WHERE id='$_POST[id]'
");

header("Location:data.php");
?>