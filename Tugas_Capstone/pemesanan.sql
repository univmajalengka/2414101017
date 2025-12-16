CREATE DATABASE IF NOT EXISTS db_wisata;
USE db_wisata;

CREATE TABLE pemesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    hp VARCHAR(20) NOT NULL,
    tanggal DATE NOT NULL,
    hari INT NOT NULL,
    paket VARCHAR(255) NOT NULL,
    peserta INT NOT NULL,
    harga INT NOT NULL,
    tagihan INT NOT NULL
);