-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2022 at 07:38 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_rsudbpjs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `role` enum('admin','super_admin') NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`, `role`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Amed', 'super_admin'),
(4, 'biasa', '428d0e7a73d305245da72e307ae51e57', 'Udin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `aktivasi_pasien`
--

CREATE TABLE `aktivasi_pasien` (
  `id_aktivasi` varchar(50) NOT NULL,
  `keterangan` enum('Teraktivasi','Belum Teraktivasi') NOT NULL,
  `tgl_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_aktivasi` date DEFAULT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aktivasi_pasien`
--

INSERT INTO `aktivasi_pasien` (`id_aktivasi`, `keterangan`, `tgl_insert`, `tgl_aktivasi`, `id_admin`) VALUES
('aktv-620a47f994206', 'Teraktivasi', '2022-02-14 06:32:15', '2022-02-16', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `nik` char(25) NOT NULL,
  `no_rmk` int(20) NOT NULL,
  `nama_pasien` varchar(200) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(25) NOT NULL,
  `telepon` char(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('pasien') NOT NULL DEFAULT 'pasien',
  `id_aktivasi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`nik`, `no_rmk`, `nama_pasien`, `jk`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `agama`, `telepon`, `email`, `role`, `id_aktivasi`) VALUES
('6371042510990010', 12345, 'Azmi Fadillah', 'Laki-Laki', 'BANJARMASIN', '1999-10-25', 'Kuin Utara', 'Islam', '085654786069', 'azmifadillah25@gmail.com', 'pasien', 'aktv-620a47f994206');

-- --------------------------------------------------------

--
-- Table structure for table `pembatalan`
--

CREATE TABLE `pembatalan` (
  `id_batal` int(11) NOT NULL,
  `id_tujuan` int(50) NOT NULL,
  `alasan_batal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembatalan`
--

INSERT INTO `pembatalan` (`id_batal`, `id_tujuan`, `alasan_batal`) VALUES
(10, 13, 'Koler dah'),
(11, 14, 'siplah'),
(12, 16, 'rest in peace'),
(13, 18, 'Pa ae'),
(14, 21, 'Humblezing'),
(15, 6, 'ADA KESIBUKAN');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id_poli` int(11) NOT NULL,
  `nama_poli` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id_poli`, `nama_poli`) VALUES
(1, 'Anak'),
(2, 'Anastesi'),
(3, 'Bedah'),
(4, 'Psikologi Khusus / Autisme'),
(5, 'Bedah Syaraf'),
(6, 'Bedah Toraks Kardiak dan Vaskular (BTKV)'),
(7, 'Bedah Urologi'),
(8, 'DOTS (TB Paru)'),
(9, 'Geriatri (Lansia)'),
(10, 'Gigi - Mulut'),
(11, 'Gizi'),
(12, 'Jantung'),
(13, 'Kandungan'),
(14, 'Kaki Diabetik'),
(15, 'Kesuburan'),
(16, 'Kulit - Kelamin'),
(17, 'Mata'),
(18, 'Ortopedi'),
(19, 'Penyakit Dalam');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `no_rmk` int(20) NOT NULL,
  `jenis_pasien` enum('Umum','BPJS') NOT NULL,
  `no_bpjs` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`no_rmk`, `jenis_pasien`, `no_bpjs`) VALUES
(1, 'BPJS', '00110011'),
(25, 'BPJS', '190621'),
(312, 'BPJS', '00312002'),
(11211, 'BPJS', '123'),
(12345, 'BPJS', '231345');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan_berobat`
--

CREATE TABLE `tujuan_berobat` (
  `id_tujuan` int(50) NOT NULL,
  `nik` char(25) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `tgl_tujuan` date NOT NULL,
  `id_poli` int(11) NOT NULL,
  `id_verif` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tujuan_berobat`
--

INSERT INTO `tujuan_berobat` (`id_tujuan`, `nik`, `bukti`, `tgl_tujuan`, `id_poli`, `id_verif`) VALUES
(6, '6371042510990010', 'Realistic-gold-crown-vector-PNG.png', '2022-02-22', 15, NULL),
(7, '6371042510990010', 'original.jpg', '2022-02-17', 17, 'ver-620c5a5eacd65');

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi_rawat`
--

CREATE TABLE `verifikasi_rawat` (
  `id_verif` varchar(50) NOT NULL,
  `status` enum('Layak','Tidak Layak','Menunggu') NOT NULL DEFAULT 'Menunggu',
  `alasan_tolak` text,
  `kode_booking` varchar(15) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verifikasi_rawat`
--

INSERT INTO `verifikasi_rawat` (`id_verif`, `status`, `alasan_tolak`, `kode_booking`, `id_admin`) VALUES
('ver-620c5a5eacd65', 'Menunggu', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `aktivasi_pasien`
--
ALTER TABLE `aktivasi_pasien`
  ADD PRIMARY KEY (`id_aktivasi`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `no_rmk` (`no_rmk`),
  ADD KEY `id_aktivasi` (`id_aktivasi`);

--
-- Indexes for table `pembatalan`
--
ALTER TABLE `pembatalan`
  ADD PRIMARY KEY (`id_batal`),
  ADD KEY `id_tujuan` (`id_tujuan`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`no_rmk`);

--
-- Indexes for table `tujuan_berobat`
--
ALTER TABLE `tujuan_berobat`
  ADD PRIMARY KEY (`id_tujuan`),
  ADD KEY `no_rmk` (`nik`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_verif` (`id_verif`);

--
-- Indexes for table `verifikasi_rawat`
--
ALTER TABLE `verifikasi_rawat`
  ADD PRIMARY KEY (`id_verif`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembatalan`
--
ALTER TABLE `pembatalan`
  MODIFY `id_batal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tujuan_berobat`
--
ALTER TABLE `tujuan_berobat`
  MODIFY `id_tujuan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktivasi_pasien`
--
ALTER TABLE `aktivasi_pasien`
  ADD CONSTRAINT `aktivasi_pasien_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`no_rmk`) REFERENCES `rekam_medis` (`no_rmk`),
  ADD CONSTRAINT `pasien_ibfk_2` FOREIGN KEY (`id_aktivasi`) REFERENCES `aktivasi_pasien` (`id_aktivasi`);

--
-- Constraints for table `tujuan_berobat`
--
ALTER TABLE `tujuan_berobat`
  ADD CONSTRAINT `tujuan_berobat_ibfk_1` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`),
  ADD CONSTRAINT `tujuan_berobat_ibfk_2` FOREIGN KEY (`id_verif`) REFERENCES `verifikasi_rawat` (`id_verif`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `verifikasi_rawat`
--
ALTER TABLE `verifikasi_rawat`
  ADD CONSTRAINT `verifikasi_rawat_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
