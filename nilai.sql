-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2018 at 11:49 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nilai`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `level`, `log`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', '123', 'admin', '2018-01-20 02:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(10) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `r_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama`, `email`, `nip`, `jenis_kelamin`, `foto`, `username`, `password`, `r_pass`) VALUES
(5, 'Emil Shaer Omzell', 'c20ad4d76f', '13182334242342341', 'L', 'nama1518460656.jpg', 'pasta gigi', 'c20ad4d76fe97759aa27a0c99bff6710', '12');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `ket` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `ket`) VALUES
(3, 'A', '10'),
(4, 'B', '10');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mata_pelajaran` int(5) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `id_kelas` varchar(100) NOT NULL,
  `id_guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mata_pelajaran`, `kode`, `nama_mapel`, `semester`, `id_kelas`, `id_guru`) VALUES
(1, '1122', 'Teknik Analogikal Komputer ', '2', '3', '1'),
(2, '1555', 'Teknik Analogikal Komputer ', '2', '4', '5'),
(3, '1515', 'KIMIA', '2', '3', '1'),
(4, '12', 'Listrik Dinamis', '2', '4', '1'),
(5, '12', 'Kimia', '2', '4', '5'),
(6, '12', 'Ilmu Kealamiahan Dasar', '2', '4', '5');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(5) NOT NULL,
  `ket_nilai` varchar(100) NOT NULL,
  `id_mata_pelajaran` varchar(30) NOT NULL,
  `nilai` varchar(30) NOT NULL,
  `id_siswa` int(30) NOT NULL,
  `id_guru` varchar(30) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `status` enum('belum','sudah','','') NOT NULL,
  `nu` varchar(50) NOT NULL,
  `nj` varchar(50) NOT NULL,
  `nt` varchar(50) NOT NULL,
  `kkm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `ket_nilai`, `id_mata_pelajaran`, `nilai`, `id_siswa`, `id_guru`, `semester`, `id_kelas`, `status`, `nu`, `nj`, `nt`, `kkm`) VALUES
(1, 'Gagal', '2', '10.25', 7, '5', '2', 4, 'belum', '13', '15', '13', '13'),
(2, 'Gagal', '5', '9', 7, '5', '2', 4, 'belum', '12', '12', '12', '12'),
(4, 'Gagal', '6', '9', 7, '5', '2', 4, 'belum', '12', '12', '12', '12'),
(5, 'Gagal', '5', '9', 7, '5', '2', 4, 'belum', '12', '12', '12', '12'),
(6, 'Gagal', '5', '9', 7, '5', '2', 4, 'belum', '12', '12', '12', '12'),
(7, 'Gagal', '5', '9', 7, '5', '2', 4, 'belum', '12', '12', '12', '12');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(5) NOT NULL,
  `nama_s` varchar(30) NOT NULL,
  `nisn` varchar(30) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `nama_orang_tua` varchar(30) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_s`, `nisn`, `jk`, `nama_orang_tua`, `foto`, `kelas`, `semester`) VALUES
(7, 'Ismarianto', '121', 'L', 'eo', 'nama1518370169.jpg', '3', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mata_pelajaran`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mata_pelajaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
