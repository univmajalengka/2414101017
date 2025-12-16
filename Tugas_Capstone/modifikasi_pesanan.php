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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet"/>
</head>
<body>

<?php
include "koneksi.php";
$result = mysqli_query($conn, "SELECT * FROM pemesanan ORDER BY id DESC");
?>

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

        <div class="banner-overlay">
            <div class="banner-card">
                <h2 class="text-dewi">Selamat Datang</h2>
                <h3 class="text-sub">Taman Wisata Alam Gunung Pancar</h3>
            </div>
        </div>
</section>

<!-- ========================================= -->
<!-- NAVBAR -->
<!-- ========================================= -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top shadow">
    <div class="container">
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="index.php"><span class="material-icons-round">home</span> Beranda</a>
                <a class="nav-link" href="Pemesanan.php"><span class="material-icons-round">tour</span> Pesan Tiket</a>
                <a class="nav-link active" href="modifikasi_pesanan.php"><span class="material-icons-round">edit_calendar</span> Modifikasi Pesanan</a>
            </div>
        </div>
    </div>
</nav>

<!-- ========================================= -->
<!-- TABLE PESANAN -->
<!-- ========================================= -->
<main class="container py-5">

    <h2 class="fw-bold mb-4">Daftar Pesanan</h2>

    <div class="table-responsive shadow-sm">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th>Nama</th>
                    <th>HP</th>
                    <th>Tanggal</th>
                    <th>Hari</th>
                    <th>Layanan</th>
                    <th>Paket</th>
                    <th>Peserta</th>
                    <th>Harga</th>
                    <th>Tagihan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['hp'] ?></td>
                    <td><?= $row['tanggal'] ?></td>
                    <td class="text-center"><?= $row['hari'] ?></td>
                    <td><?= $row['layanan'] ?></td>
                    <td><?= $row['paket'] ?></td>
                    <td class="text-center"><?= $row['peserta'] ?></td>
                    <td class="text-end">Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                    <td class="text-end">Rp <?= number_format($row['tagihan'], 0, ',', '.') ?></td>

                    <td class="text-center">
                        <button 
                            class="btn btn-sm btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#modalEdit"
                            onclick="editData(
                                '<?= $row['id'] ?>',
                                '<?= $row['nama'] ?>',
                                '<?= $row['hp'] ?>',
                                '<?= $row['tanggal'] ?>',
                                '<?= $row['hari'] ?>',
                                '<?= $row['layanan'] ?>',
                                '<?= $row['paket'] ?>',
                                '<?= $row['peserta'] ?>',
                                '<?= $row['harga'] ?>',
                                '<?= $row['tagihan'] ?>'
                            )">
                            Edit
                        </button>

                        <a href="delete.php?id=<?= $row['id'] ?>" 
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Hapus pesanan ini?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</main>

<!-- ========================================= -->
<!-- MODAL EDIT -->
<!-- ========================================= -->
<div class="modal fade" id="modalEdit" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <form action="update_pesanan.php" method="post">
        <div class="modal-header">
          <h5 class="modal-title">Edit Pesanan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

            <input type="hidden" id="edit_id" name="id">

            <label>Nama</label>
            <input type="text" id="edit_nama" name="nama" class="form-control mb-2">

            <label>Nomor HP</label>
            <input type="text" id="edit_hp" name="hp" class="form-control mb-2">

            <label>Tanggal Pesan</label>
            <input type="date" id="edit_tanggal" name="tanggal" class="form-control mb-2">

            <label>Jumlah Hari</label>
            <input type="number" id="edit_hari" name="hari" class="form-control mb-2">

            <label class="fw-bold mt-2">Pilih Layanan:</label>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="edit_layanan1" value="Penginapan">
                <label class="form-check-label">Penginapan (Rp 1.000.000)</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="edit_layanan2" value="Transportasi">
                <label class="form-check-label">Transportasi (Rp 1.200.000)</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="edit_layanan3" value="Makan">
                <label class="form-check-label">Makan (Rp 500.000)</label>
            </div>

            <input type="hidden" id="edit_layananText" name="layanan">

            <label class="fw-bold mt-3">Detail Paket</label>
            <select id="edit_paket" name="paket" class="form-select mb-2"></select>

            <label>Jumlah Peserta</label>
            <input type="number" id="edit_peserta" name="peserta" class="form-control mb-2">

            <label>Harga Paket</label>
            <input type="text" id="edit_harga" name="harga" class="form-control mb-2" readonly>

            <label>Total Tagihan</label>
            <input type="text" id="edit_tagihan" name="tagihan" class="form-control mb-2" readonly>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>

      </form>

    </div>
  </div>
