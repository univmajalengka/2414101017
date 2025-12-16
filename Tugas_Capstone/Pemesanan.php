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

<section class="collage-container">
    <div class="collage-grid">
        <div class="collage-item"><img alt="IMG1" src="assets/img/IMG1.png"/></div>
        <div><img alt="IMG2" src="assets/img/IMG2.png"/></div>
        <div><img alt="IMG3" src="assets/img/IMG3.png"/></div>
        <div><img alt="IMG4" src="assets/img/IMG4.png"/></div>
        <div><img alt="IMG5" src="assets/img/IMG5.png"/></div>

        <div class="banner-overlay">
            <div class="banner-card">
                <h2 class="text-dewi">Selamat Datang</h2>
                <h3 class="text-sub">Taman Wisata Alam Gunung Pancar</h3>
            </div>
        </div>
    </div>
</section>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top shadow">
    <div class="container">
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="index.php"><span class="material-icons-round">home</span> Beranda</a>
                <a class="nav-link" href="Pemesanan.php"><span class="material-icons-round">tour</span> Pesan Tiket</a>
                <a class="nav-link" href="modifikasi_pesanan.php"><span class="material-icons-round">edit_calendar</span> Modifikasi Pesanan</a>
            </div>
        </div>
    </div>
</nav>

<main class="container py-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="fw-bold mb-4">Form Pemesanan Paket Wisata</h3>

            <!-- FORM DI-PERBAIKI -->
            <form action="proses_pemesanan.php" method="POST" id="formPemesanan">

                <div class="mb-3">
                    <label class="form-label">Nama Pemesan:</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor HP/Telp:</label>
                    <input type="text" class="form-control" id="hp" name="hp" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Pesan:</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Waktu Pelaksanaan (Hari):</label>
                    <input type="number" class="form-control" id="waktu" name="waktu" min="1" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Pilih Detail Paket:</label>
                    <select id="detailPaket" class="form-select" name="detailPaket" required>
                        <option value="">-- Pilih Detail Paket --</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Pilih Layanan:</label>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="layanan1" value="1000000">
                        <label class="form-check-label" for="layanan1">Penginapan (Rp 1.000.000)</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="layanan2" value="1200000">
                        <label class="form-check-label" for="layanan2">Transportasi (Rp 1.200.000)</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="layanan3" value="500000">
                        <label class="form-check-label" for="layanan3">Makan (Rp 500.000)</label>
                    </div>
                </div>

                <input type="hidden" id="layananText" name="layanan">

                <div class="mb-3">
                    <label class="form-label">Jumlah Peserta:</label>
                    <input type="number" class="form-control" id="peserta" name="peserta" min="1" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga Paket:</label>
                    <input type="text" class="form-control" id="harga" readonly>
                </div>

                <input type="hidden" id="hargaRaw" name="harga">

                <div class="mb-3">
                    <label class="form-label">Jumlah Tagihan:</label>
                    <input type="text" class="form-control" id="tagihan" readonly>
                </div>

                <input type="hidden" id="tagihanRaw" name="tagihan">

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>

            </form>
        </div>
    </div>
</main>

<script>

document.getElementById("formPemesanan").addEventListener("submit", function(e) {
    hitung();
});


const paketWisata = {
    1: [
        { nama: "Glamping Standard", harga: 800000 },
        { nama: "Glamping Fun", harga: 1000000 }
    ],
    2: [
        { nama: "Camping Individu", harga: 250000 },
        { nama: "Camping Rombongan", harga: 360000 }
    ],
    3: [{ nama: "Fun Outbound", harga: 320000 }],
    4: [{ nama: "Trekking Curug", harga: 250000 }]
};

const urlParams = new URLSearchParams(window.location.search);
let paketDipilih = urlParams.get("paket") ? parseInt(urlParams.get("paket")) : 1;

function loadDetailPaket() {
    let select = document.getElementById("detailPaket");
    select.innerHTML = "<option value=''>-- Pilih Detail Paket --</option>";

    paketWisata[paketDipilih].forEach(p => {
        select.innerHTML += `
            <option value="${p.nama}" data-harga="${p.harga}">
                ${p.nama} - Rp ${p.harga.toLocaleString("id-ID")}
            </option>`;
    });
}

loadDetailPaket();

function ambilLayanan() {
    let layanan = [];
    if (document.getElementById("layanan1").checked) layanan.push("Penginapan");
    if (document.getElementById("layanan2").checked) layanan.push("Transportasi");
    if (document.getElementById("layanan3").checked) layanan.push("Makan");
    document.getElementById("layananText").value = layanan.join(", ");
}

function hitungTotalHarga() {
    let select = document.getElementById("detailPaket");
    let hargaPaket = parseInt(select.selectedOptions[0]?.dataset?.harga || 0);

    let totalLayanan =
        (document.getElementById("layanan1").checked ? 1000000 : 0) +
        (document.getElementById("layanan2").checked ? 1200000 : 0) +
        (document.getElementById("layanan3").checked ? 500000 : 0);

    let total = hargaPaket + totalLayanan;

    document.getElementById("harga").value = total.toLocaleString("id-ID");
    document.getElementById("hargaRaw").value = total;

    return total;
}

function hitung() {
    ambilLayanan();

    let hargaTotal = hitungTotalHarga();
    let peserta = parseInt(document.getElementById("peserta").value || 0);
    let waktu = parseInt(document.getElementById("waktu").value || 0);

    let totalTagihan = hargaTotal * peserta * waktu;

    document.getElementById("tagihan").value = totalTagihan.toLocaleString("id-ID");
    document.getElementById("tagihanRaw").value = totalTagihan;
}

document.querySelectorAll(".form-check-input").forEach(cb => {
    cb.addEventListener("change", hitung);
});

document.getElementById("detailPaket").addEventListener("change", hitung);
document.getElementById("peserta").addEventListener("keyup", hitung);
document.getElementById("waktu").addEventListener("keyup", hitung);
</script>

</body>
</html>
