-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2019 at 05:52 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vdb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkavailbilty` (IN `username` VARCHAR(255))  NO SQL
SELECT username FROM users  WHERE username=username$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registration` (IN `username` VARCHAR(200), IN `password` VARCHAR(200))  NO SQL
insert into users(username,password) VALUES(username,password)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `breed`
--

CREATE TABLE `breed` (
  `bid` int(11) NOT NULL,
  `species` varchar(30) DEFAULT NULL,
  `br` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `breed`
--

INSERT INTO `breed` (`bid`, `species`, `br`) VALUES
(1, 'Dog', 'Pug'),
(2, 'Dog', 'Labrador Retriever'),
(3, 'Dog', 'Golden Retreiever'),
(4, 'Dog', 'German Sheperds'),
(5, 'Dog', 'Bulldogs'),
(6, 'Dog', 'French Bulldogs'),
(7, 'Dog', 'Beagles'),
(8, 'Dog', 'Poodles'),
(9, 'Dog', 'Rottweilers'),
(10, 'Dog', 'Cocker Spaniels'),
(11, 'Cat', 'Devon Rex'),
(12, 'Cat', 'Abyssinian'),
(13, 'Cat', 'Sphynx'),
(14, 'Cat', 'Scottish Fold'),
(15, 'Cat', 'American Shorthair'),
(16, 'Cat', 'Maine Coon'),
(17, 'Cat', 'Persian'),
(18, 'Cat', 'British Shorthair'),
(19, 'Cat', 'Ragdoll'),
(20, 'Cat', 'Exotic Shorthair');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `did` int(11) NOT NULL,
  `dname` varchar(50) DEFAULT NULL,
  `dhosp` varchar(50) DEFAULT NULL,
  `dphno` int(20) DEFAULT NULL,
  `demail` varchar(50) DEFAULT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`did`, `dname`, `dhosp`, `dphno`, `demail`, `uid`) VALUES
(101, 'Varun Menon', 'CUPA', 702261968, 'varunrichpeace@gmail.com', 1),
(102, 'Vignesh Chandrashekar', 'CUPA', 985632147, 'vgnsh333@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `pid` int(11) DEFAULT NULL,
  `illness` varchar(500) DEFAULT NULL,
  `treatment` varchar(500) DEFAULT NULL,
  `doa` date DEFAULT NULL,
  `did` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`pid`, `illness`, `treatment`, `doa`, `did`) VALUES
(1001, 'Tick Fever', 'The drug chosen for treatment will depend on the specific disease that the tick has infected your dog with. Doxycycline.The dose is determined via body weight, and the dosage will need to be administered twice a day for six weeks or longer. All tick-borne diseases in dogs are administered treatment in the form of a broad spectrum antibiotic therapy. Ideally, the best results come from treating when the disease is in its early phases.', '2018-06-25', 102);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `pid` int(11) NOT NULL,
  `height` varchar(30) DEFAULT NULL,
  `weight` varchar(30) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `upapt` date DEFAULT NULL,
  `bid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`pid`, `height`, `weight`, `dob`, `upapt`, `bid`) VALUES
(1001, '25', '12', '2016-02-14', '2018-06-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` int(11) NOT NULL,
  `pname` varchar(50) DEFAULT NULL,
  `oname` varchar(50) DEFAULT NULL,
  `ophno` int(20) DEFAULT NULL,
  `oemail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `pname`, `oname`, `ophno`, `oemail`) VALUES
(1001, 'Rocky', 'Prithi Gopinath', 968669014, 'prithi10july@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`) VALUES
(1, 'varunmenon', 'varunmenon'),
(2, 'vigneshc', 'vigneshc');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `after_register` AFTER INSERT ON `users` FOR EACH ROW BEGIN
    INSERT INTO doctor(uid)
    VALUES(new.uid);
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breed`
--
ALTER TABLE `breed`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`did`,`uid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD KEY `pid` (`pid`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breed`
--
ALTER TABLE `breed`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `patient` (`pid`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`did`) REFERENCES `doctor` (`did`);

--
-- Constraints for table `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `info_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `patient` (`pid`),
  ADD CONSTRAINT `info_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `breed` (`bid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
