-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 03:05 PM
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
-- Database: `scrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(45) DEFAULT NULL,
  `company_description` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_description`, `user_id`) VALUES
(1, 'Salesforce', 'Salesforce, Inc. is an American cloud-based software company headquartered in San Francisco, California. It provides customer relationship management software and applications focused on sales, customer service, marketing automation, e-commerce, analytics, and application development.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` tinytext DEFAULT NULL,
  `lead` int(11) NOT NULL,
  `company` varchar(100) NOT NULL,
  `workplace` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `image` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `name`, `email`, `lead`, `company`, `workplace`, `position`, `number`, `image`) VALUES
(1, 'Testing', NULL, 3, 'Roblox', NULL, NULL, NULL, NULL),
(2, 'Jane Doe', 'jdoe@gmail.com', 2, 'Salesforce', 'Remote', 'Developer', '35569876', 'https://wallpapercave.com/wp/wp10474946.png'),
(4, 'Name Sirname', 'nsname@email.com', 3, 'Roblox', 'Testing', 'Tester', '1234567890', ''),
(5, 'Sir Lewis', 'lewis@email.uk', 3, 'Roblox', 'Buckingham Palace', 'Butler', '355124', ''),
(9, 'Hello Kitty', '', 3, 'Roblox', 'Legoland', '', '6', './images/avatar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblsales`
--

CREATE TABLE `tblsales` (
  `SalesId` int(11) NOT NULL,
  `Product` varchar(90) NOT NULL,
  `TotalSales` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsales`
--

INSERT INTO `tblsales` (`SalesId`, `Product`, `TotalSales`) VALUES
(1, 'Essentials Cloud', 5600),
(2, 'Professional Cloud', 2250),
(3, 'Enterprise Cloud', 4350),
(4, 'Unlimited Cloud', 9000),
(5, 'Support Services', 56000),
(6, 'Prof. Services', 65000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `email` tinytext NOT NULL,
  `password` longtext NOT NULL,
  `position` varchar(100) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `image` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `company_name`, `email`, `password`, `position`, `number`, `image`) VALUES
(1, 'Nana', 'Admin', 'nana@email.jp', '$2y$10$5lvA7qqEZ9rxRywOn8Aqy.LsAAo0jCLN1Kwz2EIyLKbjBLhMpwbfq', NULL, NULL, NULL),
(2, 'Test 2', 'Salesforce', 'testing@email.com', '$2y$10$yiS0gqjSlp.zrDwmchsf2ep9TSYd4/wuhOGUrlH0jN4FsHxCLMAES', NULL, NULL, NULL),
(3, 'Test 1', 'Salesforce', 'Test@email.com', '$2y$10$CL95ETnIHWq0MsKo.gJZa.Z81MBCEnzsXPLCwtkYBgWd7vRtdIo6W', 'Developer', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `month` varchar(255) DEFAULT NULL,
  `sale` decimal(10,2) DEFAULT NULL,
  `profit` decimal(10,2) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `month`, `sale`, `profit`, `company_id`, `user_id`) VALUES
(1, 'January', 200.00, 250.00, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `lead` (`lead`);

--
-- Indexes for table `tblsales`
--
ALTER TABLE `tblsales`
  ADD PRIMARY KEY (`SalesId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblsales`
--
ALTER TABLE `tblsales`
  MODIFY `SalesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`lead`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `user_data_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`),
  ADD CONSTRAINT `user_data_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
