<?php
include("../../config/database.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Cek dulu data yang mau dihapus
  $result = mysqli_query($conn, "SELECT * FROM blog WHERE id='$id'");
  $blog = mysqli_fetch_assoc($result);

  if ($blog) {
    // Hapus gambar jika ada
    $filePath = "../../uploads/blog/" . $blog['image'];
    if (file_exists($filePath)) {
      unlink($filePath);
    }

    // Hapus data di database
    mysqli_query($conn, "DELETE FROM blog WHERE id='$id'");
  }

  header("Location: ../dashboard/blog.php");
  exit;
} else {
  echo "<div class='alert alert-danger text-center'>ID artikel tidak ditemukan!</div>";
}
?>
