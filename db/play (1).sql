-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Feb 2024 pada 18.34
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `play`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `tarif` int(11) NOT NULL,
  `status` text NOT NULL,
  `jam_m` datetime NOT NULL,
  `jam_k` datetime NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bill`
--

INSERT INTO `bill` (`id_bill`, `user`, `tarif`, `status`, `jam_m`, `jam_k`, `created_at`) VALUES
(6, 4, 4, 'Out', '2024-02-24 15:11:31', '2024-02-24 17:40:31', '2024-02-24'),
(9, 2, 2, 'Out', '2024-02-24 17:00:02', '2024-02-24 17:30:02', '2024-02-24'),
(10, 4, 6, 'Out', '2024-02-26 20:02:46', '2024-02-26 20:32:46', '2024-02-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `created_at`) VALUES
(2, 'Mandi Bola', '2024-02-20 00:38:49'),
(3, 'Trampolin', '2024-02-20 00:47:36'),
(4, 'Jungkat Jungkit', '2024-02-26 07:02:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '2023-10-09 19:57:33', NULL, NULL),
(2, 'Petugas', '2023-10-09 19:57:33', NULL, NULL),
(3, 'User', '2023-10-09 19:57:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `biaya` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `keterangan`, `biaya`, `created_at`) VALUES
(2, 'Uang Bensin', '20000', '2024-02-26'),
(3, 'Uang Makan', '10000', '2024-02-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int(11) NOT NULL,
  `harga` text NOT NULL,
  `jenis` int(11) NOT NULL,
  `menit` time NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `harga`, `jenis`, `menit`, `created_at`) VALUES
(2, '15000', 2, '00:30:00', '2024-02-20 01:26:58'),
(4, '10000', 3, '00:15:00', '2024-02-20 01:59:51'),
(6, '10000', 4, '00:30:00', '2024-02-26 07:02:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `kode` int(11) NOT NULL,
  `nama` text NOT NULL,
  `nama_ortu` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `level` int(11) NOT NULL,
  `foto` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `kode`, `nama`, `nama_ortu`, `username`, `password`, `email`, `level`, `foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 12345678, 'Admin', 'Bapak Admin', 'Admin', 'c4ca4238a0b923820dcc509a6f75849b', 'admin@gmail.com', 1, 'default.png', '2024-01-27 14:27:19', '2024-02-25 23:04:25', '0000-00-00 00:00:00'),
(2, 87654321, 'Petugas', 'Bapak Petugas', 'Petugas', 'c4ca4238a0b923820dcc509a6f75849b', 'petugas@gmail.com', 2, 'default.png', '2024-01-27 02:55:31', '2024-02-25 23:05:13', '0000-00-00 00:00:00'),
(4, 11223344, 'Darrell', 'Bapak Darrell', 'Darrell', 'c4ca4238a0b923820dcc509a6f75849b', 'darrell@gmail.com', 3, 'default.png', '2024-01-29 09:28:41', '2024-02-25 23:05:47', '0000-00-00 00:00:00'),
(5, 33445566, 'a', 'a', 'a', 'c4ca4238a0b923820dcc509a6f75849b', 'ab@gmail.com', 3, 'default.png', '2024-02-26 09:58:18', '2024-02-26 09:59:17', '2024-02-26 09:59:17'),
(6, 4534531, 'b', 'b', 'b', 'c4ca4238a0b923820dcc509a6f75849b', 'b@gmail.com', 2, 'default.png', '2024-02-26 09:59:03', '2024-02-26 09:59:11', '2024-02-26 09:59:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `website`
--

CREATE TABLE `website` (
  `id_website` int(11) NOT NULL,
  `nama_website` varchar(255) NOT NULL,
  `logo_website` text DEFAULT NULL,
  `logo_pdf` text DEFAULT NULL,
  `favicon_website` text DEFAULT NULL,
  `komplek` text DEFAULT NULL,
  `jalan` text DEFAULT NULL,
  `kelurahan` text DEFAULT NULL,
  `kecamatan` text DEFAULT NULL,
  `kota` text DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `nomor` text NOT NULL,
  `email_p` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `website`
--

INSERT INTO `website` (`id_website`, `nama_website`, `logo_website`, `logo_pdf`, `favicon_website`, `komplek`, `jalan`, `kelurahan`, `kecamatan`, `kota`, `kode_pos`, `nomor`, `email_p`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Manajemen PlayGround', 'logo_contoh.svg', 'logo_pdf_contoh.svg', 'favicon_contoh.svg', 'Komp. Pahlawan Mas', 'Jl. Raya Pahlawan No. 123', 'Kel. Sukajadi', 'Kec. Sukasari', 'Kota Batam', '29424', '081122334455', 'gt@gmail.com', '2023-05-01 16:33:53', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id_website`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `website`
--
ALTER TABLE `website`
  MODIFY `id_website` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
