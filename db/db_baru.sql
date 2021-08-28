-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Agu 2021 pada 11.01
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
(3, 'Xpander', 1, '<p>Minus pemakaian</p>', '2021-06-24', '2021-06-30', 100000000, 'open', '834-BG 2.jpg', 13),
(5, 'Yamaha Nmax 150 CC', 2, '<p></p><ul><li>Minus Spion</li><li>Baret di sebelah kanan</li><li>kondisi 98 %</li><li>bahan bakar pertamax</li></ul><p></p>', '2020-09-11', '2020-09-25', 9000000, 'open', '194-back.png', 13),
(7, 'Mitsubishi Xpander 2020', 2, '<p>Berikut adalah deskripsi kendaraan :</p><p></p><ul><li>spion kanan sedikit lecet</li><li>bumper depan penyok sedikit</li><li>body repaint</li><li>kondisi mesin 98% OK</li></ul><p></p>', '2020-09-12', '2020-09-26', 87000000, 'open', '947-mitsubishi-xpander.jpg', 13),
(12, 'Kodachi ', 2, 'Mantap Di Jamin', '2021-07-27', '2021-07-27', 30000, 'open', '114-sepatu_slip_on_pria_model_santai___formal__warna_tan_hitam_d.jpg', 13),
(18, 'ljljjl', 5, 'gjgk', '2021-08-25', '2021-08-25', 8900, 'close', '76-0.jpg', 13),
(19, 'Kodachi Flatshoes', 5, 'hgjhgjhgjhjhjh', '2021-08-28', '2021-08-29', 10000, 'open', '822-0.jpg', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_member`
--

CREATE TABLE `detail_member` (
  `id_detailmember` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `status_bayar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_member`
--

INSERT INTO `detail_member` (`id_detailmember`, `id_user`, `saldo`, `status_bayar`) VALUES
(2, 12, 289000, ''),
(3, 13, 0, 'Tarik'),
(4, 13, 42000, ''),
(5, 14, 39955000, ''),
(6, 15, 100000000, '');

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
(5, 'snekers');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kirim_barang`
--

CREATE TABLE `kirim_barang` (
  `id_kirim` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `status_kirim` varchar(30) NOT NULL,
  `jasa_ekspedisi` varchar(50) DEFAULT NULL,
  `no_resi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kirim_barang`
--

INSERT INTO `kirim_barang` (`id_kirim`, `id_lelang`, `status_kirim`, `jasa_ekspedisi`, `no_resi`) VALUES
(0, 38, 'Selesai', 'JNT', 'JP-98668866'),
(0, 39, 'Selesai', 'JNT', 'JP-98668866'),
(0, 40, 'Selesai', 'JNT', 'JP-98668866'),
(0, 0, 'Selesai', 'JNT', 'JP-98668866'),
(0, 0, 'Selesai', 'JNT', 'JP-98668866'),
(0, 41, 'Selesai', 'JNT', 'JP-98668866'),
(0, 38, 'Selesai', 'JNT', 'JP-98668866'),
(0, 42, 'Selesai', 'JNT', 'JP-98668866'),
(0, 43, 'Selesai', 'JNT', 'JP-98668866');

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
(35, 40000000, 'pending', 15, 10),
(36, 35000, 'refund', 12, 11),
(37, 40000, 'refund', 14, 11),
(38, 45000, 'terpilih', 12, 11),
(39, 45000, 'terpilih', 14, 12),
(40, 2000, 'terpilih', 12, 16),
(41, 5546, 'terpilih', 12, 14),
(42, 8888, 'terpilih', 12, 17),
(43, 20000, 'terpilih', 12, 18),
(44, 11000, 'pending', 12, 19);

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
-- Struktur dari tabel `riwayat_saldo`
--

CREATE TABLE `riwayat_saldo` (
  `id_saldo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nominal` int(15) NOT NULL,
  `order_id` varchar(300) DEFAULT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat_saldo`
--

INSERT INTO `riwayat_saldo` (`id_saldo`, `id_user`, `nominal`, `order_id`, `status_bayar`, `jenis`) VALUES
(1, 12, 10000, 'PLG-000023', 'Konfirmasi', 'Topup'),
(3, 12, 200000, 'PLG-000024', 'Konfirmasi', 'Topup'),
(4, 12, 300000, 'PLG-000025', 'Konfirmasi', 'Topup'),
(8, 12, 200000, 'PLG-000026', 'Konfirmasi', 'Topup'),
(9, 12, 100000, 'PLG-000027', 'Konfirmasi', 'Topup');

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
(77, 12, '100000', 'PLG-000019', 'cart');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarik_saldo`
--

CREATE TABLE `tarik_saldo` (
  `id_tariksaldo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nominal` int(15) NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `status_tarik` varchar(30) NOT NULL,
  `bukti` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tarik_saldo`
--

INSERT INTO `tarik_saldo` (`id_tariksaldo`, `id_user`, `nominal`, `id_rekening`, `status_tarik`, `bukti`) VALUES
(6, 13, 20000, 1, 'Konfirmasi', '936-kisspng-the-daily-dot-internet-logo-online-newspaper-5b8824bdaf8d30.7914872415356489577191.jpg');

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
-- Indeks untuk tabel `riwayat_saldo`
--
ALTER TABLE `riwayat_saldo`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indeks untuk tabel `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indeks untuk tabel `tarik_saldo`
--
ALTER TABLE `tarik_saldo`
  ADD PRIMARY KEY (`id_tariksaldo`);

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
  MODIFY `id_barang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `detail_member`
--
ALTER TABLE `detail_member`
  MODIFY `id_detailmember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `lelang`
--
ALTER TABLE `lelang`
  MODIFY `id_lelang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `riwayat_saldo`
--
ALTER TABLE `riwayat_saldo`
  MODIFY `id_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `tarik_saldo`
--
ALTER TABLE `tarik_saldo`
  MODIFY `id_tariksaldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
