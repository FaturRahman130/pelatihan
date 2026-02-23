<?php
include 'koneksi.php';

mysqli_query($conn, "
UPDATE absensi SET
tanggal='$_POST[tanggal]',
status='$_POST[status]'
WHERE id='$_POST[id]'
");

header("Location:data.php");
?>