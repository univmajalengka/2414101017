<?php 
include("../../config/database.php"); ?>

<!doctype html>
<html lang="id" data-bs-theme="light">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Admin</title>
  <link rel="icon" type="image/x-icon" href="../assets/img/PetaniMuda.id2.png">

  <!-- Bootstrap CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/gaya.css">

</head>
<body>

<div class="app" id="app">

  <!-- Sidebar -->
  <aside class="sidebar" id="sidebar">
    <div class="brand">
      <img src="../assets/img/PetaniMuda.id2.png" alt="Petani Muda" class="logo me-2">
      <span>Petani Muda</span>
    </div>

    <div class="section-title">Overview</div>
    <nav class="nav flex-column mb-2">
      <a class="nav-link" href="overview.php">
        <i class="bi bi-speedometer2"></i><span class="label">Dashboard</span></a>
      <a class="nav-link active" href="prodcuk.php">
        <i class="bi bi-bag-check"></i><span class="label">Products</span></a>
      <a class="nav-link" href="orders.php">
        <i class="bi bi-box-seam"></i><span class="label">Orders</span></a>
      <a class="nav-link" href="../blog/list.php">
        <i class="bi bi-journal-text"></i><span class="label">Blog</span></a>
    </nav>

    <div class="section-title">Manage</div>
    <nav class="nav flex-column">
      <a class="nav-link" href="#"><i class="bi bi-gear"></i><span class="label">Settings</span></a>
      <a class="nav-link" href="../../Frontend/Home.php"><i class="bi bi-box-arrow-right"></i><span class="label">Back</span></a>
    </nav>
  </aside>

  <!-- Topbar -->
  <header class="topbar">
    <div class="container-fluid">
      <div class="d-flex align-items-center gap-2 py-2">
        <!-- Mobile: open offcanvas -->
        <button class="btn btn-outline-secondary d-lg-none" id="btnOpenSidebar" aria-label="Toggle sidebar">
          <i class="bi bi-list"></i>
        </button>

        <!-- Desktop: collapse sidebar -->
        <button class="btn btn-outline-secondary d-none d-lg-inline-flex" id="btnCollapse" aria-label="Collapse sidebar">
          <i class="bi bi-layout-sidebar-inset"></i>
        </button>

        <div class="ms-auto d-flex align-items-center gap-2">
          <div class="input-group" style="max-width: 320px;">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="search" class="form-control" placeholder="Cari…">
          </div>
        </div>
      </div>
    </div>
  </header>

    <!-- Main -->
  <main class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="fw-bold mb-0">Daftar Artikel Blog</h4>
      <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addBlogModal">
        <i class="bi bi-plus-circle me-1"></i> Tambah Blog
      </button>
    </div>

    <!-- Table Blog -->
    <div class="table-responsive bg-white p-3 rounded shadow-sm">
      <table class="table align-middle">
        <thead class="table-success">
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Gambar</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $result = mysqli_query($conn, "SELECT * FROM blog ORDER BY id DESC");
          $no = 1;
          if (mysqli_num_rows($result) > 0) {
            while ($b = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($b['title']); ?></td>
            <td><img src="../uploads/blog/<?= htmlspecialchars($b['image']); ?>" width="100" height="70" style="object-fit:cover;border-radius:8px;"></td>
            <td><?= htmlspecialchars($b['created_at']); ?></td>
            <td>
              <a href="../actions/edit_blog.php?id=<?= $b['id']; ?>" class="btn btn-outline-warning btn-sm">
                <i class="bi bi-pencil"></i>
              </a>
              <a href="../actions/delete_blog.php?id=<?= $b['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus artikel ini?')">
                <i class="bi bi-trash"></i>
              </a>
            </td>
          </tr>
          <?php
            }
          } else {
            echo "<tr><td colspan='5' class='text-center text-muted'>Belum ada artikel ditambahkan.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </main>
</div>

<!-- Modal Tambah Blog -->
<div class="modal fade" id="addBlogModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <form class="modal-content" action="../actions/add_blog.php" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">Tambah Artikel Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label>Judul Artikel</label>
          <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Isi Artikel</label>
          <textarea name="content" class="form-control" rows="6" placeholder="Tulis isi artikel di sini..." required></textarea>
        </div>
        <div class="mb-3">
          <label>Gambar</label>
          <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="../assets/javascript/fungsi.js"></script>

</body>
</html>
