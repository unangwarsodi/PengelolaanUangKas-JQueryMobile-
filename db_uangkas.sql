-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 20 Feb 2018 pada 03.40
-- Versi Server: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uangkas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_organisasi`
--

CREATE TABLE `tbl_organisasi` (
  `id_organisasi` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_organisasi`
--

INSERT INTO `tbl_organisasi` (`id_organisasi`, `nama`, `alamat`, `no_telepon`, `username`, `password`) VALUES
(2, 'Koprasi', 'Kadipaten', '082216820980', 'unang', 'unang'),
(5, '', '', '', '', ''),
(6, 'XII RPL B', 'SMK Negeri 1 Majalengka', '082216820980', 'rplb', 'rplb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_uangkaskeluar`
--

CREATE TABLE `tbl_uangkaskeluar` (
  `id_kas_keluar` int(11) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `id_organisasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_uangkaskeluar`
--

INSERT INTO `tbl_uangkaskeluar` (`id_kas_keluar`, `tanggal`, `jumlah`, `keterangan`, `id_organisasi`) VALUES
(21, '18 Februari 201', 6000, 'Beli 1 Sepidol', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_uangkasmasuk`
--

CREATE TABLE `tbl_uangkasmasuk` (
  `id_kas_masuk` int(11) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_uangkasmasuk`
--

INSERT INTO `tbl_uangkasmasuk` (`id_kas_masuk`, `tanggal`, `jumlah`, `keterangan`, `id_organisasi`, `total`) VALUES
(17, '30 Januari 2018', 69000, 'Kas Mingguan', 8, 0),
(48, '09 Februari 2018', 20000, 'Iuran', 9, 20000),
(49, '09 Februari 2018', 20000, 'Iuran', 11, 15000),
(90, '18 Februari 2018', 90000, 'Iuran', 2, 85000),
(92, '18 Februari 2018', 66000, 'Kas Mingguan', 6, 60000),
(93, '20 Februari 2018', 599, 'kk', 2, 85599);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  ADD PRIMARY KEY (`id_organisasi`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_uangkaskeluar`
--
ALTER TABLE `tbl_uangkaskeluar`
  ADD PRIMARY KEY (`id_kas_keluar`);

--
-- Indexes for table `tbl_uangkasmasuk`
--
ALTER TABLE `tbl_uangkasmasuk`
  ADD PRIMARY KEY (`id_kas_masuk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  MODIFY `id_organisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_uangkaskeluar`
--
ALTER TABLE `tbl_uangkaskeluar`
  MODIFY `id_kas_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_uangkasmasuk`
--
ALTER TABLE `tbl_uangkasmasuk`
  MODIFY `id_kas_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
