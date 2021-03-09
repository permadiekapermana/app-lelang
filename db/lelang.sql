-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2020 at 12:16 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lelang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nope` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('pending','aktif','nonaktif') NOT NULL DEFAULT 'pending',
  `role` enum('member','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`, `nope`, `alamat`, `status`, `role`) VALUES
(3, 'demo', 'demo@gmail.com', '$2y$10$69aon1GvEGCJgR0fCpsm8uzdAjjMCsctsdHJzIM.emARuYaquTqdS', '082333444555', 'jauh', 'aktif', 'member'),
(4, 'Administrator', 'admin@gmail.com', '$2y$10$ElaTC/pds1p.Ks/IMM/YJO1MZGoWYrk5VxXlD1YEJMdhc9VLnVrxS', '082333444550', 'JL. A.P. Pettarani no **', 'aktif', 'admin'),
(5, 'Ismail Herianto', 'op@gmail.com', '$2y$10$PoemBj6zskUSrdb1gbHQxuwmd/KakxUtIRnjlk15H6wcnhTyBaSYG', '082333444550', 'surabaya *** 123', 'aktif', 'member'),
(8, 'Sasuke', 'sasuke@gmail.com', '$2y$10$iit2d7zorNBeSeYRpxLWKOMDoX4ksHimpnyl/hCkaqzZT01tbJTRu', '082333444555', 'Konoha', 'aktif', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_buka` date NOT NULL,
  `tgl_tutup` date NOT NULL,
  `harga_buka` bigint(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `kategori`, `keterangan`, `tgl_buka`, `tgl_tutup`, `harga_buka`, `foto`, `user_id`) VALUES
(1, 'Yamaha Jupiter Z', 'motor', '<p>Berikut adalah keterangan</p><p></p><ul><li>Ban Bocor</li><li>Pernah jatuh di sawah</li><li>selebihnya OK</li></ul><p></p>\"', '2020-09-04', '2020-09-30', 800000, '506-avatar-370-456322.jpeg', 3),
(3, 'Xpander', 'mobil', '<p>Minus pemakaian</p>', '2020-09-05', '2020-09-26', 100000000, '834-BG 2.jpg', 3),
(5, 'Yamaha Nmax 150 CC', 'motor', '<p></p><ul><li>Minus Spion</li><li>Baret di sebelah kanan</li><li>kondisi 98 %</li><li>bahan bakar pertamax</li></ul><p></p>', '2020-09-11', '2020-09-25', 9000000, '194-back.png', 5),
(7, 'Mitsubishi Xpander 2020', 'mobil', '<p>Berikut adalah deskripsi kendaraan :</p><p></p><ul><li>spion kanan sedikit lecet</li><li>bumper depan penyok sedikit</li><li>body repaint</li><li>kondisi mesin 98% OK</li></ul><p></p>', '2020-09-12', '2020-09-26', 87000000, '947-mitsubishi-xpander.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `t_lelang`
--

CREATE TABLE `t_lelang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kandidat` varchar(255) NOT NULL,
  `harga_tawar` bigint(20) NOT NULL,
  `nope_kandidat` varchar(20) NOT NULL,
  `status` enum('pending','terpilih') NOT NULL DEFAULT 'pending',
  `user_id` int(10) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_lelang`
--

INSERT INTO `t_lelang` (`id`, `kandidat`, `harga_tawar`, `nope_kandidat`, `status`, `user_id`, `barang_id`) VALUES
(1, 'Agus', 900000, '089776556453', 'pending', 3, 1),
(2, 'Santoso', 1000000, '089776556450', 'terpilih', 3, 1),
(5, 'Purnomo', 120000000, '089776556453', 'pending', 3, 3),
(6, 'Budi', 9500000, '089776556450', 'pending', 5, 5),
(7, 'Purnomo', 9600000, '089776556453', 'pending', 5, 5),
(10, 'Budi', 1200000000, '089776556453', 'pending', 3, 3),
(11, 'Naruto', 90000000, '089776556450', 'pending', 8, 7),
(12, 'Kakashi', 100000000, '089776556453', 'terpilih', 8, 7),
(13, 'Boruto', 98000000, '089776556453', 'pending', 8, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `t_lelang`
--
ALTER TABLE `t_lelang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_lelang`
--
ALTER TABLE `t_lelang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_lelang`
--
ALTER TABLE `t_lelang`
  ADD CONSTRAINT `t_lelang_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_lelang_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
