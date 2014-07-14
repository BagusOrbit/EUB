-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 12 Jul 2014 pada 10.53
-- Versi Server: 5.6.12-log
-- Versi PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `eub`
--
CREATE DATABASE IF NOT EXISTS `eub` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `eub`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_dosen` varchar(20) NOT NULL,
  `nama_dosen` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `kode_dosen`, `nama_dosen`) VALUES
(1, 'D001', 'ali'),
(2, 'D002', 'jony');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_jawaban`
--

CREATE TABLE IF NOT EXISTS `hasil_jawaban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jawaban` int(11) NOT NULL,
  `soal` varchar(20) NOT NULL,
  `jawaban` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=177 ;

--
-- Dumping data untuk tabel `hasil_jawaban`
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
(152, 76, '6 ', '2'),
(153, 77, '1 ', '2'),
(154, 77, '2 ', '3'),
(155, 77, '3 ', '3'),
(156, 77, '4 ', '1'),
(157, 77, '5 ', '1'),
(158, 77, '6 ', '2'),
(159, 78, '1 ', '2'),
(160, 78, '2 ', '3'),
(161, 78, '3 ', '3'),
(162, 78, '4 ', '2'),
(163, 78, '5 ', '1'),
(164, 78, '6 ', '2'),
(165, 79, '1 ', '1'),
(166, 79, '2 ', '2'),
(167, 79, '3 ', '2'),
(168, 79, '4 ', '2'),
(169, 79, '5 ', '2'),
(170, 79, '6 ', '2'),
(171, 80, '1 ', '2'),
(172, 80, '2 ', '2'),
(173, 80, '3 ', '2'),
(174, 80, '4 ', '2'),
(175, 80, '5 ', '2'),
(176, 80, '6 ', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE IF NOT EXISTS `jawaban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_user` varchar(20) NOT NULL,
  `kode_dosen` varchar(20) NOT NULL,
  `kode_makul` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`id`, `kode_user`, `kode_dosen`, `kode_makul`) VALUES
(73, 'u001', 'd001', 'm001'),
(74, 'u001', 'd002', 'm002'),
(75, 'u003', 'd001', 'm001'),
(76, 'u003', 'd002', 'm002'),
(77, 'u001', 'd001', 'm001'),
(78, 'u001', 'd002', 'm002'),
(79, 'u001', 'd001', 'm001'),
(80, 'u001', 'd002', 'm002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
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
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`id`, `kode_user`, `kode_makul`, `kode_dosen`, `semester`) VALUES
(1, 'u001', 'm001', 'd001', '3'),
(2, 'u001', 'm002', 'd002', '4'),
(3, 'u003', 'm001', 'd001', '2'),
(4, 'u003', 'm002', 'd002', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
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
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kode_makul`, `kode_dosen`, `nama_makul`, `sks`) VALUES
(1, 'm001', 'd001', 'Pemrograman', '2'),
(2, 'm002', 'd002', 'Visual Basic', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soal` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `soal`
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
-- Struktur dari tabel `users`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `kode_user`, `password`, `nama`, `fakultas`, `level`, `angkatan`, `foto`) VALUES
(1, 'u001', 'ee11cbb19052e40b07aac0ca060c23ee', 'user_test', 'Informatika komputer', '2', '2012', ''),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Staff', '1', '2012', ''),
(3, 'u003', 'ee11cbb19052e40b07aac0ca060c23ee', 'Deni Derimawan', 'Bussiness Administration', '2', '2010', ''),
(4, 'u004', 'ee11cbb19052e40b07aac0ca060c23ee', 'Andi Ari Asri', 'Computer Accounting', '2', '2012', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_hasil`
--
CREATE TABLE IF NOT EXISTS `vw_hasil` (
`id` int(11)
,`kode_dosen` varchar(20)
,`kode_jawaban` int(11)
,`jawaban` varchar(20)
,`subtotal` double
);
-- --------------------------------------------------------

--
-- Struktur untuk view `vw_hasil`
--
DROP TABLE IF EXISTS `vw_hasil`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_hasil` AS select `j`.`id` AS `id`,`j`.`kode_dosen` AS `kode_dosen`,`hj`.`kode_jawaban` AS `kode_jawaban`,`hj`.`jawaban` AS `jawaban`,sum(`hj`.`jawaban`) AS `subtotal` from (`jawaban` `j` join `hasil_jawaban` `hj` on((`j`.`id` = `hj`.`kode_jawaban`))) group by `hj`.`kode_jawaban`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
