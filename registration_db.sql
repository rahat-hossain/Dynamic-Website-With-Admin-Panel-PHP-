-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 04:18 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `banner_title` varchar(150) NOT NULL,
  `banner_subtitle` text NOT NULL,
  `photo_location` text NOT NULL,
  `active_status` int(1) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_title`, `banner_subtitle`, `photo_location`, `active_status`) VALUES
(16, 'What is Lorem Ipsum? UPDATED', 'subtitle new UPDATED', 'uploads/banners/16.jpg', 1),
(17, 'title', 'subtitle', 'uploads/banners/17.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `guest_name` varchar(100) NOT NULL,
  `guest_email` varchar(100) NOT NULL,
  `guest_message` text NOT NULL,
  `read_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `guest_name`, `guest_email`, `guest_message`, `read_status`) VALUES
(1, 'Abir', 'abir@gmail.com', 'nothing', 2),
(2, 'habib', 'habib@gmail.com', 'nothing too', 2),
(3, 'Rahat', 'rahat@live.com', 'i need your service', 1),
(4, 'Azira', 'azira@yahoo.com', 'i need a ajira service', 2),
(5, 'rafiq', 'rafiq@gmail.com', 'the medfjdfdfjkndfdkm', 2);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_title` varchar(150) NOT NULL,
  `service_description` text NOT NULL,
  `service_photo` varchar(150) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_title`, `service_description`, `service_photo`, `status`) VALUES
(1, 'Service Title 1', 'Service Description 1', 'uploads/services/1.jpg', 1),
(2, 'Service Title second', 'Service Description second', 'uploads/services/2.jpg', 1),
(3, 'New Home Construction', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at.', 'uploads/services/3.jpg', 1),
(4, 'Service Title four', 'Service Description fourfourfourfourfourfourfourfourfourfour fourfourfourfourfourfourfourfourfourfour', 'uploads/services/4.jpg', 1),
(5, 'Service Title 5', 'Service Description 5', 'uploads/services/5.jpg', 1),
(6, 'Service Title 6', 'Service Description 6', 'uploads/services/6.jpg', 1),
(7, 'Service Title 7', 'Service Description 7', 'uploads/services/7.jpg', 1),
(8, 'Service Title 8', 'Service Description 8', 'uploads/services/8.jpg', 1),
(9, 'Service Title 9', 'Service Description 9', 'uploads/services/9.jpg', 1),
(10, 'Service Title newww', 'Service Description newww', 'uploads/services/10.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `password`) VALUES
(1, 'Rahat Hossain', 'rahat@live.com', '02222200000', 'd41d8cd98f00b204e9800998ecf8427e'),
(2, 'Fahad new', 'fahad@live.com', '01236500000', 'f5546e9897b824f49b32c2d2c59a2281'),
(3, 'Nazim', 'nazim@gmail.com', '01623232312', 'b41cb62ec6767f2e41f9df7a2d161515'),
(4, 'Alif', 'alif@live.com', '01232123212', 'b41cb62ec6767f2e41f9df7a2d161515'),
(5, 'Rahim', 'rahim@yahoo.com', '01112521254', '49d10b739717d0e2a3f0709feeb2797d'),
(6, 'waim ', 'waim@gmail.com', '01595123654', '61f60de63499f346590d39bc67a64a8d'),
(7, 'Admin', 'admin@gmail.com', '01652652325', 'b41cb62ec6767f2e41f9df7a2d161515'),
(8, 'Razzak', 'razzak@gmail.com', '012322222', 'b41cb62ec6767f2e41f9df7a2d161515'),
(9, 'jibon', 'jibon@live.com', '01212121212', 'b41cb62ec6767f2e41f9df7a2d161515'),
(10, 'Fazil', 'fazil@live.com', '01212121588', 'b41cb62ec6767f2e41f9df7a2d161515'),
(11, 'Alamin', 'Alamin@live.com', '0254545454', 'b41cb62ec6767f2e41f9df7a2d161515'),
(12, 'a', 'a@a.com', '541515151', 'b41cb62ec6767f2e41f9df7a2d161515');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
