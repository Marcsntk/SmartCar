-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2017 at 01:09 PM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id333081_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `torque`
--

CREATE TABLE `torque` (
  `IDFile` int(11) NOT NULL,
  `Row` int(11) NOT NULL,
  `eMail` varchar(128) CHARACTER SET latin1 NOT NULL,
  `GPS_Time` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `Device_Time` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `Longitude` float NOT NULL,
  `Latitude` float NOT NULL,
  `GPS_Speed` float NOT NULL,
  `HDS` double NOT NULL,
  `Altitude` double NOT NULL,
  `Bearing` double NOT NULL,
  `Gx` double NOT NULL,
  `Gy` double NOT NULL,
  `Gz` double NOT NULL,
  `Gc` double NOT NULL,
  `Trip_Distance` double NOT NULL,
  `TripLpHKm` double NOT NULL,
  `LpHKm` double NOT NULL,
  `Fuel` float NOT NULL,
  `Engine_Temp` float NOT NULL,
  `Speed_OBD` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `eMail` varchar(128) CHARACTER SET latin1 NOT NULL,
  `Contrasena` varchar(32) CHARACTER SET latin1 NOT NULL,
  `Nombre` varchar(32) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `torque`
--
ALTER TABLE `torque`
  ADD PRIMARY KEY (`IDFile`,`Row`,`eMail`),
  ADD KEY `eMail` (`eMail`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`eMail`),
  ADD KEY `eMail` (`eMail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `torque`
--
ALTER TABLE `torque`
  MODIFY `IDFile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `torque`
--
ALTER TABLE `torque`
  ADD CONSTRAINT `torque_ibfk_1` FOREIGN KEY (`eMail`) REFERENCES `usuario` (`eMail`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
