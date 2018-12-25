-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2018 at 08:50 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `pie`
--

CREATE TABLE `pie` (
  `roll` int(11) NOT NULL,
  `pointer` float(10,5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pie`
--

INSERT INTO `pie` (`roll`, `pointer`) VALUES
(1, 7.80000),
(2, 9.40000),
(3, 6.70000),
(4, 5.90000),
(5, 7.90000),
(6, 8.20000),
(7, 6.28000),
(8, 8.53000),
(9, 9.01000),
(10, 7.20000),
(11, 8.10000),
(12, 9.50000),
(13, 8.10000),
(14, 7.63000),
(15, 8.29000),
(16, 9.11000),
(17, 8.40000),
(18, 6.10000),
(19, 7.88000),
(20, 8.93000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pie`
--
ALTER TABLE `pie`
  ADD PRIMARY KEY (`roll`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
