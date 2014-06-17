-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 17, 2014 at 11:08 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eub`
--
CREATE DATABASE IF NOT EXISTS `eub` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `eub`;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_dosen` varchar(20) NOT NULL,
  `nama_dosen` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `kode_dosen`, `nama_dosen`) VALUES
(1, 'd001', 'Tabah Setyo aji '),
(2, 'd002', 'Dhendra Maruto');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_jawaban`
--

CREATE TABLE IF NOT EXISTS `hasil_jawaban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jawaban` int(11) NOT NULL,
  `soal` varchar(20) NOT NULL,
  `jawaban` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `hasil_jawaban`
--

INSERT INTO `hasil_jawaban` (`id`, `kode_jawaban`, `soal`, `jawaban`) VALUES
(96, 59, '1 ', '1'),
(97, 59, '2 ', '2'),
(98, 59, '3 ', '2'),
(99, 59, '4 ', '3'),
(100, 59, '5 ', '1'),
(101, 59, '6 ', '3'),
(102, 60, '1 ', '3'),
(103, 60, '2 ', '1'),
(104, 60, '3 ', '2'),
(105, 60, '4 ', '3'),
(106, 60, '5 ', '2'),
(107, 60, '6 ', '1'),
(108, 61, '1 ', '3'),
(109, 62, '1 ', '1'),
(110, 62, '2 ', '2'),
(111, 62, '3 ', '3');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE IF NOT EXISTS `jawaban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_user` varchar(20) NOT NULL,
  `kode_dosen` varchar(20) NOT NULL,
  `kode_makul` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `kode_user`, `kode_dosen`, `kode_makul`) VALUES
(59, 'u001', 'd001', 'm001'),
(60, 'u001', 'd002', 'm002'),
(61, 'u001', 'd001', 'm001'),
(62, 'u001', 'd002', 'm002');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE IF NOT EXISTS `krs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_user` varchar(20) NOT NULL,
  `kode_makul` varchar(20) NOT NULL,
  `kode_dosen` varchar(20) NOT NULL,
  `semester` char(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id`, `kode_user`, `kode_makul`, `kode_dosen`, `semester`) VALUES
(1, 'u001', 'm001', 'd001', '3'),
(2, 'u001', 'm002', 'd002', '4'),
(3, 'u002', 'm001', 'd001', '2'),
(4, 'u002', 'm002', 'd002', '3');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE IF NOT EXISTS `matakuliah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_makul` varchar(20) NOT NULL,
  `kode_dosen` varchar(20) NOT NULL,
  `nama_makul` varchar(50) NOT NULL,
  `sks` char(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kode_makul`, `kode_dosen`, `nama_makul`, `sks`) VALUES
(1, 'm001', 'd001', 'Pemrograman', '2'),
(2, 'm002', 'd002', 'Visual Basic', '4');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soal` text NOT NULL,
  `pilihan1` varchar(20) NOT NULL,
  `pilihan2` varchar(20) NOT NULL,
  `pilihan3` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `soal`, `pilihan1`, `pilihan2`, `pilihan3`) VALUES
(1, 'Apakah dosen Anda berpenampilan menarik ?', 'ya', 'tidak', 'tidak tahu'),
(2, 'Apakah dosen Anda selalu rapi ?', 'ya', 'tidak', 'tidak tahu'),
(3, 'Apakah dosen Anda sering menerima telepon saat mengajar ?', 'ya', 'tidak', 'tidak tahu'),
(4, 'Apakah dosen Anda merokok di kelas ?', 'ya', 'tidak', 'tidak tahu'),
(5, 'Apakah dosen Anda menggunakan lcd saat mengajar ?', 'ya', 'tidak', 'tidak tahu'),
(6, 'Apakah dosen Anda pernah masuk telat ?', 'ya', 'tidak', 'tidak tahu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_user` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `fakultas` varchar(20) NOT NULL,
  `level` char(1) NOT NULL,
  `angkatan` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `kode_user`, `password`, `nama`, `fakultas`, `level`, `angkatan`, `foto`) VALUES
(1, 'u001', 'ee11cbb19052e40b07aac0ca060c23ee', 'user_test', 'Informatika komputer', '2', '2012', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
