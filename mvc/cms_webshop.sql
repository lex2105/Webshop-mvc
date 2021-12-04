-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2021 at 10:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'klazar@gmail.com', '2021-12-03 21:53:21', '2021-12-03 21:53:21', NULL),
(2, 'klazar@gmail.com', '2021-12-03 21:55:19', '2021-12-03 21:55:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `number` int(5) NOT NULL,
  `postal_code` int(5) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `card_type` varchar(10) NOT NULL,
  `card_holder` varchar(100) NOT NULL,
  `card_number` int(16) NOT NULL,
  `expire_date` varchar(5) NOT NULL,
  `cvv` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `price`, `created_at`, `updated_at`, `deleted_at`, `address`, `number`, `postal_code`, `city`, `state`, `card_type`, `card_holder`, `card_number`, `expire_date`, `cvv`) VALUES
(1, 1, '57.00', '2021-12-03 13:40:54', '2021-12-03 13:40:54', NULL, 'Hauptstrasse', 65, 1010, 'wien', 'austria', '', 'mark mustermann', 2147483647, '01/01', 612),
(2, 1, '57.00', '2021-12-03 13:45:24', '2021-12-03 13:45:24', NULL, 'Hauptstrasse', 65, 1010, 'wien', 'austria', '', 'mark mustermann', 2147483647, '01/01', 612),
(3, 1, '57.00', '2021-12-03 14:19:50', '2021-12-03 14:19:50', NULL, 'Landstrasse', 37, 1030, 'Wien', 'Austria', '', 'Ana Mustermann', 2147483647, '12/23', 364),
(4, 1, '57.00', '2021-12-03 14:20:54', '2021-12-03 14:20:54', NULL, 'Landstrasse', 37, 1030, 'Wien', 'Austria', '', 'Ana Mustermann', 2147483647, '12/23', 364),
(5, 3, '23.00', '2021-12-03 17:35:50', '2021-12-03 17:35:50', NULL, 'Kärtnerstrasse', 7, 1010, 'Wien', 'Austria', '', 'Josko Josic', 2147483647, '04/23', 364),
(6, 3, '23.00', '2021-12-03 17:55:58', '2021-12-03 17:55:58', NULL, 'Kärtnerstrasse', 7, 1010, 'Wien', 'Austria', '', 'Josko Josic', 2147483647, '04/23', 364),
(7, 3, '23.00', '2021-12-03 18:10:59', '2021-12-03 18:10:59', NULL, 'Kärtnerstrasse', 7, 1010, 'Wien', 'Austria', '', 'Josko Josic', 2147483647, '04/23', 364),
(8, 3, '23.00', '2021-12-03 18:22:15', '2021-12-03 18:22:15', NULL, 'Kärtnerstrasse', 7, 1010, 'Wien', 'Austria', '', 'Josko Josic', 2147483647, '04/23', 364),
(9, 3, '23.00', '2021-12-03 18:45:34', '2021-12-03 18:45:34', NULL, 'Kärtnerstrasse', 7, 1010, 'Wien', 'Austria', '', 'Josko Josic', 2147483647, '04/23', 364),
(10, 4, '5.00', '2021-12-03 22:21:35', '2021-12-03 22:21:35', NULL, 'Hauptstrasse', 34, 1010, 'Wien', 'Austria', '', 'Josko Josic', 2147483647, '12/21', 234),
(11, 4, '5.00', '2021-12-03 22:28:36', '2021-12-03 22:28:36', NULL, 'Hauptstrasse', 34, 1010, 'Wien', 'Austria', '', 'Josko Josic', 2147483647, '12/21', 234),
(12, 4, '16.00', '2021-12-03 22:30:01', '2021-12-03 22:30:01', NULL, 'Landstrasse', 87, 1020, 'Wien', 'Austria', '', 'Ana Mustermann', 2147483647, '12/23', 839),
(13, 4, '67.00', '2021-12-03 22:54:31', '2021-12-03 22:54:31', NULL, 'Hauptstrasse', 7, 1020, 'Wien', 'Austria', '', 'Ana Mustermann', 2147483647, '12/21', 364),
(14, 4, '67.00', '2021-12-03 22:55:52', '2021-12-03 22:55:52', NULL, 'Hauptstrasse', 7, 1020, 'Wien', 'Austria', '', 'Ana Mustermann', 2147483647, '12/21', 364),
(15, 4, '95.00', '2021-12-03 23:08:12', '2021-12-03 23:08:12', NULL, 'Landstrasse', 87, 1020, 'Wien', 'Austria', '', 'Ana Mustermann', 2147483647, '12/23', 697),
(16, 4, '95.00', '2021-12-03 23:14:28', '2021-12-03 23:14:28', NULL, 'Landstrasse', 43, 1030, 'Wien', 'Austria', '', 'Ana Mustermann', 2147483647, '12/21', 213),
(17, 4, '25.00', '2021-12-03 23:18:53', '2021-12-03 23:18:53', NULL, 'Landstrasse', 6, 1020, 'Wien', 'Austria', '', 'Ana Mustermann', 2147483647, '12/21', 345),
(18, 4, '25.00', '2021-12-03 23:20:40', '2021-12-03 23:20:40', NULL, 'Landstrasse', 34, 1010, 'Wien', 'Austria', '', 'Ana Mustermann', 2147483647, '12/21', 456),
(19, 4, '10.50', '2021-12-03 23:24:58', '2021-12-03 23:24:58', NULL, 'Hauptstrasse', 1, 1010, 'Wien', 'Austria', '', 'Ana Mustermann', 2147483647, '12/21', 364),
(20, 1, '64.25', '2021-12-04 19:35:37', '2021-12-04 19:35:37', NULL, 'Simmeringer Strasse', 56, 1110, 'Wien', 'Austria', '', 'Luana Mayer', 2147483647, '04/22', 345),
(21, 1, '64.25', '2021-12-04 19:37:02', '2021-12-04 19:37:02', NULL, 'Simmeringer Strasse', 56, 1110, 'Wien', 'Austria', '', 'Luana Mayer', 2147483647, '04/22', 345),
(22, 1, '64.25', '2021-12-04 19:37:17', '2021-12-04 19:37:17', NULL, 'Simmeringer Strasse', 56, 1110, 'Wien', 'Austria', '', 'Luana Mayer', 2147483647, '04/22', 345),
(23, 1, '28.85', '2021-12-04 19:38:16', '2021-12-04 19:38:16', NULL, 'Landstrasse', 9, 1030, 'Wien', 'Austria', '', 'Luana Mayer', 2147483647, '12/21', 541),
(24, 1, '28.85', '2021-12-04 19:42:25', '2021-12-04 19:42:25', NULL, 'Landstrasse', 9, 1030, 'Wien', 'Austria', '', 'Luana Mayer', 2147483647, '12/21', 541),
(25, 1, '131.00', '2021-12-04 19:43:13', '2021-12-04 19:43:13', NULL, 'Kärtnerstrasse', 5, 1030, 'Wien', 'Austria', '', 'Luana Mayer', 2147483647, '12/21', 612);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `product_id`, `quantity`, `price`, `order_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 2, '13.00', 16, '2021-12-03 23:14:29', '2021-12-03 23:14:29', NULL),
(2, 11, 2, '16.00', 16, '2021-12-03 23:14:29', '2021-12-03 23:14:29', NULL),
(3, 9, 1, '39.00', 16, '2021-12-03 23:14:29', '2021-12-03 23:14:29', NULL),
(4, 14, 1, '25.00', 18, '2021-12-03 23:20:40', '2021-12-03 23:20:40', NULL),
(5, 4, 1, '10.50', 19, '2021-12-03 23:24:58', '2021-12-03 23:24:58', NULL),
(6, 6, 2, '12.65', 20, '2021-12-04 19:35:37', '2021-12-04 19:35:37', NULL),
(7, 9, 1, '38.95', 20, '2021-12-04 19:35:37', '2021-12-04 19:35:37', NULL),
(8, 12, 1, '28.85', 23, '2021-12-04 19:38:16', '2021-12-04 19:38:16', NULL),
(9, 15, 2, '65.50', 25, '2021-12-04 19:43:13', '2021-12-04 19:43:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`, `price`, `category`) VALUES
(2, 'Maskara', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'mascara3.jpg', '2021-12-01 23:58:00', '2021-12-04 17:30:54', NULL, '8.00', 'eyes'),
(3, 'Lipgloss', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'lipgloss1.jpg', '2021-12-01 23:59:23', '2021-12-04 17:59:33', NULL, '6.90', 'lips'),
(4, 'Blush', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum enim facilisis gravida neque convallis a.', 'blush.jpg', '2021-12-02 00:00:34', '2021-12-04 17:32:26', NULL, '10.50', 'face'),
(5, 'Best skin ever foundation', 'This light-as-air, talc-free foundation blurs the look of pores and fine lines, and gives you a soft-focus, photo-ready effect. Perfect for all skin types.', 'foundation1.jpg', '2021-12-02 07:43:12', '2021-12-04 17:28:43', NULL, '19.99', 'face'),
(6, 'Volume mascara', 'Lorem ipsum dolor. Cursus sit amet dictum sit amet justo donec. Sed risus ultricies tristique nulla aliquet enim tortor at. Tempor nec feugiat nisl pretium fusce id velit ut.', 'mascara1.jpg', '2021-12-02 07:45:32', '2021-12-04 17:33:15', NULL, '12.65', 'eyes'),
(7, 'Fake lashes mascara', 'Enim lobortis scelerisque fermentum dui faucibus in ornare quam. Dui ut ornare lectus sit amet est placerat in. Cras pulvinar mattis nunc sed blandit libero.', 'mascara2.jpg', '2021-12-02 07:45:32', '2021-12-04 17:33:42', NULL, '15.50', 'eyes'),
(8, 'Christmas wonderland lipstick set', 'Magna sit amet purus gravida quis blandit turpis cursus in. Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Imperdiet dui accumsan sit amet nulla facilisi morbi tempus.', 'lipsticks-set-christmas.jpg', '2021-12-02 07:48:13', '2021-12-04 17:34:07', NULL, '45.85', 'christmas'),
(9, 'Sparkling christmas lipgloss set', 'Amet justo donec enim diam vulputate ut. Quam quisque id diam vel quam elementum. Vulputate ut pharetra sit amet aliquam id diam maecenas ultricies. Sit amet nulla facilisi morbi tempus iaculis.', 'lipglosses-set-christmas.jpg', '2021-12-02 07:48:13', '2021-12-04 17:34:31', NULL, '38.95', 'christmas'),
(10, 'Pink dream lipstick', 'Pulvinar elementum integer enim neque volutpat. Massa sed elementum tempus egestas. At tellus at urna condimentum mattis pellentesque id. In hendrerit gravida rutrum quisque non tellus.', 'lipstick1.jpg', '2021-12-02 07:50:27', '2021-12-04 17:35:03', NULL, '15.50', 'lips'),
(11, 'Fierce red lipstick', 'Arcu risus quis varius quam quisque id. Ac tortor dignissim convallis aenean et tortor at. Et pharetra pharetra massa massa ultricies mi quis. Sem et tortor consequat id porta nibh.', 'lipstick2.jpg', '2021-12-02 07:50:27', '2021-12-04 17:35:36', NULL, '15.50', 'lips'),
(12, 'Hot pink set', 'Lipgloss and lipstick that go perfectly together. At erat pellentesque adipiscing commodo elit. Maecenas sed enim ut sem viverra aliquet eget. Id nibh tortor id aliquet.', 'lips-set1.jpg', '2021-12-02 07:53:10', '2021-12-04 17:36:11', NULL, '28.85', 'lips'),
(13, 'Primer spray', 'Spray before applying makeup, so that your glam can last the whole day. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi. Sed ullamcorper morbi tincidunt ornare massa eget. Turpis tincidunt id aliquet risus feugiat in ante metus.', 'primer-spray.jpg', '2021-12-02 07:53:10', '2021-12-04 17:36:46', NULL, '16.00', 'face'),
(14, 'Setting powder', 'Sapien eget mi proin sed libero enim sed faucibus. Senectus et netus et malesuada fames ac. Mi sit amet mauris commodo quis imperdiet massa. Sed adipiscing diam donec adipiscing tristique. Mattis enim ut tellus elementum sagittis vitae et.', 'puder-detail.jpg', '2021-12-02 07:54:38', '2021-12-04 17:59:00', NULL, '25.45', 'face'),
(15, 'Essentials christmas set', 'In pellentesque massa placerat duis ultricies. Senectus et netus et malesuada fames ac turpis. Nisl nunc mi ipsum faucibus. Massa massa ultricies mi quis hendrerit dolor magna eget est. Diam quis enim lobortis scelerisque fermentum. Nascetur ridiculus mus mauris vitae ultricies leo integer malesuada nunc.', 'christmas-set-essentials.jpg', '2021-12-04 17:50:16', '2021-12-04 17:50:16', NULL, '65.50', 'christmas'),
(16, 'Prep christmas set', 'In ante metus dictum at tempor commodo ullamcorper. Aenean euismod elementum nisi quis eleifend quam. Gravida dictum fusce ut placerat orci nulla pellentesque dignissim. Eu lobortis elementum nibh tellus molestie nunc non.', 'christmas-set-prep.jpg', '2021-12-04 17:50:16', '2021-12-04 17:50:16', NULL, '40.99', 'christmas'),
(17, 'Sunset eyeshadow palette', 'Convallis posuere morbi leo urna molestie at. Tincidunt arcu non sodales neque sodales ut. Ultrices neque ornare aenean euismod. Convallis a cras semper auctor neque vitae tempus quam. Amet porttitor eget dolor morbi non. Urna duis convallis convallis tellus id interdum velit laoreet id. ', 'eyeshadow-palette.jpg', '2021-12-04 17:56:11', '2021-12-04 17:56:11', NULL, '34.95', 'eyes');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user1', '$2y$10$8c/aeEUq8w9yVE3elJC0hulOU81KZqMVy4ikqHGQsLj0e0M6ImFSO', 'email@email.com', 'Example', 'User', '2021-12-03 11:49:56', '2021-12-03 12:19:09', NULL),
(3, 'jjosic', 'Hello12#', 'jjosic@mail.com', 'josko', 'josic', '2021-12-03 15:20:47', '2021-12-03 15:20:47', NULL),
(4, 'kathy15', '$2y$10$Auh.cqvfqKCp.fP7a33bM.dgTRfUFFj.I5ka0lv/fU5Tl1/4HDL/C', 'klazar@gmail.com', 'Katherine', 'Lazar', '2021-12-03 20:08:37', '2021-12-03 20:08:37', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id_fk` (`product_id`),
  ADD KEY `order_id_fk` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
