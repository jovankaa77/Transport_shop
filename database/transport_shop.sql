-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 01:49 PM
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
-- Database: `transport_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `id_users`, `id_product`) VALUES
(9, 4, 5),
(10, 4, 6),
(11, 3, 9),
(12, 3, 7),
(13, 3, 5),
(14, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(120) NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori` varchar(120) NOT NULL,
  `gambar` varchar(120) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `nama_produk`, `harga`, `kategori`, `gambar`, `tanggal`) VALUES
(5, 'Aqila', 1500, 'mobil', 'uploads/4.dp-10k.jpg', '2024-05-04'),
(6, 'Toyota', 150000, 'motor', 'uploads/2-10k-dp-tele-01mei.jpg', '2024-05-09'),
(7, 'Aqila', 1500000, 'motor', 'uploads/4.dp-10k.jpg', '2024-05-04'),
(8, 'Aqilaa', 11, 'mobil', 'uploads/6.70k-lunas-wa.jpg', '2024-05-02'),
(9, '11', 150000, 'motor', 'uploads/6.70k-lunas-wa.jpg', '2024-05-18'),
(10, 'Avanza', 150000, 'mobil', 'uploads/4.dp-10k.jpg', '2024-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `nama_lengkap` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama_lengkap`, `email`, `password`, `level`) VALUES
(2, 'admin123', 'Admin gans', 'Admin77@gmail.com', '$2y$10$pPiuuNOr34eOmIypQgS0W.GMOfYGU4erCOzNyO1FQLq2cZNt5WnUu', 1),
(3, 'Jopan', 'jopan gans', 'jovanka.alexandro77@gmail.com', '$2y$10$UHfPEwLeRde5K68tnFpM4eEbor5witG3H6ESihu.BP2o5MBoDD5Je', 2),
(4, 'vanvan', 'vannnn', 'vanvan77@gmail.com', '$2y$10$zBVF3AVaaWFi1luTW/DJFuQ2qcoSip1d2JXIyb.BK9t6BaE02GR0a', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `pembelian_ibfk_1` (`id_users`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
