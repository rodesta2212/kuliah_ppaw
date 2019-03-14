-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 01, 2018 at 03:17 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batiklvl5`
--

-- --------------------------------------------------------

--
-- Table structure for table `djual`
--

CREATE TABLE `djual` (
  `idd_jual` int(11) NOT NULL,
  `idh_jual` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `djual`
--

INSERT INTO `djual` (`idd_jual`, `idh_jual`, `id_produk`, `qty`, `harga`) VALUES
(1, 5, 3, 1, 25000),
(2, 5, 2, 1, 15000),
(3, 6, 1, 0, 20000),
(4, 7, 1, 0, 20000),
(5, 8, 1, 0, 20000),
(6, 9, 1, 0, 20000),
(7, 10, 1, 0, 20000),
(8, 11, 1, 0, 20000),
(9, 12, 1, 1, 20000),
(10, 13, 1, 1, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `hjual`
--

CREATE TABLE `hjual` (
  `idh_jual` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `namacust` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `notelp` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hjual`
--

INSERT INTO `hjual` (`idh_jual`, `tanggal`, `namacust`, `email`, `notelp`) VALUES
(1, '2018-07-01', 'chessa', 'chessax@xmail.com', '080808080801'),
(2, '2018-07-01', 'chessa', 'chessax@xmail.com', '080808080801'),
(3, '2018-07-01', 'chessa', 'chessax@xmail.com', '080808080801'),
(4, '2018-07-01', 'chessa', 'chessax@xmail.com', '080808080801'),
(5, '2018-07-01', 'chessa', 'chessax@xmail.com', '080808080801'),
(6, '2018-07-01', 'chessa', 'chessax@xmail.com', '080808080801'),
(7, '2018-07-01', 'chessa', 'chessax@xmail.com', '080808080801'),
(8, '2018-07-01', 'chessa', 'chessax@xmail.com', '080808080801'),
(9, '2018-07-01', 'chessa', 'chessax@xmail.com', '080808080801'),
(10, '2018-07-01', 'chessa', 'chessatirta@gmail.com', '080808080801'),
(11, '2018-07-01', 'chessa', 'chessatirta@gmail.com', '080808080801'),
(12, '2018-07-01', 'chessa', 'chessax@xmail.com', '080808080801'),
(13, '2018-07-01', 'chessa', 'chessax@xmail.com', '080808080801');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `sex` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `pekerjaan` varchar(70) NOT NULL DEFAULT '',
  `kota` varchar(70) NOT NULL DEFAULT '',
  `notelp` varchar(70) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `sex`, `alamat`, `pekerjaan`, `kota`, `notelp`) VALUES
(1, 'budi', 'pria', 'sleman', 'Pengusaha', 'Yogyakarta', '080808080801');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `user` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `user`, `password`, `nama_lengkap`, `akses`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 'toko'),
(2, 'cust', '3aad3506aa11f05f265ea8304b8152b3', 'pelanggan', 'beli');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `harga` int(11) NOT NULL DEFAULT '0',
  `stok` int(11) NOT NULL DEFAULT '0',
  `foto` varchar(70) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `deskripsi`, `harga`, `stok`, `foto`) VALUES
(1, 'batik 1', 'ini adalah batik pertama', 20000, 18, 'batik1.jpg'),
(2, 'batik 2', 'ini adalah batik 2 ', 15000, 14, 'batik2.jpg'),
(3, 'batik 3 ', 'ini adalah batik 3', 25000, 9, 'batik3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `djual`
--
ALTER TABLE `djual`
  ADD PRIMARY KEY (`idd_jual`);

--
-- Indexes for table `hjual`
--
ALTER TABLE `hjual`
  ADD PRIMARY KEY (`idh_jual`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `nama` (`nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `djual`
--
ALTER TABLE `djual`
  MODIFY `idd_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hjual`
--
ALTER TABLE `hjual`
  MODIFY `idh_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
