-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 05:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `role`, `email`, `mobile`, `status`) VALUES
(1, '', 'vinita', 's@', 1, 'sanchita@123', '12345690', 1),
(3, 'vinita', 'vinita@', 'vinita@451', 0, 'vinita2023p@gmail.com', '8299774104', 1),
(4, '', 'sanchita', 's@123', 1, 'sanchita@123', '12345690', 1),
(5, '', 'manu', 'manu@', 1, 'manu@123gmail.com', '12345690', 1),
(6, '', 'rakhi', 'rakhi', 1, 'rakhi@123', '12345690', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `heading1` varchar(255) NOT NULL,
  `heading2` varchar(255) DEFAULT NULL,
  `btn_text` varchar(255) DEFAULT NULL,
  `btn_link` varchar(55) NOT NULL,
  `order_number` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `heading1`, `heading2`, `btn_text`, `btn_link`, `order_number`, `image`, `added_on`, `status`) VALUES
(3, ' collection 2023      ', 'Rent the Style Return the Smile', 'Rent Now', 'cart.php', 0, 'lengha4.jpg', '2023-08-10 12:24:34', 1),
(4, 'collection 2023    ', 'Rent the Style Return the Smile', 'Rent Now', 'cart.php', 0, 'bg.jpg', '2023-08-10 12:42:56', 1),
(5, 'collection 2023    \r\n          ', 'Rent the Style Return the Smile', 'Rent Now', 'cart.php', 0, 'gown2.jpg', '2023-08-12 06:53:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `dress_category` varchar(50) NOT NULL,
  `booking_number` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `dress_category`, `booking_number`, `status`, `added_on`) VALUES
