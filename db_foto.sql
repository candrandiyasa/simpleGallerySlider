-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2019 pada 02.01
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_foto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `kode_foto` int(10) NOT NULL,
  `kode_kategori` int(10) NOT NULL,
  `nama_foto` text NOT NULL,
  `file_foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`kode_foto`, `kode_kategori`, `nama_foto`, `file_foto`) VALUES
(14, 1, '6fc8256ec6f2397147149b5b5898ad7f.jpg', 'jpg'),
(15, 1, '6ca4644487ea10139dd9574330f4b407.jpg', 'jpg'),
(17, 3, '0f3dc8fa60a979f448139361ddb4b3ac.jpg', 'jpg'),
(18, 3, '2eba6a595f483310b97227ef34a22b16.jpg', 'jpg'),
(19, 1, '9ce0a46d6fb8ea90b8b1a7c5e8af42ab.jpg', 'jpg'),
(20, 2, '92a3860ea1ddcca1a3c406fe2d5cd697.jpg', 'jpg'),
(21, 2, '26a1490635de755df779181e3ee1c7c6.jpg', 'jpg'),
(22, 2, '9efd65372f06dd81c1c68b20e9f72f4f.jpg', 'jpg'),
(23, 2, '11a4457a49cd878dea5a7164a722cde3.jpg', 'jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_foto`
--

CREATE TABLE `ref_foto` (
  `kode_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_foto`
--

INSERT INTO `ref_foto` (`kode_kategori`, `nama_kategori`) VALUES
(1, 'Produk'),
(2, 'Kegiatan'),
(3, 'Orang/Pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nama_user` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nama_user`, `password`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`kode_foto`),
  ADD KEY `kode_kategori` (`kode_kategori`);

--
-- Indeks untuk tabel `ref_foto`
--
ALTER TABLE `ref_foto`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nama_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `kode_foto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `ref_foto`
--
ALTER TABLE `ref_foto`
  MODIFY `kode_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `ref_foto` (`kode_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
