-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2021 pada 18.31
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotikmcb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_obat` int(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id`, `id_pembelian`, `id_obat`, `jumlah`, `harga`, `total`) VALUES
(57, 46, 40, 1, 10000, 10000),
(58, 46, 45, 1, 35000, 35000),
(59, 46, 47, 2, 25000, 50000),
(60, 47, 40, 1, 10000, 10000),
(61, 49, 40, 1, 10000, 10000),
(62, 49, 39, 1, 2500, 2500),
(76, 57, 39, 1, 2500, 2500),
(77, 57, 40, 1, 10000, 10000),
(80, 59, 40, 2, 10000, 20000),
(81, 59, 39, 1, 2500, 2500),
(82, 60, 39, 2, 2500, 5000),
(86, 62, 52, 1, 23000, 23000),
(87, 63, 62, 1, 115000, 115000),
(88, 64, 52, 1, 23000, 23000),
(89, 64, 40, 1, 10000, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id`, `id_user`, `id_obat`, `jumlah`) VALUES
(30, 4, 23, 1),
(31, 4, 24, 3),
(32, 4, 22, 1),
(41, 4, 38, 1),
(42, 5, 38, 1),
(43, 5, 64, 1),
(68, 9, 39, 2),
(69, 9, 41, 1),
(70, 9, 51, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id` int(20) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id`, `nama`) VALUES
(1, 'Cash On Delivery'),
(2, 'Gopay'),
(3, 'OVO'),
(4, 'Mandiri'),
(5, 'BCA'),
(9, 'BRI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `kategori` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `nama`, `harga`, `foto`, `kategori`, `stok`) VALUES
(38, 'Tolak Angin', 3000, 'tolak angin.jpg', 1, 0),
(39, 'Paramex 4 Tablet', 2500, 'paramex.jpg', 1, 0),
(40, 'Panadol Biru', 10000, 'panadol biru.jpg', 1, 0),
(41, 'Panadol Merah', 10000, 'panadol merah.jpg', 1, 0),
(42, 'Panadol Hijau', 10000, 'panadol hijau.jpg', 1, 0),
(43, 'Bodrex', 9000, 'bodrex.jpg', 1, 0),
(44, 'Sanmol', 22000, 'sanmol.jpg', 1, 0),
(45, 'Proris Suspensi', 35000, 'proris.jpg', 1, 0),
(46, 'Obh Combi Anak', 17000, 'combi.jpg', 1, 0),
(47, 'Bintang Toedhoe 24S', 25000, 'bj.jpg', 1, 0),
(48, 'Oskadon', 5000, 'oskadon.jpg', 1, 0),
(49, 'Ibuprofen 10 Tablet', 10000, 'ibuprofen.jpg', 1, 0),
(50, 'Rohto Cool', 20000, 'rohto1.jpg', 3, 0),
(51, 'Rohto Eye Flush', 35000, 'rohto eye flush1.jpg', 3, 0),
(52, 'Insto Regular Drops', 23000, 'insto1.jpg', 3, 0),
(53, 'Insto Moist Drops', 15000, 'insto moist1.jpg', 3, 0),
(54, 'Braito Original', 11000, 'brait1.png', 3, 0),
(55, 'Tears Naturale Alcon', 82000, 'alcon1.jpg', 3, 0),
(56, 'Visine Original', 18000, 'visine_product_shots_original1.jpg', 3, 0),
(57, 'Cendo Cenfresh', 42000, 'cenfresh1.jpg', 3, 0),
(58, 'Cendo Lytees', 25000, 'lytrees1.jpg', 3, 0),
(59, 'Cendo Vision', 20000, 'vision1.jpg', 3, 0),
(60, 'Allegran Refresh', 45000, 'refresh1.jpg', 3, 0),
(62, 'Neroid Soothing Cream', 115000, 'noroid1.jpg', 2, 0),
(63, 'Gentasolon Cream', 30000, 'gentasolon1.jpg', 2, 0),
(64, 'Medi-Clin Gel', 30000, 'mediclin1.jpg', 2, 0),
(65, 'Bioplacenton', 25000, 'Bioplacenton1.jpg', 2, 0),
(68, 'Blink Contacts', 55000, 'blink1.jpg', 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `alamat` text NOT NULL,
  `pengiriman` varchar(20) NOT NULL,
  `pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `id_user`, `subtotal`, `tanggal`, `alamat`, `pengiriman`, `pembayaran`) VALUES
(46, 8, 95000, '2021-11-25 11:35:23', 'Jl Kuncen', 'Grab Express', 'BRI'),
(47, 7, 10000, '2021-11-25 11:39:55', 'Jl Perintis Kemerdekaan', 'Grab Express', 'BCA'),
(49, 7, 12500, '2021-11-25 11:44:04', 'Jl Perintis Kemerdekaan', 'Grab Express', 'Cash On Delivery'),
(57, 7, 12500, '2021-11-27 07:06:46', 'Jl Perintis Kemerdekaan', 'Grab Express', 'BCA'),
(59, 7, 22500, '2021-11-30 02:20:36', 'Jl Perintis Kemerdekaan', 'Grab Express', 'BCA'),
(60, 11, 5000, '2021-12-05 10:41:24', 'Jl Uka uka', 'Grab Express', 'Cash On Delivery'),
(62, 7, 23000, '2021-12-29 15:47:33', 'Jl Perintis Kemerdekaan', 'Grab Express', 'BRA'),
(63, 13, 115000, '2021-12-29 16:33:35', 'Jl Ahmad Yani', 'Grab Express', 'BCA'),
(64, 15, 33000, '2021-12-29 17:07:27', 'Jl Cempaka Putih', 'JNE', 'OVO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` int(20) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `nama`) VALUES
(1, 'JNE'),
(2, 'JNT'),
(3, 'SiCepat'),
(4, 'Pos Indonesia'),
(5, 'Grab Express');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `telepon` int(20) NOT NULL,
  `alamat` varchar(1000) DEFAULT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `telepon`, `alamat`, `tipe`) VALUES
(1, 'admin', '', 'admin', 0, NULL, '2'),
(3, 'zalpe123', 'zalperabbani@outlook.com', '12345678', 861341312, 'jalan nilam 6 no 45 rt 13 rw 02', '1'),
(7, 'rohfi', 'rohfi@gmail.com', '12345678', 892348728, 'Jl Perintis Kemerdekaan', '1'),
(8, 'nurul', 'nurul@gmail.com', '12345678', 852348728, 'Jl Kuncen', '1'),
(11, 'wowo', 'bowo@gmail.com', '12345678', 873242487, 'Jl Uka uka', '1'),
(13, 'naufal', 'naufalsyarif@gmail.com', '12345678', 892348728, 'Jl Ahmad Yani', '1'),
(14, 'rafly', 'rafly@gmail.com', '12345678', 2147483647, 'Jl Cempaka Mulya', '1'),
(15, 'syarif', 'syarifnaufal@gmail.com', '12345678', 892348728, 'Jl Cempaka Putih', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
