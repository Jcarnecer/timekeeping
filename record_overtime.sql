-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2017 at 08:45 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timekeeping_sirjun`
--

-- --------------------------------------------------------

--
-- Table structure for table `record_overtime`
--

CREATE TABLE `record_overtime` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `overtime_date` date NOT NULL,
  `date_submitted` date DEFAULT NULL,
  `ot_hours` varchar(20) DEFAULT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record_overtime`
--

INSERT INTO `record_overtime` (`id`, `user_id`, `reason`, `start`, `end`, `overtime_date`, `date_submitted`, `ot_hours`, `status`) VALUES
(19, 2, 'Will Play Tomb Raider', '17:30:00', '20:00:00', '2017-10-06', '2017-10-05', '3', 0),
(20, 2, 'I Need Money :\'(', '17:30:00', '20:00:00', '2017-10-09', '2017-10-05', '3', 1),
(21, 2, 'Will Play Overwatch And Eat', '17:30:00', '21:00:00', '2017-10-11', '2017-10-05', '4', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `record_overtime`
--
ALTER TABLE `record_overtime`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `record_overtime`
--
ALTER TABLE `record_overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
