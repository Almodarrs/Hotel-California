-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 04:46 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_california`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `price`) VALUES
(1, 'sweet', 'this has a more space than the other types of rooms and has an amazing view over the sea coast', 700.00),
(2, 'delux room', 'this is smaller than the sweet but it doesn\'t mean has a small space at all', 670.00),
(3, 'cozy room', 'this has a cool style who wants to stay alone.', 225.00),
(4, 'special room', 'this is the right choice for the most people who wants to spend a hot moments.', 340.00);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `message`, `cdate`) VALUES
(1, 'Ahmed Almodarrs', '0684579235', 'Ahmedazad.1990@gmail.com', 'hi', '2020-06-24'),
(16, 'Ahmed Azad', '07504413257', 'smile_afretoon@yahoo.com', 'vbv', '2020-06-24'),
(17, 'Ahmed Azad', '07504413257', 'smile_afretoon@yahoo.com', 'i love you', '2020-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(100) NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `address`, `country`, `city`, `phone`, `email`) VALUES
(21, 'Peter', '', '', '', '', '', ''),
(22, 'Ahmed', '', '', '', '', '', ''),
(23, 'Dave', '', '', '', '', '', ''),
(24, 'Marcel', '', '', '', '', '', ''),
(28, 'Test', 'Test', '', '', '', '234234', ''),
(29, 'Test', 'Test', '', '', '', '234234', ''),
(30, 'Test', 'Test', '', '', '', '234234', ''),
(31, 'Test', 'Test', '', '', '', '234234', ''),
(32, 'Test', 'Test', '', '', '', '234234', ''),
(33, 'Test', 'Test', '', '', '', '234234', ''),
(34, 'Test', 'Test', '', '', '', '234234', ''),
(35, 'asdfasdfasdfasdf', 'asdfasdfasdfasdf', '', '', '', 'asdfasfd', ''),
(36, 'asdfasdfasdfasdf', 'asdfasdfasdfasdf', '', '', '', 'asdfasfd', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `room_category` varchar(150) NOT NULL,
  `room` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `ttot` double(8,2) NOT NULL,
  `fintot` double(8,2) NOT NULL,
  `btot` double(8,2) NOT NULL,
  `noofdays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `fname`, `lname`, `room_category`, `room`, `amount`, `start`, `end`, `ttot`, `fintot`, `btot`, `noofdays`) VALUES
