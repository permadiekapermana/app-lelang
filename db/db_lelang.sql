-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 08:45 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lelang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_buka` date NOT NULL,
  `tgl_tutup` date NOT NULL,
  `harga_buka` bigint(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_user` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_kategori`, `keterangan`, `tgl_buka`, `tgl_tutup`, `harga_buka`, `status`, `foto`, `id_user`) VALUES
(1, 'Yamaha Jupiter Z', 1, '<p>Berikut adalah keterangan</p><p></p><ul><li>Ban Bocor</li><li>Pernah jatuh di sawah</li><li>selebihnya OK</li></ul><p></p>\"', '2021-05-09', '2021-05-11', 800000, 'close', '506-avatar-370-456322.jpeg', 3),
(3, 'Xpander', 1, '<p>Minus pemakaian</p>', '2020-09-05', '2020-09-26', 100000000, 'close', '834-BG 2.jpg', 3),
(7, 'Mitsubishi Xpander 2021', 2, '<p>Berikut adalah deskripsi kendaraan :</p><p></p><ul><li>spion kanan sedikit lecet</li><li>bumper depan penyok sedikit</li><li>body repaint</li><li>kondisi mesin 98% OK</li></ul><p></p>', '2021-05-19', '2021-05-21', 100000, 'close', '947-mitsubishi-xpander.jpg', 13),
(11, 'Laptop Asus X45', 2, 'bebassss', '2021-05-25', '2021-05-28', 100000, 'close', '96-Revisi Dashbpoard Superset.png', 13),
(12, 'mm', 1, 'jik', '2021-05-29', '2021-05-31', 100000, 'close', '737-Revisi Dashbpoard Superset.png', 13),
(13, 'Xiaomi Redmi Note 9', 1, 'test doang', '2021-05-28', '2021-05-31', 100000, 'open', '326-Revisi Dashbpoard Superset.png', 13);

-- --------------------------------------------------------

--
-- Table structure for table `detail_member`
--

CREATE TABLE `detail_member` (
  `id_detailmember` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_member`
--

INSERT INTO `detail_member` (`id_detailmember`, `id_user`, `saldo`) VALUES
(2, 12, 1410000),
(3, 13, 1420000),
(4, 3, 1290000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Smartphone'),
(2, 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `kirim_barang`
--

CREATE TABLE `kirim_barang` (
  `id_kirim` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `status_kirim` varchar(30) NOT NULL,
  `jasa_ekspedisi` varchar(50) DEFAULT NULL,
  `no_resi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kirim_barang`
--

INSERT INTO `kirim_barang` (`id_kirim`, `id_lelang`, `status_kirim`, `jasa_ekspedisi`, `no_resi`) VALUES
(5, 31, 'Dalam Pengiriman', 'JNE', '928392'),
(6, 34, 'Selesai', 'JNT', '1111'),
(7, 36, 'Dalam Pengiriman', 'JNE', '3353');

-- --------------------------------------------------------

--
-- Table structure for table `lelang`
--

CREATE TABLE `lelang` (
  `id_lelang` int(11) UNSIGNED NOT NULL,
  `harga_tawar` bigint(20) NOT NULL,
  `status` varchar(40) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_barang` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lelang`
--

INSERT INTO `lelang` (`id_lelang`, `harga_tawar`, `status`, `id_user`, `id_barang`) VALUES
(1, 900000, 'refund', 13, 1),
(2, 1000000, 'refund', 12, 1),
(5, 120000000, 'refund', 3, 3),
(6, 9500000, 'pending', 5, 5),
(7, 9600000, 'pending', 5, 5),
(10, 1200000000, 'refund', 3, 3),
(19, 1500000, 'refund', 12, 1),
(20, 1600000, 'refund', 12, 1),
(24, 1700000, 'refund', 12, 1),
(25, 1800000, 'refund', 12, 1),
(28, 1900000, 'refund', 12, 1),
(30, 2000000, 'refund', 12, 1),
(31, 110000, 'refund', 12, 7),
(32, 110000, 'refund', 12, 11),
(33, 120000, 'refund', 3, 11),
(34, 130000, 'terpilih', 3, 11),
(35, 100000, 'refund', 12, 12),
(36, 110000, 'refund', 12, 12),
(37, 110000, 'refund', 12, 13),
(38, 120000, 'refund', 12, 13),
(39, 130000, 'refund', 12, 13),
(40, 140000, 'refund', 12, 13),
(41, 150000, 'refund', 12, 13),
(42, 160000, 'refund', 12, 13),
(43, 170000, 'refund', 12, 13),
(44, 180000, 'refund', 12, 13),
(45, 200000, 'refund', 12, 13),
(46, 210000, 'refund', 12, 13),
(47, 220000, 'refund', 12, 13),
(48, 230000, 'refund', 12, 13),
(49, 240000, 'refund', 12, 13),
(50, 250000, 'refund', 12, 13),
(51, 260000, 'pending', 12, 13);

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `norek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `id_user`, `bank`, `norek`) VALUES
(1, 13, 'BNI', '123'),
(2, 3, 'Mandiri', '123'),
(3, 12, 'BCA', '123');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_saldo`
--

CREATE TABLE `riwayat_saldo` (
  `id_saldo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nominal` int(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `password`, `no_hp`, `alamat`, `status`, `role`) VALUES
(3, 'Ismail Herianto', 'op@gmail.com', '11d8c28a64490a987612f2332502467f', '082333444550', 'surabaya *** 123', 'aktif', 'member'),
(4, 'Administrator', 'admin@gmail.com', '75d23af433e0cea4c0e45a56dba18b30', '082333444550', 'JL. A.P. Pettarani no 16', 'aktif', 'admin'),
(8, 'Permadi', 'pep@gmail.com', '3681cf428637d5f89f412967c3ada00a', '082333444555', 'Konoha', 'nonaktif', 'member'),
(12, 'ucup', 'ucup@gmail.com', '1e17778d0d8217b035daffba02c06054', '089', 'cirebon', 'aktif', 'member'),
(13, 'Putri Ayu', 'ayu@gmail.com', '29c65f781a1068a41f735e1b092546de', '089', 'cirebon', 'aktif', 'pelelang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `user_id` (`id_user`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `detail_member`
--
ALTER TABLE `detail_member`
  ADD PRIMARY KEY (`id_detailmember`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kirim_barang`
--
ALTER TABLE `kirim_barang`
  ADD PRIMARY KEY (`id_kirim`),
  ADD KEY `id_lelang` (`id_lelang`);

--
-- Indexes for table `lelang`
--
ALTER TABLE `lelang`
  ADD PRIMARY KEY (`id_lelang`),
  ADD KEY `user_id` (`id_user`),
  ADD KEY `barang_id` (`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `riwayat_saldo`
--
ALTER TABLE `riwayat_saldo`
  ADD PRIMARY KEY (`id_saldo`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `detail_member`
--
ALTER TABLE `detail_member`
  MODIFY `id_detailmember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kirim_barang`
--
ALTER TABLE `kirim_barang`
  MODIFY `id_kirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lelang`
--
ALTER TABLE `lelang`
  MODIFY `id_lelang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `riwayat_saldo`
--
ALTER TABLE `riwayat_saldo`
  MODIFY `id_saldo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