</div>

<script>
const paketWisata = {
    1: [
        { nama: "Glamping Standard", harga: 800000 },
        { nama: "Glamping Fun", harga: 1000000 }
    ],
    2: [
        { nama: "Camping Individu", harga: 250000 },
        { nama: "Camping Rombongan", harga: 360000 }
    ],
    3: [
        { nama: "Fun Outbound", harga: 320000 }
    ],
    4: [
        { nama: "Trekking Curug", harga: 250000 }
    ]
};

function loadEditPaket(selected) {
    let select = document.getElementById("edit_paket");
    select.innerHTML = "";

    Object.values(paketWisata).forEach(grp => {
        grp.forEach(p => {
            let opt = document.createElement("option");
            opt.value = p.nama;
            opt.textContent = `${p.nama} - Rp ${p.harga.toLocaleString("id-ID")}`;
            opt.dataset.harga = p.harga;

            if (p.nama === selected) opt.selected = true;

            select.appendChild(opt);
        });
    });
}

function ambilEditLayanan() {
    let layanan = [];
    if (edit_layanan1.checked) layanan.push("Penginapan");
    if (edit_layanan2.checked) layanan.push("Transportasi");
    if (edit_layanan3.checked) layanan.push("Makan");
    return layanan;
}

function hitungEdit() {
    let hargaPaket = parseInt(edit_paket.selectedOptions[0].dataset.harga);
    let layanan = ambilEditLayanan();

    let biayaLayanan = 0;
    if (layanan.includes("Penginapan")) biayaLayanan += 1000000;
    if (layanan.includes("Transportasi")) biayaLayanan += 1200000;
    if (layanan.includes("Makan")) biayaLayanan += 500000;

    let peserta = parseInt(edit_peserta.value || 0);
    let hari = parseInt(edit_hari.value || 0);

    let totalHarga = hargaPaket + biayaLayanan;
    let totalTagihan = peserta * hari * totalHarga;

    edit_layananText.value = layanan.join(", ");
    edit_harga.value = totalHarga.toLocaleString("id-ID");
    edit_tagihan.value = totalTagihan.toLocaleString("id-ID");
}

function editData(id, nama, hp, tanggal, hari, layanan, paket, peserta, harga, tagihan) {

    edit_id.value = id;
    edit_nama.value = nama;
    edit_hp.value = hp;
    edit_tanggal.value = tanggal;
    edit_hari.value = hari;
    edit_peserta.value = peserta;

    loadEditPaket(paket);

    edit_layanan1.checked = layanan.includes("Penginapan");
    edit_layanan2.checked = layanan.includes("Transportasi");
    edit_layanan3.checked = layanan.includes("Makan");

    edit_layananText.value = layanan;

    edit_harga.value = harga.toLocaleString("id-ID");
    edit_tagihan.value = tagihan.toLocaleString("id-ID");

    edit_layanan1.onchange = hitungEdit;
    edit_layanan2.onchange = hitungEdit;
    edit_layanan3.onchange = hitungEdit;
    edit_paket.onchange = hitungEdit;
    edit_peserta.onkeyup = hitungEdit;
    edit_hari.onkeyup = hitungEdit;
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
