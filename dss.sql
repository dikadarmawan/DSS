-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2019 at 03:47 AM
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_parameter`
--
ALTER TABLE `tbl_parameter`
  MODIFY `id_parameter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pembobotan`
--
ALTER TABLE `tbl_pembobotan`
  MODIFY `id_pembobotan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pembobotan`
--
ALTER TABLE `tbl_pembobotan`
  ADD CONSTRAINT `tbl_pembobotan_ibfk_1` FOREIGN KEY (`parameterX`) REFERENCES `tbl_parameter` (`id_parameter`),
  ADD CONSTRAINT `tbl_pembobotan_ibfk_2` FOREIGN KEY (`parameterY`) REFERENCES `tbl_parameter` (`id_parameter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
