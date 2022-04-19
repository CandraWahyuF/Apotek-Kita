-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 12:47 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotekkita`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kat` int(11) NOT NULL,
  `nama_kat` varchar(128) NOT NULL,
  `desk_kat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kat`, `nama_kat`, `desk_kat`) VALUES
(31, 'Obat Keras Gan', 'ini obat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(128) NOT NULL,
  `penyimpanan` varchar(128) NOT NULL,
  `stok` int(11) NOT NULL,
  `kedaluwarsa` date NOT NULL,
  `h_jual` int(11) NOT NULL,
  `h_beli` int(11) NOT NULL,
  `nama_pemasok` varchar(128) NOT NULL,
  `nama_kat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id`, `nama_obat`, `penyimpanan`, `stok`, `kedaluwarsa`, `h_jual`, `h_beli`, `nama_pemasok`, `nama_kat`) VALUES
(38, 'AntiBiotik', 'Gudang', 30000, '2022-04-05', 2020, 32020, 'Kimia Farma', 'Obat Keras Gan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemasok`
--

CREATE TABLE `tb_pemasok` (
  `id_pemasok` int(11) NOT NULL,
  `nama_pemasok` varchar(128) NOT NULL,
  `alamat_pemasok` varchar(128) NOT NULL,
  `telepon_pemasok` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pemasok`
--

INSERT INTO `tb_pemasok` (`id_pemasok`, `nama_pemasok`, `alamat_pemasok`, `telepon_pemasok`) VALUES
(14, 'Kimia Farma', 'Lampung Selatan', 80808);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_beli` int(11) NOT NULL,
  `koderef` varchar(128) NOT NULL,
  `nama_obat` varchar(128) NOT NULL,
  `h_beli` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `nama_pemasok` varchar(128) NOT NULL,
  `tgl_beli` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_beli`, `koderef`, `nama_obat`, `h_beli`, `banyak`, `subtotal`, `nama_pemasok`, `tgl_beli`, `total`) VALUES
(1, '321cba', 'Baygon', 5000, 10, 5000, 'Pemasok 1', '2022-04-06', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_jual` int(11) NOT NULL,
  `koderef` varchar(128) NOT NULL,
  `nama_obat` varchar(128) NOT NULL,
  `h_beli` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `nama_pembeli` varchar(128) NOT NULL,
  `tgl_beli` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_jual`, `koderef`, `nama_obat`, `h_beli`, `banyak`, `subtotal`, `nama_pembeli`, `tgl_beli`, `total`) VALUES
(3, '123abc', 'Baygon', 2000, 3, 3000, 'Candra', '2022-04-07', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'Candra Wahyu F', 'candra@gmail.com', 'default.png', '$2y$10$3uGOaFUpOQO4UWpt9f24.OO2UUP1Ab/FZIVvnP5A9ltG/FBaERwqG', 1, 1, 1649111986),
(4, 'admin', 'admin@gmail.com', 'default.png', '$2y$10$Roy4l/1.yx7GgGZcCL76lefSC2VtJ5T3tu2SaRRc7F56FPTrxg5FG', 1, 1, 1649148911);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kat`),
  ADD UNIQUE KEY `nama_kat` (`nama_kat`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kat` (`nama_kat`),
  ADD KEY `nama_kat` (`nama_kat`),
  ADD KEY `nama_pemasok` (`nama_pemasok`);

--
-- Indexes for table `tb_pemasok`
--
ALTER TABLE `tb_pemasok`
  ADD PRIMARY KEY (`id_pemasok`),
  ADD KEY `nama_pemasok` (`nama_pemasok`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_jual`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_pemasok`
--
ALTER TABLE `tb_pemasok`
  MODIFY `id_pemasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD CONSTRAINT `tb_obat_ibfk_1` FOREIGN KEY (`nama_kat`) REFERENCES `tb_kategori` (`nama_kat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_obat_ibfk_2` FOREIGN KEY (`nama_pemasok`) REFERENCES `tb_pemasok` (`nama_pemasok`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
