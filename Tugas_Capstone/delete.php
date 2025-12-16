<?php
include "koneksi.php";

$id = $_GET['id'];

$query = "DELETE FROM pemesanan WHERE id = $id";

if (mysqli_query($conn, $query)) {
    header("Location: modifikasi_pesanan.php");
    exit;
} else {
    echo "Gagal menghapus: " . mysqli_error($conn);
}
?>
