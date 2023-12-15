-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 03:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webkopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_history`
--

CREATE TABLE `detail_history` (
  `id` int(50) NOT NULL,
  `id_history` int(50) NOT NULL,
  `id_menu` varchar(50) NOT NULL,
  `jumlah` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `detail_history`
--

INSERT INTO `detail_history` (`id`, `id_history`, `id_menu`, `jumlah`) VALUES
(132, 97, '28', 1),
(133, 97, '26', 1),
(134, 97, '29', 277),
(135, 98, '26', 1),
(136, 98, '28', 1),
(137, 99, '26', 1),
(138, 99, '28', 1),
(139, 100, '28', 1),
(140, 100, '26', 1),
(141, 100, '29', 277);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(50) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL DEFAULT '',
  `id_user` int(11) NOT NULL DEFAULT 0,
  `tanggal_pemesanan` date NOT NULL,
  `total_belanja` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `nama_pemesan`, `id_user`, `tanggal_pemesanan`, `total_belanja`) VALUES
(97, 'user', 8, '2023-12-15', 841000),
(98, 'user', 8, '2023-12-15', 23000),
(99, 'user', 8, '2023-12-15', 23000),
(100, 'user', 8, '2023-12-15', 841000);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(50) NOT NULL,
  `id_menu` varchar(50) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `komen` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `nama`, `komen`) VALUES
(18, 'slfk', 'kaj');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(50) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL DEFAULT '',
  `id_user` int(11) NOT NULL DEFAULT 0,
  `tanggal_pemesanan` date NOT NULL,
  `total_belanja` int(50) NOT NULL,
  `status` enum('sudah dibayar','belum dibayar') NOT NULL DEFAULT 'belum dibayar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `nama_pemesan`, `id_user`, `tanggal_pemesanan`, `total_belanja`, `status`) VALUES
(90, 'user', 8, '2023-12-15', 841000, 'sudah dibayar'),
(91, 'user', 8, '2023-12-15', 23000, 'sudah dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_produk`
--

CREATE TABLE `pemesanan_produk` (
  `id_pemesanan_produk` int(50) NOT NULL,
  `id_pemesanan` int(50) NOT NULL,
  `id_menu` varchar(50) NOT NULL,
  `jumlah` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan_produk`
--

INSERT INTO `pemesanan_produk` (`id_pemesanan_produk`, `id_pemesanan`, `id_menu`, `jumlah`) VALUES
(112, 82, '24', 1),
(113, 83, '28', 1),
(114, 83, '26', 1),
(115, 83, '24', 1),
(116, 84, '29', 1),
(117, 84, '24', 1),
(123, 88, '24', 1),
(124, 89, '24', 1),
(125, 90, '28', 1),
(126, 90, '26', 1),
(127, 90, '29', 277),
(128, 91, '26', 1),
(129, 91, '28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_menu` int(50) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `deskripsi` text NOT NULL DEFAULT '---',
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_menu`, `nama_menu`, `harga`, `deskripsi`, `gambar`) VALUES
(24, 'Pisan Ijo', 12000, '', '3.jpg'),
(26, 'Choco Strawberry', 10000, '', '2.jpg'),
(28, 'Orange Zuzuzu', 13000, '', '7.jpg'),
(29, 'Creamy Strawberry', 3000, '', '8.jpg'),
(30, 'Kopi Cincau', 10000, '', 'eskopi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `hp` varchar(25) NOT NULL,
  `status` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `hp`, `status`) VALUES
(7, 'Ardian Firmansyah', 'ardian', 'Ardian Firmansyah', 'Laki-Laki', '2023-10-28', 'blado', '08212122', 'admin'),
(8, 'user', 'user123', 'user', 'Laki-Laki', '2023-10-28', 'kromengan', '0824764', 'user'),
(9, '', '', '', '', '0000-00-00', '', '', ''),
(10, '', '', '', '', '0000-00-00', '', '', ''),
(11, '', '', '', '', '0000-00-00', '', '', ''),
(12, '', '', '', '', '0000-00-00', '', '', ''),
(13, 'ardi', 'ardian123', 'ardian123', 'Laki-Laki', '2023-11-03', 'blado', '08212122', 'user'),
(14, 'ardi', 'ardian123', 'user', 'Laki-Laki', '2023-11-03', 'blado', '08212122', 'user'),
(15, 'Ardian F', 'ardian', 'Ardian Firmansyah', 'Laki-Laki', '2007-01-26', 'kedungpendaringan', '08123456789', 'user'),
(16, 'ardiifh', 'ardi', 'ardian123', 'Laki-Laki', '2008-01-07', 'kedungpendaringan', '08212122', 'user'),
(17, 'agha', '123', 'agha putra rahma', '', '0000-00-00', '', '', ''),
(18, 'agha', '1234', 'ag', 'Laki-Laki', '2023-12-29', 'sad', '132', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_history`
--
ALTER TABLE `detail_history`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  ADD PRIMARY KEY (`id_pemesanan_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_menu`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_history`
--
ALTER TABLE `detail_history`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  MODIFY `id_pemesanan_produk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_menu` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
