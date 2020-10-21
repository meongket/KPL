-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2019 at 05:24 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siladek`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nip` varchar(100) NOT NULL,
  `id_lab` int(11) NOT NULL,
  `nama` varchar(5000) NOT NULL,
  `email` varchar(5000) NOT NULL,
  `no_tlp` varchar(1000) NOT NULL,
  `foto` varchar(5000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nip`, `id_lab`, `nama`, `email`, `no_tlp`, `foto`, `password`, `status`) VALUES
('123456', 1, 'Juju Juwita, STP', 'JujuJuwita@gmail.com', '02465789', '', 'oke', 'Aktif'),
('23456789', 2, 'Isna Mar’ah, S.Pd.Kim.', 'IsnaMarah@gmail.com', '0897653498', '', 'siap', 'Aktif'),
('345678', 3, 'Ir. Raharjo', 'RaharjoIr@gmail.com', '0987654937628', '', 'oke', 'Aktif'),
('456789', 4, 'Dian Saraswati, A.Md.', 'Dian.Saraswati@gmail.com', '09876549376567', '', 'siyap', 'Aktif'),
('56789123', 5, 'Sri Harjanto, S.T.', 'Sri_Harjanto@gmail.com', '08123456782', '', 'oke', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id_alat` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `id_lab` int(11) NOT NULL,
  `nama_alat` varchar(5000) NOT NULL,
  `ukuran` varchar(1000) NOT NULL,
  `merk` varchar(5000) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ket` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`id_alat`, `jenis`, `id_lab`, `nama_alat`, `ukuran`, `merk`, `jumlah`, `ket`) VALUES
(3456, 'alat', 3, 'Erlenmeyer', '50 ml', 'Pyrex', 15, ''),
(23456, 'alat', 1, 'PH Meter', '', 'SCHOTT', 20, '');

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` int(11) NOT NULL,
  `id_lab` int(11) NOT NULL,
  `katalog` varchar(1000) NOT NULL,
  `nama_bahan` varchar(5000) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ket` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `id_lab`, `katalog`, `nama_bahan`, `satuan`, `jumlah`, `ket`) VALUES
(1234567, 1, 'ANB234', 'DPPH\r\n', 'mg', 6, 'Free Radikal'),
(1234568, 4, 'ANB456', 'Hydrochloric acid ', 'lt', 3, 'fuming 37 %, p.a'),
(1234569, 5, 'ANB453', 'Potassium chloride', 'kg', 1, 'p.a');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id_lab` int(11) NOT NULL,
  `nama_lab` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id_lab`, `nama_lab`, `status`) VALUES
(1, 'Kimia Organik', 'Aktif'),
(2, 'Kimia Anorganik', 'Aktif'),
(3, 'Kimia Fisik', 'Aktif'),
(4, 'Kimia Analitik', 'Aktif'),
(5, 'Biokimia', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `luar_kimia`
--

CREATE TABLE `luar_kimia` (
  `id_user` varchar(100) NOT NULL,
  `nama` varchar(5000) NOT NULL,
  `ket` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `luar_kimia`
--

INSERT INTO `luar_kimia` (`id_user`, `nama`, `ket`) VALUES
('24010314130110', 'Yayas', 'NIM'),
('3175020110950002', 'Onky Octa', 'KTP');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(100) NOT NULL,
  `id_lab` int(11) DEFAULT NULL,
  `nama` varchar(5000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `status` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `id_lab`, `nama`, `password`, `angkatan`, `status`) VALUES
('24010012831417', 1, 'Alexia Rosenboim', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010055342752', 1, 'Valaria Bellini', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010111624649', 1, 'Edyth Brewitt', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010173171524', 1, 'Dot Camilli', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010203267591', 1, 'Alfy Ackhurst', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010263414353', 1, 'Marianna Hassan', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010294686177', 1, 'Riordan Cramer', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010314120003', 1, 'Garfianto', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010314120004', 1, 'four', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010314120005', 1, 'five', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010314120006', 1, 'enam', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010314120014', 1, 'wiladhianty', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010314120015', 1, 'anggit gusti', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010314120044', 1, 'Kevin Sanjaya', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010314120045', 1, 'Muhammad Ahsan', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010314120054', 1, 'Aditia Prasetio', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010314120057', 1, 'Rizal Muhammad', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010314170001', 1, 'Yasmin', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010386668795', 1, 'Edita Heaphy', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010479835217', 1, 'Binny Tschierse', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010514795352', 1, 'Remus Bruineman', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010596886241', 1, 'Berenice Kindleysides', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010613694201', 1, 'Brodie Dumphry', 'd7a177f21ffe82e7e101e54a32ab622e', 2017, 'Aktif'),
('24010614130015', 1, 'dmasimdosnon', 'd3929736139e504aeac9aa576f3e1d4f', 2017, 'Aktif'),
('24030115120003', 1, 'AGRICCIA PANGESTICA SAPUTRY', '', 2015, 'Lulus'),
('24030117120048', 4, 'AISYAH YULIANI', '', 2017, 'Aktif'),
('24030117130054', 2, 'Ade Arkhamuddin', '', 2017, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pakai_bahan`
--

CREATE TABLE `pakai_bahan` (
  `id_pakai` int(11) NOT NULL,
  `waktu_pakai` date NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `ukuran_pakai` int(11) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `keg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_alat`
--

CREATE TABLE `pinjam_alat` (
  `id_pinjam` int(11) NOT NULL,
  `waktu_pinjam` datetime NOT NULL,
  `jenis` varchar(1000) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `keg` varchar(1000) NOT NULL,
  `ket` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `waktu_kembali` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_lab` (`id_lab`);

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`),
  ADD KEY `id_lab` (`id_lab`);

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`),
  ADD KEY `id_lab` (`id_lab`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `luar_kimia`
--
ALTER TABLE `luar_kimia`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_lab` (`id_lab`);

--
-- Indexes for table `pakai_bahan`
--
ALTER TABLE `pakai_bahan`
  ADD PRIMARY KEY (`id_pakai`),
  ADD KEY `id_bahan` (`id_bahan`,`nim`),
  ADD KEY `fk_pakai_mhs` (`nim`);

--
-- Indexes for table `pinjam_alat`
--
ALTER TABLE `pinjam_alat`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_barang` (`id_alat`,`nim`),
  ADD KEY `fk_pinjam_mhs` (`nim`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`id_lab`) REFERENCES `lab` (`id_lab`);

--
-- Constraints for table `alat`
--
ALTER TABLE `alat`
  ADD CONSTRAINT `fk_alat` FOREIGN KEY (`id_lab`) REFERENCES `lab` (`id_lab`);

--
-- Constraints for table `bahan`
--
ALTER TABLE `bahan`
  ADD CONSTRAINT `fk_bahan` FOREIGN KEY (`id_lab`) REFERENCES `lab` (`id_lab`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_mahasiswa` FOREIGN KEY (`id_lab`) REFERENCES `lab` (`id_lab`);

--
-- Constraints for table `pakai_bahan`
--
ALTER TABLE `pakai_bahan`
  ADD CONSTRAINT `fk_pakai_bahan` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`),
  ADD CONSTRAINT `fk_pakai_luar` FOREIGN KEY (`nim`) REFERENCES `luar_kimia` (`id_user`),
  ADD CONSTRAINT `fk_pakai_mhs` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `pinjam_alat`
--
ALTER TABLE `pinjam_alat`
  ADD CONSTRAINT `fk_pinjam_barang` FOREIGN KEY (`id_alat`) REFERENCES `alat` (`id_alat`),
  ADD CONSTRAINT `fk_pinjam_luar` FOREIGN KEY (`nim`) REFERENCES `luar_kimia` (`id_user`),
  ADD CONSTRAINT `fk_pinjam_mhs` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
