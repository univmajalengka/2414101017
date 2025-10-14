<?php
include("../../config/database.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // hapus dulu gambar dari folder
    $result = mysqli_query($conn, "SELECT image FROM products WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
    if ($row && file_exists("../uploads/products/" . $row['image'])) {
        unlink("../uploads/products/" . $row['image']);
    }

    // hapus dari database
    $sql = "DELETE FROM products WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../dashboard/prodcuk.php?status=deleted");
    } else {
        echo "Gagal hapus produk: " . mysqli_error($conn);
    }
}
