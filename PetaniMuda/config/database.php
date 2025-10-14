<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "petani_muda";

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// (Opsional) Atur charset biar support UTF-8
mysqli_set_charset($conn, "utf8");
?>
