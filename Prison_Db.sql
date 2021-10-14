-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 16, 2019 at 05:30 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Prison_Db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Activity Log`
--

CREATE TABLE `Activity Log` (
  `ID` int(11) NOT NULL,
  `Activity` varchar(200) NOT NULL,
  `Personnel ID` varchar(30) NOT NULL,
  `Personnel Name` varchar(100) NOT NULL,
  `Time` varchar(40) NOT NULL,
  `Date` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Activity Log`
--

INSERT INTO `Activity Log` (`ID`, `Activity`, `Personnel ID`, `Personnel Name`, `Time`, `Date`) VALUES
(11, 'Logged out of the System', '1456', 'Liti  Irimiya', '3:06 pm', '15 December 2019'),
(12, 'Logged Into the System', '6029', 'Sarah Johnson', '3:06 pm', '15 December 2019'),
(13, 'Logged out of the System', '6029', 'Sarah Johnson', '3:06 pm', '15 December 2019'),
(14, 'Logged Into the System', '1456', 'Liti Irimiya', '3:06 pm', '15 December 2019'),
(15, 'Entered Advanced View Prisoner Page', '1456', 'Liti Irimiya', '3:12 pm', '15 December 2019'),
(16, 'Entered Advanced View Prisoner Page', '1456', 'Liti Irimiya', '3:12 pm', '15 December 2019'),
(17, 'Logged Into the System', '1456', 'Liti Irimiya', '3:12 pm', '15 December 2019'),
(18, 'Viewed Visitor Log Page', '1456', 'Liti Irimiya', '3:51 pm', '15 December 2019'),
(19, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '3:51 pm', '15 December 2019'),
(20, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '4:04 pm', '15 December 2019'),
(21, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '4:13 pm', '15 December 2019'),
(22, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '4:14 pm', '15 December 2019'),
(23, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '4:20 pm', '15 December 2019'),
(24, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '4:20 pm', '15 December 2019'),
(25, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '4:22 pm', '15 December 2019'),
(26, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '4:32 pm', '15 December 2019'),
(27, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '4:32 pm', '15 December 2019'),
(28, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '4:33 pm', '15 December 2019'),
(29, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '4:33 pm', '15 December 2019'),
(30, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '4:33 pm', '15 December 2019'),
(31, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '4:33 pm', '15 December 2019'),
(32, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '4:58 pm', '15 December 2019'),
(33, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '5:15 pm', '15 December 2019'),
(34, 'Checked Total Number of Available Cells', '1456', 'Liti Irimiya', '5:15 pm', '15 December 2019'),
(35, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '6:25 pm', '15 December 2019'),
(36, 'Logged out of the System', '1456', 'Liti Irimiya', '6:43 pm', '15 December 2019'),
(37, 'Entered Admin Home Page', '6029', 'Sarah Johnson', '6:47 pm', '15 December 2019'),
(38, 'Viewed Visitor Log Page', '6029', 'Sarah Johnson', '6:47 pm', '15 December 2019'),
(39, 'Entered Advanced View Prisoner Page', '6029', 'Sarah Johnson', '6:47 pm', '15 December 2019'),
(40, 'Entered View Personnels Page', '6029', 'Sarah Johnson', '6:48 pm', '15 December 2019'),
(41, 'Logged out of the System', '6029', 'Sarah Johnson', '6:48 pm', '15 December 2019'),
(42, 'Entered Admin Home Page', '1374', 'Frank Bulus Ajibade', '6:48 pm', '15 December 2019'),
(43, 'Checked Total Number of Available Cells', '1374', 'Frank Bulus Ajibade', '6:48 pm', '15 December 2019'),
(44, 'Logged out of the System', '1374', 'Frank Bulus Ajibade', '6:49 pm', '15 December 2019'),
(45, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '6:49 pm', '15 December 2019'),
(46, 'Approved Visit Request for Visitor 144848', '1456', 'Liti Irimiya', '6:50 pm', '15 December 2019'),
(47, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '6:50 pm', '15 December 2019'),
(48, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '6:51 pm', '15 December 2019'),
(49, 'Logged out of the System', '1456', 'Liti Irimiya', '6:51 pm', '15 December 2019'),
(50, 'Entered Admin Home Page', '', '', '7:11 pm', '15 December 2019'),
(51, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '7:12 pm', '15 December 2019'),
(52, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '7:12 pm', '15 December 2019'),
(53, 'Viewed Visitor Log Page', '1456', 'Liti Irimiya', '7:13 pm', '15 December 2019'),
(54, 'Checked Total Number of Available Cells', '1456', 'Liti Irimiya', '7:13 pm', '15 December 2019'),
(55, 'Entered Advanced View Prisoner Page', '1456', 'Liti Irimiya', '7:14 pm', '15 December 2019'),
(56, 'Entered View Personnels Page', '1456', 'Liti Irimiya', '7:14 pm', '15 December 2019'),
(57, 'Viewed Personnel History Page', '1456', 'Liti Irimiya', '7:15 pm', '15 December 2019'),
(58, 'Viewed Personnel History Page', '1456', 'Liti Irimiya', '8:10 pm', '15 December 2019'),
(59, 'Viewed Personnel History Page', '1456', 'Liti Irimiya', '9:10 pm', '15 December 2019'),
(60, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '12:29 pm', '16 December 2019'),
(61, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '12:58 pm', '16 December 2019'),
(62, 'Entered Admin Home Page', '1456', 'Liti Irimiya', '1:14 pm', '16 December 2019'),
(63, 'Logged out of the System', '1456', 'Liti Irimiya', '1:14 pm', '16 December 2019'),
(64, 'Added new Personnel Chris Enenche Enokela', '', '', '', ''),
(65, 'Changed Password', '9890', '  ', '', ''),
(66, 'Entered Admin Home Page', '9890', 'Chris Enenche Enokela', '3:25 pm', '16 December 2019'),
(67, 'Logged out of the System', '9890', 'Chris Enenche Enokela', '3:25 pm', '16 December 2019');

