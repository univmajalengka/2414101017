<?php
include("../../config/database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id       = $_POST['id'];
    $name     = $_POST['name'];
    $category = $_POST['category'];
    $price    = $_POST['price'];
    $stock    = $_POST['stock'];
    $desc     = $_POST['description'];

    // Jika admin upload gambar baru
    if (!empty($_FILES['image']['name'])) {
        $imgName = $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];
        $targetDir = "../uploads/products/";

        // hapus gambar lama dulu
        $result = mysqli_query($conn, "SELECT image FROM products WHERE id=$id");
        $row = mysqli_fetch_assoc($result);
        if ($row && file_exists($targetDir . $row['image'])) {
            unlink($targetDir . $row['image']);
        }

        // upload gambar baru
        move_uploaded_file($tmpName, $targetDir . $imgName);

        // update data dengan gambar baru
        $sql = "UPDATE products 
                SET name='$name', category='$category', price='$price', 
                    stock='$stock', description='$desc', image='$imgName'
                WHERE id=$id";
    } else {
        // update data tanpa ubah gambar
        $sql = "UPDATE products 
                SET name='$name', category='$category', price='$price', 
                    stock='$stock', description='$desc'
                WHERE id=$id";
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: ../dashboard/prodcuk.php?status=updated");
    } else {
        echo "Gagal update produk: " . mysqli_error($conn);
    }
}
?>
