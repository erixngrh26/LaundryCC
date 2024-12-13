-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 05:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(30) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id`, `nama_barang`, `harga`) VALUES
(1, 'Kaos/T-Shirt', 'Rp.10000'),
(2, 'Kemeja', 'Rp.20000'),
(3, 'Kemeja Batik', 'Rp.20000'),
(4, 'Baju Muslim', 'Rp.20000'),
(5, 'Kebaya', 'Rp.40000'),
(6, 'Gaun Panjang', 'Rp.25000'),
(7, 'Rok', 'Rp.15000'),
(8, 'Baju Hangat/Sweater', 'Rp.20000'),
(9, 'Jaket', 'Rp.30000'),
(10, 'Jas/Blazer', 'Rp.45000'),
(11, 'Celana Pendek', 'Rp.10000'),
(12, 'Celana Panjang', 'Rp.20000'),
(13, 'Sarung', 'Rp.20000'),
(14, 'Tas Sekolah/Ransel', 'Rp.30000'),
(15, 'Selendang/Kerudung', 'Rp.10000'),
(16, 'Blouse', 'Rp.15000'),
(17, 'Mukena', 'Rp.25000'),
(18, 'Sajadah', 'Rp.20000'),
(19, 'Topi', 'Rp.10000'),
(20, 'Handuk Mandi', 'Rp.25000'),
(21, 'Bantal', 'Rp.20000'),
(22, 'Sarung Bantal/Guling', 'Rp.5000'),
(23, 'Sprei Single', 'Rp.15000'),
(24, 'Selimut', 'Rp.25000'),
(25, 'Bed Cover', 'Rp.60000'),
(26, 'Keset', 'Rp.20000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
