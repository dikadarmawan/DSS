-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2019 at 09:57 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dss`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parameter`
--

CREATE TABLE `tbl_parameter` (
  `id_parameter` int(11) NOT NULL,
  `parameter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_parameter`
--

INSERT INTO `tbl_parameter` (`id_parameter`, `parameter`) VALUES
(3, 'Penghasilan'),
(4, 'Tanggungan'),
(5, 'Kondisi Rumah'),
(6, 'Aset Kendaraan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembobotan`
--

CREATE TABLE `tbl_pembobotan` (
  `id_pembobotan` int(11) NOT NULL,
  `parameterX` int(11) NOT NULL,
  `parameterY` int(11) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembobotan`
--

INSERT INTO `tbl_pembobotan` (`id_pembobotan`, `parameterX`, `parameterY`, `bobot`) VALUES
(1, 3, 3, 1),
(2, 5, 5, 1),
(3, 6, 4, 0.2),
(4, 4, 4, 1),
(5, 6, 6, 1),
(6, 5, 3, 0.2),
(7, 3, 5, 5),
(8, 4, 6, 5),
(9, 3, 4, 3),
(10, 3, 6, 7),
(11, 4, 3, 0.333333),
(12, 5, 4, 0.333333),
(13, 4, 5, 3),
(14, 5, 6, 3),
(15, 6, 3, 0.142857),
(16, 6, 5, 0.333333);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftar`
--

CREATE TABLE `tbl_pendaftar` (
  `id_pendaftar` int(11) NOT NULL,
  `nama_pendaftar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pendaftar`
--

INSERT INTO `tbl_pendaftar` (`id_pendaftar`, `nama_pendaftar`) VALUES
(2, 'krisna'),
(3, 'dika'),
(4, 'widi'),
(5, 'surya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ranking`
--

CREATE TABLE `tbl_ranking` (
  `id_ranking` int(11) NOT NULL,
  `id_pendaftar` int(11) NOT NULL,
  `id_parameter` int(11) NOT NULL,
  `bobot_pendaftar` int(11) NOT NULL,
  `tertulis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ranking`
--

INSERT INTO `tbl_ranking` (`id_ranking`, `id_pendaftar`, `id_parameter`, `bobot_pendaftar`, `tertulis`) VALUES
(65, 2, 3, 3, '2100000'),
(66, 2, 4, 3, '4'),
(67, 2, 5, 1, 'layak'),
(68, 2, 6, 3, 'mobil'),
(69, 3, 3, 4, '1700000'),
(70, 3, 4, 3, '3'),
(71, 3, 5, 3, 'cukup layak huni'),
(72, 3, 6, 3, 'motor'),
(73, 4, 3, 3, '2300000'),
(74, 4, 4, 5, '5'),
(75, 4, 5, 3, 'tidak layak'),
(76, 4, 6, 3, 'tidak memiliki'),
(77, 5, 3, 4, '1300000'),
(78, 5, 4, 1, '1'),
(79, 5, 5, 3, 'layak'),
(80, 5, 6, 3, 'mobil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_parameter`
--
ALTER TABLE `tbl_parameter`
  ADD PRIMARY KEY (`id_parameter`);

--
-- Indexes for table `tbl_pembobotan`
--
ALTER TABLE `tbl_pembobotan`
  ADD PRIMARY KEY (`id_pembobotan`),
  ADD KEY `parameterX` (`parameterX`,`parameterY`),
  ADD KEY `parameterY` (`parameterY`);

--
-- Indexes for table `tbl_pendaftar`
--
ALTER TABLE `tbl_pendaftar`
  ADD PRIMARY KEY (`id_pendaftar`);

--
-- Indexes for table `tbl_ranking`
--
ALTER TABLE `tbl_ranking`
  ADD PRIMARY KEY (`id_ranking`),
  ADD KEY `id_pendaftar` (`id_pendaftar`,`id_parameter`),
  ADD KEY `id_parameter` (`id_parameter`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_parameter`
--
ALTER TABLE `tbl_parameter`
  MODIFY `id_parameter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_pembobotan`
--
ALTER TABLE `tbl_pembobotan`
  MODIFY `id_pembobotan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_pendaftar`
--
ALTER TABLE `tbl_pendaftar`
  MODIFY `id_pendaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_ranking`
--
ALTER TABLE `tbl_ranking`
  MODIFY `id_ranking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pembobotan`
--
ALTER TABLE `tbl_pembobotan`
  ADD CONSTRAINT `tbl_pembobotan_ibfk_1` FOREIGN KEY (`parameterX`) REFERENCES `tbl_parameter` (`id_parameter`),
  ADD CONSTRAINT `tbl_pembobotan_ibfk_2` FOREIGN KEY (`parameterY`) REFERENCES `tbl_parameter` (`id_parameter`);

--
-- Constraints for table `tbl_ranking`
--
ALTER TABLE `tbl_ranking`
  ADD CONSTRAINT `tbl_ranking_ibfk_1` FOREIGN KEY (`id_pendaftar`) REFERENCES `tbl_pendaftar` (`id_pendaftar`),
  ADD CONSTRAINT `tbl_ranking_ibfk_2` FOREIGN KEY (`id_parameter`) REFERENCES `tbl_parameter` (`id_parameter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
