-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 07:26 PM
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
-- Database: `food_delivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(100) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `user_name`, `password`) VALUES
(12, 'chandrashekhara', 'csp123', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(42, 'breakfast', 'Food_Category_933.jpg', 'Yes', 'Yes'),
(43, 'rice', 'Food_Category_543.png', 'No', 'Yes'),
(44, 'burgur', 'Food_Category_675.jpg', 'No', 'Yes'),
(45, 'maggie', 'Food_Category_843.jpg', 'No', 'Yes'),
(46, 'momo', 'Food_Category_464.jpg', 'Yes', 'Yes'),
(49, 'dal', 'Food_Category_955.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `category_id` int(10) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(53, 'Rice', 'it is indian rice ', 60.00, 'Food-name938.png', 42, 'Yes', 'Yes'),
(54, 'Biriyani', 'it is a italian biriyani made by csp', 180.00, 'Food-name609.png', 43, 'Yes', 'Yes'),
(55, 'Salad', 'maid by sily', 50.00, 'Food-name455.jpg', 42, 'Yes', 'Yes'),
(56, 'Momo', 'chicken momo nice', 100.00, 'Food-name495.jpg', 46, 'Yes', 'Yes'),
(57, 'Fried Rice', 'This rice is fried', 40.00, 'Food-name806.png', 42, 'Yes', 'Yes'),
(58, 'Burgur', 'my fv food ', 50.00, 'Food-name251.jpg', 44, 'Yes', 'Yes'),
(59, 'dfdafd', 'fadf', 12.00, 'Food-name515.jpg', 42, 'Yes', 'Yes'),
(60, 'momo', 'nice momo', 80.00, 'Food-name553.jpg', 46, 'No', 'No'),
(61, 'maggie', 'nice maggies it is food for man', 98.00, 'Food-name538.jpg', 45, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Rice', 60.00, 1, 60.00, '2024-06-10 10:53:55', 'Ordered', 'chandra', '6372606392', 'chandrashekharaprasad59@gmail.com', 'at chhanagiri po jankia '),
(2, 'Rice', 60.00, 1, 60.00, '2024-06-10 10:57:44', 'Ordered', '', 'chandrashekharaprasa', '', 'at chhanagiri po jankia '),
(3, 'Rice', 60.00, 1, 60.00, '2024-06-10 10:59:20', 'On Delivery', '', '', '', 'at chhanagiri po jankia '),
(4, 'Rice', 60.00, 1, 60.00, '2024-06-10 10:59:41', 'Ordered', 'silu', '787', 'chandra@gmail.com', 'afafd'),
(5, 'Rice', 60.00, 1, 60.00, '2024-06-10 11:01:15', 'Ordered', 'csp111', '787', 'chandra@gmail.com', 'aasda'),
(6, 'Rice', 60.00, 1, 60.00, '2024-06-10 11:02:19', 'Ordered', 'csp111', '787', 'chandra@gmail.com', 'aasda'),
(7, 'Rice', 60.00, 1, 60.00, '2024-06-10 11:03:41', 'Ordered', 'csp111', '787', 'chandra@gmail.com', 'aasss'),
(8, 'Rice', 60.00, 1, 60.00, '2024-06-10 12:11:04', 'Ordered', 'chandra', '787', 'chandra@gmail.com', 'zdfd'),
(9, 'Rice', 60.00, 1, 60.00, '2024-06-10 12:15:08', 'Delivered', 'chandra', '787', 'chandra@gmail.com', 'zdfd'),
(10, 'Rice', 60.00, 1, 60.00, '2024-06-10 12:16:18', 'Delivered', 'chandra', '787', 'chandra@gmail.com', 'zdfd'),
(11, 'Biriyani', 180.00, 1, 180.00, '2024-06-10 01:18:22', 'On Delivery', 'chandra sje', '1234567788', 'chand@ara', 'At Routarapur po chhanagiri jankia khordha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
