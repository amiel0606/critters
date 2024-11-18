-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 05:56 AM
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
  `visible` varchar(255) NOT NULL DEFAULT 'true',
  `user_id` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_addreview`
--

INSERT INTO `tbl_addreview` (`review_id`, `rate`, `review`, `visible`, `user_id`, `date`) VALUES
(9, 5, 'super awesome fast service', 'true', '1', '2024-11-18 12:41:21');

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
(38, 'Tests'),
(39, 'hello po');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chatbot`
--

CREATE TABLE `tbl_chatbot` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `vision` varchar(255) NOT NULL,
  `mission` varchar(255) NOT NULL,
  `map` longtext NOT NULL,
  `max_appointment` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cms`
--

INSERT INTO `tbl_cms` (`cms_id`, `title`, `about`, `address`, `link_address`, `social`, `viber`, `vision`, `mission`, `map`, `max_appointment`) VALUES
(1, 'Critters', 'Agrivet', 'hiiiii', 'https://maps.app.goo.gl/t2tHJgzFfj4T1CyP8', 'https://www.facebook.com/groups/139347112936126', '09696978899', '                            Ensuring the well-being and quality of life for every pet and peace of mind for every pet owner.\n                        ', '                            To provide exceptional veterinary care through personalized treatment, advanced medical practices, and a caring approach.\r\n                        ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3865.620855686803!2d120.98435447576225!3d14.33344228356032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d42779def01d%3A0xced13867358a2082!2sCritters!5e0!3m2!1sen!2sph!4v1729118822196!5m2!1sen!2sph\" width=\"450\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 2);

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
(18, 'Dog', 'Doggo', 'Mixed', '2024-01-11', 'Male', 1, 'dog.png', 'may balbas', 'Black and White');

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
(28, 'CBC (Complete Blood Test)', '38', 'Tests', 'A routine test that measures red blood cells, white blood cells, platelets, and hemoglobin. A CBC can help identify anemia, infection, inflammation, and other conditions.', 730, '673ab2b7a27ec6.01630777-1731900087.png', 'true'),
(29, 'Heartworm Test', '38', 'Tests', 'Determines if a pet has heartworm disease or other tick-borne illnesses.', 550, '673ab2f6ed25e6.50905759-1731900150.png', 'true');

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
  `time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_setappointment`
--

INSERT INTO `tbl_setappointment` (`appointment_id`, `booking_date`, `ownerName`, `pet_id`, `booking_id`, `owner_id`, `time`, `status`) VALUES
(24, '2024-11-18', 'Earl John Makavinta', '18', '28', '1', '9:00 AM - 9:30 AM', 'Completed');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `firstName`, `lastName`) VALUES
(1, 'earl@gmail.com', '$2y$10$IGSOgLX9.X5un5l.UlbVceQ0mTgFSAcgURCZkxatjsftSShUnR9wu', 'Earl John', 'Makavinta'),
(2, 'hans@gmail.com', '$2y$10$h1SzV.xKHU0vAb8zH1GeNemvY0MOoHXhz29bIkX0JzfejhRSreZjC', 'Hans Patrick', 'Gregorio'),
(3, 'pepito@gmail.com', '$2y$10$NpxXm7aFAKQZ0VCfDoRtuO2NlJJBmrSZByR37knzABJMFL0v7HaSS', 'Tom Vincent', 'Pepito'),
(4, 'joshua@gmail.com', '$2y$10$z4lkMhD05AlPfn.g5ik3vu1ZOv8/jPxFhAdk9G6MZ3.o1GEL5Oy/y', 'Bench Joshua', 'Timonio'),
(5, 'joshtimonio@gmail.com', '$2y$10$ju6h/PwoInlDNhpbe5llp.AnuXs1szCP7LHOasJwiI3koCdaJ63L.', 'Bench', 'Timonio');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_addreview`
--
ALTER TABLE `tbl_addreview`
  ADD PRIMARY KEY (`review_id`);

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
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_chatbot`
--
ALTER TABLE `tbl_chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `tbl_pets`
--
ALTER TABLE `tbl_pets`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `service_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_setappointment`
--
ALTER TABLE `tbl_setappointment`
  MODIFY `appointment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `team_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
