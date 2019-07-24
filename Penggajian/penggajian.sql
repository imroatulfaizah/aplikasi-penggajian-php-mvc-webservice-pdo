-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2018 at 08:03 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE IF NOT EXISTS `bagian` (
  `kode_bagian` varchar(5) NOT NULL,
  `nama_bagian` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`kode_bagian`, `nama_bagian`) VALUES
('BAG1', 'produksi a'),
('BAG2', 'pemasaran'),
('BAG3', 'personalia'),
('BAG4', 'manager'),
('BAG5', 'Distribusi');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE IF NOT EXISTS `golongan` (
  `kode_golongan` varchar(5) NOT NULL,
  `gaji_pokok` double DEFAULT NULL,
  `tunjangan_golongan` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`kode_golongan`, `gaji_pokok`, `tunjangan_golongan`) VALUES
('GOL1', 250, 500000),
('GOL2', 3000000, 1000000),
('GOL3', 4000000, 1500000),
('GOL4', 5000000, 2000000),
('GOL5', 7000000, 600000);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `kode_jabatan` varchar(5) NOT NULL,
  `nama_jabatan` varchar(30) DEFAULT NULL,
  `tunjangan_jabatan` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kode_jabatan`, `nama_jabatan`, `tunjangan_jabatan`) VALUES
('A1', 'karyawan', 500000),
('A2', 'staff', 1000000),
('A3', 'wakil kepala', 2000000),
('A4', 'ketua', 3000000),
('A5', 'ketua a', 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `nik` varchar(15) NOT NULL,
  `nama_karyawan` varchar(50) DEFAULT NULL,
  `kode_jabatan` varchar(5) DEFAULT NULL,
  `kode_bagian` varchar(5) DEFAULT NULL,
  `kode_golongan` varchar(5) DEFAULT NULL,
  `alamat_karyawan` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama_karyawan`, `kode_jabatan`, `kode_bagian`, `kode_golongan`, `alamat_karyawan`, `no_hp`) VALUES
('KAR001', 'Imroatul faizah', 'A4', 'BAG4', 'GOL4', 'malang arema', '085755793699'),
('KAR002', 'Inggrid nindy', 'A1', 'BAG1', 'GOL1', 'jember', '087777789766'),
('KAR003', 'Sofia ivonaris', 'A2', 'BAG2', 'GOL2', 'malang', '087654325557'),
('KAR004', 'Alche Ngantak', 'A3', 'BAG3', 'GOL3', 'surabaya', '085798636789');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` varchar(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(70) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `foto`) VALUES
('1', 'faizah', '7aedeb3c0483c19498be5786acfb79df', 'unikama.png');

-- --------------------------------------------------------

--
-- Table structure for table `penggajian`
--

CREATE TABLE IF NOT EXISTS `penggajian` (
  `kode_gaji` varchar(10) NOT NULL,
  `absensi` varchar(10) DEFAULT NULL,
  `nik` varchar(15) DEFAULT NULL,
  `total_gaji` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penggajian`
--

INSERT INTO `penggajian` (`kode_gaji`, `absensi`, `nik`, `total_gaji`) VALUES
('002', '30', 'KAR003', 100);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewgaji3`
--
CREATE TABLE IF NOT EXISTS `viewgaji3` (
`tunjangan_jabatan` double
,`gaji_pokok` double
,`tunjangan_golongan` double
,`total_gaji` double
);
-- --------------------------------------------------------

--
-- Structure for view `viewgaji3`
--
DROP TABLE IF EXISTS `viewgaji3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewgaji3` AS select `jabatan`.`tunjangan_jabatan` AS `tunjangan_jabatan`,`golongan`.`gaji_pokok` AS `gaji_pokok`,`golongan`.`tunjangan_golongan` AS `tunjangan_golongan`,`total_gaji` AS `total_gaji` from ((`jabatan` join `golongan`) join `penggajian`) where ((`jabatan`.`kode_jabatan` = `golongan`.`kode_golongan`) or (`jabatan`.`kode_jabatan` = `total_gaji`));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
 ADD PRIMARY KEY (`kode_bagian`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
 ADD PRIMARY KEY (`kode_golongan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
 ADD PRIMARY KEY (`kode_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
 ADD PRIMARY KEY (`nik`), ADD KEY `kode_jabatan` (`kode_jabatan`), ADD KEY `kode_bagian` (`kode_bagian`), ADD KEY `kode_golongan` (`kode_golongan`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penggajian`
--
ALTER TABLE `penggajian`
 ADD PRIMARY KEY (`kode_gaji`), ADD KEY `nik` (`nik`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`kode_jabatan`) REFERENCES `jabatan` (`kode_jabatan`),
ADD CONSTRAINT `karyawan_ibfk_2` FOREIGN KEY (`kode_bagian`) REFERENCES `bagian` (`kode_bagian`),
ADD CONSTRAINT `karyawan_ibfk_3` FOREIGN KEY (`kode_golongan`) REFERENCES `golongan` (`kode_golongan`);

--
-- Constraints for table `penggajian`
--
ALTER TABLE `penggajian`
ADD CONSTRAINT `penggajian_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
