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
  <main class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-3">
    </div>

    <div class="mt-4">
  <div class="d-flex align-items-center justify-content-between mb-3">
    <div>
      <h2 class="h5 mb-0">Daftar Pesanan</h2>
      <small class="text-secondary">Semua transaksi terbaru dari pelanggan</small>
    </div>
    <button class="btn btn-primary btn-sm">
      <i class="bi bi-download me-1"></i> Export
    </button>
  </div>

  <div class="card shadow-sm border-0">
    <div class="card-header bg-body fw-semibold d-flex justify-content-between align-items-center">
      <span>Order Terbaru</span>
      <div class="input-group input-group-sm" style="width: 200px;">
        <span class="input-group-text bg-light border-end-0">
          <i class="bi bi-search"></i>
        </span>
        <input type="text" class="form-control border-start-0" placeholder="Cari order...">
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>Invoice</th>
            <th>Nama Pelanggan</th>
            <th>Produk</th>
            <th>Total</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th class="text-end">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <!-- <tr>
            <td></td>  Invoice
            <td><i class="bi bi-person-circle me-1"></i></td> Nama
            <td></td> Produk
            <td><strong></strong></td> Harga
            <td><span class="badge bg-success-subtle text-success border">Selesai</span></td> Status
            <td></td>
            <td class="text-end">
              <button class="btn btn-outline-primary btn-sm"><i class="bi bi-eye"></i></button>
              <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div> -->

    <!-- <div class="card-footer bg-body d-flex justify-content-between align-items-center">
      <small class="text-secondary">Menampilkan 1–3 dari 20 data</small>
      <nav>
        <ul class="pagination pagination-sm mb-0">
          <li class="page-item disabled"><a class="page-link">‹</a></li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">›</a></li>
        </ul>
      </nav>
    </div> -->
  </div>
</div>

  </main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="../assets/javascript/fungsi.js"></script>

</body>
</html>
