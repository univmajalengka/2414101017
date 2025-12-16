<?php
include "koneksi.php";

$nama    = $_POST['nama'];
$hp      = $_POST['hp'];
$tanggal = $_POST['tanggal'];
$hari    = $_POST['waktu'];
$layanan = $_POST['layanan'];
$paket   = $_POST['detailPaket'];
$peserta = $_POST['peserta'];

$harga   = isset($_POST['harga']) ? $_POST['harga'] : 0;
$tagihan = isset($_POST['tagihan']) ? $_POST['tagihan'] : 0;

$query = "INSERT INTO pemesanan 
          (nama, hp, tanggal, hari, layanan, paket, peserta, harga, tagihan)
          VALUES 
          ('$nama', '$hp', '$tanggal', '$hari', '$layanan', '$paket', '$peserta', '$harga', '$tagihan')";

mysqli_query($conn, $query);

header("Location: modifikasi_pesanan.php");
exit;
?>
