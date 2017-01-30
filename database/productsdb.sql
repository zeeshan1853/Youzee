-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2017 at 09:39 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`) VALUES
(1, 'Name of organization', 'Youzee'),
(2, 'Another question', 'Answer'),
(3, 'Third Question', 'Third Answer'),
(4, 'Fourth One', 'Hello to the future'),
(5, 'Fifth Test', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemID` int(11) NOT NULL,
  `itemName` varchar(20) NOT NULL,
  `userID` int(11) NOT NULL,
  `price` double NOT NULL,
  `city` varchar(15) NOT NULL,
  `description` varchar(100) NOT NULL,
  `typeID` int(11) NOT NULL,
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photo1` varchar(50) NOT NULL,
  `photo2` varchar(50) NOT NULL,
  `photo3` varchar(50) NOT NULL,
  `photo4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemID`, `itemName`, `userID`, `price`, `city`, `description`, `typeID`, `date`, `photo1`, `photo2`, `photo3`, `photo4`) VALUES
(1, 'Product 1', 1, 6500, 'Gujranwala', 'No such Description', 1, '2016-11-30 16:59:01', '104263313163.jpg', '2529728982.', '267633432.', '136623391.'),
(2, 'Product2', 1, 5657, 'Lahore', 'NO description', 1, '2016-12-13 20:44:13', '1.jpg', '2.jpg', '3.jpg', '4.jpg'),
(3, 'Product3', 1, 778, 'Gujranwala', 'No ', 1, '2016-12-13 20:44:13', '252482228249.jpg', '289712214.', '852521506.', '2704911054.'),
(4, 'Product4', 1, 6767, 'Islamabad', 'JKJKJK', 1, '2016-12-13 20:46:30', '13300Future10013.jpg', '113619094.', '1024931246.', '1493917144.'),
(5, 'Product5', 1, 78, 'Gujranwala', 'djkjk', 1, '2016-12-13 20:46:30', '3276Future19221.jpg', '13444apple17517.jpg', '39082226669.jpg', '28836337693.jpg'),
(10, 'Prouduct 11', 1, 455, 'Gujranwala', 'jdfkjasklfj', 2, '2016-12-18 10:00:01', '11.jpg', '', '', ''),
(12, 'Ahmad', 1, 500, 'Karachi', 'No such Description', 1, '2017-01-07 12:21:31', 'apple.jpg', '33.jpg', 'NoImage.png', 'NoImage.png'),
(13, 'http://www.prebugsol', 1, 500, 'Gujranwala', 'not brief', 1, '2017-01-07 12:39:35', 'bulb.jpg', '33.jpg', 'apple.jpg', '22.jpg'),
(14, 'Product 14', 1, 7500, 'lahore', 'Will be coming soon', 1, '2017-01-07 13:44:01', '216062213223.jpg', '7461bulb24314.jpg', '5653apple32042.jpg', '299601129857.jpg'),
(15, 'areeb12', 1, 7500, 'tyer', 'Not yet', 1, '2017-01-07 18:53:26', 'NoImage.png', 'NoImage.png', 'NoImage.png', 'NoImage.png'),
(16, 'hello world', 1, 123, 'lhr', 'jdfksljsdklf', 1, '2017-01-07 18:55:27', '12479229100.jpg', '29021bulb19154.jpg', '3651apple11456.jpg', '119561127357.jpg'),
(18, 'final', 13, 500, 'Lahore', 'No such Description', 1, '2017-01-12 07:59:18', '78623314263.jpg', '22938apple17099.jpg', 'NoImage.png', 'NoImage.png'),
(19, 'Final Product', 7, 123, 'Lahore', 'jdkfdjsf', 3, '2017-01-12 08:08:36', '218731132598.jpg', '14791bulb27636.jpg', '3752227617.jpg', 'NoImage.png'),
(20, 'Last One', 7, 500, 'Lahore', 'jdfksljsdklf', 1, '2017-01-12 08:11:59', '2099g114320.jpg', '28325pic54730.jpg', '6303337660.jpg', '20664227825.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'normal'),
(3, 'suspend');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `typeID` int(11) NOT NULL,
  `typeName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`typeID`, `typeName`) VALUES
(1, 'Carro'),
(2, 'Garagem'),
(3, 'Bicicleta'),
(4, 'Caiaque'),
(5, 'Outros');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userPassword` varchar(200) NOT NULL,
  `userEmail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `userPassword`, `userEmail`) VALUES
(1, 'zeeshan', '$2y$10$frtQ/YynGJB6DlgQHI/qde/x9A9gmzlG1M3qSR7Nk.tlLzgvLGzie', 'zeeshan.ahmad72@yahoo.com'),
(6, 'zeeshan ahmad', '$2y$10$GnL4EEaqwe1u9tWpe/fHROdXovC17dxiqIEpsmUHZQQTZ5XPXFjJW', 'zeeshan.ahmad72@yahoo.com1'),
(7, 'zeeshan ahmad', '$2y$10$frtQ/YynGJB6DlgQHI/qde/x9A9gmzlG1M3qSR7Nk.tlLzgvLGzie', 'zeeshan.ahmad72@yahoo.com12'),
(8, 'zeeshan', '$2y$10$tZB5h34SPUpW4C1yzPX0du2U1yV1XWvnpnO9/mnggu7Ngvq.Zv9Qu', 'zeeshan1853@gmail.com'),
(9, 'Ali', '$2y$10$oWJsXdyPrOWp.PGutd39NOYxjLv4Z0etmYGU7kf36eLUY5IeQNO5C', 'zeeshan1853@hotmail.com'),
(10, 'ALi', '$2y$10$zPCT07go9J49Si7/lc2oHObccm9sdsWQOB1d3P6vd6TDrVpZ9GqQu', 'Ali@gmail.com'),
(11, 'areeb', '$2y$10$6LuDZntsi6ITl2ibhhgSLuTbP8yjdli8YdBXlmxu/2xtip9QTYGZa', 'areeb@gmail.com'),
(12, 'areeb', '$2y$10$odcXBOU/6pewQNxuBQFWk.dPoDs88On85rQsnv9JkREliMXwQe2l.', 'areeb@hotmail.com'),
(13, 'urwa', '$2y$10$rNZCup.A5JKbIWunfZ1Fe.oG2GouSq0avyIh2fIN.rLi7Q/7M6spe', 'urwa@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `roleID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`roleID`, `userID`) VALUES
(1, 1),
(1, 6),
(1, 7),
(1, 13),
(2, 7),
(2, 11),
(2, 12),
(2, 13),
(3, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `typeID` (`typeID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`roleID`,`userID`),
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`typeID`) REFERENCES `types` (`typeID`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`typeID`) REFERENCES `types` (`typeID`);

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
