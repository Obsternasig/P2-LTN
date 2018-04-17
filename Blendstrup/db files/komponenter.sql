-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2018 at 01:56 PM
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
-- Table structure for table `komponenter`
--

CREATE TABLE `komponenter` (
  `ID` int(12) NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serialnb` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `away` int(4) NOT NULL,
  `broken` int(4) NOT NULL,
  `location` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ports` int(4) NOT NULL,
  `speed` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komponenter`
--

INSERT INTO `komponenter` (`ID`, `category`, `brand`, `serialnb`, `away`, `broken`, `location`, `comment`, `ports`, `speed`, `type`, `length`) VALUES
(24, 'Switch', 'HP', '542314', 0, 0, '', '', 48, '', '', ''),
(26, 'el-tavle', 'LTN', '576872', 0, 1, '', '', 0, '', '', ''),
(27, 'Netværkskabel', 'LTN', '894341', 1, 0, '', '', 0, '', '', ''),
(29, 'Ram-blok', 'Corsair', '116577', 0, 0, '', '', 0, '', '', ''),
(32, 'Switch', 'TP-link', '009537', 0, 1, '', '', 48, '', '', ''),
(33, 'processor', 'Intel', '174296', 0, 0, '', '', 0, '', '', ''),
(41, 'Switch', 'HP', '241242', 1, 0, '', '', 48, '', '', ''),
(42, 'Switch', 'HP', '962564', 0, 0, '', '', 48, '', '', ''),
(43, 'Switch', 'HP', '274895', 0, 0, '', '', 48, '', '', ''),
(44, 'el-tavle', 'LTN', '685856', 0, 0, '', '', 0, '', '', ''),
(45, 'el-tavle', 'LTN', '163146', 1, 1, '', '', 0, '', '', ''),
(48, 'Switch', 'TP-link', '996433', 0, 0, '', '', 48, '', '', ''),
(49, 'Netværkskabel', 'LTN', '475635', 0, 0, '', '', 0, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komponenter`
--
ALTER TABLE `komponenter`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komponenter`
--
ALTER TABLE `komponenter`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
