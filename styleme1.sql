-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 06:05 AM
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
-- Database: `styleme1`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_product`
--

CREATE TABLE `data_product` (
  `id` int(11) NOT NULL,
  `produk` varchar(50) DEFAULT NULL,
  `stok` varchar(10) DEFAULT NULL,
  `harga` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_product`
--

INSERT INTO `data_product` (`id`, `produk`, `stok`, `harga`, `deskripsi`, `foto`) VALUES
(47, 'Dress mini', '6', '500.000,00', 'dress motif jeruk', '941-dress bunga.jpeg'),
(53, 'flat shoes', '10', '100.000,00', 'Babies Ballerinas in Patent Leather Off White Woman', '100-Babies Ballerinas in Patent Leather Off White Woman RVW50234660J9U420YHC.jpeg'),
(54, 'cropped blouse', '9', '75.000,00', '', '23-download (3).jpeg'),
(55, 'set atasan baju dan rok', '8', '200.000,00', 'set atasan crop dan rok berwarna toska', '478-set atasan dan rok.jpeg'),
(56, 'flat shoes odette', '10', '150.000,00', '', '640-Odette Pale Pink Ballet Flats _ ALOHAS.jpeg'),
(57, 'celana', '20', '230.000,00', 'celana kulot', '252-THE FRANKIE SHOP Maesa pleated woven wide-leg cargo pants.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(5) NOT NULL,
  `pelanggan` varchar(50) NOT NULL,
  `produk` varchar(200) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `total` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Baru','Siap Dikirim','Selesai') NOT NULL DEFAULT 'Baru',
  `stok_update` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `pelanggan`, `produk`, `jumlah`, `total`, `tanggal`, `status`, `stok_update`) VALUES
(1, 'Yaneth', 'Dress Knit', 2, '100.000,00', '2022-04-05', 'Siap Dikirim', 0),
(2, 'Cecilia', 'Sepatu odette', 5, '250.000,00', '2024-04-06', 'Baru', 0),
(3, 'Anastasya', 'celana kulot', 1, '200.000,00', '2024-03-09', 'Selesai', 0),
(5, 'Rani', 'Dress mini', 1, '500.000,00', '2024-04-20', 'Siap Dikirim', 0),
(6, 'Jelita', 'cropped blouse', 2, '150.000,00', '2024-04-13', 'Selesai', 0),
(7, 'Rani', 'flat shoes', 1, '100.000,00', '2024-04-17', 'Siap Dikirim', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `nomor` int(5) NOT NULL,
  `pelanggan` varchar(50) NOT NULL,
  `produk` varchar(50) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `total` varchar(50) NOT NULL,
  `rating` int(1) NOT NULL,
  `tanggal` date NOT NULL,
  `komentar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`nomor`, `pelanggan`, `produk`, `jumlah`, `total`, `rating`, `tanggal`, `komentar`) VALUES
(1, 'Yulianti', 'Dress knit', 2, '200.000,00', 1, '2024-04-01', 'pesanan tidak sesuai, bajunya robek di bagian tangan'),
(2, 'Cahaya', 'Flat shoes Odette', 1, '100.000,00', 4, '2024-04-01', 'Produk real pic, pengemasan rapi'),
(3, 'Yuneth', 'Rok panjang', 5, '300.000,00', 5, '2024-04-03', 'pesanan sangat sesuai eskpektasi'),
(4, 'Desi', 'cropped blouse', 1, '350.000,00', 1, '2024-03-15', 'bahanya tipis'),
(5, 'Lala', 'Dress mini', 2, '600.000,00', 5, '2024-04-06', 'dress nya lucu'),
(6, 'Shaly', 'Babies Ballerinas shoes', 1, '125.000,00', 5, '2024-04-01', 'lucuuu');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `pesanan_baru` int(3) NOT NULL,
  `pesanan_siapkirim` int(3) NOT NULL,
  `pesanan_selesai` int(3) NOT NULL,
  `ulasan_baru` int(3) NOT NULL,
  `produk_terjual` int(3) NOT NULL,
  `jumlah_pelanggan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `no_hp`, `pesanan_baru`, `pesanan_siapkirim`, `pesanan_selesai`, `ulasan_baru`, `produk_terjual`, `jumlah_pelanggan`) VALUES
(1, 'adminQ', '8cb2237d0679ca88db6464eac60da96345513964', '08123456789', 0, 3, 4, 6, 10, 13),
(2, 'adel', '8aefb06c426e07a0a671a1e2488b4858d694a730', '0812650000', 0, 3, 4, 6, 10, 13),
(3, 'Cangcimen', '222', '081278950090', 1, 2, 3, 6, 9, 12),
(4, 'elaine', 'afc97ea131fd7e2695a98ef34013608f97f34e1d', '08999999999', 0, 0, 0, 0, 0, 0),
(5, 'lala', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '081717171717', 0, 3, 4, 6, 10, 13),
(6, 'Adel123', '8aefb06c426e07a0a671a1e2488b4858d694a730', '0812650008', 1, 3, 2, 6, 8, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_product`
--
ALTER TABLE `data_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_product`
--
ALTER TABLE `data_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
