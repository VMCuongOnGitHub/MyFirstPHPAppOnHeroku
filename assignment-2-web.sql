-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2018 at 03:47 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment-2-web`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `category_image` varchar(50) NOT NULL,
  `short_description` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_image`, `short_description`) VALUES
(6, 'Nike', 'air-vapormax-flyknit-2-mens-shoe-BPBJRb.jpg', 'Nike is the most iconic shoes maker in the world'),
(7, 'Vans', 'download (1).png', 'Vans is an American manufacturer of skateboarding shoes'),
(8, 'Converse', 'M9160C_standard.jpg', 'Converse is the most iconic sneaker in the world');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `rating` int(1) DEFAULT NULL,
  `short_description` varchar(128) DEFAULT NULL,
  `long_description` varchar(255) DEFAULT NULL,
  `product_image` varchar(225) DEFAULT NULL,
  `added_date` datetime DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `review_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `rating`, `short_description`, `long_description`, `product_image`, `added_date`, `category_id`, `review_id`) VALUES
(22, 'Nike Air Force 1 Utility Low Premium WIP', '165', 5, 'The Nike Air Force 1 Utility Low Premium WIP Mens Shoe brings a rugged look to a basketball icon.', 'The Nike Air Force 1 Utility Low Premium WIP Mens Shoe brings a rugged look to a basketball icon. This collab with workwear retailer Carhartt adds canvas and camo ripstop for durability, while an Air-Sole unit offers classic AF1 comfort.\r\n\r\n', 'air-force-1-utility-low-premium-wip-mens-shoe-37cvf8 (1).jpg', '2017-07-20 10:37:38', 6, NULL),
(23, 'Nike x Carhartt WIP Air Force 1', '130', 4, 'Classic on classic.', 'Classic on classic. Carhartt materials like ripstop, corduroy, and wool lining help construct a durable take on the first basketball shoe to house Nike Air. The Nike x Carhartt WIP Air Force 1 also features reflective elements.', 'carhartt-wip-air-force-1-mens-shoe-RhtGps.jpg', '2017-10-25 10:24:33', 6, NULL),
(25, 'Nike Air VaporMax Utility', '190', 3, 'The Nike Air VaporMax Utility gets remixed to conquer dark, wet routes.', 'The Nike Air VaporMax Utility gets remixed to conquer dark, wet routes. A water-repellent upper helps keep your feet dry, while the toggle lacing is quick and easy to adjust. Elements throughout the upper are reflective.', 'air-vapormax-utility-mens-shoe-l6QV6Q.jpg', '2017-05-17 08:33:17', 6, NULL),
(26, 'Nike Air VaporMax Flyknit 2', '190', 4, 'The Nike Air VaporMax Flyknit 2 has lightweight, bouncy cushioning for a gravity-defying sensation.', 'The Nike Air VaporMax Flyknit 2 has lightweight, bouncy cushioning for a gravity-defying sensation. Flyknit fabric makes for a snug, flawless fit.', 'air-vapormax-flyknit-2-mens-shoe-BPBJRb.jpg', '2018-12-21 09:08:45', 6, NULL),
(27, 'OLD SKOOL', '60', 5, 'Vans classic skate shoe and the first to bare the iconic side stripe', 'Vans The Old Skool, Vans classic skate shoe and the first to bare the iconic side stripe, has a low-top lace-up silhouette with a durable suede and canvas upper with padded tongue and lining and Vans signature Waffle Outsole.', 'download (1).png', '2018-03-20 06:44:13', 7, NULL),
(28, 'SLIP-ON', '60', 5, 'Vans The Classic Slip-On has a low profile', 'Vans The Classic Slip-On has a low profile, slip-on canvas upper with all-over checker print, elastic side accents, Vans flag label and Vans original Waffle Outsole.', 'download (2).png', '2017-08-02 06:32:41', 7, NULL),
(29, 'CHECKERBOARD SLIP-ON', '100', 2, 'Vans The Classic Slip-On has a low profile', 'Vans The Classic Slip-On has a low profile, slip-on canvas upper with all-over checker print, elastic side accents, Vans flag label and Vans original Waffle Outsole.', 'download (3).png', '2018-12-11 17:18:39', 7, NULL),
(30, 'ANAHEIM FACTORY SK8-HI 38 DX', '90', 3, 'First Vans factory in Anaheim', 'Vans The Anaheim Factory Sk8-Hi 38 DX pays tribute to our first Vans factory in Anaheim, California, by borrowing details from the original Sk8-Hi and offering modernized comfort with upgraded UltraCush sockliners. The Anaheim Factory Sk8-Hi 38 DX also in', 'download (4).png', '2018-12-12 09:35:14', 7, NULL),
(31, 'SK8-HI MTE', '90', 4, 'Vans high top with additions designed for the elements', 'Vans The Sk8-Hi MTE revamps the legendary Vans high top with additions designed for the elements. Premium weather-resistant leather uppers, warm textile linings, and a heat retention layer between sockliner and outsole keep feet warm and dry while the new', 'download (5).png', '2018-12-19 13:13:38', 7, NULL),
(32, 'Converse x JW Anderson Felt Chuck 70 High Top', '120', 5, 'Fashion and craftsmanship collide', 'Fashion and craftsmanship collide at the core of everything Jonathan Anderson does. For ten years, the designer has moved art out of the gallery and onto the catwalk through his brand JW Anderson. His collaboration with Converse is an innovative meeting o', '162844C_standard.jpg', '2018-08-13 14:18:47', 8, NULL),
(33, 'Converse x Comme des GarÃ§ons PLAY Chuck 70 Low To', '110', 5, 'a playful twist', 'The Converse x Comme des GarÃ§ons PLAY Chuck 70 features classic Chuck Taylor styling with a playful twist. The quirky heart-and-eyes logo, imagined by New York graphic artist Filip Pagowski and Comme des GarÃ§onsâ€™ Rei Kawakubo, is as recognizable as th', '150207C_standard.jpg', '2017-09-14 10:31:14', 8, NULL),
(34, 'Chuck 70 Classic High Top', '70', 3, 'Our re-crafted sneaker', 'The Converse All Star Chuck â€™70 is our re-crafted sneaker that uses modern details to celebrate the original Chuck Taylor All Star from the 1970s. It features a slightly higher rubber foxing, a cushioned footbed that provides long-lasting comfort and a ', 'M9160C_standard.jpg', '2017-06-14 15:18:43', 8, NULL),
(35, 'Converse Chuck 70 GORE-TEXÂ® High Top', '95', 5, 'water-repellent canvas', 'The Converse Chuck 70 GORE-TEXÂ® sets you up with water-repellent canvas and a cushioned insole along with the classic touches you expect from your Cons.', '162350C_standard.jpg', '2017-09-22 17:29:07', 8, NULL),
(36, 'Converse x JW Anderson Chuck 70 Grid', '90', 3, 'British-based designer', 'Jonathan Anderson is a British-based designer at the forefront of the international fashion scene. His collaborative collection with Converse, inspired by the friction of clashing ideas, brings high-end appeal to street-bound style. For his latest release', '162291C_standard.jpg', '2017-08-18 10:17:44', 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `rating` int(1) DEFAULT NULL,
  `user_comment` varchar(250) DEFAULT NULL,
  `added_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(10) UNSIGNED NOT NULL,
  `slider_image` varchar(50) DEFAULT NULL,
  `image_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_image`, `image_name`) VALUES
(5, '0822-2.jpg', 'heyp'),
(12, '0822-1.jpg', '323'),
(13, '0822-3.jpg', '324234');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(13, 'admin', 'ed4060702b42311eb4f6c707b11f1999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
