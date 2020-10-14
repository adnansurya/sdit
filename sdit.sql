-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 15 Okt 2020 pada 03.54
-- Versi Server: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `kode_perusahaan` text NOT NULL,
  `kode_badan` text NOT NULL,
  `nama_perusahaan` text NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` text NOT NULL,
  `negara` text NOT NULL,
  `no_telp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `no_pr` text NOT NULL,
  `tanggal_pr` text NOT NULL,
  `no_po` text NOT NULL,
  `tanggal_po` text NOT NULL,
  `owner_estimate_rp` float NOT NULL,
  `owner_estimate_usd` float NOT NULL,
  `tanggal_owner_estimate` text NOT NULL,
  `no_dur` text NOT NULL,
  `tanggal_dur` text NOT NULL,
  `metode_dur` text NOT NULL,
  `file_dur` text NOT NULL,
  `harga_tawar_usd` float NOT NULL,
  `harga_tawar_rp` float NOT NULL,
  `harga_po_rp` float NOT NULL,
  `harga_po_usd` float NOT NULL,
  `file_po` text NOT NULL,
  `total_harga_rp` float NOT NULL,
  `total_harga_usd` float NOT NULL,
  `tanggal_approve_po` text NOT NULL,
  `qty` float NOT NULL,
  `satuan` text NOT NULL,
  `status` text NOT NULL,
  `keterangan` text NOT NULL,
  `filter_day` int(11) NOT NULL,
  `filter_month` int(11) NOT NULL,
  `filter_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `variabel`
--

CREATE TABLE `variabel` (
  `id_var` int(11) NOT NULL,
  `usd_to_rp` float NOT NULL,
  `hba` float NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `variabel`
--
ALTER TABLE `variabel`
  ADD PRIMARY KEY (`id_var`),
  ADD UNIQUE KEY `tanggal` (`tanggal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `variabel`
--
ALTER TABLE `variabel`
  MODIFY `id_var` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
