-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2019 at 09:07 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project3`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `kelompok` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `kelompok`) VALUES
(1, 'X', 'RPL6');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `email`, `nohp`, `alamat`, `foto`, `username`, `password`, `id_kategori`) VALUES
(1, 'iksun', 'user@arkademy.com', '082221212121', 'jl. abcd', NULL, 'aby', '25d55ad283aa400af464c76d713c07ad', 1),
(3, 'anjay', 'anjay@gmail.com', '5326575', 'jl.a', NULL, 'aa', '4124bc0a9335c27f086f24ba207a4912', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `nama_prestasi` varchar(100) NOT NULL,
  `tingkat` varchar(100) NOT NULL,
  `juara` varchar(100) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id`, `nama_prestasi`, `tingkat`, `juara`, `id_siswa`) VALUES
(1, 'lomba coding', 'nasional', 'I', 1),
(2, 'lomba menulis', 'provinsi', 'II', 2);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama_siswa`, `tanggal_lahir`, `gender`, `alamat`, `id_kelas`) VALUES
(1, 'anjay', '2020-01-15', 'L', 'jl.abcdef', 1),
(2, 'saya', '2010-11-08', 'P', 'jl.abc', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kontak`
--
ALTER TABLE `kontak`
  ADD CONSTRAINT `kontak_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`);

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
