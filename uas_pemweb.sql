-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Des 2023 pada 23.26
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: uas_pemweb
--

-- --------------------------------------------------------

--
-- Struktur dari tabel admin
--

CREATE TABLE admin (
  id int(11) NOT NULL,
  nama varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  username varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  password varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel admin
--

INSERT INTO admin (id, nama, username, password) VALUES
(1, 'uti', 'uti1', '6C7CA345F63F835CB353FF15BD6C5E052EC08E7A'),
(2, 'uti', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Struktur dari tabel ``
--

CREATE TABLE data_mahasiswa (
  id int(255) NOT NULL,
  nama varchar(255) NOT NULL,
  program_studi varchar(255) NOT NULL,
  angkatan varchar(255) NOT NULL,
  jenis_kelamin varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel data_mahasiswa
--

INSERT INTO data_mahasiswa (id, nama, program_studi, angkatan, jenis_kelamin) VALUES
(1, 'Putri Manurung', 'Teknologi Informatika', '2021', 'Perempuan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel admin
--
ALTER TABLE admin
  ADD PRIMARY KEY (id);

--
-- Indeks untuk tabel akreditasi
--
ALTER TABLE data_mahasiswa
  ADD PRIMARY KEY (id);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel admin
--
ALTER TABLE admin
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel data_mahasiswa
--
ALTER TABLE data_mahasiswa
  MODIFY id int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;