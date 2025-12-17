-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 13 Des 2025 pada 03.30
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pwd2025`
--
CREATE DATABASE IF NOT EXISTS `db_pwd2025` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db_pwd2025`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tamu`
--
-- Pembuatan: 13 Des 2025 pada 03.20
--

CREATE TABLE `tbl_tamu` (
  `cid` int NOT NULL,
  `cnama` varchar(100) DEFAULT NULL,
  `cemail` varchar(100) DEFAULT NULL,
  `cpesan` text,
  `dcreated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_tamu`
--

INSERT INTO `tbl_tamu` (`cid`, `cnama`, `cemail`, `cpesan`, `dcreated_at`) VALUES
(1, 'Gibran', 'fufufafa@gmail.com', 'hidup jokowi hidup dinasti jokowi.\r\nhidup prabowo', '2025-12-13 09:43:35'),
(2, 'Richie Christian', 'riaricheesechristian@gmail.com', 'Name bai Christian tapi ukan Christian', '2025-12-13 09:43:35'),
(3, 'Dika Yansha', 'Dikahead123@gmail.com', 'Ayo makan diwarungnya dika yansha wkwkwkwkw', '2025-12-13 09:43:35'),
(4, 'Benyamin', 'kkk@gmail.com', 'Percobaan #1', '2025-12-13 09:43:35'),
(5, 'Kepin', 'LeonardKepin@gmail.com', 'Oppa gangnam star', '2025-12-13 09:43:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  MODIFY `cid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
