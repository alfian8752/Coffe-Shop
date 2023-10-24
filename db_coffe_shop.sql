-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 01:44 AM
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
-- Database: `db_coffe_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `produk` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `judul` varchar(100) NOT NULL,
  `harga` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `gambar`, `judul`, `harga`) VALUES
(9, '1.jpg', 'Produk 1', 1),
(10, '2.jpg', 'Produk 2', 2),
(11, '3.jpg', 'Produk 3', 3),
(12, '4.jpg', 'Produk 4', 4),
(13, '5.jpg', 'Produk 5', 5),
(14, '6.jpg', 'Produk 6', 6),
(15, '7.jpg', 'Produk 7', 7),
(16, '8.jpg', 'Produk 8', 8),
(17, '1.jpg', 'Produk 1', 1),
(18, '2.jpg', 'Produk 2', 2),
(19, '3.jpg', 'Produk 3', 3),
(20, '4.jpg', 'Produk 4', 4),
(21, '5.jpg', 'Produk 5', 5),
(22, '6.jpg', 'Produk 6', 6),
(23, '7.jpg', 'Produk 7', 7),
(24, '8.jpg', 'Produk 8', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
