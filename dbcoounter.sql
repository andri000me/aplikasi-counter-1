-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Mei 2020 pada 10.23
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcoounter`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` double NOT NULL,
  `tipe` varchar(12) NOT NULL,
  `poin` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `barang`, `id_brand`, `id_kategori`, `harga`, `tipe`, `poin`) VALUES
(29, 'a5s', 1, 3, 1899000, 'all', 100),
(30, 'RENO 2', 1, 3, 4999000, 'fokus', 300),
(31, 'RENO 2 polos', 7, 4, 65000, 'fokus', 50),
(32, 'A5s anti crack', 8, 4, 35000, 'all', 25),
(33, 'V19 pro', 2, 3, 4999000, 'fokus', 300);

-- --------------------------------------------------------

--
-- Struktur dari tabel `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `brand`
--

INSERT INTO `brand` (`id_brand`, `brand`) VALUES
(1, 'OPPO'),
(2, 'VIVO'),
(4, 'XIOMI'),
(5, 'SAMSUNG'),
(6, 'HUAWEI'),
(7, 'OASE'),
(8, 'OTHER'),
(9, 'kosong');

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
(3, 'handphone'),
(4, 'hardcase'),
(5, 'softcase'),
(6, 'Tamperglas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_fokus`
--

CREATE TABLE `produk_fokus` (
  `id_produk_fokus` int(11) NOT NULL,
  `p_bulan` varchar(2) NOT NULL,
  `p_tahun` varchar(4) NOT NULL,
  `p_all` double NOT NULL,
  `p_fokus` double NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk_fokus`
--

INSERT INTO `produk_fokus` (`id_produk_fokus`, `p_bulan`, `p_tahun`, `p_all`, `p_fokus`, `id_kategori`) VALUES
(7, '04', '2020', 100, 40, 3),
(8, '04', '2020', 100, 20, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `no_transaksi` int(20) NOT NULL,
  `rating` int(1) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_rating` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id_rating`, `no_transaksi`, `rating`, `id_user`, `tgl_rating`) VALUES
(36, 202005172, 5, 37, '2020-05-16'),
(37, 202005174, 5, 37, '2020-05-17'),
(38, 202005177, 4, 37, '2020-05-17'),
(39, 2020051811, 5, 37, '2020-05-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `target_pegawai`
--

CREATE TABLE `target_pegawai` (
  `id_target_pegawai` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `fokus` double NOT NULL,
  `all` double NOT NULL,
  `bulan_target` varchar(12) NOT NULL,
  `tahun_target` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `target_pegawai`
--

INSERT INTO `target_pegawai` (`id_target_pegawai`, `id_user`, `id_kategori`, `fokus`, `all`, `bulan_target`, `tahun_target`) VALUES
(11, 37, 3, 15, 20, '05', '2020'),
(12, 37, 4, 10, 15, '05', '2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_transaksi` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `keterangan` int(1) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_transaksi`, `id_user`, `id_barang`, `keterangan`, `tgl_transaksi`, `level`) VALUES
(73, 202005172, 37, 29, 1, '2020-05-16', 1),
(74, 202005172, 37, 32, 1, '2020-05-16', 1),
(75, 202005174, 37, 33, 1, '2020-05-17', 1),
(76, 202005174, 37, 32, 1, '2020-05-17', 1),
(77, 202005177, 37, 33, 1, '2020-05-17', 1),
(78, 202005177, 37, 31, 1, '2020-05-17', 1),
(79, 202005177, 37, 30, 1, '2020-05-17', 1),
(80, 0, 0, 0, 0, '2020-05-16', 1),
(81, 0, 0, 0, 0, '2020-05-17', 1),
(82, 2020051811, 37, 30, 1, '2020-05-18', 1),
(83, 2020051811, 37, 32, 1, '2020-05-18', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `email`) VALUES
(32, 'admin', '12345678', 'admin', 'admin@gmail.com'),
(37, 'johan', '12345678', 'pegawai', 'johan@gmail.com'),
(38, 'andri', '12345678', 'pegawai', 'andri@gmail.com'),
(39, 'owner', '12345678', 'owner', 'owner@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_brand` (`id_brand`,`id_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk_fokus`
--
ALTER TABLE `produk_fokus`
  ADD PRIMARY KEY (`id_produk_fokus`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD UNIQUE KEY `no_transaksi` (`no_transaksi`);

--
-- Indexes for table `target_pegawai`
--
ALTER TABLE `target_pegawai`
  ADD PRIMARY KEY (`id_target_pegawai`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `produk_fokus`
--
ALTER TABLE `produk_fokus`
  MODIFY `id_produk_fokus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `target_pegawai`
--
ALTER TABLE `target_pegawai`
  MODIFY `id_target_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