-- --------------------------------------------------------

--
-- Table structure for table `Cells`
--

CREATE TABLE `Cells` (
  `ID` int(11) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Total Cells` int(11) NOT NULL,
  `Free Cells` int(11) NOT NULL,
  `Occupied Cells` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Cells`
--

INSERT INTO `Cells` (`ID`, `Gender`, `Total Cells`, `Free Cells`, `Occupied Cells`) VALUES
(1, 'Males', 100, 100, 2),
(2, 'Females', 100, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Next of Kin`
--

CREATE TABLE `Next of Kin` (
  `UniqueID` varchar(20) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Phone Number` varchar(15) NOT NULL,
  `Email Address` varchar(150) NOT NULL,
  `No of Visits Left` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Next of Kin`
--

INSERT INTO `Next of Kin` (`UniqueID`, `Name`, `Phone Number`, `Email Address`, `No of Visits Left`) VALUES
('144848', 'Frank Japhet', '0705432189', 'denokela@gmail.com', 1),
('190507', 'Francis Ujukwu', '09078267198', 'benbun@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Personnel`
--

CREATE TABLE `Personnel` (
  `ID_No` varchar(4) NOT NULL,
  `First Name` varchar(100) NOT NULL,
  `Middle Name` varchar(100) NOT NULL,
  `Surname` varchar(100) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Phone Number` varchar(20) NOT NULL,
  `Email Address` varchar(200) NOT NULL,
  `Home Address` varchar(200) NOT NULL,
  `Position` varchar(200) NOT NULL,
  `Month Appointed` varchar(50) NOT NULL,
  `Year Appointed` varchar(50) NOT NULL,
  `Password` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `Clearance_Level` int(5) NOT NULL,
  `Photograph` text NOT NULL,
  `Reset Value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Personnel`
--

INSERT INTO `Personnel` (`ID_No`, `First Name`, `Middle Name`, `Surname`, `Gender`, `Phone Number`, `Email Address`, `Home Address`, `Position`, `Month Appointed`, `Year Appointed`, `Password`, `Clearance_Level`, `Photograph`, `Reset Value`) VALUES
('9890', 'Chris', 'Enenche', 'Enokela', 'Male', '08164773715', 'christopherenok@gmail.com', 'Mabera', 'Chief Security Officer', '12', '2019', 'quincy', 1, 'personnel/ChrisEnokela.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `Personnel History`
--

CREATE TABLE `Personnel History` (
  `ID` int(11) NOT NULL,
  `First Name` varchar(200) NOT NULL,
  `Middle Name` varchar(200) NOT NULL,
  `Surname` varchar(200) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Phone Number` varchar(20) NOT NULL,
  `Email Address` varchar(200) NOT NULL,
  `Home Address` text NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Retirement Mode` varchar(200) NOT NULL,
  `Month Appointed` varchar(20) NOT NULL,
  `Year Appointed` varchar(20) NOT NULL,
  `Month Retired` varchar(20) NOT NULL,
  `Year Retired` varchar(20) NOT NULL,
  `Photograph` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Personnel History`
--

INSERT INTO `Personnel History` (`ID`, `First Name`, `Middle Name`, `Surname`, `Gender`, `Phone Number`, `Email Address`, `Home Address`, `Position`, `Retirement Mode`, `Month Appointed`, `Year Appointed`, `Month Retired`, `Year Retired`, `Photograph`) VALUES
(1, 'David', '', 'Toison', 'Male', '07065298712', 'farikuyrset@yahoo.com', 'Gatingale 6 Drive Way', 'Junior Officer', 'Male', '12', '2019', '12', '2019', 'personnelHistory/DavidToison.png');

-- --------------------------------------------------------

--
-- Table structure for table `Prisonner History`
--

CREATE TABLE `Prisonner History` (
  `ID` int(11) NOT NULL,
  `First Name` varchar(100) NOT NULL,
  `Middle Name` varchar(100) NOT NULL,
  `Surname` varchar(100) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Marital Status` varchar(20) NOT NULL,
  `Home Address` text NOT NULL,
  `Next of Kin Name` varchar(300) NOT NULL,
  `Next of Kin Phone Number` varchar(20) NOT NULL,
  `Case Number` varchar(20) NOT NULL,
  `Day Entered` varchar(20) NOT NULL,
  `Month Entered` varchar(20) NOT NULL,
  `Year Entered` varchar(20) NOT NULL,
  `Release Day` varchar(20) NOT NULL,
  `Release Month` varchar(20) NOT NULL,
  `Release Year` varchar(20) NOT NULL,
  `Photograph` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Prisonner History`
--

INSERT INTO `Prisonner History` (`ID`, `First Name`, `Middle Name`, `Surname`, `Age`, `Gender`, `Marital Status`, `Home Address`, `Next of Kin Name`, `Next of Kin Phone Number`, `Case Number`, `Day Entered`, `Month Entered`, `Year Entered`, `Release Day`, `Release Month`, `Release Year`, `Photograph`) VALUES
(18, 'David', '', 'Steven', 23, 'Male', 'Married', 'UDUS', 'Isreal Oladimeji', '09065784321', '2341', '10', '12', '2019', '10', '12', '2019', 'history/DavidSteven.jpg'),
(19, 'David', '', 'Frank', 34, 'Male', 'Single', 'Mabera', 'Jones Steven', '07064411985', '9872', '10', '12', '2019', '10', '12', '2019', 'history/DavidFrank.png'),
(20, 'Haven', '', 'Dane', 18, 'Female', 'Single', 'Mabera, Behind Blue Crescent Schools. Sokoto', 'Fred Jones', '09028349298', '1231', '10', '12', '2019', '10', '12', '2019', 'history/HavenDane.png'),
(21, 'David', '', 'Stephen', 54, 'Male', 'Married', 'Mabera, Behind Blue Crescent Schools. Sokoto', 'Hansel Gretel', '07064411985', '5461', '10', '12', '2019', '10', '12', '2019', 'history/DavidStephen.jpg'),
(22, 'Gravity', '', 'Teail', 34, 'Male', 'Married', 'Mabera', 'Grace Johnsoner', '07064532181', '2134', '10', '12', '2019', '10', '12', '2019', 'history/GravityTeail.jpg'),
(23, 'Irimiya', '', 'Liti', 35, 'Male', 'Married', 'UDUS', 'Ben Bun', '09087654327', '2341', '12', '12', '2019', '12', '12', '2019', 'history/IrimiyaLiti.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Prisonners`
--

CREATE TABLE `Prisonners` (
  `Prisonners_ID` int(11) NOT NULL,
  `First Name` varchar(100) NOT NULL,
  `Middle Name` varchar(100) NOT NULL,
  `Surname` varchar(100) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Marital Status` varchar(20) NOT NULL,
  `Education Level` varchar(100) NOT NULL,
  `Home Address` text NOT NULL,
  `Next of Kin UniqueID` varchar(20) NOT NULL,
  `Case Number` varchar(20) NOT NULL,
  `Day Entered` varchar(10) NOT NULL,
  `Month Entered` varchar(10) NOT NULL,
  `Year Entered` varchar(10) NOT NULL,
  `Cell Number` varchar(20) NOT NULL,
  `Photograph` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Prisonners`
--

INSERT INTO `Prisonners` (`Prisonners_ID`, `First Name`, `Middle Name`, `Surname`, `Age`, `Gender`, `Marital Status`, `Education Level`, `Home Address`, `Next of Kin UniqueID`, `Case Number`, `Day Entered`, `Month Entered`, `Year Entered`, `Cell Number`, `Photograph`) VALUES
(1, 'Isreal', '', 'Japhet', 23, 'Male', 'Single', 'Tertiary', 'Usmanu Danfodiyo University Sokoto', '144848', '1456', '12', '12', '2019', 'M-61', 'uploads/IsrealJaphet.jpg'),
(2, 'Dantar', '', 'ChukwuEbuka', 32, 'Male', 'Single', 'Tertiary', 'Gatingale 6 Drive Way', '190507', '2131', '14', '12', '2019', 'M-87', 'uploads/DantarChukwuEbuka.png');

-- --------------------------------------------------------

--
-- Table structure for table `Report Links`
--

CREATE TABLE `Report Links` (
  `id` int(11) NOT NULL,
  `links` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Report Links`
--

INSERT INTO `Report Links` (`id`, `links`) VALUES
(3, '/opt/lampp/htdocs/projectLiti/reports/December2019.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `Visitor History`
--

CREATE TABLE `Visitor History` (
  `ID` int(11) NOT NULL,
  `Visitor Name` varchar(100) NOT NULL,
  `Prisoner Name` varchar(100) NOT NULL,
  `Date of Visit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Visitor History`
--

INSERT INTO `Visitor History` (`ID`, `Visitor Name`, `Prisoner Name`, `Date of Visit`) VALUES
(3, 'Frank Japhet', 'Isreal  Japhet', '12/19'),
(4, 'Francis Ujukwu', 'Dantar  ChukwuEbuka', '12/19');

-- --------------------------------------------------------

--
-- Table structure for table `Visitor Log`
--

CREATE TABLE `Visitor Log` (
  `ID` int(11) NOT NULL,
  `Visitor ID` varchar(200) NOT NULL,
  `Visitor Name` varchar(200) NOT NULL,
  `Prisoner ID` varchar(20) NOT NULL,
  `Prisoner Name` varchar(200) NOT NULL,
  `Visit Day` varchar(100) NOT NULL,
  `Date of Request` varchar(200) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Visitor Log`
--

INSERT INTO `Visitor Log` (`ID`, `Visitor ID`, `Visitor Name`, `Prisoner ID`, `Prisoner Name`, `Visit Day`, `Date of Request`, `Status`) VALUES
(8, '190507', 'Francis Ujukwu', '2', 'Dantar  ChukwuEbuka', 'Sunday', '12/19', 'Approved'),
(9, '144848', 'Frank Japhet', '1', 'Isreal  Japhet', 'Saturday', '12/19', 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Activity Log`
--
ALTER TABLE `Activity Log`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Cells`
--
ALTER TABLE `Cells`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Next of Kin`
--
ALTER TABLE `Next of Kin`
  ADD PRIMARY KEY (`UniqueID`);

--
-- Indexes for table `Personnel`
--
ALTER TABLE `Personnel`
  ADD PRIMARY KEY (`ID_No`);

--
-- Indexes for table `Personnel History`
--
ALTER TABLE `Personnel History`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Prisonner History`
--
ALTER TABLE `Prisonner History`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Prisonners`
--
ALTER TABLE `Prisonners`
  ADD PRIMARY KEY (`Prisonners_ID`),
  ADD UNIQUE KEY `Next of Kin UniqueID` (`Next of Kin UniqueID`);

--
-- Indexes for table `Report Links`
--
ALTER TABLE `Report Links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Visitor History`
--
ALTER TABLE `Visitor History`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Visitor Log`
--
ALTER TABLE `Visitor Log`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Activity Log`
--
ALTER TABLE `Activity Log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `Cells`
--
ALTER TABLE `Cells`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Personnel History`
--
ALTER TABLE `Personnel History`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Prisonner History`
--
ALTER TABLE `Prisonner History`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `Prisonners`
--
ALTER TABLE `Prisonners`
  MODIFY `Prisonners_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Report Links`
--
ALTER TABLE `Report Links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Visitor History`
--
ALTER TABLE `Visitor History`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Visitor Log`
--
ALTER TABLE `Visitor Log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
