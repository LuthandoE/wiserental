-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2017 at 01:17 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrentalwise`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `pid` int(11) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `street_number` varchar(255) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `administrative_area_level_1` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`pid`, `location`, `street_number`, `route`, `administrative_area_level_1`, `country`) VALUES
(1, 'Cape Town ', NULL, NULL, NULL, 'South Africa'),
(2, 'Bloemfontein', NULL, NULL, NULL, 'South Africa'),
(3, 'Durban ', NULL, NULL, NULL, 'South Africa'),
(4, 'Johannesburg', NULL, NULL, NULL, 'South Africa'),
(5, 'Johannesburg', NULL, NULL, NULL, 'South Africa'),
(6, 'Port Elizabeth', NULL, NULL, NULL, 'South Africa'),
(7, 'Pretoria', NULL, NULL, NULL, 'South Africa'),
(8, 'Bisho', NULL, NULL, NULL, 'South Africa'),
(9, 'Pietermaritzburg', NULL, NULL, NULL, 'South Africa'),
(10, 'Umlazi', '1', 'Griffiths Mxenge Highway', NULL, 'South Africa'),
(11, 'Umlazi', '1', 'Griffiths Mxenge Highway', NULL, 'South Africa'),
(12, 'Umlazi', '1', 'Griffiths Mxenge Highway', NULL, 'South Africa'),
(13, 'Umlazi', '20', 'Griffiths Mxenge Highway', NULL, 'South Africa');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `fid` bigint(20) NOT NULL,
  `question` text NOT NULL,
  `posted_on` datetime DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`fid`, `question`, `posted_on`, `userid`) VALUES
(1, 'How to list a car', NULL, NULL),
(2, 'What if your car get a damage', NULL, NULL),
(3, 'How my car will be protected', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hire`
--