(1, 'Women', 4, 1, '2023-05-11 10:16:36'),
(2, 'accessories', 6, 1, '2023-05-11 10:17:56'),
(3, 'cat5', 6, 0, '2023-05-11 10:21:24'),
(5, 'Man', 1, 1, '2023-06-08 11:51:59'),
(6, 'bridal', 6, 0, '2023-08-04 08:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(3, 'vinitaD', 'vinitaD@123', '4546132356', 'good', '2023-07-06 10:16:19'),
(4, 'vinitaD', 'vinitachauhan2798@gmail.com', '12345689', 'good', '2023-07-07 10:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE `delivery_boy` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `delivery_boy`
--

INSERT INTO `delivery_boy` (`id`, `name`, `mobile`, `password`, `status`, `added_on`) VALUES
(1, 'vinita D', '4546132356', 'vi451', 1, '2023-05-12 09:35:17'),
(2, 'manasa D', '123456789', 'pp', 1, '2023-05-12 10:43:06'),
(3, 'manasa D', '12345689', 'pp', 1, '2023-05-12 10:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `dress`
--

CREATE TABLE `dress` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `dress_name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `rent_price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `security_charge` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `discription` text NOT NULL,
  `meta_litle` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dress`
--

INSERT INTO `dress` (`id`, `category_id`, `dress_name`, `price`, `rent_price`, `qty`, `security_charge`, `image`, `short_desc`, `discription`, `meta_litle`, `meta_desc`, `status`, `added_on`, `added_by`) VALUES
(1, 1, 'woo ', 1500, 150, 0, 100, 'product3.jpg', '                              ', '                                                            ', '                              ', '                              ', 1, '2023-05-13 08:16:17', 0),
(8, 1, 'woo shirts', 1000, 100, 0, 0, 'product1.jpg', '                              ', '      afdsfse                                                                     ', '                              ', '                              ', 1, '2023-05-17 10:39:47', 0),
(18, 1, 'western', 1300, 130, 1, 1300, 'download.jpg', '     Lorem ipsum dolor sit amet, consectetur adipiscing elit.                                                       ', '   Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lacinia ex nisi, a suscipit nulla dignissim eu. Pellentesque lobortis nunc sed arcu pellentesque tempor. Proin id dolor nunc. Vestibulum at lobortis diam. Mauris et fermentum ante. In cursus dignissim metus id accumsan. Nulla vel augue molestie, pellentesque lectus eleifend, vestibulum eros. Quisque suscipit quam a sem ultrices, vitae condimentum est sollicitudin. Sed eget egestas quam. Donec nec aliquet metus. Mauris purus elit, ornare sit amet convallis ut, efficitur a ipsum. Etiam eu justo cursus, imperdiet sapien eu, dictum felis. Nulla malesuada leo sed pharetra semper. Sed placerat scelerisque lacus, vel finibus turpis tincidunt non. Nam posuere scelerisque quam non porta.                                      ', '                                                            ', '                                                            ', 1, '2023-07-07 11:43:39', 0),
(19, 5, 'Sherwani', 2000, 200, 1, 0, 'sherwani1.jpg', '                              ', '                              ', '                              ', '                              ', 1, '2023-07-07 11:46:56', 0),
(22, 2, 'jhu', 500, 200, 5, 500, 'earing4.jpg', '                              ', '                jhkj              ', '                              ', '                              ', 1, '2023-08-04 08:15:30', 0),
(23, 1, 'lahnga', 500, 50, 5, 500, 'anarkali2.jpg', '                                             ', '                                             ', '                                             ', '                                             ', 1, '2023-08-07 07:27:56', 2),
(24, 2, 'tie', 250, 25, 5, 250, 'tie1.jpeg', '                it is available for rent chooes your choice             ', '  A necktie, or simply a tie, is a piece of cloth worn for decorative purposes around the neck, resting under the shirt collar and knotted at the throat, and often draped down the chest. Variants include the ascot, bow, bolo, zipper tie, cravat, and knit.                      ', '         if u want to by u  have to pay security charge..                    ', '            A necktie, or simply a tie                   ', 1, '2023-08-10 03:20:41', 1),
(25, 1, 'anarkali1', 5000, 500, 5, 5000, 'anarkali1.jpeg', '               ', '               ', '               ', '               ', 1, '2023-08-10 07:26:24', 1),
(26, 1, 'anarkali3', 1000, 10, 5, 1000, 'anarkali3.jpg', '               ', '               ', '               ', '               ', 1, '2023-08-10 07:28:19', 1),
(27, 5, 'kurta2', 1000, 100, 5, 1000, 'kurta2.jpg', '               ', '               ', '               ', '               ', 1, '2023-08-10 07:29:29', 1),
(28, 5, 'kurta3', 1000, 100, 5, 1000, 'kurta3.jpg', 'A kurta is a long, loose shirt commonly worn in South Asia.', ' A kurta is a long, loose shirt commonly worn in South Asia. In Indian cities, it\'s very common for both men and women to wear kurtas with jeans. A kurta is a kind of tunic, or long, collarless top. In various South Asian countries, kurtas are worn with loose trousers called shalwars or tighter pants known as churidars', '              ', '               ', 1, '2023-08-10 07:32:12', 1),
(29, 5, 'kurtas1', 1000, 100, 5, 1000, 'kurtas1.jpg', '               ', '               ', '               ', '               ', 1, '2023-08-10 07:33:35', 1),
(30, 5, 'suit1', 1000, 100, 5, 1000, 'suit1.jpg', '               ', '               ', '               ', '               ', 1, '2023-08-10 07:35:10', 1),
(31, 5, 'suit2', 1000, 100, 5, 1000, 'suit4.jpg', '               ', '               ', '               ', '               ', 1, '2023-08-10 07:36:12', 1),
(32, 5, 'suit3', 1000, 100, 5, 1000, 'suit3.jpg', '               ', '               ', '               ', '               ', 1, '2023-08-10 07:37:08', 1),
(33, 1, 'gown4', 1000, 100, 5, 1000, 'gown4.jpg', '               ', '               ', '               ', '               ', 1, '2023-08-10 09:04:00', 3),
(34, 1, 'gown5', 1000, 100, 5, 1000, 'lengha6.jpg', '  The lehenga, lehnga or langa is a form of ankle-length skirt from the Indian subcontinent.', '  The lehenga, lehnga or langa is a form of ankle-length skirt from the Indian subcontinent. Different patterns and styles of traditional embroidery are used to decorate the aiushi mazumder. Gota patti embroidery is often used for festivals and weddings.   ', '                    we take security charge as orignal price.       ', '             We are providing you  at 1 /10   price    of orignal price  .        ', 1, '2023-08-10 09:05:07', 3),
(35, 1, 'gown6', 1000, 100, 5, 1000, 'westernwear2.jpg', '               ', '               ', '               ', '               ', 1, '2023-08-10 09:06:23', 3),
(36, 1, 'gown8', 1000, 100, 5, 1000, 'lengha2.jpg', '         The lehenga, lehnga or langa is a form of ankle-length skirt from the Indian subcontinent.                     ', '  The lehenga, lehnga or langa is a form of ankle-length skirt from the Indian subcontinent. Different patterns and styles of traditional embroidery are used to decorate the aiushi mazumder. Gota patti embroidery is often used for festivals and weddings.       ', '             we take security charge as orignal price.                 ', '               We are providing you at 1 /10 price of orignal price .    ', 1, '2023-08-10 09:07:35', 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `rent_price` float NOT NULL,
  `security_charge` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `qty`, `rent_price`, `security_charge`) VALUES
(1, 1, 34, 2, 100, 1000),
(2, 2, 34, 2, 100, 1000),
(3, 3, 35, 4, 100, 1000),
(4, 4, 18, 2, 130, 1300),
(5, 5, 22, 2, 200, 500),
(6, 6, 34, 2, 100, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'processing'),
(3, 'shipped'),
(4, 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `mobile`, `password`, `status`, `added_on`) VALUES
(1, 'vinita', 'vinita2023p@gmail.com', '12345690', 'v@12', 1, '2023-08-09 02:56:48'),
(2, 'sanchita', 'sanchitasingh8545@gmail.com', '12345690', 's@12', 1, '2023-08-12 06:59:19'),
(3, 'shreya', 'dg5668160@gmail.com', '12345690', 'dg@123', 1, '2023-08-12 09:56:46'),
(4, 'vinita chauhan', 'vinitachauhan2798@gmail.com', '8299774104', 'v12@', 1, '2023-08-14 12:10:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`id`, `user_id`, `address`, `city`, `pincode`, `payment_type`, `total_price`, `payment_status`, `order_status`, `added_on`) VALUES
(1, 1, '\r\n    madhupur', 'sonbhadra', 231216, 'COD', 1200, 'pending', 4, '2023-08-11 10:13:00'),
(2, 2, '\r\n    rmlu', 'ayodha', 224001, 'COD', 1200, 'pending', 3, '2023-08-12 07:01:00'),
(3, 1, '\r\n    rmlu', 'ayodha', 224001, 'COD', 1400, 'pending', 1, '2023-08-12 08:05:41'),
(4, 1, '\r\n    rmlu', 'ayodha', 224001, 'COD', 1560, 'pending', 2, '2023-08-12 09:02:48'),
(5, 3, '\r\n    rmlu', 'ayodha', 224001, 'COD', 900, 'pending', 3, '2023-08-12 10:00:24'),
(6, 4, '\r\n    rmlu', 'ayodha', 224001, 'COD', 1200, 'pending', 1, '2023-08-14 12:12:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dress`
--
ALTER TABLE `dress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dress`
--
ALTER TABLE `dress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
