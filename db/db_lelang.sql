-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 03:51 PM
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
(1, 'Yamaha Jupiter Z', 1, '<p>Berikut adalah keterangan</p><p></p><ul><li>Ban Bocor</li><li>Pernah jatuh di sawah</li><li>selebihnya OK</li></ul><p></p>\"', '2021-05-13', '2021-05-15', 800000, 'open', '506-avatar-370-456322.jpeg', 3),
(3, 'Xpander', 1, '<p>Minus pemakaian</p>', '2020-09-05', '2020-09-26', 100000000, 'open', '834-BG 2.jpg', 3),
(5, 'Yamaha Nmax 150 CC', 2, '<p></p><ul><li>Minus Spion</li><li>Baret di sebelah kanan</li><li>kondisi 98 %</li><li>bahan bakar pertamax</li></ul><p></p>', '2020-09-11', '2020-09-25', 9000000, 'open', '194-back.png', 5),
(7, 'Mitsubishi Xpander 2020', 2, '<p>Berikut adalah deskripsi kendaraan :</p><p></p><ul><li>spion kanan sedikit lecet</li><li>bumper depan penyok sedikit</li><li>body repaint</li><li>kondisi mesin 98% OK</li></ul><p></p>', '2020-09-12', '2020-09-26', 87000000, 'open', '947-mitsubishi-xpander.jpg', 8);

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
(2, 12, 200000),
(3, 13, 200000),
(4, 3, 200000);

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
(5, 120000000, 'pending', 3, 3),
(6, 9500000, 'pending', 5, 5),
(7, 9600000, 'pending', 5, 5),
(10, 1200000000, 'pending', 3, 3),
(11, 90000000, 'pending', 8, 7),
(12, 100000000, 'terpilih', 8, 7),
(13, 98000000, 'pending', 8, 7),
(19, 1500000, 'refund', 12, 1),
(20, 1600000, 'refund', 12, 1),
(24, 1700000, 'refund', 12, 1),
(25, 1800000, 'refund', 12, 1),
(28, 1900000, 'refund', 12, 1),
(30, 2000000, 'pending', 12, 1);

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
(3, 'Ismail Herianto', 'op@gmail.com', '$2y$10$PoemBj6zskUSrdb1gbHQxuwmd/KakxUtIRnjlk15H6wcnhTyBaSYG', '082333444550', 'surabaya *** 123', 'aktif', 'member'),
(4, 'Administrator', 'admin@gmail.com', '$2y$10$ElaTC/pds1p.Ks/IMM/YJO1MZGoWYrk5VxXlD1YEJMdhc9VLnVrxS', '082333444550', 'JL. A.P. Pettarani no **', 'aktif', 'admin'),
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
  MODIFY `id_barang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_member`
--
ALTER TABLE `detail_member`
  MODIFY `id_detailmember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lelang`
--
ALTER TABLE `lelang`
  MODIFY `id_lelang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
