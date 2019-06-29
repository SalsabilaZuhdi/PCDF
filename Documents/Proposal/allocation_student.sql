-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2017 at 03:39 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `essms`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocation_student`
--

CREATE TABLE IF NOT EXISTS `allocation_student` (
  `ID` int(11) NOT NULL,
  `staffID` varchar(20) NOT NULL,
  `lecturerName` varchar(50) NOT NULL,
  `allocationWorkshop1` int(11) NOT NULL,
  `allocationWorkshop2` int(11) NOT NULL,
  `totalSuperviseeWorkshop1` int(11) NOT NULL,
  `totalSuperviseeWorkshop2` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `allocation_student`
--

INSERT INTO `allocation_student` (`ID`, `staffID`, `lecturerName`, `allocationWorkshop1`, `allocationWorkshop2`, `totalSuperviseeWorkshop1`, `totalSuperviseeWorkshop2`) VALUES
(1, '00077', 'Nazrulazhar Bin Bahaman', 1, 1, 0, 0),
(2, '00078', 'Mohd Fadzil Bin Zulkifli', 1, 1, 1, 0),
(3, '00079', 'Nor Mas Aina Md. Bohari', 1, 1, 0, 0),
(4, '00097', 'Safiza Suhana Binti Kamal Baharin', 1, 1, 0, 0),
(5, '00112', 'Ahmad Naim Bin Che Pee @ Cne Hanapi', 1, 1, 0, 0),
(6, '00120', 'Rosleen Abd. Samad', 1, 1, 0, 0),
(7, '00121', 'Norhaziah Binti Md Salleh', 1, 1, 0, 0),
(8, '00124', 'Nazreen Bin Abdullasim', 1, 1, 0, 0),
(9, '00132', 'Yahya Binti Ibrahim', 1, 1, 0, 0),
(10, '00171', 'Irda Binti Roslan', 1, 1, 0, 0),
(11, '00333', 'Maslita Binti Abd Aziz', 1, 1, 0, 0),
(12, '00431', 'Tarisa Makina Kintakaningrum', 1, 1, 0, 0),
(13, '00443', 'Othman Bin Mohd', 1, 1, 0, 0),
(14, '00444', 'Haniza Binti Nahar', 1, 1, 0, 0),
(15, '00621', 'Wan Sazli Nasaruddin Bin Saifudin', 1, 1, 0, 0),
(16, '00714', 'Mokhtar Bin Mohd Yusof', 1, 1, 0, 0),
(17, '00761', 'Ibrahim Bin Ahmad', 1, 1, 0, 0),
(18, '00921', 'Hamzah Asyrani Bin Sulaiman', 1, 1, 0, 0),
(19, '01212', 'Syahrul Bin Azhar', 1, 1, 0, 0),
(20, '01214', 'Nor Azman Bin Abu', 1, 1, 0, 0),
(21, '02124', 'Shahrul Badariah Binti Mat Sah', 1, 1, 0, 0),
(22, '03112', 'Zuraida Binti Abal Abas', 1, 1, 1, 0),
(23, '03127', 'Mohd Sanusi Bin Azmi', 1, 1, 0, 0),
(24, '03162', 'Erman Bin Hamid', 1, 1, 0, 0),
(25, '03240', 'Zaheera Zainal Bin Abidin', 1, 1, 0, 0),
(26, '03322', 'Shahdan Bin Md. Lani', 1, 1, 0, 0),
(27, '04127', 'Wan Sazli Nasaruddin Bin Safiuddin', 1, 1, 0, 0),
(28, '04142', 'Zarita Binti Mohd Kosnin', 1, 1, 0, 0),
(29, '04240', 'Mohd Zaki Bin Mas''ud', 1, 1, 0, 0),
(30, '05214', 'IG. Pramudya Ananta', 1, 1, 0, 0),
(31, '06214', 'Ahmad Fadzli Nizam Bin Abdul Rahman', 1, 1, 0, 0),
(32, '06421', 'Norazlin Binti Mohamed', 1, 1, 0, 0),
(33, '07241', 'Norzihani Binti Yusof', 1, 1, 0, 0),
(34, '07312', 'Abd. Samad Bin Hasan Basari', 1, 1, 0, 0),
(35, '08692', 'Mohd Rizuan Bin Baharon', 1, 1, 0, 0),
(36, '09212', 'Siti Nurul Mahluzah Binti Mohammad', 1, 1, 0, 0),
(37, '09287', 'Siti Rahayu Binti Selamat', 1, 1, 0, 0),
(38, '09421', 'Mohd Hafiz Bin Zakaria', 1, 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocation_student`
--
ALTER TABLE `allocation_student`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocation_student`
--
ALTER TABLE `allocation_student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
