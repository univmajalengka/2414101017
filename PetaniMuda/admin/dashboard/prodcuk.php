<?php 
include("../../config/database.php"); ?>

<!doctype html>
<html lang="id" data-bs-theme="light">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Produk | Petani Muda</title>
  <link rel="icon" type="image/x-icon" href="../assets/img/PetaniMuda.id2.png">

  <!-- Bootstrap CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Google Font -->
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
      <a class="nav-link" href="blog.php">
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
        <button class="btn btn-outline-secondary d-lg-none" id="btnOpenSidebar"><i class="bi bi-list"></i></button>
        <button class="btn btn-outline-secondary d-none d-lg-inline-flex" id="btnCollapse"><i class="bi bi-layout-sidebar-inset"></i></button>
        <div class="ms-auto d-flex align-items-center gap-2">
          <div class="input-group" style="max-width: 320px;">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="search" class="form-control" placeholder="Cari produk…">
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main -->
  <main class="container-fluid py-3">
    <div class="d-flex align-items-center justify-content-between mb-3">
      <h1 class="h3 mb-0">Produk</h1>
      <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addProductModal">
        <i class="bi bi-plus-circle me-1"></i> Tambah Produk
      </button>
    </div>

    <!-- Grid Produk -->
    <div class="row g-3">
      <?php
      $result = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
      if (mysqli_num_rows($result) > 0) {
        while ($p = mysqli_fetch_assoc($result)) {
      ?>
        <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
          <div class="card h-100 shadow-sm border-0">
            <img src="../uploads/products/<?= htmlspecialchars($p['image']); ?>" class="card-img-top" style="height:180px;object-fit:cover;" alt="<?= htmlspecialchars($p['name']); ?>">
            <div class="card-body">
              <h6 class="card-title mb-1"><?= htmlspecialchars($p['name']); ?></h6>
              <div class="d-flex align-items-center justify-content-between">
                <span class="fw-bold text-success">Rp <?= number_format($p['price'], 0, ',', '.'); ?></span>
                <span class="badge bg-success-subtle text-success border">Stok: <?= $p['stock']; ?>kg</span>
              </div>
            </div>
            <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
              <!-- Tombol Edit (Modal) -->
              <button class="btn btn-outline-warning btn-sm" 
                      data-bs-toggle="modal" 
                      data-bs-target="#editProductModal<?= $p['id']; ?>">
                <i class="bi bi-pencil"></i>
              </button>
              <!-- Tombol Hapus -->
              <a href="../actions/delete_product.php?id=<?= $p['id']; ?>" onclick="return confirm('Hapus produk ini?')" class="btn btn-outline-danger btn-sm">
                <i class="bi bi-trash"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Modal Edit Produk -->
        <div class="modal fade" id="editProductModal<?= $p['id']; ?>" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content" action="../actions/edit_product.php" method="POST" enctype="multipart/form-data">
              <div class="modal-header">
                <h5 class="modal-title">Edit Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="id" value="<?= $p['id']; ?>">
                <div class="mb-3">
                  <label>Nama Produk</label>
                  <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($p['name']); ?>" required>
                </div>
                <div class="mb-3">
                  <label>Harga (Rp)</label>
                  <input type="number" name="price" class="form-control" value="<?= $p['price']; ?>" required>
                </div>
                <div class="mb-3">
                  <label>Stok</label>
                  <input type="number" name="stock" class="form-control" value="<?= $p['stock']; ?> kg" required>
                </div>
                <div class="mb-3">
                  <label>Deskripsi</label>
                  <textarea name="description" class="form-control" rows="3"><?= htmlspecialchars($p['description']); ?></textarea>
                </div>
                <div class="mb-3">
                  <label>Gambar Produk</label>
                  <input type="file" name="image" class="form-control" accept="image/*">
                  <small class="text-secondary">Kosongkan jika tidak ingin ganti gambar.</small>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>

      <?php
        }
      } else {
        echo "<div class='text-center text-secondary py-5'>Belum ada produk ditambahkan.</div>";
      }
      ?>
    </div>
  </main>
</div>

<!-- Modal Tambah Produk -->
<div class="modal fade" id="addProductModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" action="../actions/add_product.php" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Produk Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label>Nama Produk</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Harga (Rp)</label>
          <input type="number" name="price" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Stok</label>
          <input type="number" name="stock" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Deskripsi</label>
          <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label>Gambar Produk</label>
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
</body>
</html>
