-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2021 at 12:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brjrcoffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_product` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `qty_order` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_sutoning`
--

CREATE TABLE `detail_sutoning` (
  `id_sutoning` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `qty_asalan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_sutoning`
--

CREATE TABLE `hasil_sutoning` (
  `id_hasil` int(11) NOT NULL,
  `id_sutoning` int(11) NOT NULL,
  `qty_dpsuton` int(11) NOT NULL,
  `qty_corong` int(11) NOT NULL,
  `qty_pixel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori` int(11) NOT NULL,
  `kategori_produk` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `kategori_produk`) VALUES
(1, 'Green Bean'),
(2, 'Bubuk'),
(3, 'Roast Bean');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `invoice` varchar(128) NOT NULL,
  `total` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `nama_pelanggan` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `contact` varchar(128) NOT NULL,
  `status` enum('waiting','paid','cancel') NOT NULL,
  `bukti_transfer` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `email`, `date`, `invoice`, `total`, `ongkir`, `nama_pelanggan`, `alamat`, `contact`, `status`, `bukti_transfer`) VALUES
(2, 'michaelhts23032001@gmail.com', '2021-08-06', 'MIC20210806111143', 7500000, 800000, 'Bapak Hasan - Northsider Coffee', 'Jakarta', '', 'waiting', ''),
(3, 'michaelhts23032001@gmail.com', '2021-08-07', 'MIC20210807065238', 710000, 0, 'Junia Siregar', 'Jalan Jamin Ginting Gg Saudara No.5 Kabanjahe, Kab. Karo', '082168900080', 'paid', '11.PNG'),
(5, 'michaelhts23032001@gmail.com', '2021-08-11', 'MIC20210811171704', 145000, 50000, 'dfsdfdsfsfs', 'dsfdsfssdfds', '082167551107', 'waiting', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(5) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `id_orders`, `id_produk`, `qty`, `harga_produk`, `subtotal`) VALUES
(12, 9, 1, 100, 75000, 7500000),
(15, 12, 1, 1, 80000, 80000),
(16, 12, 6, 2, 105000, 210000),
(17, 12, 7, 4, 105000, 420000),
(18, 13, 1, 1, 80000, 80000),
(19, 12, 1, 1, 80000, 80000),
(20, 4, 7, 1, 150000, 150000),
(21, 5, 2, 1, 145000, 145000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  `alamat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_region` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_pembelian` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `is_available` varchar(11) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `deskripsi`, `harga`, `stok`, `is_available`, `image`) VALUES
(1, 1, 'Green Bean Lintong Arabica Specialty - Semi Washed  ', 'Green Bean Lintong Grade 1 - Semi Washed', 80000, 10000, '1', 'greenbean1.jpg'),
(2, 2, 'Bubuk Kopi Lintong Arabica Specialty  Semi Washed - Medium', 'Bubuk Kopi Lintong Grade 1 Semi Washed - Medium', 145000, 100, '1', 'all_weight.jpg'),
(3, 2, 'Bubuk Kopi Lintong Arabica Specialty  Semi Washed - Medium Dark', 'Bubuk Kopi Lintong Grade 1 Semi Washed - Medium Dark', 150000, 100, '1', 'all_weight4.jpg'),
(4, 2, 'Bubuk Kopi Lintong Arabica Specialty Semi Washed - Dark', '<p>Bubuk Kopi 1kg Lintong Specialty</p>\r\n', 155000, 100, '1', 'all_weight5.jpg'),
(5, 3, 'Biji Sangrai Kopi Lintong Arabica Specialty Semi Washed - Medium', '<p>Roast bean Lintong Arabica 1kg&nbsp; -&nbsp; Medium</p>\r\n', 140000, 100, '1', 'all_weight6.jpg'),
(6, 3, 'Biji Sangrai Kopi Lintong Arabica Specialty Semi Washed - Medium Dark', '<p>Roast Bean Lintong Arabica 1kg - Medium Dark</p>\r\n', 145000, 100, '1', 'all_weight7.jpg'),
(7, 3, 'Biji Sangrai Kopi Lintong Arabica Specialty Semi Washed - Dark', '<p>Roast Bean Lintong Arabica 1kg - Dark</p>\r\n', 150000, 100, '1', 'all_weight8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id_daerah` int(11) NOT NULL,
  `nama_daerah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sutoning`
--

CREATE TABLE `sutoning` (
  `id_sutoning` int(11) NOT NULL,
  `qty_asalan` varchar(129) NOT NULL,
  `qty_hasilsuton` int(11) NOT NULL,
  `tanggal_suton` varchar(128) NOT NULL,
  `waktu_update` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(128) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `fullname`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
('michaelhts23032001@gmail.com', 'Michael Hutasoit', 'default.jpg', '$2y$10$kI1lBAjy0dEZU/q3qPUz4.xpZ3VOKOAXfLzvIgmdu6q/AHQwslYqO', 1, 1, '1627981576');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(13, 'michaelhts23032001@gmail.com', '7FEWFLGZNCgnCS3o8RPQQW4PvF1hR5srZwWgAMVQjdU=', 1628662478);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_sutoning`
--
ALTER TABLE `hasil_sutoning`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id_daerah`);

--
-- Indexes for table `sutoning`
--
ALTER TABLE `sutoning`
  ADD PRIMARY KEY (`id_sutoning`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_sutoning`
--
ALTER TABLE `hasil_sutoning`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id_daerah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sutoning`
--
ALTER TABLE `sutoning`
  MODIFY `id_sutoning` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
