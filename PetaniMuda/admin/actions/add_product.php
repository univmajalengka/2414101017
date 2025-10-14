<?php
include("../../config/database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = $_POST['name'];
    $price    = $_POST['price'];
    $stock    = $_POST['stock'];
    $desc     = $_POST['description'];

    // upload gambar
    $imgName = $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];
    $targetDir = "../uploads/products/";
    move_uploaded_file($tmpName, $targetDir . $imgName);

    $sql = "INSERT INTO products (name, category, price, stock, description, image) 
            VALUES ('$name', '$price', '$stock', '$desc', '$imgName')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../dashboard/prodcuk.php?status=success");
    } else {
        echo "Gagal menambah produk: " . mysqli_error($conn);
    }
}
?>
