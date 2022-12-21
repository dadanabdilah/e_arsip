-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 21, 2022 at 09:39 PM
-- Server version: 10.6.11-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip_primer`
--

CREATE TABLE `arsip_primer` (
  `id_primer` int(11) NOT NULL,
  `kode_primer` varchar(50) NOT NULL,
  `primer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arsip_primer`
--

INSERT INTO `arsip_primer` (`id_primer`, `kode_primer`, `primer`) VALUES
(14, 'KP', 'Kepegawaian');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_sekunder`
--

CREATE TABLE `arsip_sekunder` (
  `id_sekunder` int(11) NOT NULL,
  `kode_sekunder` varchar(50) NOT NULL,
  `sekunder` varchar(100) NOT NULL,
  `kode_primer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arsip_sekunder`
--

INSERT INTO `arsip_sekunder` (`id_sekunder`, `kode_sekunder`, `sekunder`, `kode_primer`) VALUES
(3, 'KP.00', 'Kepegawaian', 'KP');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_tersier`
--

CREATE TABLE `arsip_tersier` (
  `id_tersier` int(11) NOT NULL,
  `kode_tersier` varchar(50) NOT NULL,
  `tersier` varchar(100) NOT NULL,
  `kode_sekunder` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arsip_tersier`
--

INSERT INTO `arsip_tersier` (`id_tersier`, `kode_tersier`, `tersier`, `kode_sekunder`) VALUES
(3, 'KP.00.01', 'Lowongan Kerja', 'KP.00');

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `kode_bidang` varchar(10) NOT NULL,
  `nama_bidang` varchar(128) NOT NULL,
  `kontak` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `tgl_terima` date NOT NULL,
  `tingkat_keamanan` varchar(50) NOT NULL,
  `tgl_selesai` date NOT NULL,
  `id_sm` int(11) NOT NULL,
  `disposisi` varchar(100) NOT NULL,
  `status` enum('menunggu_diajukan','diajukan','selesai') NOT NULL,
  `id_bidang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_sk` int(11) NOT NULL,
  `tgl_sk` date NOT NULL,
  `no_sk` varchar(50) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `hubungan` varchar(50) NOT NULL,
  `kode_tersier` varchar(50) NOT NULL,
  `berkas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_sm` int(11) NOT NULL,
  `no_sm` varchar(50) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `lampiran` varchar(100) NOT NULL,
  `berkas` varchar(200) NOT NULL,
  `berkas_url` varchar(100) NOT NULL,
  `kode_tersier` varchar(50) NOT NULL,
  `tgl_sm` date NOT NULL,
  `tgl_diterima` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_sm`, `no_sm`, `id_unit`, `perihal`, `lampiran`, `berkas`, `berkas_url`, `kode_tersier`, `tgl_sm`, `tgl_diterima`) VALUES
(17, '1625615', 3, 'Perobaan Update', '2 Lampiran', 'Laporan Praktikum Modul 3 Sistem Operasi.pdf', 'assets/surat/KP/KP.00/KP.00.01', 'KP.00.01', '2022-12-22', '2022-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id_unit` int(11) NOT NULL,
  `kode_unit` varchar(50) NOT NULL,
  `nama_unit` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`id_unit`, `kode_unit`, `nama_unit`, `kontak`) VALUES
(2, 'SMKN1Kng', 'SMK Negeri 1 Kuningan', '085112345678'),
(3, 'SMKN3Kng', 'SMK Negeri 3 Kuningan', '01281938913');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip_primer`
--
ALTER TABLE `arsip_primer`
  ADD PRIMARY KEY (`id_primer`);

--
-- Indexes for table `arsip_sekunder`
--
ALTER TABLE `arsip_sekunder`
  ADD PRIMARY KEY (`id_sekunder`),
  ADD KEY `kode_primer` (`kode_primer`);

--
-- Indexes for table `arsip_tersier`
--
ALTER TABLE `arsip_tersier`
  ADD PRIMARY KEY (`id_tersier`),
  ADD KEY `kode_sekunder` (`kode_sekunder`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD KEY `id_sm` (`id_sm`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_sk`),
  ADD KEY `id_arsip` (`kode_tersier`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_sm`),
  ADD KEY `id_unit` (`id_unit`),
  ADD KEY `id_arsip` (`kode_tersier`),
  ADD KEY `kode_tersier` (`kode_tersier`);

--
-- Indexes for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id_unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsip_primer`
--
ALTER TABLE `arsip_primer`
  MODIFY `id_primer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `arsip_sekunder`
--
ALTER TABLE `arsip_sekunder`
  MODIFY `id_sekunder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `arsip_tersier`
--
ALTER TABLE `arsip_tersier`
  MODIFY `id_tersier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_sm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
