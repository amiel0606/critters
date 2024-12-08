-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 12:58 AM
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
-- Database: `critters`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addreview`
--

CREATE TABLE `tbl_addreview` (
  `review_id` int(11) NOT NULL,
  `rate` int(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `visible` varchar(255) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_addreview`
--

INSERT INTO `tbl_addreview` (`review_id`, `rate`, `review`, `user_id`, `date`, `visible`) VALUES
(1, 5, 'maangas super hahaha galingg', '1', '2024-11-22', 'true'),
(2, 5, 'super lupet dito hahwha', '1', '2024-11-22', 'true'),
(3, 5, 'galing sobnra hahaha', '1', '2024-11-22', 'false'),
(4, 5, 'hehehehe suled deto', '1', '2024-11-22', 'false'),
(5, 4, 'mejo mabaho hininga nung assistant', '1', '2024-11-22', 'false'),
(6, 5, 'cute naman ng doggy', '1', '2024-11-22', 'false'),
(7, 5, 'mabango na ulit sha', '1', '2024-11-22', 'false'),
(8, 2, 'salamat shopee', '4', '2024-11-22', 'true'),
(9, 5, 'ANGAS TALAGA', '1', '2024-11-22', 'false'),
(10, 5, 'hehehehehehe', '1', '2024-11-22', 'false'),
(11, 5, 'wqeqeqeqeq', '1', '2024-11-22', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slot` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bookings`
--

INSERT INTO `tbl_bookings` (`id`, `name`, `slot`, `description`, `categories`, `service`, `img`) VALUES
(7, 'Sample lang', 3, 'Maangas', 'ewahhahw,sa sample itu', 'Sample po haha', '67102004931c70.37588640-1729110020.png'),
(8, 'isapa po', 3, 'hehehe', 'sa 2nd itu,sa 2nd pa ulit', '2nd service', '67102d8dd15fb2.04406547-1729113485.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` int(255) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `category_name`) VALUES
(30, 'hello'),
(31, 'gwqeq'),
(32, 'omsim');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chatbot`
--

CREATE TABLE `tbl_chatbot` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_chatbot`
--

INSERT INTO `tbl_chatbot` (`id`, `question`, `answer`) VALUES
(2, 'pogi ba ako?', 'Oo naman sobrang pogi mo'),
(3, 'mukha ka bang burat', 'oo si bench mukhang burat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cms`
--

CREATE TABLE `tbl_cms` (
  `cms_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `link_address` longtext NOT NULL,
  `social` varchar(255) NOT NULL,
  `viber` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `mission` longtext NOT NULL,
  `vision` longtext NOT NULL,
  `terms` longtext NOT NULL,
  `map` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cms`
--

INSERT INTO `tbl_cms` (`cms_id`, `title`, `about`, `address`, `link_address`, `social`, `viber`, `logo`, `mission`, `vision`, `terms`, `map`) VALUES
(1, 'hello title', 'heheh', 'sa bahay namin wahb', 'https://maps.app.goo.gl/t2tHJgzFfj4T1CyP8', 'https://www.facebook.com/groups/139347112936126', '096969', '674023085a2df1.94531229.png', '                            To provide exceptional veterinary care through personalized treatment, advanced medical practices, and a caring approach.\r\n                        ', '                            Ensuring the well-being and quality of life for every pet and peace of mind for every pet owner.\r\n                        ', 'Customers must arrive 15 minutes before their scheduled appointment. Payment for services is required immediately after the session.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3865.620855686803!2d120.98435447576225!3d14.33344228356032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d42779def01d%3A0xced13867358a2082!2sCritters!5e0!3m2!1sen!2sph!4v1729118822196!5m2!1sen!2sph\" width=\"450\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `id` int(11) NOT NULL,
  `img1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`id`, `img1`) VALUES
(6, '6707256e1d0573.46051183.jpg'),
(7, '67072572c8a1a3.55075689.jpg'),
(8, '6707257813a8a0.66644681.jpg'),
(9, '6707257c72fbd0.88243231.jpg'),
(10, '67072581689195.06162654.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `message_id` int(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`message_id`, `receiver`, `sender`, `message`, `status`, `timestamp`) VALUES
(1, '10', 'admin', 'hello sample only', 'Active', '2024-11-13 13:57:41'),
(3, '10', 'admin', 'hehezxzzxcwww', 'Active', '2024-11-23 21:23:10'),
(4, 'admin', '10', 'wweqqeq', 'Active', '2024-11-23 21:23:21'),
(5, '10', 'admin', 'hello po', 'Active', '2024-11-23 21:30:13'),
(6, '10', 'admin', 'bwahaha', 'Active', '2024-11-23 22:11:33'),
(7, '10', 'admin', 'bnwyhahaha', 'Active', '2024-11-23 22:23:10'),
(8, '10', 'admin', 'henlo?', 'Active', '2024-11-23 22:24:00'),
(9, '10', 'admin', 'popopo', 'Active', '2024-11-23 22:34:36'),
(10, '10', 'admin', 'hahahaha', 'Active', '2024-11-23 22:37:05'),
(12, 'admin', '10', 'ahahawa', 'Active', '2024-11-23 22:41:46'),
(13, 'admin', '10', 'hehehe', 'Active', '2024-11-23 22:46:29'),
(14, 'admin', '10', 'hello po nigga', 'Active', '2024-11-23 22:47:55'),
(15, '10', 'admin', 'eqwewqe', 'Active', '2024-11-23 22:59:38'),
(16, 'admin', '10', 'qweqwewq', 'Active', '2024-11-23 23:00:35'),
(17, 'admin', '10', 'wqqeqeq', 'Active', '2024-11-23 23:02:57'),
(18, 'admin', '10', 'jhehe', 'Active', '2024-11-23 23:02:59'),
(19, 'admin', '10', 'bbababa', 'Active', '2024-11-23 23:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pets`
--

CREATE TABLE `tbl_pets` (
  `id` int(255) NOT NULL,
  `petType` varchar(255) NOT NULL,
  `petName` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `owner_ID` int(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `uniqueness` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pets`
--

INSERT INTO `tbl_pets` (`id`, `petType`, `petName`, `breed`, `birth_date`, `gender`, `owner_ID`, `img`, `uniqueness`, `color`) VALUES
(9, 'Dog', 'Knee Ga', 'Askal', '2021-05-22', 'Male', 4, '67325aede5b433.33269204.png', '', ''),
(12, 'Dog', 'Calcifer', 'Beagle', '2024-11-13', 'Male', 1, 'dog.png', 'Mataba parang baboy', 'Black/Brown/White'),
(13, 'Cat', 'ming', 'British Shorthair', '2024-11-13', 'Female', 1, 'cat.png', 'Inheat', 'Black/Gray'),
(15, 'Cat', 'ww', 'ww', '2024-11-06', 'Female', 11, 'cat.png', 'Mataba parang baboy', 'qeqeqe'),
(16, 'Dog', 'ww', 'British Shorthair', '2024-11-01', 'Male', 13, 'dog.png', 'Inheat', 'qeqeqe');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `image` longtext NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `image`, `name`, `description`, `price`) VALUES
(3, '67105f19bb6089.70603647-1729126169.jpg', 'ewan haha', 'wqeq', 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `service_id` int(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `service_description` varchar(255) NOT NULL,
  `service_price` int(255) NOT NULL,
  `service_image` varchar(255) NOT NULL,
  `visibility` varchar(255) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`service_id`, `service_name`, `category_id`, `category_name`, `service_description`, `service_price`, `service_image`, `visibility`) VALUES
(17, 'hehe', '30', 'hello', 'hello po', 321, '671be2946bff11.66986750-1729880724.png', 'true'),
(18, 'Sample service', '31', 'gwqeq', 'ahahaha', 312, '673241e773b473.99815538-1731346919.png', 'true'),
(19, 'maangas ito super', '32', 'omsim', 'hahahaha', 333, '67325bb183c4d6.21637879-1731353521.jpg', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setappointment`
--

CREATE TABLE `tbl_setappointment` (
  `appointment_id` int(255) NOT NULL,
  `booking_date` varchar(255) NOT NULL,
  `ownerName` varchar(255) NOT NULL,
  `pet_id` varchar(255) NOT NULL,
  `booking_id` varchar(255) NOT NULL,
  `owner_id` varchar(255) NOT NULL,
  `endorsed_to` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_setappointment`
--

INSERT INTO `tbl_setappointment` (`appointment_id`, `booking_date`, `ownerName`, `pet_id`, `booking_id`, `owner_id`, `endorsed_to`, `time`, `status`) VALUES
(6, '2024-10-26', 'Amiel Carhyl Lapid', '', '7', '1', '', '9:30 AM - 10:00 AM', 'Completed'),
(7, '2024-10-26', 'Amiel Carhyl Lapid', '', '8', '1', '', '1:00 PM - 1:30 PM', 'Completed'),
(8, '2024-10-26', 'Amiel Carhyl Lapid', '', '15', '1', '', '4:00 PM - 4:30 PM', 'Active'),
(9, '2024-11-22', 'Amiel Carhyl Lapid', '7', '17', '1', '', '4:00 PM - 4:30 PM', 'Active'),
(10, '2024-10-26', 'Amiel Carhyl Lapid', '', '17', '1', '', '2:30 PM - 3:00 PM', 'Completed'),
(11, '2024-10-26', 'Amiel Carhyl Lapid', '', '17', '1', '', '4:30 PM - 5:00 PM', 'Completed'),
(12, '2024-10-26', 'Amiel Carhyl Lapid', '', '17', '1', '', '3:30 PM - 4:00 PM', 'Completed'),
(13, '2024-10-26', 'Amiel Carhyl Lapid', '', '17', '1', '', '4:00 PM - 4:30 PM', 'Completed'),
(14, '2024-10-26', 'Amiel Carhyl Lapid', '', '17', '1', '', '4:30 PM - 5:00 PM', 'Completed'),
(15, '2024-10-26', 'Amiel Carhyl Lapid', '', '17', '1', '', '3:00 PM - 3:30 PM', 'Completed'),
(16, '2024-11-07', 'Amiel Carhyl Lapid', '', '17', '1', '', '4:00 PM - 4:30 PM', 'Completed'),
(17, '2024-11-13', 'Amiel Carhyl Lapid', '7', '17', '1', '', '10:00 AM - 10:30 AM', 'Completed'),
(18, '2024-11-13', 'Amiel Carhyl Lapid', '8', '18', '1', '', '10:00 AM - 10:30 AM', 'Completed'),
(19, '2024-11-12', 'Amiel Carhyl Lapid', '7', '18', '1', '', '3:00 PM - 3:30 PM', 'Completed'),
(20, '2024-11-12', 'Amiel Carhyl Lapid', '7', '18', '1', '', '2:30 PM - 3:00 PM', 'Reviewed'),
(21, '2024-11-12', 'Amiel Carhyl Lapid', '9', '17', '1', '', '11:30 AM - 12:00 PM', 'Completed'),
(22, '2024-11-12', 'hehehe', '9', '17', '1', '', '3:00 PM - 3:30 PM', 'Completed'),
(23, '2024-12-12', 'Bench Joshu Timonio', '9', '18', '4', 'Benchz', '3:00 PM - 3:30 PM', 'Completed'),
(24, '2024-11-23', 'Earl John Makavinta', '12', '17', '1', '', '9:00 AM - 9:30 AM', 'Cancelled'),
(25, '2024-11-25', 'sadqw eqweqwe', '15', '17', '11', 'Benchz', '2:30 PM - 3:00 PM', 'Completed'),
(26, '2024-11-27', 'qeqweqwe hawqeq', '16', '17', '13', '', '11:00 AM - 11:30 AM', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `team_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`team_id`, `name`, `position`, `picture`, `availability`) VALUES
(1, 'Benchz', 'Taga tae', '671bebde43db59.06385099-1729883102.PNG', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'Customer',
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `firstName`, `lastName`, `role`, `contact`) VALUES
(1, 'amiellapid22@gmail.com', '$2y$10$IGSOgLX9.X5un5l.UlbVceQ0mTgFSAcgURCZkxatjsftSShUnR9wu', 'Earl John', 'Makavinta', 'Customer', ''),
(2, 'hans@gmail.com', '$2y$10$h1SzV.xKHU0vAb8zH1GeNemvY0MOoHXhz29bIkX0JzfejhRSreZjC', 'Hans Patrick', 'Gregorio', 'Customer', ''),
(3, 'pepito@gmail.com', '$2y$10$NpxXm7aFAKQZ0VCfDoRtuO2NlJJBmrSZByR37knzABJMFL0v7HaSS', 'Tom Vincent', 'Pepito', 'Customer', ''),
(4, 'joshua@gmail.com', '$2y$10$z4lkMhD05AlPfn.g5ik3vu1ZOv8/jPxFhAdk9G6MZ3.o1GEL5Oy/y', 'Bench Joshua', 'Timonio', 'Customer', ''),
(9, 'amiel', '$2y$10$h1RN55eMpki9xkIz/HPUqOqgegzneP2IIoyMZwXvGHleUA7iTgHPS', 'Amiel Carhyl', 'Lapid', 'Admin', ''),
(10, 'amiellapid22@gmail.com', '$2y$10$fAvgPD/Rgq.AF/BV8.jOeeuRW81noYTPW5yG6iqm1cY11CaEexgXS', 'Amiel Carhyl', 'Lapid', 'Customer', ''),
(11, 'amiellapid06@gmail.com', '$2y$10$mOjkJW.MMUO2wAqMHqawJ.OTymzj3ucTwnG2ZNjKukLR1opiOBDZG', 'sadqw', 'eqweqwe', 'Customer', ''),
(12, 'bench', '$2y$10$10j9sm8YQoKij99ghc0VHeFQzy5bCObNMozE6chW0vyHF2q7aoD86', 'bench', 'timonio', 'Admin', ''),
(13, 'agrivetcritters@gmail.com', '$2y$10$V/Al3lBEuZ7U.3b8spjRN.lLx7tQtNdIB7X.3xuceWyYGfw1O.7yC', 'qeqweqwe', 'hawqeq', 'Customer', '+639940576891'),
(14, 'duke', '$2y$10$vN2nK1V645EN5ZLhc2U90.YD6bqWQecA4q9fo/2GcVUg1u4gLDsUq', 'Darius', 'Gavino', 'Secretary', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_addreview`
--
ALTER TABLE `tbl_addreview`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_chatbot`
--
ALTER TABLE `tbl_chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cms`
--
ALTER TABLE `tbl_cms`
  ADD PRIMARY KEY (`cms_id`);

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `tbl_pets`
--
ALTER TABLE `tbl_pets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_setappointment`
--
ALTER TABLE `tbl_setappointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_addreview`
--
ALTER TABLE `tbl_addreview`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_chatbot`
--
ALTER TABLE `tbl_chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_cms`
--
ALTER TABLE `tbl_cms`
  MODIFY `cms_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `message_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_pets`
--
ALTER TABLE `tbl_pets`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `service_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_setappointment`
--
ALTER TABLE `tbl_setappointment`
  MODIFY `appointment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `team_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
