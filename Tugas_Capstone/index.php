<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Wisata Gunung Pancar</title>
    <link href="assets/css/style.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet"/>
</head>
<body>

    <section class="collage-container">
        <div class="collage-grid">
            <div class="collage-item">
                <img alt="IMG1" src="assets/img/IMG1.png"/>
            </div>
            <div>
                <img alt="IMG2" src="assets/img/IMG2.png"/>
            </div>
            <div>
                <img alt="IMG3" src="assets/img/IMG3.png"/>
            </div>
            <div>
                <img alt="IMG4" src="assets/img/IMG4.png"/>
            </div>
            <div>
                <img alt="IMG5" src="assets/img/IMG5.png"/>
            </div>
        </div>
        <div class="banner-overlay">
            <div class="banner-card">
                <h2 class="text-dewi">Selamat Datang</h2>
                <h3 class="text-sub">Taman Wisata Alam Gunung Pancar</h3>
            </div>
        </div>
    </section>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top shadow">
        <div class="container">
            <button aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarNavAltMarkup" data-bs-toggle="collapse" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a aria-current="page" class="nav-link" href="index.php">
                        <span class="material-icons-round">home</span> Beranda
                    </a>
                    <a class="nav-link" href="Pemesanan.php">
                        <span class="material-icons-round">tour</span> Pesan Tiket
                    </a>
                    <a class="nav-link" href="modifikasi_pesanan.php">
                        <span class="material-icons-round">edit_calendar</span> Modifikasi Pesanan
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row">
            <div class="col-lg-8 mb-4">
                <h2 class="h3 fw-bold mb-4 d-flex align-items-center gap-2 text-dark">
                    <span class="material-icons-round text-primary">landscape</span>
                    Paket Wisata Populer
                </h2>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0">
                                <div class="card-img-top-wrapper">
                                    <img alt="Glamping Bukit Pancar" class="card-img-top" src="assets/img/glamping.png"/>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">Glamping Bukit Pancar</h5>
                                    <p class="card-text text-muted small flex-grow-1">
                                        Glamping nyaman dengan fasilitas lengkap. Pilihan paket: Standard, Fun, Adventure, dan Full Package.
                                    </p>
                                    <a href="Pemesanan.php?paket=1" class="btn btn-primary w-100 d-flex align-items-center justify-content-center gap-2 mt-3">
                                        <span class="material-icons-round fs-6">add_circle</span> Pesan Paket
                                    </a>
                                </div>
                            </div>
                        </div>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-img-top-wrapper">
                                <img alt="Danau Toba View" class="card-img-top" src="assets/img/camping.png"/>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">Camping Gunung Pancar</h5>
                                <p class="card-text text-muted small flex-grow-1">
                                    Camping di hutan pinus dengan fasilitas lengkap. Harga izin lokasi, tiket masuk, dan sewa tenda tersedia.</p>
                                <a href="Pemesanan.php?paket=2" class="btn btn-primary w-100 d-flex align-items-center justify-content-center gap-2 mt-3">
                                    <span class="material-icons-round fs-6">add_circle</span> Pesan Paket
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-img-top-wrapper">
                                <img alt="Pantai" class="card-img-top" src="assets/img/outbound.png"/>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">Fun Outbound </h5>
                                <p class="card-text text-muted small flex-grow-1">Paket outbound lengkap: games, fasilitator, coffee break 2x, crew, peralatan games, dan tiket masuk Gunung Pancar.</p>
                                <a href="Pemesanan.php?paket=3" class="btn btn-primary w-100 d-flex align-items-center justify-content-center gap-2 mt-3">
                                    <span class="material-icons-round fs-6">add_circle</span> Pesan Paket 
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-img-top-wrapper">
                                <img alt="Resort" class="card-img-top" src="assets/img/curug.png"/>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">Trekking Curug</h5>
                                <p class="card-text text-muted small flex-grow-1">Trekking menuju curug alami. Termasuk tiket masuk curug, guide, coffee break, trekking pole, dan pengawalan.</p>
                                <a href="Pemesanan.php?paket=4" class="btn btn-primary w-100 d-flex align-items-center justify-content-center gap-2 mt-3">
                                    <span class="material-icons-round fs-6">add_circle</span> Pesan Paket
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 sticky-top" style="top: 80px;">
                    <div class="card-body">
                        <h4 class="card-title h5 fw-bold mb-3 pb-2 border-bottom d-flex align-items-center gap-2">
                            <span class="material-icons-round text-danger">video_library</span>
                            Galeri Video
                        </h4>
                        <div class="mb-4">
                            <div class="video-thumbnail-wrapper">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/ScHs_Cdr2oU?si=j14m_zMlkmaTD41q" 
                            frameborder="0" 
                            title="YouTube video player" 
                            autoplay; 
                            allow="accelerometer; 
                            encrypted-media; 
                            clipboard-write; 
                            picture-in-picture; 
                            gyroscope; 
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="video-thumbnail-wrapper">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/3uU9Wnl1yjo?si=L06qPWSrb_wTN9AF" 
                            frameborder="0" 
                            title="YouTube video player" 
                            autoplay; 
                            allow="accelerometer; 
                            encrypted-media; 
                            clipboard-write; 
                            picture-in-picture; 
                            gyroscope; 
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer id="kontak" class="footer bg-dark text-white mt-5 pt-4">

        <div class="container footer-container">

          <!-- GRID 2 KOLOM -->
          <div class="row footer-grid">

            <!-- KIRI: KONTAK -->
            <div class="col-md-6 footer-info mb-4">
              <h3 class="footer-title text-warning fw-bold mb-3">Kontak Kami</h3>

              <p class="mb-2">
                <strong>Alamat:</strong><br>
                Taman Wisata Alam Gunung Pancar, Desa Karang Tengah, Kecamatan Babakan Madang, Kabupaten Bogor, Jawa Barat, Indonesia
              </p>

              <p class="mb-2">
                <strong>WhatsApp:</strong><br>
                <a href="https://wa.me/6281234567890" target="_blank" class="text-white">
                  0812-3456-7890
                </a>
              </p>

              <p class="mb-2">
                <strong>Email:</strong><br>
                <a href="mailto:info@gnpancar.id" class="text-white">info@gnpancar.id</a>
              </p>

              <p class="mb-2">
                <strong>Jam Operasional:</strong><br>
                07.00 – 17.00 WIB
              </p>
            </div>

            <!-- KANAN: GOOGLE MAPS -->
            <div class="col-md-6 footer-maps mb-4">
              <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3535.1817604862417!2d106.9011102744611!3d-6.580556464327143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c7791e515175%3A0x3f7386a4724f7630!2sTaman%20Wisata%20Alam%20Gunung%20Pancar!5e1!3m2!1sid!2sid!4v1765852535439!5m2!1sid!2sid"
                width="100%" 
                height="280" 
                style="border:0;" 
                allowfullscreen 
                loading="lazy">
              </iframe>
            </div>

          </div>

        </div>

        <!-- FOOTER BAWAH -->
        <div class="footer-bottom text-center py-3 mt-3 border-top border-secondary">
          <p class="mb-0">&copy; 2025 Wisata Gunung pancar. All Rights Reserved.</p>
        </div>
      </footer>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>