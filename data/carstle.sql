-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 02, 2023 at 03:32 AM
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
-- Database: `carstle`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `ID` int(11) NOT NULL,
  `updateDay` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`ID`, `updateDay`, `name`, `manufacturer`, `year`, `description`) VALUES
(1, '2023-07-19', '1995-Mitsubishi-3000GT-Spyder-VR-4', 'Mitsubishi', 1995, 'The Mitsubishi 3000GT is a front-engine, all-wheel/front-wheel drive grand touring/sports car manufactured and marketed by Mitsubishi from 1990 until 2000 over three different generations.\n(From Wikipedia)'),
(2, '2023-07-20', '1990-Mercedes-Benz-420SEL', 'Mercedes-Benz', 1990, 'update later'),
(3, '2023-07-20', '2016-Porsche-Panamera-4S', 'Porsche', 2016, 'The Porsche Panamera is a mid/full-sized luxury car (E-segment or F-segment for LWB in Europe) manufactured and marketed by German automobile manufacturer Porsche[1][2][3] across two generations using a front-engine, rear or all-wheel drive configuration\r\n(From Wikipedia)'),
(4, '2023-07-21', '2011-Mercedes-Benz-SLS-AMG', 'Mercedes-Benz', 2011, 'The Mercedes-Benz SLS AMG (C197 / R197) is a front mid-engine, 2-seater, limited production grand tourer developed by the Mercedes-AMG division of German automotive manufacturer Mercedes-Benz, with the assistance of David Coulthard.[4] The car is the successor to the Mercedes-Benz SLR McLaren and was described by Mercedes-Benz as a spiritual successor to the Mercedes-Benz 300SL Gullwing, mainly because it was inspired by the latter.[5] SLS stands for \"Super Leicht Sport\" (Super Light Sport)\r\n(From Wikipedia)');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `ID` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`ID`, `firstName`, `lastName`, `email`, `date`, `message`) VALUES
(1, 'Ernest', 'lin', 'test@gmail.com', '2023-07-25', 'test'),
(2, '', 'lin', '', '2023-07-26', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
