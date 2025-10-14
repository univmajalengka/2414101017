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
    <a href="../../Frontend/Home.php">
    <div class="brand">
      <img src="../assets/img/PetaniMuda.id2.png" alt="Petani Muda" class="logo me-2"></a>
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
      <div>
        <h1 class="h3 mb-0">Overview</h1>
      </div>
    </div>

    <!-- Stats -->
    <div class="row g-3">
      <div class="col-12 col-md-6 col-xl-3">
        <div class="card stat-card h-100">
          <div class="card-body d-flex align-items-center gap-3">
            <div class="icon-wrap"><i class="bi bi-bag fs-5"></i></div>
            <div>
              <div class="text-secondary small">Orders</div>
              <div class="fs-4 fw-bold">270</div>
              <div class="small text-success"><i class="bi bi-arrow-up-right"></i> +4.2%</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-xl-3">
        <div class="card stat-card h-100">
          <div class="card-body d-flex align-items-center gap-3">
            <div class="icon-wrap"><i class="bi bi-cash-coin fs-5"></i></div>
            <div>
              <div class="text-secondary small">Revenue</div>
              <div class="fs-4 fw-bold">Rp 2.000.000</div>
              <div class="small text-success"><i class="bi bi-arrow-up-right"></i> +2.1%</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-xl-3">
        <div class="card stat-card h-100">
          <div class="card-body d-flex align-items-center gap-3">
            <div class="icon-wrap"><i class="bi bi-people fs-5"></i></div>
            <div>
              <div class="text-secondary small">New Users</div>
              <div class="fs-4 fw-bold">392</div>
              <div class="small text-danger"><i class="bi bi-arrow-down-right"></i> -0.8%</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-xl-3">
        <div class="card stat-card h-100">
          <div class="card-body d-flex align-items-center gap-3">
            <div class="icon-wrap"><i class="bi bi-graph-up-arrow fs-5"></i></div>
            <div>
              <div class="text-secondary small">Conversion</div>
              <div class="fs-4 fw-bold">3.7%</div>
              <div class="small text-success"><i class="bi bi-arrow-up-right"></i> +0.3%</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Charts / Placeholder -->
    <div class="row g-3 mt-1">
      <div class="col-12">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between">
            <span class="fw-semibold">Traffic</span>
          </div>
          <div class="card-body">
            <div class="ratio ratio-21x9 bg-body-secondary rounded d-flex align-items-center justify-content-center">
              <div class="text-secondary text-center">
                <i class="bi bi-activity d-block fs-1 mb-2"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="../assets/javascript/fungsi.js"></script>

</body>
</html>
