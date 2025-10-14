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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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
            <a class="nav-link" aria-current="page" href="#">Beranda</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="produk.php">Produk</a>
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

  <!-- Hero Section 1 -->
  <section id="hero">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-md-6 hero-tagline my-auto">
          <h1 class="title">Sayuran Segar Langsung Dari Petani Lokal</h1>
          <p>
            <span class="fw-bold">Petani muda</span> menghadirkan sayuran segar, sehat, dan aman dikonsumsi.
            Nikmati belanja online praktis dengan harga ramah di kantong.
          </p>
          <button type="button" class="button-CTA">Beli Sekarang</button>
        </div>
        <div class="col-md-6 my-auto">
          <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner rounded-4 shadow">
              <div class="carousel-item active">
                <img src="../public/img/carousel/polong1.jpg" class="d-block w-100" alt="Sayur 1">
              </div>
              <div class="carousel-item">
                <img src="../public/img/carousel/bawang1.jpg" class="d-block w-100" alt="Sayur 2">
              </div>
              <div class="carousel-item">
                <img src="../public/img/carousel/cabe1.jpg" class="d-block w-100" alt="Sayur 3">
              </div>
              <div class="carousel-item">
                <img src="../public/img/carousel/kentang1.jpg" class="d-block w-100" alt="Sayur 4">
              </div>
              <div class="carousel-item">
                <img src="../public/img/carousel/kol1.jpg" class="d-block w-100" alt="Sayur 5">
              </div>
              <div class="carousel-item">
                <img src="../public/img/carousel/polong2.jpg" class="d-block w-100" alt="Sayur 6">
              </div>
              <div class="carousel-item">
                <img src="../public/img/carousel/bawang2.jpg" class="d-block w-100" alt="Sayur 7">
              </div>
              <div class="carousel-item">
                <img src="../public/img/carousel/cabe2.jpg" class="d-block w-100" alt="Sayur 8">
              </div>
              <div class="carousel-item">
                <img src="../public/img/carousel/kentang2.jpg" class="d-block w-100" alt="Sayur 9">
              </div>
              <div class="carousel-item">
                <img src="../public/img/carousel/kol2.jpg" class="d-block w-100" alt="Sayur 10">
              </div>
              <div class="carousel-item">
                <img src="../public/img/carousel/cabe3.jpg" class="d-block w-100" alt="Sayur 11">
              </div>
              <div class="carousel-item">
                <img src="../public/img/carousel/kol3.jpg" class="d-block w-100" alt="Sayur 12">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Mengapa Memilih Kami Section -->
  <section class="kenapa align-items-center text-center" style="background-image: url(../public/img/carousel/IMG_20250919_082126_HDR.jpg);">
    <div class="background-image"></div>
    <div class="container">
      <h2 class="fw-bold text-success mb-1">Mengapa Memilih Kami?</h2>
      <p class="text-dark mb-5">Keunggulan Layanan Yang Kami Tawarkan</p>

      <div class="row">
        <div class="col-md-6 mb-4">
          <div class="feature-box">
            <div class="feature-icon">
              <i class="fas fa-shipping-fast"></i>
            </div>
            <h3 class="feature-title">Pengiriman Cepat</h3>
            <p class="feature-desc">
              Sayuran segar sampai ke rumah Anda dalam waktu 24 jam setelah dipanen.
              Kami menjaga kesegaran dengan sistem pengemasan khusus.
            </p>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="feature-box">
            <div class="feature-icon">
              <i class="fas fa-award"></i>
            </div>
            <h3 class="feature-title">Kualitas Terjamin</h3>
            <p class="feature-desc">100% sayuran segar dengan kualitas terbaik dan bebas pestisida.</p>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="feature-box">
            <div class="feature-icon">
              <i class="fas fa-hand-holding-heart"></i>
            </div>
            <h3 class="feature-title">Dukung Petani Lokal</h3>
            <p class="feature-desc">
              Dengan berbelanja di PetaniMuda, Anda turut mendukung kesejahteraan petani lokal
              dan perekonomian daerah.
            </p>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="feature-box">
            <div class="feature-icon">
              <i class="fas fa-shield-alt"></i>
            </div>
            <h3 class="feature-title">Garansi Kepuasan</h3>
            <p class="feature-desc">
              Tidak puas dengan produk Anda? Kami siap mengganti atau mengembalikan uang Anda tanpa pertanyaan.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonial Section -->
  <!-- <div class="container2">
    <div class="testimonial-section">
      <h1 class="title2">Testimonial</h1>
      <div class="desktop-view">
        <div class="cards-container">
          <div class="testimonial-card" style="background-image: url(../public/img/paper.png);">
            <p class="card-text">Great service and excellent support. Highly recommended!</p>
            <span class="card-author">- John Doe</span>
          </div>
          <div class="testimonial-card" style="background-image: url(../public/img/paper.png);">
            <p class="card-text">Amazing product that exceeded my expectations.</p>
            <span class="card-author">- Jane Smith</span>
          </div>
          <div class="testimonial-card" style="background-image: url(../public/img/paper.png);">
            <p class="card-text">The best experience I've had with any service.</p>
            <span class="card-author">- Bob Johnson</span>
          </div>
          <div class="testimonial-card" style="background-image: url(../public/img/paper.png);">
            <p class="card-text">Fantastic quality and fast delivery.</p>
            <span class="card-author">- Alice Brown</span>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <!-- Newsletter Section -->
  <section class="newsletter">
    <div class="container3 text-center">
      <h4>Berlangganan Newsletter Kami</h4>
      <p>Dapatkan informasi tentang produk baru, promo spesial, dan tips seputar sayuran langsung ke email Anda.</p>
      <form class="newsletter-form">
        <input type="email" placeholder="Masukkan alamat email Anda" class="newsletter-input" required>
        <button type="submit" class="newsletter-btn">Berlangganan</button>
      </form>
    </div>
  </section>

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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
          integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
          crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
          integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
          crossorigin="anonymous"></script>
  <script src="../public/js/javascript.js"></script>
</body>
</html>