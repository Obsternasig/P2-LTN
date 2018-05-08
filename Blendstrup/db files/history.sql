-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2018 at 03:19 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4ndy_dk`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `ID` int(12) NOT NULL,
  `time` date NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serialnb` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`ID`, `time`, `name`, `event`, `serialnb`) VALUES
(1, '2018-05-07', 'Jonas Blendstrup', 'edit', '576872'),
(2, '2018-05-07', 'Jonas Blendstrup', 'add', '555674'),
(3, '2018-05-07', 'Danyos Huynh', 'edit', '163146'),
(4, '2018-05-07', 'Ukendt', 'edit', '163146'),
(5, '2018-05-07', 'Ukendt', 'edit', '576872'),
(6, '2018-05-08', 'Ukendt', 'edit', '576872'),
(7, '2018-05-08', 'Jonas Blendstrup', 'edit', '576872'),
(8, '2018-05-08', 'Jonas Blendstrup', 'add', '867352'),
(9, '2018-05-08', 'Jonas Blendstrup', 'edit', '444525'),
(10, '2018-05-08', 'Jonas Blendstrup', 'edit', '444525'),
(11, '2018-05-08', 'Jonas Blendstrup', 'edit', '444525'),
(12, '2018-05-08', 'Jonas Blendstrup', 'edit', '444525'),
(13, '2018-05-08', 'Jonas Blendstrup', 'edit', '163146'),
(14, '2018-05-08', 'Jonas Blendstrup', 'edit', '163146'),
(15, '2018-05-08', 'Anders Stevns', 'edit', '576872');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
