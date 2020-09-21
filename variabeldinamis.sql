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
-- Struktur dari tabel `variabeldinamis`
--

CREATE TABLE `variabeldinamis` (
  `id_var` int(11) NOT NULL,
  `usd_to_rp` float NOT NULL,
  `hba` float NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `variabeldinamis`
--

INSERT INTO `variabeldinamis` (`id_var`, `usd_to_rp`, `hba`, `tanggal`) VALUES
(1, 14, 140, '2020-09-05'),
(2, 14754, 140.1, '2020-09-05'),
(3, 15000.8, 70.5, '2020-09-05'),
(4, 10000.3, 88.34, '2020-09-19'),
(5, 14806, 77.8, '2020-09-09');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `variabeldinamis`
--
ALTER TABLE `variabeldinamis`
  ADD PRIMARY KEY (`id_var`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `variabeldinamis`
--
ALTER TABLE `variabeldinamis`
  MODIFY `id_var` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
