-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2024 at 12:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_traineers`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_achievement`
--

CREATE TABLE `tbl_achievement` (
  `achievement_id` int(11) NOT NULL,
  `achievement_name` varchar(100) NOT NULL,
  `achievement_photo` varchar(100) NOT NULL,
  `achievement_details` varchar(500) NOT NULL,
  `traineer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_achievement`
--

INSERT INTO `tbl_achievement` (`achievement_id`, `achievement_name`, `achievement_photo`, `achievement_details`, `traineer_id`) VALUES
(6, 'Oscar', 'Screenshot (5).png', 'From america', 4),
(7, '4 th grade', 'IMG-20220808-WA0029.jpg', 'ejgfwjg', 40),
(8, '', '', '', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `admin_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`) VALUES
(5, 'Emeesha@gmail.com', '4145', 'Emeesha java'),
(6, 'Emeesha@gmail.com', '4145', 'Emeesha java'),
(7, 'Emeesha@gmail.com', '2224', 'Emeesha '),
(8, 'gdfgd', 'gdfg', 'ggdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_status` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_amount` int(11) NOT NULL,
  `delivery_date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_status`, `booking_date`, `user_id`, `booking_amount`, `delivery_date`) VALUES
(26, 1, '2024-08-31', 15, 1500, ''),
(27, 1, '2024-08-31', 15, 1500, '2024-08-31'),
(28, 1, '2024-08-31', 15, 1500, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`) VALUES
(2, 'Abbias'),
(6, ' NIke'),
(7, 'Gucci'),
(9, ' LG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_date` varchar(50) NOT NULL,
  `cart_quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_status` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cart_date`, `cart_quantity`, `product_id`, `cart_status`, `booking_id`) VALUES
(2, '', 6, 9, 1, 1),
(3, '', 3, 10, 1, 1),
(4, '2024-05-18', 3, 7, 1, 2),
(5, '2024-05-21', 2, 9, 1, 3),
(6, '2024-05-21', 4, 10, 1, 3),
(7, '2024-05-21', 2, 7, 1, 4),
(8, '2024-05-21', 4, 7, 1, 5),
(9, '2024-05-21', 1, 9, 1, 6),
(10, '2024-05-21', 8, 10, 1, 7),
(11, '2024-05-21', 4, 12, 1, 8),
(14, '2024-05-21', 2, 9, 1, 9),
(15, '2024-05-23', 2, 7, 1, 10),
(21, '2024-07-06', 2, 9, 1, 12),
(22, '2024-07-06', 1, 14, 1, 13),
(23, '2024-07-06', 1, 9, 1, 13),
(24, '2024-07-06', 2, 10, 1, 14),
(25, '2024-07-06', 1, 7, 1, 15),
(26, '2024-07-06', 1, 9, 1, 16),
(27, '2024-07-11', 2, 7, 1, 17),
(28, '2024-07-11', 1, 7, 1, 18),
(29, '2024-07-11', 2, 7, 1, 19),
(34, '', 0, 16, 0, 21),
(35, '', 0, 15, 0, 21),
(36, '', 0, 14, 0, 21),
(37, '', 0, 13, 0, 21),
(38, '', 0, 12, 0, 21),
(40, '2024-07-26', 2, 16, 1, 20),
(41, '2024-07-26', 2, 15, 1, 22),
(42, '2024-08-10', 1, 7, 1, 23),
(43, '2024-08-10', 3, 9, 1, 24),
(44, '', 0, 9, 0, 25),
(45, '2024-08-31', 1, 9, 1, 26),
(46, '2024-08-31', 2, 10, 1, 27),
(47, '2024-08-31', 1, 9, 1, 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Shoe'),
(2, 'Watches'),
(3, 'Bag'),
(4, 'Music Instrument'),
(5, 'Shoe');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_date` date NOT NULL,
  `complaint_complaint` varchar(2000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint_title` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `complaint_reply` varchar(5000) NOT NULL,
  `complaint_replydate` varchar(60) NOT NULL,
  `complaint_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_date`, `complaint_complaint`, `user_id`, `complaint_title`, `product_id`, `complaint_reply`, `complaint_replydate`, `complaint_status`) VALUES
(3, '2024-05-21', 'Edge of the product where damaged', 7, 'DAMAGE', 9, 'Sorry for the inconvenicens', '2024-05-21', 1),
(6, '2024-05-23', 'Edge of the product where damaged', 13, 'DAMAGE', 0, '', '', 0),
(7, '2024-07-06', 'Edge of the product where damaged', 15, 'DAMAGE', 0, '', '', 0),
(8, '2024-07-26', 'Edge of the product where damaged', 15, 'DAMAGE', 0, '', '', 0),
(9, '2024-07-26', 'Edge of the product where damaged', 15, 'DAMAGE', 15, 'Sorry for the inconvenicens', '2024-07-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `coursetype_id` int(11) NOT NULL,
  `course_details` varchar(1000) NOT NULL,
  `traineer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `coursetype_id`, `course_details`, `traineer_id`) VALUES
(7, 'Dance', 2, '10 months', 4),
(8, 'Western', 2, '6 month', 11),
(9, 'Classical', 2, '6 month', 13),
(10, 'Classical', 2, '12 months', 13),
(11, 'Classical', 3, '6 month             ', 17),
(12, 'Classical', 3, '6 month             ', 17),
(13, 'Classical', 3, 'wedewdw', 40),
(14, '', 0, '', 40),
(15, 'sdg', 0, 'gfg', 40),
(16, 'dsf', 0, 'dsf', 40),
(17, 'csa', 0, 'csa', 40),
(18, 'scsacascc', 0, 'feefs', 40),
(19, 'x', 0, 's', 40),
(20, 'f', 0, 'few', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coursetype`
--

CREATE TABLE `tbl_coursetype` (
  `coursetype_id` int(11) NOT NULL,
  `coursetype_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_coursetype`
--

INSERT INTO `tbl_coursetype` (`coursetype_id`, `coursetype_name`) VALUES
(2, 'Dance'),
(3, 'Song'),
(4, 'Semi classical');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(3, 'Ernakulam '),
(4, 'tvm '),
(17, 'Palakad'),
(18, 'Kannur'),
(19, ' Pala'),
(20, 'tvm'),
(21, 'Pala'),
(22, 'pala'),
(23, 'tvm'),
(24, 'palakad'),
(25, 'Kannur'),
(27, ' tvm'),
(28, ' T'),
(29, ' Palakkad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_name` varchar(200) NOT NULL,
  `gallery_photo` varchar(100) NOT NULL,
  `traineer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `gallery_name`, `gallery_photo`, `traineer_id`) VALUES
(1, 'Yoyo', 'Screenshot (3).png', 4),
(2, 'ehh', 'Screenshot (3).png', 11),
(3, 'Haalo', 'Screenshot (1).png', 12),
(4, 'denz', 'Screenshot (1).png', 13),
(5, 'HEY', 'Screenshot (3).png', 11),
(6, 'Hello', 'Screenshot (2).png', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(60) NOT NULL,
  `place_pincode` int(11) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `place_pincode`, `district_id`) VALUES
(11, 'Kalady', 683574, 3),
(12, 'dada', 65875, 2),
(13, 'eehh', 683565, 4),
(14, 'perumbavoor', 68235, 3),
(15, 'Sreekandapuram', 784512, 18),
(16, 'Mangaldam', 784512, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_price` varchar(60) NOT NULL,
  `product_details` varchar(60) NOT NULL,
  `product_image` varchar(60) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_price`, `product_details`, `product_image`, `subcategory_id`, `brand_id`, `seller_id`) VALUES
(7, 'Watch', '1500', 'From america', 'images (7).jpg', 13, 0, 0),
(9, 'Arsha', '1500', 'From america', 'Screenshot (4).png', 11, 2, 21),
(10, 'Appu', '5000', 'From India', 'Screenshot (1).png', 12, 6, 21),
(12, 'Naka', '100', 'From america', 'Screenshot (4).png', 14, 7, 21),
(13, 'HEHE', '390', 'From america', 'Screenshot (3).png', 13, 9, 29),
(14, 'WOW ', '3900', 'Made in china', 'images (7).jpg', 15, 2, 29),
(15, 'Hari', '100', 'From america', 'Screenshot (3).png', 13, 7, 27),
(16, 'Alan m', '390', 'From India', 'Screenshot (5).png', 13, 2, 27);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rating_id` int(11) NOT NULL,
  `rating_value` int(11) NOT NULL,
  `rating_comment` varchar(500) NOT NULL,
  `rating_date` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `traineer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`rating_id`, `rating_value`, `rating_comment`, `rating_date`, `user_id`, `product_id`, `traineer_id`) VALUES
(25, 3, 'h', '2024-05-30 14:12:41', 15, 0, 7),
(26, 3, 'HEy', '2024-05-30 15:51:33', 15, 0, 11),
(27, 3, 'WOW', '2024-07-06 00:10:19', 15, 0, 17),
(28, 3, 'Sup', '2024-07-26 11:46:51', 15, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `request_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `request_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`request_id`, `course_id`, `user_id`, `request_date`, `request_status`) VALUES
(1, 7, 7, '2024-05-14', 2),
(2, 7, 7, '2024-05-14', 2),
(3, 8, 7, '2024-05-14', 2),
(4, 8, 7, '2024-05-14', 2),
(5, 8, 7, '2024-05-14', 1),
(6, 8, 7, '2024-05-14', 2),
(7, 8, 12, '2024-05-14', 2),
(8, 7, 7, '2024-05-18', 2),
(9, 8, 15, '2024-05-27', 0),
(10, 8, 15, '2024-05-27', 1),
(11, 8, 15, '2024-05-27', 0),
(12, 8, 15, '2024-05-27', 0),
(13, 8, 15, '2024-05-27', 0),
(14, 11, 15, '2024-07-05', 1),
(15, 13, 15, '2024-08-10', 0),
(16, 13, 15, '2024-08-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_returnproduct`
--

CREATE TABLE `tbl_returnproduct` (
  `return_id` int(11) NOT NULL,
  `return_discription` varchar(10000) NOT NULL,
  `return_image` varchar(1000) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `return_date` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `return_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_returnproduct`
--

INSERT INTO `tbl_returnproduct` (`return_id`, `return_discription`, `return_image`, `cart_id`, `return_date`, `user_id`, `return_status`) VALUES
(1, '0', '0', 43, '2024-08-31', 15, 1),
(2, '0', '0', 43, '2024-08-31', 15, 1),
(3, '0', '0', 43, '2024-08-31', 15, 0),
(4, '0', '0', 43, '2024-08-31', 15, 1),
(5, 'tert', 'Screenshot (3).png', 43, '2024-08-31', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schat`
--

CREATE TABLE `tbl_schat` (
  `schat_id` int(11) NOT NULL,
  `schat_fromuid` int(11) NOT NULL,
  `schat_tosid` int(11) NOT NULL,
  `schat_content` varchar(500) NOT NULL,
  `schat_datetime` varchar(100) NOT NULL,
  `schat_fromsid` int(11) NOT NULL,
  `schat_touid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_schat`
--

INSERT INTO `tbl_schat` (`schat_id`, `schat_fromuid`, `schat_tosid`, `schat_content`, `schat_datetime`, `schat_fromsid`, `schat_touid`) VALUES
(13, 14, 8, 'Hey', 'May 25 2024, 12:47 PM', 0, 0),
(14, 14, 7, 'Hai', 'May 25 2024, 01:41 PM', 0, 0),
(15, 14, 13, 'hey', 'May 25 2024, 01:49 PM', 0, 0),
(16, 0, 0, 'hello', 'May 25 2024, 01:49 PM', 13, 14),
(17, 15, 13, 'hey', 'May 25 2024, 01:52 PM', 0, 0),
(18, 15, 13, 'heLLO', 'May 25 2024, 01:52 PM', 0, 0),
(19, 0, 0, 'Hello', 'May 25 2024, 01:52 PM', 13, 15),
(20, 0, 0, 'OYIII', 'May 25 2024, 01:52 PM', 13, 15),
(21, 15, 17, 'Hey', 'July 05 2024, 10:37 PM', 0, 0),
(22, 0, 0, 'Hello', 'July 05 2024, 10:39 PM', 17, 15),
(23, 15, 40, 'hey', 'August 13 2024, 12:11 PM', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller`
--

CREATE TABLE `tbl_seller` (
  `seller_id` int(11) NOT NULL,
  `seller_name` varchar(60) NOT NULL,
  `seller_contact` varchar(15) NOT NULL,
  `seller_email` varchar(60) NOT NULL,
  `seller_doj` varchar(50) NOT NULL,
  `seller_address` varchar(100) NOT NULL,
  `seller_password` varchar(20) NOT NULL,
  `seller_image` varchar(100) NOT NULL,
  `seller_proof` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `seller_status` int(11) NOT NULL,
  `seller_companyname` varchar(1000) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_seller`
--

INSERT INTO `tbl_seller` (`seller_id`, `seller_name`, `seller_contact`, `seller_email`, `seller_doj`, `seller_address`, `seller_password`, `seller_image`, `seller_proof`, `place_id`, `seller_status`, `seller_companyname`, `category_id`) VALUES
(19, 'Vaishak', '9778383911', 'arsha@gmail.com', '2024-05-08', 'Thadiyat', '45545', 'Screenshot (4).png', 'Screenshot (1).png', 12, 1, '', 0),
(20, 'Vaishak', '9778383911', 'arsha@gmail.com', '2024-05-08', 'Thadiyat', '45545', 'Screenshot (4).png', 'Screenshot (1).png', 12, 2, '', 0),
(21, 'Arsha', '9778383911', 'arsha@gmail.com', '2024-05-09', 'Thadiyat', '1234', 'Screenshot (3).png', 'Screenshot (1).png', 11, 1, '', 0),
(22, 'Helga', '965832568', 'helga@gmail.com', '2024-05-14', 'rosevilla', '12345', 'Screenshot (3).png', 'Screenshot (4).png', 11, 1, '', 0),
(24, 'Rahi', '56874123', 'rahi@gmail.com', '2024-06-14', 'redvilla', '9898', 'Screenshot (5).png', 'Screenshot (1).png', 11, 2, '', 0),
(25, 'Geethu', '1234567890', 'Geethu@gmail.com', '2024-05-01', 'QR opposite Seemas', '3214', 'Screenshot (5).png', 'Screenshot (3).png', 15, 1, '', 0),
(27, 'Appu', '904758462', 'appu@gmail.com', '2024-07-01', 'rosevilla', '1234', 'Screenshot (4).png', 'Screenshot (2).png', 12, 1, 'DD company', 1),
(28, 'Sabin ', '955658345', 'sabin@gmail.com', '2024-07-06', 'Thadiyathkodath', '159', 'images (7).jpg', 'Screenshot (3).png', 12, 1, 'K&K STORES', 4),
(29, 'Ramesh', '998665656', 'ramesh@gmail.com', '2024-07-06', 'EK (h)', '147', 'Screenshot (2).png', 'Screenshot (4).png', 12, 1, 'Anna stores', 3),
(30, 'Manoj', '8181818181', 'manoj@gmail.com', '2024-07-29', 'Hahahah', 'Manoj@123', 'Screenshot (3).png', 'Screenshot (1).png', 12, 0, 'Manoj Cmp', 4),
(33, 'Manoj', '9847565601', 'manoj@gmail.com', '2024-08-01', 'Thadiyathkodath', 'Manoj@123', 'Screenshot (3).png', 'Screenshot (1).png', 14, 0, 'Manoj Cmp', 4),
(34, 'Manoj', '9898989898', 'manoj@gmail.com', '2024-08-01', 'Vathiyath (H)', 'aA1234567', 'Screenshot (3).png', 'Screenshot (1).png', 13, 0, 'Manoj Cmp', 0),
(35, 'Manoj', '9898989898', 'manoj@gmail.com', '2024-08-01', 'Vathiyath (H)', 'aA1234567', 'Screenshot (3).png', 'Screenshot (1).png', 13, 0, 'Manoj Cmp', 0),
(36, 'Manoj', '9898989898', 'manoj@gmail.com', '2024-08-01', 'Vathiyath (H)', 'Aa1234567', 'Screenshot (3).png', 'Screenshot (1).png', 11, 0, 'Manoj Cmp', 4),
(37, 'Manoj', '9898989898', 'manoj@gmail.com', '2024-08-01', 'Thadiyathkodath', 'Aa1234567', 'Screenshot (3).png', 'Screenshot (1).png', 14, 0, 'Manoj Cmp', 3),
(38, 'Manoj', '9898989898', 'manoj@gmail.com', '2024-08-01', 'Thadiyat', 'Aa1234567', 'Screenshot (2).png', 'Screenshot (3).png', 13, 0, 'Manoj Cmp', 4),
(39, 'Manoj', '7234567891', 'manoj@gmail.com', '2024-08-01', 'ssdfgsd', 'As123456', 'Screenshot (3).png', 'Screenshot (4).png', 11, 0, 'Manoj Cmp', 1),
(40, 'Manoj', '6598741234', 'manoj@email.com', '2024-08-01', 'EK (h)', 'As123456', 'Screenshot (3).png', 'Screenshot (1).png', 11, 0, 'Manoj Cmp', 4),
(41, 'Manoj', '6235987410', 'manoj@gmail.com', '2024-08-01', 'Hahahah', 'As123456', 'Screenshot (4).png', 'Screenshot (2).png', 13, 0, 'Manoj Cmp', 4),
(42, 'Arsha', '9898989987', 'manoj@gmail.com', '2024-08-01', 'Thadiyat', 'As123456', 'Screenshot (3).png', 'Screenshot (4).png', 11, 0, 'Anna stores', 4),
(43, 'Arsha', '9898989898', 'arsha@gmail.com', '2024-08-01', 'yhdfthy', 'As123456', 'Screenshot (2).png', 'Screenshot (3).png', 11, 0, 'CSZc', 4),
(44, 'Arsha', '9898989898', 'arsha@gmail.com', '2024-08-01', 'Thadiyat', 'As123456', 'Screenshot (4).png', 'Screenshot (1).png', 11, 0, 'CSZc', 4),
(45, 'Hello', '9867542100', 'aa@gmail.com', '2024-08-16', 'sdgxgxcg', 'As123456', 'IMG-20220808-WA0029.jpg', 'bb7cd6f3-c55f-433b-8b31-659d0cefc97b.jpg', 11, 0, 'A', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(60) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(11, 'fghjfvg', 1),
(12, 'Nike', 1),
(13, 'Rolex', 2),
(14, 'ee', 3),
(15, 'Piano', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_traineer`
--

CREATE TABLE `tbl_traineer` (
  `traineer_id` int(11) NOT NULL,
  `traineer_name` varchar(60) NOT NULL,
  `traineer_email` varchar(60) NOT NULL,
  `traineer_contact` varchar(15) NOT NULL,
  `traineer_dob` date NOT NULL,
  `traineer_photo` varchar(100) NOT NULL,
  `traineer_proof` varchar(100) NOT NULL,
  `traineer_status` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `traineer_password` varchar(50) NOT NULL,
  `traineer_address` varchar(100) NOT NULL,
  `traineer_experience` varchar(500) NOT NULL,
  `traineer_qualification` varchar(10000) NOT NULL,
  `traineer_course` varchar(500) NOT NULL,
  `course_id` int(11) NOT NULL,
  `traineer_gender` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_traineer`
--

INSERT INTO `tbl_traineer` (`traineer_id`, `traineer_name`, `traineer_email`, `traineer_contact`, `traineer_dob`, `traineer_photo`, `traineer_proof`, `traineer_status`, `place_id`, `traineer_password`, `traineer_address`, `traineer_experience`, `traineer_qualification`, `traineer_course`, `course_id`, `traineer_gender`) VALUES
(16, 'Athira', 'athira@gamil.com', 'athira@gmail.co', '2024-07-10', 'Screenshot (3).png', 'Screenshot (2).png', 1, 14, '1212', 'Ben villa', '1 Year', 'Screenshot (1).png', 'Classical', 2, ''),
(17, 'hanna', 'hanna12@gmail.com', '985635566', '2024-07-08', 'Screenshot (3).png', 'Screenshot (3).png', 1, 12, '147', 'thegabnganal', '3 years', 'Screenshot (5).png', 'Classical', 3, 'Female'),
(18, 'Mikasa', 'mikasa@gmail.com', '1234567890', '2024-07-10', 'Screenshot (4).png', 'Screenshot (2).png', 1, 16, '121212', 'rosevilla', '3 years', 'Screenshot (5).png', 'Classical', 3, ''),
(19, 'Reiner', 'reiner@gmail.com', '9874563210', '2024-07-03', 'Screenshot (5).png', 'Screenshot (2).png', 1, 15, '131313', 'Thadiyathkodath', '1 years', 'images (7).jpg', 'Western', 4, ''),
(20, 'Hinata', 'hinata@gmail.com', '6543219870', '2024-07-10', 'images (7).jpg', 'Screenshot (5).png', 1, 14, '141414', 'Ben villa', 'Fresher', 'Screenshot (2).png', 'Western', 3, ''),
(39, 'Helga', 'helga@gmail.com', '9865321400', '2024-08-07', 'Screenshot (2).png', 'Screenshot (2).png', 1, 11, 'A1234a123', 'Thadiyat', '1 Year', 'Screenshot (3).png', 'Dance', 3, 'male'),
(40, 'Anzeena', 'anzeena@gmail.com', '9847356301', '2024-08-01', 'IMG_20221030_090023.jpg', 'IMG_20220927_210422.jpg', 1, 14, 'As123456', 'Pothen', '1 year', 'IMG-20220808-WA0029.jpg', 'Classical', 3, 'female'),
(43, 'Jithin ', 'jithin1@gmai.com', '9087561234', '2024-08-07', 'Screenshot (2).png', 'Screenshot (1).png', 2, 11, 'Jithin@123', 'Pothen', '1 year', 'Screenshot (1).png', 'Classical', 2, 'male'),
(45, 'Jithin ', 'jithin1@gmai.com', '9087561234', '2024-08-07', 'Screenshot (2).png', 'Screenshot (1).png', 0, 11, 'Jithin@123', 'Pothen', '1 year', 'Screenshot (1).png', 'Classical', 2, 'male'),
(50, 'Eren ', 'eren@gmail.com', '9821212121', '2003-02-28', 'Screenshot (2).png', 'Screenshot (1).png', 0, 16, 'Er1234567', 'Deee', '1 year \r\nfourth grade', 'Screenshot (2).png', 'Classical', 3, 'male'),
(51, 'MI', 'mi@gmail.com', '9867543210', '2004-02-03', 'Screenshot (2).png', 'Screenshot (1).png', 0, 15, 'Mi1234567', 'qdddddddfw', 'sgttfdjthreh', 'Screenshot (2).png', 'Classical', 4, 'male'),
(52, 'Hey', 'hey@gmail.com', '9847356302', '2004-02-16', 'IMG-20220808-WA0029.jpg', 'IMG-20220710-WA0066.jpg', 1, 14, 'He123456', 'fsdigfdsi', 'gfeigyysdufdsug', 'IMG-20220808-WA0029.jpg', 'Classical', 2, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_gender` varchar(60) NOT NULL,
  `user_contact` varchar(606) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_photo` varchar(60) NOT NULL,
  `user_proof` varchar(60) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_dob` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_gender`, `user_contact`, `user_email`, `user_password`, `place_id`, `user_photo`, `user_proof`, `user_address`, `user_status`, `user_dob`) VALUES
(14, 'Ram', 'male', '456123789', 'ram@gmail.com', '121212', 15, 'Screenshot (3).png', 'Screenshot (2).png', 'Ben villa', 0, ''),
(15, 'Charan', 'male', '987456321', 'charan@gmail.com', '9898', 16, 'Screenshot (5).png', 'Screenshot (2).png', 'redvilla', 0, '21-01-2004'),
(16, 'Erin ', 'male', '9856445810', 'erin@gmail.com', '123456', 11, 'images (7).jpg', 'Screenshot (2).png', 'Village', 0, '2024-07-11'),
(21, 'Ramesh', 'male', '9778383911', 'helga@gmail.com', '1234A123a@', 11, 'Screenshot (3).png', 'Screenshot (3).png', 'Thadiyat', 0, '2024-08-30'),
(22, 'Ramesh', 'male', '9778383911', 'helga@gmail.com', '123456As', 16, 'Screenshot (2).png', 'Screenshot (3).png', 'Ben villa', 0, '2024-08-12'),
(23, 'World', 'male', '9087561234', 'world@gmail.com', 'Ee123456', 14, 'IMG-20220808-WA0029.jpg', 'IMG_20220927_210422.jpg', 'dhfhdfgf', 0, '2024-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `video_id` int(11) NOT NULL,
  `video_discription` varchar(500) NOT NULL,
  `video_video` varchar(1500) NOT NULL,
  `traineer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`video_id`, `video_discription`, `video_video`, `traineer_id`) VALUES
(4, 'AFSDE', 'Screenshot (2).png', 17),
(6, 'INstrument playing', 'Sia -Cheap Thrills cimbaly instrumental cover _ live music.mp4', 17),
(7, 'intro', 'IMG-20221109-WA0024.jpg', 40),
(8, '', '', 40),
(9, '', '', 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_achievement`
--
ALTER TABLE `tbl_achievement`
  ADD PRIMARY KEY (`achievement_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_coursetype`
--
ALTER TABLE `tbl_coursetype`
  ADD PRIMARY KEY (`coursetype_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tbl_returnproduct`
--
ALTER TABLE `tbl_returnproduct`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `tbl_schat`
--
ALTER TABLE `tbl_schat`
  ADD PRIMARY KEY (`schat_id`);

--
-- Indexes for table `tbl_seller`
--
ALTER TABLE `tbl_seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_traineer`
--
ALTER TABLE `tbl_traineer`
  ADD PRIMARY KEY (`traineer_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_achievement`
--
ALTER TABLE `tbl_achievement`
  MODIFY `achievement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_coursetype`
--
ALTER TABLE `tbl_coursetype`
  MODIFY `coursetype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_returnproduct`
--
ALTER TABLE `tbl_returnproduct`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_schat`
--
ALTER TABLE `tbl_schat`
  MODIFY `schat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_seller`
--
ALTER TABLE `tbl_seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_traineer`
--
ALTER TABLE `tbl_traineer`
  MODIFY `traineer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
