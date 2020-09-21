-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Sep 2020 pada 17.23
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekap`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_perusahaan` text NOT NULL,
  `kode_badan` text NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` text NOT NULL,
  `negara` text NOT NULL,
  `no_telp` text NOT NULL,
  `nama_barang` text NOT NULL,
  `no_pr` text NOT NULL,
  `tanggal_pr` text NOT NULL,
  `no_po` varchar(100) NOT NULL,
  `tanggal_po` text NOT NULL,
  `owner_estimate_rp` float NOT NULL,
  `owner_estimate_usd` float NOT NULL,
  `tanggal_owner_estimate` varchar(100) NOT NULL,
  `harga_po_rp` float NOT NULL,
  `harga_po_usd` float NOT NULL,
  `total_harga_rp` float NOT NULL,
  `total_harga_usd` float NOT NULL,
  `kuantum` float NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_perusahaan`, `kode_badan`, `nama_perusahaan`, `alamat`, `provinsi`, `negara`, `no_telp`, `nama_barang`, `no_pr`, `tanggal_pr`, `no_po`, `tanggal_po`, `owner_estimate_rp`, `owner_estimate_usd`, `tanggal_owner_estimate`, `harga_po_rp`, `harga_po_usd`, `total_harga_rp`, `total_harga_usd`, `kuantum`, `satuan`, `status`) VALUES
(2, 'BUKK', 'CV (Commditaire Vennotschap)', 'Maju Bersama', 'Jalan Cahaya Gading No. 27', 'Kalimantan Barat', 'Indonesia', '08144775566', 'Pulpen Snowman', '1077', '2020-09-04', '7824', '2020-09-08', 100000, 6.76256, '2020-09-04', 59149.2, 4, 1500000, 101.438, 6788.45, 'liter', 'Baik, dan masih hangat dari oven'),
(4, 'IATG', 'CV', 'CV Bukaka Teknik Utama ', 'Jalan Cahaya Gading No. 27', 'Banten', 'Indonesia', '08884745500', 'Laptop Acer Gen 7', '1411', '2020-09-09', '7755', '2020-09-09', 7403000, 500, '2020-09-09', 1000000, 67.5402, 5000500, 337.735, 101, 'Ton', 'Masih Baru dan Baik');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
