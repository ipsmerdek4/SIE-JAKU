-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Mar 2022 pada 05.21
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siejaku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_users`
--

DROP TABLE IF EXISTS `db_users`;
CREATE TABLE IF NOT EXISTS `db_users` ( 
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `db_users`
--

INSERT INTO `db_users` (`username`, `password`, `name`, `created_at`, `updated_at`) VALUES
('admin', '$2y$10$JICsy5OPjPv/.kyvNRkHP.XOVEOuw.W3qP0EfNFqEw29aJZqAOjjK', 'Admin', '2022-03-23 12:16:45', '2022-03-23 12:16:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `db_users`
--
ALTER TABLE `db_users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
