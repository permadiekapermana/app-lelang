-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2021 pada 19.31
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.20

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
-- Struktur dari tabel `barang`
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
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_kategori`, `keterangan`, `tgl_buka`, `tgl_tutup`, `harga_buka`, `status`, `foto`, `id_user`) VALUES
(1, 'Yamaha Jupiter Z', 1, '<p>Berikut adalah keterangan</p><p></p><ul><li>Ban Bocor</li><li>Pernah jatuh di sawah</li><li>selebihnya OK</li></ul><p></p>\"', '2021-06-24', '2021-06-30', 800000, 'open', '506-avatar-370-456322.jpeg', 3),
(3, 'Xpander', 1, '<p>Minus pemakaian</p>', '2021-06-24', '2021-06-30', 100000000, 'open', '834-BG 2.jpg', 3),
(5, 'Yamaha Nmax 150 CC', 2, '<p></p><ul><li>Minus Spion</li><li>Baret di sebelah kanan</li><li>kondisi 98 %</li><li>bahan bakar pertamax</li></ul><p></p>', '2020-09-11', '2020-09-25', 9000000, 'open', '194-back.png', 5),
(7, 'Mitsubishi Xpander 2020', 2, '<p>Berikut adalah deskripsi kendaraan :</p><p></p><ul><li>spion kanan sedikit lecet</li><li>bumper depan penyok sedikit</li><li>body repaint</li><li>kondisi mesin 98% OK</li></ul><p></p>', '2020-09-12', '2020-09-26', 87000000, 'open', '947-mitsubishi-xpander.jpg', 8),
(8, 'dsdsfdsfdsf', 1, 'dsfdsfdgh', '2021-05-30', '2021-06-05', 5676768787, 'open', '972-kursi.jpg', 13),
(9, 'dsd', 1, 'ssfdsfdsfs', '2021-05-29', '2021-05-31', 243245, 'open', '922-images (2).jpg', 13),
(10, 'Mobil Xenia', 2, 'mobil keluarga nyaman dan tentram', '2021-06-24', '2021-06-30', 2000000, 'open', '633-kursi.jpg', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_member`
--

CREATE TABLE `detail_member` (
  `id_detailmember` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_member`
--

INSERT INTO `detail_member` (`id_detailmember`, `id_user`, `saldo`) VALUES
(2, 12, 30000000),
(3, 13, 200000),
(4, 3, 200000),
(5, 14, 40000000),
(6, 15, 100000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Smartphone'),
(2, 'Laptop');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lelang`
--

CREATE TABLE `lelang` (
  `id_lelang` int(11) UNSIGNED NOT NULL,
  `harga_tawar` bigint(20) NOT NULL,
  `status` varchar(40) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_barang` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lelang`
--

INSERT INTO `lelang` (`id_lelang`, `harga_tawar`, `status`, `id_user`, `id_barang`) VALUES
(31, 4000000, 'refund', 12, 10),
(32, 6000000, 'refund', 15, 10),
(33, 10000000, 'refund', 14, 10),
(34, 20000000, 'refund', 15, 10),
(35, 40000000, 'pending', 15, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `norek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `id_user`, `bank`, `norek`) VALUES
(1, 13, 'BNI', '123'),
(2, 3, 'Mandiri', '123'),
(3, 12, 'BCA', '123'),
(4, 14, 'BRI', '234345466'),
(5, 15, 'BRI', '44556678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `saldos` varchar(50) NOT NULL,
  `order_id` varchar(300) NOT NULL,
  `stat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saldo`
--

INSERT INTO `saldo` (`id_saldo`, `id_users`, `saldos`, `order_id`, `stat`) VALUES
(70, 14, '200000', 'PL-001060721', 'cart'),
(71, 14, '700000', 'PL-001060721', 'cart'),
(72, 14, '300000', 'PL-001', 'cart'),
(73, 14, '3000000', 'PL-001', 'cart'),
(74, 15, '700000', 'PL-001', 'cart'),
(75, 15, '3000000', 'PL-001', 'cart'),
(76, 15, '300000', 'PL-001', 'cart');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `password`, `no_hp`, `alamat`, `status`, `role`) VALUES
(3, 'Ismail Herianto', 'op@gmail.com', '$2y$10$PoemBj6zskUSrdb1gbHQxuwmd/KakxUtIRnjlk15H6wcnhTyBaSYG', '082333444550', 'surabaya *** 123', 'aktif', 'member'),
(4, 'Administrator', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '082333444550', 'JL. A.P. Pettarani no **', 'aktif', 'admin'),
(8, 'Permadi', 'pep@gmail.com', '3681cf428637d5f89f412967c3ada00a', '082333444555', 'Konoha', 'nonaktif', 'member'),
(12, 'ucup', 'ucup@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '089', 'cirebon', 'aktif', 'member'),
(13, 'Putri Ayu', 'ayu@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '089', 'cirebon', 'aktif', 'pelelang'),
(14, 'rahman', 'rahman@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '089943843838', 'jakarta taman mini indonesia\r\njalan taman mini', 'aktif', 'member'),
(15, 'sueb', 'sueb@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '098776534334', 'menteng jakpus', 'aktif', 'member');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `user_id` (`id_user`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `detail_member`
--
ALTER TABLE `detail_member`
  ADD PRIMARY KEY (`id_detailmember`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `lelang`
--
ALTER TABLE `lelang`
  ADD PRIMARY KEY (`id_lelang`),
  ADD KEY `user_id` (`id_user`),
  ADD KEY `barang_id` (`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `detail_member`
--
ALTER TABLE `detail_member`
  MODIFY `id_detailmember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `lelang`
--
ALTER TABLE `lelang`
  MODIFY `id_lelang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
