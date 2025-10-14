<?php
include("../config/database.php");
?>

<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Petani Muda</title>
  <link rel="icon" type="image/x-icon" href="../public/img/logo/PetaniMuda.id2.png">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../public/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
</head>
<body>

<!-- Keranjang -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="cartOffcanvas">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title"><i class="bi bi-cart3 me-2"></i>Keranjang Belanja</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <div id="cart-items">

    </div>
    <div class="d-flex justify-content-between mt-3">
      <strong>Total:</strong>
      <strong id="cart-total">Rp 0</strong>
    </div>
    <button class="btn btn-success w-100 mt-3" id="checkoutBtn">Checkout</button>
  </div>
</div>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark position-fixed w-100 fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="../public/img/logo/PetaniMuda.id2.png" alt="Logo Petani Muda" width="30"
             class="d-inline-block align-text-top me-2">
        Petani Muda
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item mx-2">
            <a class="nav-link" aria-current="page" href="Home.php">Beranda</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link active" href="Produk.php">Produk</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="Blog.php">Blog</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="Kontak.php">Kontak</a>
          </li>
        </ul>

        <!-- Bagian kanan navbar -->
        <div class="d-flex align-items-center">
          <?php if (!isset($_SESSION['user_id'])): ?>
            <!-- Belum login -->
            <a href="auth.php?show=register">
              <button type="button" class="button-primary">Daftar</button>
            </a>
            <a href="auth.php">
              <button type="button" class="button-secondary">Masuk</button>
            </a>

          <?php else: ?>

            <!-- Sudah login -->
            <a href="#" class="btn btn-light me-2 position-relative" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas">
              <i class="bi bi-cart3"></i>
              <?php if (!empty($_SESSION['cart'])): ?>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  <?= count($_SESSION['cart']); ?>
                </span>
              <?php endif; ?>
            </a>

            <div class="dropdown">
              <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i> <?= htmlspecialchars($_SESSION['username']); ?>
              </button>
              <ul class="dropdown-menu dropdown-menu-end shadow">
                <li><a class="dropdown-item" href="profile.php"><i class="bi bi-person"></i> Profil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="orders.php"><i class="bi bi-receipt"></i> Pesanan Saya</a></li>

                <?php if ($_SESSION['role'] === 'admin'): ?>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <a class="dropdown-item" href="../admin/dashboard/overview.php">
                      <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                  </li>
                <?php endif; ?>

                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
              </ul>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>

  <!-- ======= Start Product ======= -->
  <section id="produk" class="py-5">
    <div class="container">
      <h2 class="text-center mb-5 fw-bold mt-5">Produk Kami</h2>
      <div class="row g-4">

        <?php
          $result = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
          if (mysqli_num_rows($result) > 0) {
            while ($p = mysqli_fetch_assoc($result)) {
          ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="card product-card h-100 shadow-sm">
                <img src="../admin/uploads/products/<?= htmlspecialchars($p['image']); ?>" 
                    class="card-img-top" 
                    style="height:200px;object-fit:cover;" 
                    alt="<?= htmlspecialchars($p['name']); ?>">

                <div class="card-body d-flex flex-column">
                  <h5 class="card-title"><?= htmlspecialchars($p['name']); ?></h5>
                  <p class="card-text mb-2"><?= htmlspecialchars($p['description']); ?></p>

                  <div class="mt-auto d-flex justify-content-between align-items-center">
                    <span class="price fw-bold text-success">
                      Rp <?= number_format($p['price'], 0, ',', '.'); ?>/kg
                    </span>

                    <?php if (!isset($_SESSION['user_id'])): ?>
                      <a href="auth.php" class="btn btn-success btn-sm">
                        <i class="fa-solid fa-cart-shopping"></i>
                      </a>
                    <?php else: ?>
                      <button class="btn btn-success btn-sm add-to-cart"
                              data-id="<?= $p['id']; ?>"
                              data-name="<?= htmlspecialchars($p['name']); ?>"
                              data-price="<?= $p['price']; ?>"
                              data-image="<?= htmlspecialchars($p['image']); ?>">
                        <i class="fa-solid fa-cart-shopping"></i>
                      </button>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          <?php
            }
          } else {
            echo "<div class='text-center text-muted'>Belum ada produk tersedia.</div>";
          }
          ?>
      </div>
    </div>
  </section>
  <!-- ======= end Product ======= -->

  <!-- ======= Footer ======= -->
<footer class="footer bg-dark pt-5 pb-4">
  <div class="container text-md-left">
    <div class="row text-md-left">
      
      <!-- Logo & Deskripsi -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 fw-bold footer">Petani Muda</h5>
        <p class="text-justify mx-auto" style="max-width:500px;">Petani Muda hadir untuk mempertemukan petani muda Indonesia dengan konsumen yang peduli
         akan kualitas dan keberlanjutan. Setiap sayuran yang kami jual berasal dari hasil panen petani lokal yang dikelola secara bertanggung jawab. Dengan berbelanja di sini, Anda tidak hanya memperoleh sayuran segar dan sehat, tetapi juga turut mendukung pertumbuhan ekonomi petani muda di berbagai daerah.</p>
      </div>

      <!-- Menu Navigasi -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3" id="kontak">
        <h5 class="text-uppercase mb-4 fw-bold footer">Menu</h5>
        <p><a href="#" class="text-light text-decoration-none">Beranda</a></p>
        <p><a href="#" class="text-light text-decoration-none">Produk</a></p>
        <p><a href="#" class="text-light text-decoration-none">Blog</a></p>
        <p><a href="#" class="text-light text-decoration-none">Kontak</a></p>
      </div>

      <!-- Layanan Pelanggan -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 fw-bold footer">Layanan</h5>
        <p><a href="#" class="text-light text-decoration-none">Bantuan</a></p>
        <p><a href="#" class="text-light text-decoration-none">Kebijakan Privasi</a></p>
        <p><a href="#" class="text-light text-decoration-none">Syarat & Ketentuan</a></p>
        <p><a href="#" class="text-light text-decoration-none">Pengembalian</a></p>
      </div>

      <!-- Kontak -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 fw-bold footer">Kontak</h5>
        <p><i class="bi bi-house-door me-2"></i> Cibunut, Majalengka</p>
        <p><i class="bi bi-envelope me-2"></i> support@petanimuda.com</p>
        <p><i class="bi bi-phone me-2"></i> +62 857-2398-3187</p>
      </div>
    </div>

    <hr class="mb-4">

    <!-- Sosial Media & Copyright -->
    <div class="row align-items-center">
      <div class="col-md-7 col-lg-8">
        <p class="mb-0">© 2025 <strong>Petani Muda</strong> | All Rights Reserved</p>
      </div>
      <div class="col-md-5 col-lg-4 text-md-end">
        <a href="#" class="text-light me-3"><i class="bi bi-facebook"></i></a>
        <a href="#" class="text-light me-3"><i class="bi bi-instagram"></i></a>
        <a href="#" class="text-light me-3"><i class="bi bi-twitter"></i></a>
        <a href="#" class="text-light"><i class="bi bi-youtube"></i></a>
      </div>
    </div>
  </div>
</footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../public/js/javascript.js"></script>
</body>
</html>
