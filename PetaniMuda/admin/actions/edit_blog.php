<?php
include("../../config/database.php");

$id = $_GET['id'] ?? 0;

// Ambil data blog yang akan diedit
$result = mysqli_query($conn, "SELECT * FROM blog WHERE id='$id'");
$blog = mysqli_fetch_assoc($result);

if (!$blog) {
  die("Artikel tidak ditemukan!");
}

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $content = mysqli_real_escape_string($conn, $_POST['content']);
  $image = $blog['image']; // default image lama

  // Jika user upload gambar baru
  if (!empty($_FILES['image']['name'])) {
    $fileName = time() . '_' . basename($_FILES['image']['name']);
    $targetPath = "../../uploads/blog/" . $fileName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
      // Hapus gambar lama jika ada
      if (file_exists("../uploads/blog" . $blog['image'])) {
        unlink("../uploads/blog" . $blog['image']);
      }
      $image = $fileName;
    }
  }

  $query = "UPDATE blog SET title='$title', content='$content', image='$image' WHERE id='$id'";
  if (mysqli_query($conn, $query)) {
    header("Location: ../dashboard/blog.php");
    exit;
  } else {
    echo "<div class='alert alert-danger text-center'>Gagal memperbarui artikel!</div>";
  }
}
?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Blog | Petani Muda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
  <div class="card shadow-sm">
    <div class="card-header bg-success text-white">
      <h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Artikel Blog</h5>
    </div>
    <div class="card-body">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label>Judul Artikel</label>
          <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($blog['title']); ?>" required>
        </div>
        <div class="mb-3">
          <label>Isi Artikel</label>
          <textarea name="content" class="form-control" rows="6" required><?= htmlspecialchars($blog['content']); ?></textarea>
        </div>
        <div class="mb-3">
          <label>Gambar</label>
          <input type="file" name="image" class="form-control" accept="image/*">
          <div class="mt-2">
            <small>Gambar saat ini:</small><br>
            <img src="../uploads/blog/<?= htmlspecialchars($blog['image']); ?>" width="150" style="border-radius:8px;">
          </div>
        </div>
        <div class="text-end">
          <a href="../dashboard/blog.php" class="btn btn-secondary">Batal</a>
          <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
