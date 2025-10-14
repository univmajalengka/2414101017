<?php
include("../../config/database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $content = mysqli_real_escape_string($conn, $_POST['content']);
  $image = '';

  if (!empty($_FILES['image']['name'])) {
    $fileName = time() . '_' . basename($_FILES['image']['name']);
    $targetPath = "../uploads/blog/" . $fileName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
      $image = $fileName;
    }
  }

  $query = "INSERT INTO blog (title, content, image, created_at)
            VALUES ('$title', '$content', '$image', NOW())";

  if (mysqli_query($conn, $query)) {
    header("Location: ../dashboard/blog.php");
  } else {
    echo "Gagal menyimpan artikel: " . mysqli_error($conn);
  }
}
?>
