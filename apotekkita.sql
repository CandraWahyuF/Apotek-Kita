-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Bulan Mei 2022 pada 15.35
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.3

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
-- Struktur dari tabel `month`
--

CREATE TABLE `month` (
  `month_num` int(11) NOT NULL,
  `month_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `month`
--

INSERT INTO `month` (`month_num`, `month_name`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kat` int(11) NOT NULL,
  `nama_kat` varchar(128) NOT NULL,
  `desk_kat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kat`, `nama_kat`, `desk_kat`) VALUES
(45, 'Antibiotik', 'Obat pencegah infeksi'),
(46, 'Demam', 'Obat untuk demam/nyeri'),
(47, 'Darah Tinggi', 'Obat menurunkan tekanan darah'),
(48, 'Obat Batuk', 'Obat batuk berdahak dan kering'),
(49, 'Maag', 'Obat meredakan sakit maag');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
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
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`id`, `nama_obat`, `penyimpanan`, `stok`, `kedaluwarsa`, `h_jual`, `h_beli`, `nama_pemasok`, `nama_kat`) VALUES
(63, 'Amoxicilin', 'Etalase 1', 50, '2022-06-16', 13320, 10000, 'Antarmitra Sembada', 'Antibiotik'),
(64, 'Cefadroxil', 'Etalase  1', 20, '2022-05-30', 17316, 13000, 'Antarmitra Sembada', ' Antibiotik'),
(65, 'Paracetamol', 'Etalase 2', 20, '2022-05-23', 3500, 3000, 'Bina San Prima', ' Demam'),
(66, 'Ambroxol', 'Etalase 2', 31, '2022-06-12', 3000, 2500, 'Belibis', ' Obat Batuk'),
(67, 'OBH', 'Etalase 2', 14, '2023-05-16', 13000, 10000, 'Belibis', 'Obat Batuk'),
(68, 'Ibuprofin', 'Etalase 3', 20, '2022-06-11', 4000, 3500, 'Bina San Prima', 'Demam'),
(69, 'OBP', 'Etalase 2', 25, '2022-05-28', 14000, 11000, 'Belibis', 'Obat Batuk'),
(70, 'Candesartan (8mg)', 'Etalase 4', 10, '2022-05-31', 25000, 22000, 'Mensa Binasukses', 'Darah Tinggi'),
(71, 'Amlodipin', 'Etalase 4', 15, '2022-05-28', 23000, 20000, 'Mensa Binasukses', 'Darah Tinggi'),
(72, 'Bisoprolol', 'Etalase 4', 15, '2022-05-22', 18000, 15000, 'Mensa Binasukses', ' Darah Tinggi'),
(73, 'Ciprofroksasin', 'Etalase 1', 25, '2022-05-24', 18000, 15000, 'Antarmitra Sembada', 'Antibiotik'),
(74, 'OBH', 'Etalase 1', 10, '2022-05-17', 13320, 10000, 'Antarmitra Sembada', 'Obat Batuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemasok`
--

CREATE TABLE `tb_pemasok` (
  `id_pemasok` int(11) NOT NULL,
  `nama_pemasok` varchar(128) NOT NULL,
  `alamat_pemasok` varchar(128) NOT NULL,
  `telepon_pemasok` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pemasok`
--

INSERT INTO `tb_pemasok` (`id_pemasok`, `nama_pemasok`, `alamat_pemasok`, `telepon_pemasok`) VALUES
(27, 'Mensa Binasukses', 'Kedamaian, Tanjungkarang Timur, Bandar Lampung', 721253690),
(28, 'Belibis', 'JALAN UDANG I NO 29, Garuntang, Kec. Bumi Waras, Kota Bandar Lampung, Lampung 35227', 721472153),
(29, 'Bina San Prima', 'JL P. Tembesu No.16 A, Campang Raya, Kec. Tanjungkarang Timur, Kota Bandar Lampung, Lampung 35122', 721788664),
(30, 'Sapta Sari Tama', 'Jl. Arif Rahman Hakim Blok B No.20, Way Halim Permai, Kec. Sukarame, Kota Bandar Lampung, Lampung 35133', 721706896),
(31, 'Antarmitra Sembada', 'Jl. Cut Nyak Dien No.76, Palapa, Kec. Tj. Karang Pusat, Kota Bandar Lampung, Lampung 35119', 721263087);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_beli` int(11) NOT NULL,
  `ref` varchar(128) NOT NULL,
  `nama_obat` varchar(128) NOT NULL,
  `h_beli` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `nama_pemasok` varchar(128) NOT NULL,
  `tgl_beli` date NOT NULL,
  `grandtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_beli`, `ref`, `nama_obat`, `h_beli`, `banyak`, `subtotal`, `nama_pemasok`, `tgl_beli`, `grandtotal`) VALUES
(6, 'PjPAEcXjdd', 'OBH', 10000, 1, 10000, 'Belibis', '2022-05-16', 22500),
(7, 'PjPAEcXjdd', 'Ambroxol', 2500, 5, 12500, 'Belibis', '2022-05-16', 22500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_jual` int(11) NOT NULL,
  `ref` varchar(128) NOT NULL,
  `nama_obat` varchar(128) NOT NULL,
  `h_beli` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `nama_pembeli` varchar(128) NOT NULL,
  `tgl_beli` date NOT NULL,
  `grandtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_jual`, `ref`, `nama_obat`, `h_beli`, `banyak`, `subtotal`, `nama_pembeli`, `tgl_beli`, `grandtotal`) VALUES
(15, 'VKCgXFVryj', 'OBH', 10000, 1, 10000, 'Candra', '2022-05-16', 16000),
(16, 'VKCgXFVryj', 'Paracetamol', 3000, 2, 6000, 'Candra', '2022-05-16', 16000),
(17, '6nWppmAcFk', 'Ambroxol', 2500, 4, 10000, 'Candra Lagi Beli', '2022-05-17', 29000),
(18, '6nWppmAcFk', 'OBH', 10000, 1, 10000, 'Candra Lagi Beli', '2022-05-17', 29000),
(19, '6nWppmAcFk', 'Paracetamol', 3000, 3, 9000, 'Candra Lagi Beli', '2022-05-17', 29000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'Candra Wahyu F', 'candra@gmail.com', 'default.png', '$2y$10$3uGOaFUpOQO4UWpt9f24.OO2UUP1Ab/FZIVvnP5A9ltG/FBaERwqG', 1, 1, 1649111986),
(4, 'admin', 'admin@gmail.com', 'default.png', '$2y$10$Roy4l/1.yx7GgGZcCL76lefSC2VtJ5T3tu2SaRRc7F56FPTrxg5FG', 1, 1, 1649148911);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'owner');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`month_num`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kat`),
  ADD UNIQUE KEY `nama_kat` (`nama_kat`);

--
-- Indeks untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kat` (`nama_kat`),
  ADD KEY `nama_kat` (`nama_kat`),
  ADD KEY `nama_pemasok` (`nama_pemasok`),
  ADD KEY `nama_obat` (`nama_obat`);

--
-- Indeks untuk tabel `tb_pemasok`
--
ALTER TABLE `tb_pemasok`
  ADD PRIMARY KEY (`id_pemasok`),
  ADD KEY `nama_pemasok` (`nama_pemasok`);

--
-- Indeks untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_beli`),
  ADD KEY `nama_pemasok` (`nama_pemasok`),
  ADD KEY `nama_obat` (`nama_obat`);

--
-- Indeks untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_jual`),
  ADD KEY `nama_obat` (`nama_obat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `tb_pemasok`
--
ALTER TABLE `tb_pemasok`
  MODIFY `id_pemasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
