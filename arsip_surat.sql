-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 03:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `id_arsip` int(11) NOT NULL,
  `kode_arsip` varchar(50) NOT NULL,
  `nama_arsip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`id_arsip`, `kode_arsip`, `nama_arsip`) VALUES
(1, 'PM', 'Pemasaran Daring'),
(3, 'AK', 'Akuntansi'),
(4, 'AK', 'Akuntansi'),
(5, 'AK', 'Akuntansi'),
(6, 'AK', 'Akuntansi'),
(7, 'IT', 'Teknologi');

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
  `id_unit` int(11) NOT NULL
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
  `id_arsip` int(11) NOT NULL,
  `berkas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_sm` int(11) NOT NULL,
  `tgl_diterima` date NOT NULL,
  `tgl_sm` date NOT NULL,
  `no_sm` varchar(50) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `lampiran` varchar(100) NOT NULL,
  `id_arsip` int(11) NOT NULL,
  `berkas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_sm`, `tgl_diterima`, `tgl_sm`, `no_sm`, `perihal`, `id_unit`, `lampiran`, `id_arsip`, `berkas`) VALUES
(1, '2022-12-08', '2022-12-01', 'SM/2022', 'izin lapangan', 2, '2 lembar', 1, 'SE Surveilan Pemegang Sertifikat Thn 2022.pdf'),
(2, '2022-12-08', '2022-12-02', 'PM/2022/X', 'undangan rapat', 2, '2 lembar', 1, 'n'),
(3, '2022-12-08', '2022-12-03', 'SM/2022/X', 'undangan', 2, '2 lembar', 1, 'SE Surveilan Pemegang Sertifikat Thn 2022.pdf'),
(5, '2022-12-08', '2022-12-08', 'PM/2022/Xi', 'rapat', 2, '2 lembar', 1, ''),
(6, '2022-12-09', '2022-12-09', 'PM/2022/Xi', 'undangan rapat', 2, '2 lembar', 1, 'aqib.docx'),
(7, '2022-12-09', '2022-12-09', 'PM/2022/Xi', 'izin lapangan', 2, '2 lembar', 1, 'aqib1.docx'),
(8, '2022-12-09', '2022-12-09', 'PM/2022/Xi', 'undangan rapat', 2, '2 lembar', 1, ''),
(9, '2022-12-08', '2022-12-03', 'SM/2022/X', 'undangan', 2, '2 lembar', 1, ''),
(10, '2022-12-08', '2022-12-03', 'SM/2022/X', 'undangan', 2, '2 lembar', 1, ''),
(11, '2022-12-09', '2022-12-09', 'SM/2022', 'undangan', 2, '2 lembar', 1, 'SE Surveilan Pemegang Sertifikat Thn 2022.pdf'),
(12, '2022-12-09', '2022-12-09', 'SM/2022', 'undangan rapat', 2, '2 lembar', 1, 'SE Surveilan Pemegang Sertifikat Thn 2022.pdf');

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
(2, '01', 'SMKN 1 Kuningan', '085112345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD KEY `id_sm` (`id_sm`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_sk`),
  ADD KEY `id_arsip` (`id_arsip`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_sm`),
  ADD KEY `id_unit` (`id_unit`),
  ADD KEY `id_arsip` (`id_arsip`);

--
-- Indexes for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id_unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsip`
--
ALTER TABLE `arsip`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_sm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
