-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 06, 2014 at 04:38 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=153 ;

--
-- Dumping data for table `hasil_jawaban`
--

INSERT INTO `hasil_jawaban` (`id`, `kode_jawaban`, `soal`, `jawaban`) VALUES
(129, 73, '1 ', '1'),
(130, 73, '2 ', '1'),
(131, 73, '3 ', '2'),
(132, 73, '4 ', '2'),
(133, 73, '5 ', '2'),
(134, 73, '6 ', '2'),
(135, 74, '1 ', '2'),
(136, 74, '2 ', '2'),
(137, 74, '3 ', '2'),
(138, 74, '4 ', '3'),
(139, 74, '5 ', '2'),
(140, 74, '6 ', '3'),
(141, 75, '1 ', '1'),
(142, 75, '2 ', '2'),
(143, 75, '3 ', '3'),
(144, 75, '4 ', '2'),
(145, 75, '5 ', '3'),
(146, 75, '6 ', '1'),
(147, 76, '1 ', '3'),
(148, 76, '2 ', '1'),
(149, 76, '3 ', '2'),
(150, 76, '4 ', '2'),
(151, 76, '5 ', '2'),
(152, 76, '6 ', '2');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `kode_user`, `kode_dosen`, `kode_makul`) VALUES
(73, 'u001', 'd001', 'm001'),
(74, 'u001', 'd002', 'm002'),
(75, 'u003', 'd001', 'm001'),
(76, 'u003', 'd002', 'm002');

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
(3, 'u003', 'm001', 'd001', '2'),
(4, 'u003', 'm002', 'd002', '3');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `soal`) VALUES
(1, 'Apakah dosen Anda berpenampilan menarik ?'),
(2, 'Apakah dosen Anda selalu rapi ?'),
(3, 'Apakah dosen Anda sering menerima telepon saat mengajar ?'),
(4, 'Apakah dosen Anda merokok di kelas ?'),
(5, 'Apakah dosen Anda menggunakan lcd saat mengajar ?'),
(6, 'Apakah dosen Anda pernah masuk telat ?');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_user` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `fakultas` varchar(30) NOT NULL,
  `level` char(1) NOT NULL,
  `angkatan` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `kode_user`, `password`, `nama`, `fakultas`, `level`, `angkatan`, `foto`) VALUES
(1, 'u001', 'ee11cbb19052e40b07aac0ca060c23ee', 'user_test', 'Informatika komputer', '2', '2012', ''),
(2, 'u002', 'ee11cbb19052e40b07aac0ca060c23ee', 'admin', 'Staff', '1', '2012', ''),
(3, 'u003', 'ee11cbb19052e40b07aac0ca060c23ee', 'Deni Derimawan', 'Bussiness Administration', '2', '2010', ''),
(4, 'u004', 'ee11cbb19052e40b07aac0ca060c23ee', 'Andi Ari Asri', 'Computer Accounting', '2', '2012', ''),
(5, 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 'pimpinan', 'Direktur', '3', '2010', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
