-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2016 at 11:41 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `registerkesenian`
--
CREATE DATABASE IF NOT EXISTS `registerkesenian` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `registerkesenian`;

-- --------------------------------------------------------

--
-- Table structure for table `advis`
--

CREATE TABLE IF NOT EXISTS `advis` (
  `no` int(255) NOT NULL AUTO_INCREMENT,
  `foto` varchar(200) NOT NULL,
  `tanggal` varchar(200) NOT NULL,
  `nik` varchar(200) NOT NULL,
  `noadvis` varchar(200) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `acara` varchar(300) NOT NULL,
  `waktu` varchar(200) NOT NULL,
  `tempat` varchar(200) NOT NULL,
  `sektor` varchar(100) NOT NULL,
  `camat` varchar(100) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `nik` (`nik`),
  KEY `nik_2` (`nik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `advis`
--

INSERT INTO `advis` (`no`, `foto`, `tanggal`, `nik`, `noadvis`, `nama`, `acara`, `waktu`, `tempat`, `sektor`, `camat`) VALUES
(1, '', '16-12-2015', '1234/1/1234', '20145/1/1234', 'Rivan Cahya', 'mati', '17 December 2015 - 09:30', 'mojootoo', 'Mojoroto', 'Mojoroto');

-- --------------------------------------------------------

--
-- Table structure for table `camat`
--

CREATE TABLE IF NOT EXISTS `camat` (
  `no` int(200) NOT NULL AUTO_INCREMENT,
  `sektor` varchar(200) NOT NULL,
  `camat` varchar(200) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `camat`
--

INSERT INTO `camat` (`no`, `sektor`, `camat`) VALUES
(6, 'Kayen Kidul', 'Papar'),
(7, 'Gampengrejo', 'Ngasem'),
(8, 'Badas', 'Badas'),
(9, 'Tarokan', 'Klereng'),
(10, 'Mojoroto', 'Mojoroto');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `no` int(20) NOT NULL AUTO_INCREMENT,
  `foto` varchar(12) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenisk` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`no`, `foto`, `namalengkap`, `alamat`, `jenisk`, `username`, `password`) VALUES
(1, 'Helmy.png', 'Helmy Kurniawan', 'Ds.Putih Kec.Gampeng Rejo', 'LakiLaki', 'admin', 'admin'),
(2, 'logo .png', 'helmy kurniawan', '', 'LakiLaki', 'helmy', 'payamuri');

-- --------------------------------------------------------

--
-- Table structure for table `nomor`
--

CREATE TABLE IF NOT EXISTS `nomor` (
  `no` int(200) NOT NULL AUTO_INCREMENT,
  `norekom` varchar(200) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nomor`
--

INSERT INTO `nomor` (`no`, `norekom`) VALUES
(1, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `nomor1`
--

CREATE TABLE IF NOT EXISTS `nomor1` (
  `no` int(200) NOT NULL AUTO_INCREMENT,
  `rekom` varchar(200) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nomor1`
--

INSERT INTO `nomor1` (`no`, `rekom`) VALUES
(1, '20145');

-- --------------------------------------------------------

--
-- Table structure for table `rekom`
--

CREATE TABLE IF NOT EXISTS `rekom` (
  `no` int(200) NOT NULL AUTO_INCREMENT,
  `foto` varchar(200) NOT NULL,
  `norekom` varchar(50) NOT NULL,
  `nik` varchar(200) NOT NULL,
  `tanggal` varchar(200) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `namaorga` varchar(200) NOT NULL,
  `alamat` varchar(90) NOT NULL,
  `tempat` varchar(90) NOT NULL,
  `resort` varchar(70) NOT NULL,
  `kadin` varchar(90) NOT NULL,
  `waktu` varchar(90) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `nik` (`nik`),
  KEY `nik_2` (`nik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rekom`
--

INSERT INTO `rekom` (`no`, `foto`, `norekom`, `nik`, `tanggal`, `nama`, `namaorga`, `alamat`, `tempat`, `resort`, `kadin`, `waktu`) VALUES
(1, '', '1', '1234/1/1234', '16-12-2015', 'Rivan Cahya', ' Jaranan bantengan', 'Peh Wetan', 'mati', 'Mojoroto', 'Disbudpar Kota Kediri', '03 December 2015 - 08:30');

-- --------------------------------------------------------

--
-- Table structure for table `resort`
--

CREATE TABLE IF NOT EXISTS `resort` (
  `no` int(200) NOT NULL AUTO_INCREMENT,
  `resort` varchar(200) NOT NULL,
  `kadin` varchar(200) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `resort`
--

INSERT INTO `resort` (`no`, `resort`, `kadin`) VALUES
(7, 'Gampengrejo', 'DisbudParpora kab '),
(8, 'Nganjuk', 'Disbudpar Nganjuk'),
(9, 'Mojoroto', 'Disbudpar Kota Kediri'),
(10, 'Warujayeng', 'Disbudpar Nganjuk'),
(12, 'Blitar', 'Disbudpar Blitar');

-- --------------------------------------------------------

--
-- Table structure for table `seniman`
--

CREATE TABLE IF NOT EXISTS `seniman` (
  `no` int(255) NOT NULL AUTO_INCREMENT,
  `foto` varchar(200) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `namaorga` varchar(20) NOT NULL,
  `jmlanggota` varchar(200) NOT NULL,
  `nik` varchar(200) NOT NULL,
  `berlakuawal` varchar(90) NOT NULL,
  `berlakuakhir` varchar(90) NOT NULL,
  `status` varchar(90) NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `seniman`
--

INSERT INTO `seniman` (`no`, `foto`, `nama`, `telepon`, `alamat`, `namaorga`, `jmlanggota`, `nik`, `berlakuawal`, `berlakuakhir`, `status`) VALUES
(9, 'IMGP6305c.JPG', 'Rivan Cahya', '0878765655', 'Peh Wetan', ' Jaranan bantengan', '45', '1234/1/1234', '09-05-2014', '09-15-2017', 'Lama'),
(12, 'a. , . . . .jpg', 'Irma Fidya', '083343541245', 'Turus', 'Kuda Lumping', '12', '1234/2/1234', '10-09-2014', '09-16-2017', 'Lama'),
(13, 'IMG4846A.jpg', 'Nanda', '087823232234', 'Badas', 'Jaranan Anoman', '12', '1234/3/1234', '09-10-2013', '09-18-2017', 'Lama'),
(14, 'BONDAN.jpg', 'Hardha', '087867788', 'Gampengrejo', 'Kuda Lumping sri', '12', '1234/4/1234', '09-10-2014', '09-05-2017', 'Lama'),
(16, 'IMG0018B.JPG', 'Marcel', '08675784567', 'Kayen Kidul', 'Jaranan Mulyo', '13', '1234/5/1234', '09-10-2013', '09-16-2017', 'Baru'),
(21, 'b.jpg', 'Ki MuksoPati', '8868679879879', 'Papar Wetan', 'Tari Pembelah Bumi', '12', '1234/6/1234', '10-12-2015', '10-12-2018', 'Lama'),
(22, 'a.jpg', 'rocim', '67868678', 'putih gampeng', 'Tari Matian', '67', '1234/7/1234', '10-12-2013', '10-12-2019', 'Lama'),
(23, 'logo .png', 'sukinem', '7686868678', 'wates', 'tari kelulusan', '2212', '1234/8/1234', '10-12-2013', '10-12-2015', 'Lama'),
(24, 'foto0245_001.jpg', 'Sandi', '567577665', 'keranggan', 'kuda lumping satu', '67', '1234/9/1234', '10-12-2014', '10-12-2017', 'Lama'),
(25, 'DSC_8310.JPG', 'nyi rateh', '54646546', 'karanganyar', 'jaranan trio', '56', '1234/10/1234', '10-12-2014', '10-12-2016', 'Lama'),
(26, 'index.jpg', 'Helmy Kurniawan', '456457567658', 'Ds.Putih Kec.Gampeng', 'Jaranan Mukso', '12', '1234/11/1234', '05-01-2014', '29-01-2016', 'Lama'),
(27, '', 'Hengky Kurniawan', '546464', 'Purwokediri', 'Kuda Lumping', '12', '1234/12/1234', '05-01-2013', '29-01-2016', 'Lama'),
(28, '', 'Helmy Pelet', '34435345', 'Sukodoro', 'Tari Songgo Gunung', '45', '1234/14/1234', '05-01-2014', '29-01-2016', 'Lama');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advis`
--
ALTER TABLE `advis`
  ADD CONSTRAINT `advis_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `seniman` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekom`
--
ALTER TABLE `rekom`
  ADD CONSTRAINT `rekom_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `seniman` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