CREATE TABLE `hire` (
  `hid` bigint(20) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `nid` bigint(20) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `pickup` datetime DEFAULT NULL,
  `redate` datetime DEFAULT NULL,
  `intro` text,
  `deposite` int(11) DEFAULT NULL,
  `idno` varchar(255) DEFAULT NULL,
  `car_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hire`
--

INSERT INTO `hire` (`hid`, `userid`, `nid`, `status`, `pickup`, `redate`, `intro`, `deposite`, `idno`, `car_photo`) VALUES
(1, 12, 8, 'Not Approved', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 9, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 9, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 9, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `mid` bigint(20) NOT NULL,
  `msg` text NOT NULL,
  `tym` datetime DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `email`, `pass`, `name`, `surname`, `created_on`, `picture`, `pid`, `phone`, `active`) VALUES
(1, 'kaha@gmail.com', 'ld21202494', 'kaha', 'gwiri', '2017-04-17 00:00:00', NULL, 1, '0746653389', 0),
(7, 'luthando@yahoo.com', '2957760828a7ab4e8ab82aff66416fd46181e4d7c2d5cfd468d8211d9cc40482', 'Luthando', 'Dlamini', '2017-04-17 18:39:56', NULL, 3, '1234567890', 0),
(8, 'codex@ldev.com', 'ld21202494', 'Codex', 'Lerroy', '2017-04-18 16:13:03', '284712.jpg', 3, '1234567890', 0),
(9, 'thami@edrok.co.za', 'ld21202494', 'Thami', 'Mhlongo', '2017-04-18 18:18:57', '110875.jpg', 3, '1234567890', 0),
(10, 'brian@smartsolutions.co.za', 'ld21202494', 'Brian', 'Smith', '2017-04-18 18:24:37', '786896.jpg', 5, '1234567890', 0),
(11, 'zinhle@gmail.com', 'ld21202494', 'Zinhle', 'Mthimkhulu', '2017-04-18 18:29:45', '933661.png', 6, '1234567890', 0),
(12, 'emmanuel@yahoo.com', 'ld21202494', 'Emmanuel', 'Dlamini', '2017-04-18 18:33:49', '203861.jpg', 7, '1234567890', 0),
(13, 'noel@gmail.com', 'ld21202494', 'Luthando', 'Dlamini', '2017-04-18 18:39:57', '54321.jpg', 1, '1234567890', 0),
(14, 'kd@jmh.co.za', 'ld21202494', 'khule', 'Siba', '2017-04-18 19:55:28', '902899.png', 9, '1234567890', 0),
(15, 'cleo@yahoo.com', 'ld21202494', 'Cleo', 'Spandeel', '2017-04-18 20:11:05', '737812.jpg', 2, '1234567890', 0),
(16, 'mtarara@gmail.com', 'ld21202494', 'Mtamara', 'Changa', '2017-04-18 20:21:27', '448916.jpg', 8, '1234567890', 0),
(17, 'tsholofelo@yahoo.com', 'ld21202494', 'tsholofelo', 'mtshoro', '2017-04-18 20:34:45', '409405.jpg', 4, '1234567890', 0),
(18, 'ldthedeveloper@gmail.com', 'ld21202494', 'Luthando', 'Dlamini', '2017-06-29 11:20:46', '545377.jpg', 12, '0746653389', 0),
(19, 'luthandodlamini94@gmail.com', 'ld21202494', 'Luthando', 'Dlamini', '2017-07-03 11:16:00', '928905.jpg', 13, '0746653389', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `nid` bigint(20) NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `posted_on` datetime NOT NULL,
  `carMake` text,
  `userid` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `period` int(11) DEFAULT NULL,
  `pick_drop_opt` text,
  `vehicle_type` varchar(255) DEFAULT NULL,
  `model_year` varchar(255) DEFAULT NULL,
  `aut_manuel` varchar(255) DEFAULT NULL,
  `features` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`nid`, `description`, `image`, `posted_on`, `carMake`, `userid`, `price`, `period`, `pick_drop_opt`, `vehicle_type`, `model_year`, `aut_manuel`, `features`) VALUES
(3, 'Its the best car you can hire', '176941.jpg', '2017-04-18 16:15:48', 'Mercedes', 1, 123, 5, 'My place', 'car', '2004', 'Manual', NULL),
(4, 'The car you have always been dying to drive is finally for hire.', '746714.jpg', '2017-04-18 16:32:25', 'Gti', 1, 8000, 12, 'Cape Town International', 'car', '2013', 'Automatic', NULL),
(5, 'Take yourself out with this new nice and cool baby.', '553090.jpg', '2017-04-18 18:22:56', 'GTI 8', 9, 8000, 12, 'My place', 'car', '2017', 'Automatic', NULL),
(6, 'Your best car is available for hire', '594248.jpg', '2017-04-18 18:27:21', 'BMW X6', 10, 3000, 6, 'My place', 'car', '2016', 'Automatic', NULL),
(7, 'Nice and clean car.', '139319.png', '2017-04-18 18:32:11', 'Opel Corsa', 11, 123, 15, 'My place', 'car', '2007', 'Manual', NULL),
(8, 'Best car for hire.', '292670.jpg', '2017-04-18 18:35:02', 'Mercerdes', 12, 8000, 7, 'Cape Town International', 'car', '2008', 'Manual', NULL),
(9, 'Nice and Cool', '922807.jpg', '2017-04-18 19:56:49', 'Merc', 14, 6000, 7, 'My place', 'car', '2011', 'Automatic', NULL),
(10, 'Best car for hire', '688057.jpg', '2017-04-18 20:01:04', 'BMW X6', 13, 6000, 4, 'My place', 'car', '2015', 'Manual', NULL),
(11, 'Nice, clean and class', '216635.jpg', '2017-04-18 20:05:35', 'BMW X6', 13, 5000, 4, 'My place', 'car', '2013', 'Manual', NULL),
(12, 'Best car ever', '145417.jpg', '2017-04-18 20:13:33', 'gti 8', 15, 9000, 3, 'My place', 'car', '2018', 'Manual', NULL),
(13, 'Best car , see for yourself', '186757.jpg', '2017-04-18 20:23:11', 'BMW X6', 16, 7, 6, 'My place', 'car', '2014', 'Automatic', NULL),
(14, 'Its the best, try it', '164471.jpg', '2017-04-18 20:37:16', 'MT', 17, 11000, 13, 'My place', 'car', '2009', 'Automatic', NULL),
(15, '12', '304834.jpg', '2017-05-08 10:12:11', 'ld', 16, 233, 0, 'My place', 'car', '2006', 'Manual', NULL),
(16, '2', '559493.png', '2017-05-08 10:17:44', 'dsd', 16, 213, 1, 'My place', 'car', '2018', 'Manual', NULL),
(17, 'This motherfucker is cool', '382241.jpg', '2017-05-08 12:25:47', 'GTi 8', 16, 3000, 4, 'My place', 'car', '2014', 'Manual', NULL),
(18, 'Nice Car', '527085.jpg', '2017-07-06 17:24:55', 'Merc', 19, 1530, 16, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `hire`
--
ALTER TABLE `hire`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`nid`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `hire`
--
ALTER TABLE `hire`
  MODIFY `hid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `mid` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `nid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `city` (`pid`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_3` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
