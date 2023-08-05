-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 11:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `kode` varchar(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `penghasilan` int(11) NOT NULL,
  `sekolah` int(11) NOT NULL,
  `lansia` int(11) NOT NULL,
  `hamil` varchar(10) NOT NULL,
  `disabilitas` varchar(10) NOT NULL,
  `dtks` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `kode`, `nama`, `penghasilan`, `sekolah`, `lansia`, `hamil`, `disabilitas`, `dtks`) VALUES
(127, 'A00001', 'Alternatif 1', 1500000, 2, 1, 'Ya', 'Tidak', 'Ya'),
(128, 'A00002', 'Alternatif 2', 800000, 2, 1, 'Tidak', 'Ya', 'Ya'),
(129, 'A00003', 'Alternatif 3', 500000, 1, 0, 'Ya', 'Ya', 'Ya'),
(130, 'A00004', 'Alternatif 4', 750000, 4, 1, 'Tidak', 'Ya', 'Ya'),
(131, 'A00005', 'Alternatif 5', 900000, 0, 2, 'Ya', 'Tidak', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `distance_score`
--

CREATE TABLE `distance_score` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `c1` float NOT NULL,
  `c2` float NOT NULL,
  `c3` float NOT NULL,
  `c4` float NOT NULL,
  `c5` float NOT NULL,
  `c6` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distance_score`
--

INSERT INTO `distance_score` (`id`, `kode`, `nama`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`) VALUES
(1, 'A00001', 'Alternatif 1', 3.9791, 2.2774, 3, 3.3019, 4.7631, 4.9529),
(2, 'A00002', 'Alternatif 2', 2.4101, 2.2774, 3, 4.2647, 4.0514, 4.9529),
(3, 'A00003', 'Alternatif 3', 1, 3.3019, 4.2358, 3.3019, 4.0514, 4.9529),
(4, 'A00004', 'Alternatif 4', 2.4101, 1.651, 3, 4.2647, 4.0514, 4.9529),
(5, 'A00005', 'Alternatif 5', 2.4101, 4.0514, 2.4101, 3.3019, 4.7631, 4.9529);

-- --------------------------------------------------------

--
-- Table structure for table `konversi`
--

CREATE TABLE `konversi` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `c5` int(11) NOT NULL,
  `c6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konversi`
--

INSERT INTO `konversi` (`id`, `kode`, `nama`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`) VALUES
(1, 'A00001', 'Alternatif 1', 1, 3, 2, 1, 0, 1),
(2, 'A00002', 'Alternatif 2', 2, 3, 2, 0, 1, 1),
(3, 'A00003', 'Alternatif 3', 3, 2, 1, 1, 1, 1),
(4, 'A00004', 'Alternatif 4', 2, 5, 2, 0, 1, 1),
(5, 'A00005', 'Alternatif 5', 2, 1, 3, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode`, `nama`, `bobot`) VALUES
(1, 'C1', 'Jumlah Penghasilan per Bulan', 0.3),
(2, 'C2', 'Jumlah Anak Usia Sekolah', 0.2),
(3, 'C3', 'Jumlah Lansia', 0.1),
(4, 'C4', 'Terdapat Ibu Hamil', 0.2),
(5, 'C5', 'Terdapat Penyandang Disabilitas', 0.15),
(6, 'C6', 'Terdaftar dalam DTKS', 0.05);

-- --------------------------------------------------------

--
-- Table structure for table `normalisasi`
--

CREATE TABLE `normalisasi` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `c1` float NOT NULL,
  `c2` float NOT NULL,
  `c3` float NOT NULL,
  `c4` float NOT NULL,
  `c5` float NOT NULL,
  `c6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `normalisasi`
--

INSERT INTO `normalisasi` (`id`, `kode`, `nama`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`) VALUES
(1, 'A00001', 'Alternatif 1', 5, 2.5, 3, 2, 4.5, 3),
(2, 'A00002', 'Alternatif 2', 3, 2.5, 3, 4.5, 2, 3),
(3, 'A00003', 'Alternatif 3', 1, 4, 5, 2, 2, 3),
(4, 'A00004', 'Alternatif 4', 3, 1, 3, 4.5, 2, 3),
(5, 'A00005', 'Alternatif 5', 3, 5, 1, 2, 4.5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `n_preferensi`
--

CREATE TABLE `n_preferensi` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `n_preferensi`
--

INSERT INTO `n_preferensi` (`id`, `kode`, `nama`, `nilai`) VALUES
(1, 'A00001', 'Alternatif 1', 3.5717),
(2, 'A00002', 'Alternatif 2', 3.1868),
(3, 'A00003', 'Alternatif 3', 2.8997),
(4, 'A00004', 'Alternatif 4', 3.0615),
(5, 'A00005', 'Alternatif 5', 3.3968);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'qwerty12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distance_score`
--
ALTER TABLE `distance_score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konversi`
--
ALTER TABLE `konversi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `normalisasi`
--
ALTER TABLE `normalisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `n_preferensi`
--
ALTER TABLE `n_preferensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `distance_score`
--
ALTER TABLE `distance_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `konversi`
--
ALTER TABLE `konversi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `normalisasi`
--
ALTER TABLE `normalisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `n_preferensi`
--
ALTER TABLE `n_preferensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
