-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Jul 2022 pada 12.00
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spr_kb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`username`, `nama`, `password`, `hak`) VALUES
('admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aturan`
--

CREATE TABLE `aturan` (
  `id_aturan` int(11) NOT NULL,
  `kode_kb` varchar(225) NOT NULL,
  `kode_keterangan` varchar(225) NOT NULL,
  `bobot` float NOT NULL,
  `tampung` float NOT NULL,
  `tampung_ada` float NOT NULL,
  `tampung_tidak_ada` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aturan`
--

INSERT INTO `aturan` (`id_aturan`, `kode_kb`, `kode_keterangan`, `bobot`, `tampung`, `tampung_ada`, `tampung_tidak_ada`) VALUES
(4, 'KBP', 'KRG20', 1, 1, 0, 0),
(5, 'KBP', 'LBH30', 0, 1, 0, 0),
(6, 'KBP', 'BA', 1, 1, 0, 0),
(8, 'KBP', '21T29', 0, 1, 0, 0),
(14, 'N', '21T29', 0, 1, 0, 0),
(15, 'N', 'BA', 0, 1, 0, 0),
(16, 'N', 'KRG20', 0, 1, 0, 0),
(17, 'N', 'LBH30', 1, 1, 0, 0),
(18, 'KBP', 'L', 0, 1, 0, 0),
(20, 'N', 'L', 0, 1, 0, 0),
(22, 'KBP', 'P', 1, 1.66667, 0.333333, 0.25),
(24, 'N', 'P', 1, 1.8, 0.5, 0.2),
(27, 'PO', '21T29', 0, 1, 0, 0),
(28, 'PO', 'BA', 1, 1, 0, 0),
(30, 'PO', 'KRG20', 1, 1, 0, 0),
(31, 'PO', 'L', 0, 1, 0, 0),
(32, 'PO', 'LBH30', 0, 1, 0, 0),
(33, 'PO', 'P', 1, 1.66667, 0.333333, 0.25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasus`
--

CREATE TABLE `kasus` (
  `id_kasus` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `kode_kb` varchar(225) NOT NULL,
  `umur` int(4) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal` date NOT NULL,
  `no_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kasus`
--

INSERT INTO `kasus` (`id_kasus`, `nama`, `jenis_kelamin`, `kode_kb`, `umur`, `alamat`, `tanggal`, `no_telepon`) VALUES
(32, 'admin', 'Perempuan', 'KBP', 12, 'cc', '2022-07-23', '089');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kb`
--

CREATE TABLE `kb` (
  `kode_kb` varchar(255) NOT NULL,
  `nama_kb` varchar(255) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kb`
--

INSERT INTO `kb` (`kode_kb`, `nama_kb`, `solusi`) VALUES
('KBP', 'KB Pil', 'Pil adalah obat pencegah kehamilan yang diminum.'),
('N', 'Norplan', ' Pilihan utama menggunakan norplan'),
('PO', 'Pil Oral', 'biar mudah di telan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan`
--

CREATE TABLE `keterangan` (
  `kode_keterangan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keterangan`
--

INSERT INTO `keterangan` (`kode_keterangan`, `keterangan`) VALUES
('21T29', 'Antara Umur 21 Tahun Sampai 29'),
('BA', 'Belum Mempunyai Anak'),
('KRG20', 'Umur Kurang Dari 20 Tahun'),
('L', 'Laki Laki'),
('LBH30', 'Lebih Dari 30 Tahun'),
('P', 'Perempuan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id_aturan`),
  ADD KEY `kode_kb` (`kode_kb`),
  ADD KEY `kode_keterangan` (`kode_keterangan`);

--
-- Indeks untuk tabel `kasus`
--
ALTER TABLE `kasus`
  ADD PRIMARY KEY (`id_kasus`),
  ADD KEY `kode_kb` (`kode_kb`);

--
-- Indeks untuk tabel `kb`
--
ALTER TABLE `kb`
  ADD PRIMARY KEY (`kode_kb`);

--
-- Indeks untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`kode_keterangan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id_aturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `kasus`
--
ALTER TABLE `kasus`
  MODIFY `id_kasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aturan`
--
ALTER TABLE `aturan`
  ADD CONSTRAINT `aturan_ibfk_1` FOREIGN KEY (`kode_kb`) REFERENCES `kb` (`kode_kb`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aturan_ibfk_2` FOREIGN KEY (`kode_keterangan`) REFERENCES `keterangan` (`kode_keterangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kasus`
--
ALTER TABLE `kasus`
  ADD CONSTRAINT `kasus_ibfk_1` FOREIGN KEY (`kode_kb`) REFERENCES `kb` (`kode_kb`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
