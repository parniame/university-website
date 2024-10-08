-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2024 at 06:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `ID` int(11) NOT NULL,
  `courseName` char(50) NOT NULL,
  `professorName` char(50) NOT NULL,
  `classDay` char(50) NOT NULL,
  `classTime` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID`, `courseName`, `professorName`, `classDay`, `classTime`) VALUES
(2, 'مبانی برنامه نویسی', 'دکتر فرزام متینفر', 'شنبه و دوشنبه', '10:00'),
(3, 'تاریخ امامت', 'دکتر  اکبر امامی', 'چهارشنبه', '10:30'),
(4, 'انقلاب اسلامی ایران', 'دکتر رحیم مصطفی زاده', 'چهارشنبه', '10:30'),
(10, 'مبانی برنامه نویسی شبکه', 'دکتر مرضیه اکبری', 'یکشنبه و سه شنبه', '13:00'),
(11, 'طراحی کامپایلر', 'دکتر ابرزاده', 'شنبه و دوشنبه', 'شنبه : 13:30 و \r\nدوشنبه : 10:30');

-- --------------------------------------------------------

--
-- Table structure for table `selectedcourse`
--

CREATE TABLE `selectedcourse` (
  `userName` char(50) NOT NULL,
  `ID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `selectedcourse`
--

INSERT INTO `selectedcourse` (`userName`, `ID`) VALUES
('kadoo', 2),
('kadoo', 3),
('mehidimeshki', 2),
('parniame', 2);

-- --------------------------------------------------------

--
-- Table structure for table `usersinformation`
--

CREATE TABLE `usersinformation` (
  `userName` varchar(50) NOT NULL,
  `firstName` char(50) DEFAULT NULL,
  `LastName` char(50) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `studentCode` char(50) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `password` char(50) NOT NULL DEFAULT '000',
  `IsAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usersinformation`
--

INSERT INTO `usersinformation` (`userName`, `firstName`, `LastName`, `birthDate`, `studentCode`, `email`, `password`, `IsAdmin`) VALUES
('admin', NULL, NULL, NULL, NULL, NULL, '000', 1),
('deli', 'دلشاد', ' علامه زاده', '2001-06-21', '9913130042', 'del@gmail.com', '555', 0),
('kadoo', 'کدو', 'کدویان', '2001-06-05', '9913130013', 'kadoo@gmail.com', 'kadoo', 0),
('mahansa', 'Mahan', 'Sahebdel', '2002-05-27', '9913130054', 'mahan.sa.usa@gmail.com', '222', 0),
('mehidimeshki', 'مهدی', 'مینایی', '2001-06-05', '9913131202', 'mehdi.minaee@gmail.com', '4575', 0),
('parniame', 'parnia', 'minayy', '2002-05-30', '9913130050', 'minaeeparnia@gmail.com', '111', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `courseName` (`courseName`,`professorName`);

--
-- Indexes for table `selectedcourse`
--
ALTER TABLE `selectedcourse`
  ADD PRIMARY KEY (`userName`,`ID`);

--
-- Indexes for table `usersinformation`
--
ALTER TABLE `usersinformation`
  ADD PRIMARY KEY (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
