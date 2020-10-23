-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 22 Okt 2020 pada 19.32
-- Versi Server: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

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
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi`) VALUES
(2, 'namakato', 'deskato'),
(3, 'namanamaan', 'ds');

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

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `kode_perusahaan`, `kode_badan`, `nama_perusahaan`, `alamat`, `provinsi`, `negara`, `no_telp`) VALUES
(1, 'kodeusaha', 'Pte Ltd', 'perusahaankoe', 'alamatkoe', 'provkoe', 'negarakoe', '09834329847');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
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
  `tanggal_tawar` text NOT NULL,
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

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_kategori`, `id_perusahaan`, `nama_barang`, `no_pr`, `tanggal_pr`, `no_po`, `tanggal_po`, `owner_estimate_rp`, `owner_estimate_usd`, `tanggal_owner_estimate`, `no_dur`, `tanggal_dur`, `metode_dur`, `file_dur`, `tanggal_tawar`, `harga_tawar_usd`, `harga_tawar_rp`, `harga_po_rp`, `harga_po_usd`, `file_po`, `total_harga_rp`, `total_harga_usd`, `tanggal_approve_po`, `qty`, `satuan`, `status`, `keterangan`, `filter_day`, `filter_month`, `filter_year`) VALUES
(1, 0, 1, 'barangnya', '903748462', '2020-10-14', '43536', '2020-10-14', 10000, 1, '2020-10-12', '233245', '', 'Pelelangan Terbuka', 'DUR-233245.pdf', '', 2, 28000, 70000, 5, '', 210000, 15, '2020-10-15', 3, 'kg', 'ano', 'notto', 14, 10, 2020),
(2, 0, 1, 'barangkoe', '243262645', '2020-10-12', '42342', '2020-10-14', 40000, 4, '2020-10-12', '35436363', '', 'Pengadaan Langsung', 'DUR-35436363.pptx', '2020-10-14', 3, 42000, 70000, 5, '', 210000, 15, '2020-10-14', 3, 'ton', 'mantap', 'jiwa', 14, 10, 2020),
(3, 0, 1, 'namabarang', '456456', '2020-10-14', '24235', '2020-10-14', 40000, 4, '2020-10-12', '353636', '2020-10-13', 'Pelelangan Terbatas', 'DUR-353636.xlsx', '2020-10-13', 4, 56000, 70000, 5, '', 420000, 30, '2020-10-16', 6, 'ton', 'status', 'catatan', 14, 10, 2020);

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
-- Dumping data untuk tabel `variabel`
--

INSERT INTO `variabel` (`id_var`, `usd_to_rp`, `hba`, `tanggal`) VALUES
(1, 10000, 1.1, '2020-10-12'),
(2, 11000, 2.3, '2020-10-13'),
(3, 14000, 2.2, '2020-10-14'),
(4, 20000, 4.2, '2020-10-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

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
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `variabel`
--
ALTER TABLE `variabel`
  MODIFY `id_var` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
