-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2018 at 03:22 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `initials` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` int(4) NOT NULL,
  `firstname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminon` int(1) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`initials`, `pin`, `firstname`, `lastname`, `email`, `adminon`, `ID`) VALUES
('AS', 3882, 'Anders', 'Stevns', 'andersstevns@gmail.com', 0, 5),
('JB', 6228, 'Jonas', 'Blendstrup', 'jonasblendstrup@gmail.com', 1, 13),
('DH', 2195, 'Danyos', 'Huynh', 'danyos@gmail.com', 0, 3),
('MA', 3560, 'Marcus', 'Andersen', 'marcusandersen@live.dk', 0, 18),
('AT', 9338, 'Andreas', 'Troldborg', 'andreastroldborg@gmail.com', 0, 6),
('RE', 1234, 'Rune', 'Ettrup', 'rune@lanteamnord.dk', 1, 17),
('DS', 3375, 'Dennis', 'Sk&oslash;dt', 'dennisskoedt@gmail.com', 0, 11),
('DA', 7092, 'Dennis', 'Au', 'dennisau@gmail.com', 0, 12),
('TP', 1234, 'Test', 'Person', 'testperson@test.com', 0, 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
