<?php
include "koneksi.php";

// Ambil data dari form
$id         = $_POST['id'];
$nama       = $_POST['nama'];
$hp         = $_POST['hp'];
$tanggal    = $_POST['tanggal'];
$hari       = $_POST['hari'];
$layanan    = $_POST['layanan'];     // sudah digabung di hidden input
$paket      = $_POST['paket'];
$peserta    = $_POST['peserta'];

// harga & tagihan sudah berupa angka, tapi masih format 1.000.000 (pakai titik)
// Maka kita bersihkan titik sebelum disimpan
$harga      = str_replace('.', '', $_POST['harga']);
$tagihan    = str_replace('.', '', $_POST['tagihan']);

// Query update
$query = "UPDATE pemesanan SET 
            nama='$nama',
            hp='$hp',
            tanggal='$tanggal',
            hari='$hari',
            layanan='$layanan',
            paket='$paket',
            peserta='$peserta',
            harga='$harga',
            tagihan='$tagihan'
          WHERE id='$id'";

if (mysqli_query($conn, $query)) {
    header("Location: modifikasi_pesanan.php");
    exit;
} else {
    echo "Gagal update: " . mysqli_error($conn);
}
?>
