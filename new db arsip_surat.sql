-- Adminer 4.8.1 MySQL 10.6.11-MariaDB-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `arsip_primer`;
CREATE TABLE `arsip_primer` (
  `id_primer` int(11) NOT NULL AUTO_INCREMENT,
  `kode_primer` varchar(50) NOT NULL,
  `primer` varchar(100) NOT NULL,
  PRIMARY KEY (`id_primer`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `arsip_primer` (`id_primer`, `kode_primer`, `primer`) VALUES
(14,	'KP',	'Kepegawaian');

DROP TABLE IF EXISTS `arsip_sekunder`;
CREATE TABLE `arsip_sekunder` (
  `id_sekunder` int(11) NOT NULL AUTO_INCREMENT,
  `kode_sekunder` varchar(50) NOT NULL,
  `sekunder` varchar(100) NOT NULL,
  `kode_primer` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sekunder`),
  KEY `kode_primer` (`kode_primer`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `arsip_sekunder` (`id_sekunder`, `kode_sekunder`, `sekunder`, `kode_primer`) VALUES
(3,	'KP.00',	'Kepegawaian',	'KP');

DROP TABLE IF EXISTS `arsip_tersier`;
CREATE TABLE `arsip_tersier` (
  `id_tersier` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tersier` varchar(50) NOT NULL,
  `tersier` varchar(100) NOT NULL,
  `kode_sekunder` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tersier`),
  KEY `kode_sekunder` (`kode_sekunder`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `arsip_tersier` (`id_tersier`, `kode_tersier`, `tersier`, `kode_sekunder`) VALUES
(3,	'KP.00.01',	'Lowongan Kerja',	'KP.00');

DROP TABLE IF EXISTS `bidang`;
CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL AUTO_INCREMENT,
  `kode_bidang` varchar(10) NOT NULL,
  `nama_bidang` varchar(128) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  PRIMARY KEY (`id_bidang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `disposisi`;
CREATE TABLE `disposisi` (
  `id_disposisi` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_terima` date NOT NULL,
  `tingkat_keamanan` varchar(50) NOT NULL,
  `tgl_selesai` date NOT NULL,
  `id_sm` int(11) NOT NULL,
  `disposisi` varchar(100) NOT NULL,
  `status` enum('menunggu_diajukan','diajukan','selesai') NOT NULL,
  `id_bidang` int(11) NOT NULL,
  PRIMARY KEY (`id_disposisi`),
  KEY `id_sm` (`id_sm`),
  KEY `id_bidang` (`id_bidang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `surat_keluar`;
CREATE TABLE `surat_keluar` (
  `id_sk` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_sk` date NOT NULL,
  `no_sk` varchar(50) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `hubungan` varchar(50) NOT NULL,
  `kode_tersier` varchar(50) NOT NULL,
  `berkas` varchar(200) NOT NULL,
  `berkas_url` varchar(200) NOT NULL,
  PRIMARY KEY (`id_sk`),
  KEY `id_arsip` (`kode_tersier`),
  KEY `id_unit` (`id_unit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `surat_masuk`;
CREATE TABLE `surat_masuk` (
  `id_sm` int(11) NOT NULL AUTO_INCREMENT,
  `no_sm` varchar(50) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `lampiran` varchar(100) NOT NULL,
  `berkas` varchar(200) NOT NULL,
  `berkas_url` varchar(100) NOT NULL,
  `kode_tersier` varchar(50) NOT NULL,
  `tgl_sm` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  PRIMARY KEY (`id_sm`),
  KEY `id_unit` (`id_unit`),
  KEY `id_arsip` (`kode_tersier`),
  KEY `kode_tersier` (`kode_tersier`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `surat_masuk` (`id_sm`, `no_sm`, `id_unit`, `perihal`, `lampiran`, `berkas`, `berkas_url`, `kode_tersier`, `tgl_sm`, `tgl_diterima`) VALUES
(17,	'1625615',	3,	'Perobaan Update',	'2 Lampiran',	'Laporan Praktikum Modul 3 Sistem Operasi.pdf',	'assets/surat/KP/KP.00/KP.00.01',	'KP.00.01',	'2022-12-22',	'2022-12-08');

DROP TABLE IF EXISTS `unit_kerja`;
CREATE TABLE `unit_kerja` (
  `id_unit` int(11) NOT NULL AUTO_INCREMENT,
  `kode_unit` varchar(50) NOT NULL,
  `nama_unit` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `unit_kerja` (`id_unit`, `kode_unit`, `nama_unit`, `kontak`) VALUES
(2,	'SMKN1Kng',	'SMK Negeri 1 Kuningan',	'085112345678'),
(3,	'SMKN3Kng',	'SMK Negeri 3 Kuningan',	'01281938913');

-- 2022-12-22 08:36:56
