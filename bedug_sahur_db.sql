-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Feb 2026 pada 11.48
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bedug_sahur_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `id_peserta` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` enum('Hadir','Tidak') NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `id_peserta`, `tanggal`, `status`, `keterangan`) VALUES
(4, 8, '2026-02-22', 'Hadir', ''),
(5, 5, '2026-02-22', 'Hadir', ''),
(6, 14, '2026-02-22', 'Hadir', ''),
(7, 17, '2026-02-22', 'Hadir', ''),
(8, 21, '2026-02-22', 'Hadir', ''),
(9, 11, '2026-02-22', 'Hadir', ''),
(10, 12, '2026-02-22', 'Hadir', ''),
(11, 3, '2026-02-22', 'Hadir', ''),
(12, 1, '2026-02-22', 'Hadir', ''),
(13, 4, '2026-02-22', 'Hadir', ''),
(14, 18, '2026-02-22', 'Hadir', ''),
(15, 15, '2026-02-22', 'Hadir', ''),
(16, 9, '2026-02-22', 'Hadir', ''),
(17, 22, '2026-02-22', 'Hadir', ''),
(18, 6, '2026-02-22', 'Hadir', ''),
(19, 10, '2026-02-22', 'Hadir', ''),
(20, 16, '2026-02-22', 'Hadir', ''),
(21, 2, '2026-02-22', 'Hadir', ''),
(22, 20, '2026-02-22', 'Hadir', ''),
(23, 13, '2026-02-22', 'Hadir', ''),
(24, 7, '2026-02-22', 'Hadir', ''),
(25, 19, '2026-02-22', 'Hadir', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `kelompok` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id`, `nama`, `kelompok`, `keterangan`) VALUES
(1, 'Fatur Rahman', 'RT 03', 'Panitia'),
(2, 'patrik', 'Rt 04', ''),
(3, 'Bahar', 'Rt 03', ''),
(4, 'Gelar', 'Rt 03', ''),
(5, 'ali abang', 'Rt 03', ''),
(6, 'kevin', 'RT 04', ''),
(7, 'Ulwan Rafi', 'RT 01', ''),
(8, 'Aka apong', 'RT 04', ''),
(9, 'Iwan', 'RT 02', ''),
(10, 'Kobi', 'RT 03', ''),
(11, 'Bagas ', 'RT 04', ''),
(12, 'Bagus', 'RT 04', ''),
(13, 'Salas', 'RT 02', ''),
(14, 'Arul', 'RT 03', ''),
(15, 'Gosin', 'RT03', ''),
(16, 'Obi', 'RT 04', ''),
(17, 'Ateng', 'RT 02', ''),
(18, 'Gibran', 'RT 02', ''),
(19, 'Zeky', 'RT 03', ''),
(20, 'Pian', 'RT 02', ''),
(21, 'Babang ', 'RT 03', ''),
(22, 'Jiban', 'RT 02', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'panitia', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
