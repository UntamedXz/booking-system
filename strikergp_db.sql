-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 02:50 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `strikergp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE `room_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_category`
--

INSERT INTO `room_category` (`id`, `name`, `slug`) VALUES
(5, 'Cottages', 'kubo'),
(6, 'Rooms', 'room');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inquiries`
--

CREATE TABLE `tbl_inquiries` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `reply` longtext DEFAULT NULL,
  `read_reply` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_inquiries`
--

INSERT INTO `tbl_inquiries` (`id`, `user_id`, `name`, `email`, `subject`, `message`, `reply`, `read_reply`) VALUES
(8, 1, 'Jessica Capoquian', 'jessicapoquiancodillo09@gmail.com', '', 'Hello', 'ha!', 1),
(9, 28, 'camille', 'tubocamill@gmail.com', 'ss', 'hehe', 'gago', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_type`
--

CREATE TABLE `tbl_payment_type` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payment_type`
--

INSERT INTO `tbl_payment_type` (`id`, `type_id`, `price`) VALUES
(1, 1, 3000),
(2, 2, 3500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE `tbl_reservation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `date_accomodation` date NOT NULL,
  `check_out` date DEFAULT NULL,
  `time_accomodation` time NOT NULL,
  `number_p` int(11) NOT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'PENDING',
  `check_in_out` varchar(255) DEFAULT NULL,
  `paid_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `image_2` varchar(255) NOT NULL,
  `image_3` varchar(255) NOT NULL,
  `image_4` varchar(255) NOT NULL,
  `availability` int(11) NOT NULL,
  `person` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`id`, `category_id`, `name`, `price`, `description`, `image`, `image_2`, `image_3`, `image_4`, `availability`, `person`) VALUES
(17, 5, '6 X 10 KUBO ( 18 PAX )', 800, '', 'smallpot.jpg', 'smallpot.jpg', 'Small.jpg', 'smallpot.jpg', 7, 10),
(18, 5, '6 X 19 KUBO ( 40 PAX )', 3000, '', '3000.jpg', 'IMG-5796 (1).jpg', 'IMG-5793 (1).jpg', '3000.jpg', 1, 15),
(21, 5, '6 X 6 KUBO ( 10 PAX )', 600, '', 'hdfhddf.jpg', 'hdfhddf.jpg', 'hdfhddf.jpg', 'hdfhddf.jpg', 12, 6),
(22, 5, '6 X 6 HAT ( 6 PAX )', 400, '', 'hahaaa.jpg', 'hahaaa.jpg', 'hahaaa.jpg', 'hahaaa.jpg', 10, 6),
(24, 6, 'Room 1', 3000, '', 'ROOOM.jpg', 'ROOOM.jpg', 'ROOOM.jpg', 'ROOOM.jpg', 1, 4),
(25, 6, 'Room 2', 3000, '', 'ROOM.jpg', 'ROOMS.jpg', 'ROOMS.jpg', 'ROOM.jpg', -1, 4),
(26, 6, 'Room 3', 3000, '', 'Room 3.jpg', 'Room 3.jpg', 'Room 3.jpg', 'Room 3.jpg', 1, 4),
(27, 6, 'Room 4', 3000, '', 'IMG-5772.jpg', 'IMG-5772.jpg', 'IMG-5772.jpg', 'IMG-5772.jpg', 1, 4),
(28, 6, 'Functional Room', 7000, '', 'hall.png', 'functional.jpg', 'funct.png', 'functional.jpg', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `sale_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`sale_id`, `room_id`, `user_id`, `price`) VALUES
(1, 1, 1, 3680),
(2, 1, 1, 3680),
(3, 1, 1, 3680),
(4, 1, 1, 3680),
(5, 1, 1, 3680),
(6, 1, 1, 3680),
(7, 1, 1, 3680),
(8, 1, 1, 3680),
(9, 3, 23, 3860),
(10, 4, 1, 3860),
(11, 4, 1, 3600),
(12, 17, 23, 3300),
(13, 25, 28, 4220),
(14, 25, 28, 4220);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`id`, `name`) VALUES
(1, 'Morning'),
(2, 'Night');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `admin_username`, `email`, `password`, `role`) VALUES
(1, 'Administrator', 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'ADMIN'),
(23, 'Jessica Capoquian', '', 'jessicapoquiancodillo09@gmail.com', '9aaec4f38958f594ec70be4c5bbcd527', 'USER'),
(24, 'Jessica Capoquian', 'Jess', 'jessicapoquiancodillo09@gmail.com', 'd80b8ad7d435794f388b29bd32940377', 'STAFF'),
(25, 'Angel Beltran', 'Angel', 'angelbeltran@gmail.com', '5b0c0e90e5c8d8a3c34cdaee0118f521', 'STAFF'),
(26, 'Rico Lar', 'Rico', 'ricolar@gmail.com', 'f039e0d9e2d33540c45626f89d47e46a', 'STAFF'),
(27, 'Angel Beltran', '', 'angelbeltran@gmail.com', 'f4f068e71e0d87bf0ad51e6214ab84e9', 'USER'),
(28, 'camille', '', 'tubocamill@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_inquiries`
--
ALTER TABLE `tbl_inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment_type`
--
ALTER TABLE `tbl_payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `room_category`
--
ALTER TABLE `room_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_inquiries`
--
ALTER TABLE `tbl_inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_payment_type`
--
ALTER TABLE `tbl_payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
