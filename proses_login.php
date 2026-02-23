<?php
include 'koneksi.php';

$user = $_POST['username'];
$pass = md5($_POST['password']);

$cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$user' AND password='$pass'");
$data = mysqli_fetch_assoc($cek);

if ($data) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['username'];
    header("Location:index.php");
} else {
    echo "<script>alert('Login gagal');location='login.php';</script>";
}
?>