(1, 'a', 'a', 'd', 's', 2, '2020-06-20', '2020-06-22', 3780.00, 3780.00, 25.20, 7),
(2, 'Ahmed', 'Azad', 'Sweet', '', 3, '2020-06-25', '2020-07-03', 0.00, 0.00, 0.00, 0),
(3, 'Ahmed', 'Almodarrs', 'Deluxe Room', '', 1, '2020-06-25', '2020-06-26', 0.00, 0.00, 0.00, 0),
(4, 'Ahmed', 'Almodarrs', 'Deluxe Room', '', 2, '2020-06-27', '2020-07-11', 0.00, 0.00, 0.00, 0),
(5, 'Ahmed', 'Almodarrs', 'Deluxe Room', '', 1, '2020-06-25', '2020-06-26', 0.00, 0.00, 0.00, 0),
(6, 'Ahmed', 'Azad', 'Deluxe Room', '', 1, '0000-00-00', '0000-00-00', 0.00, 0.00, 0.00, 0),
(7, 'Ahmed', 'Azad', 'Deluxe Room', '', 3, '0000-00-00', '0000-00-00', 0.00, 0.00, 0.00, 0),
(8, 'fgfg', 'fgfgf', 'cozy room', '', 1, '2020-07-11', '2020-08-05', 0.00, 0.00, 0.00, 0),
(9, 'Ahmed', 'Almodarrs', 'Deluxe Room', '', 2, '2020-07-04', '2020-07-10', 0.00, 0.00, 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `price_periods`
--

CREATE TABLE `price_periods` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` double(5,2) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `room_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `invoice` text NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  `room_category` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `confirmation` varchar(50) DEFAULT 'Not Conform'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `f_name`, `l_name`, `phone`, `email`, `city`, `country`, `room_id`, `customer_id`, `start`, `end`, `invoice`, `payment_status`, `room_category`, `amount`, `confirmation`) VALUES
(80, 'Ahmed', 'Azad', '07504413257', 'smile_afretoon@yahoo.com', 'erbil', 'Iraq', 3, 0, '2020-07-08', '2020-07-10', '', 0, 'Sweet', 3, 'Conform'),
(81, 'Ahmed', 'Azad', '07504413257', 'smile_afretoon@yahoo.com', 'erbil', 'Iraq', 1, 21, '2020-06-16', '2020-07-03', '', 0, 'Deluxe Room', 3, 'Conform'),
(82, 'Ahmed', 'Azad', '07504413257', 'smile_afretoon@yahoo.com', 'erbil', 'Iraq', 4, 0, '2020-06-25', '2020-07-03', '', 0, 'Sweet', 3, 'Conform'),
(83, 'Ahmed', 'Almodarrs', '0684579235', 'Ahmedazad.1990@gmail.com', 'Wassenaar', 'Netherlands', 1, 21, '2020-06-25', '2020-06-26', '', 0, 'Deluxe Room', 1, 'Conform'),
(84, 'Ahmed', 'Almodarrs', '0684579235', 'Ahmedazad.1990@gmail.com', 'Wassenaar', 'Netherlands', 1, 0, '2020-06-25', '2020-06-26', '', 0, 'Deluxe Room', 1, 'Conform'),
(85, 'Ahmed', 'Almodarrs', '0684579235', 'Ahmedazad.1990@gmail.com', 'Wassenaar', 'Netherlands', 2, 0, '2020-06-27', '2020-07-11', '', 0, 'Deluxe Room', 2, 'Conform'),
(89, 'Ahmed', 'Azad', '07504413257', 'smile_afretoon@yahoo.com', 'erbil', 'Iraq', 2, 0, '0000-00-00', '0000-00-00', '', 0, 'Deluxe Room', 1, 'Conform'),
(90, 'Ahmed', 'Azad', '07504413257', 'smile_afretoon@yahoo.com', 'erbil', 'Iraq', 2, 0, '0000-00-00', '0000-00-00', '', 0, 'Deluxe Room', 3, 'Conform'),
(91, 'Ahmed', 'Almodarrs', '0684579235', 'Ahmedazad.1990@gmail.com', 'Wassenaar', 'Netherlands', 8, 0, '2020-07-04', '2020-07-10', '', 0, 'Deluxe Room', 2, 'Conform'),
(92, 'test', 'test', '4545454', 'Ahmedazad.1990@gmail.com', 'Wassenaar', 'Netherlands', 10, 0, '2020-07-10', '2020-07-11', '', 0, 'Deluxe Room', 1, 'Not Conform'),
(93, 'test', 'test', '4545454', 'Ahmedazad.1990@gmail.com', 'Wassenaar', 'Netherlands', 10, 0, '2020-07-10', '2020-07-11', '', 0, 'Deluxe Room', 1, 'Not Conform'),
(94, 'test', 'test', '4545454', 'Ahmedazad.1990@gmail.com', 'Wassenaar', 'Netherlands', 10, 0, '2020-07-10', '2020-07-11', '', 0, 'Deluxe Room', 1, 'Not Conform'),
(95, 'fgfg', 'fgfgf', '434343', '232@ghgh.com', 'dfdfdf', 'Bahrain', 9, 0, '2020-07-11', '2020-08-05', '', 0, 'cozy room', 1, 'Conform');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `bed` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `place` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `number`, `floor`, `bed`, `category_id`, `description`, `place`) VALUES
(1, 601, 6, 'double', 1, 'with this room you will enjoy your vacation and all the the services are available.', ''),
(2, 501, 5, 'double', 2, 'this is the best choice for you and your partner to enjoy the great services of this section.', 'not free'),
(3, 602, 6, 'triple', 1, 'with this room you will enjoy your vacation and all the the services are available.', 'Free'),
(4, 502, 5, 'triple', 2, 'this is the best choice for you and your partner to enjoy the great services of this section.', 'Free'),
(8, 401, 4, 'single', 3, 'this will amaze you with the comfort of the bed and the room style.', 'Free'),
(9, 402, 4, 'single', 3, 'this will amaze you with the comfort of the bed and the room style.', 'Free'),
(10, 403, 4, 'double', 4, 'this is the right choice for you and your partner to spend a lovely moments.', 'Free'),
(11, 301, 3, 'double', 4, 'this is the right choice for you and your partner to spend a lovely moments.', 'Free'),
(12, 302, 3, 'double', 4, 'this is the right choice for you and your partner to spend a lovely moments.', 'Free'),
(13, 303, 3, 'triple', 4, 'this is very good choice for a small family to enjoy there staying.', 'Free'),
(14, 201, 2, 'double', 4, 'this is the right choice for you and your partner to spend a lovely moments.', 'Free'),
(15, 202, 2, 'triple', 4, 'this is very good choice for a small family to enjoy there staying.', 'Free'),
(16, 203, 2, 'triple', 4, 'this is very good choice for a small family to enjoy there staying.', 'Free'),
(17, 101, 1, 'double', 4, 'this is the right choice for you and your partner to spend a lovely moments.', 'Free'),
(18, 102, 1, 'quad', 4, 'this for a medium family to enjoy their privacy.', 'Free'),
(19, 103, 1, 'quad', 4, 'this for a medium family to enjoy their privacy.', 'Free'),
(26, 603, 6, 'Single', 1, NULL, 'Free'),
(27, 603, 6, 'Quad', 1, NULL, 'Free'),
(28, 603, 6, 'Single', 1, NULL, 'Free');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_periods`
--
ALTER TABLE `price_periods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `price_periods`
--
ALTER TABLE `price_periods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `price_periods`
--
ALTER TABLE `price_periods`
  ADD CONSTRAINT `price_periods_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
