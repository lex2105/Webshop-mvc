-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 04:53 PM
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
(2, 'klazar@gmail.com', '2021-12-03 21:55:19', '2021-12-03 21:55:19', NULL),
(3, 'mars@mail.com', '2021-12-12 21:54:50', '2021-12-12 21:54:50', NULL),
(4, 'hmarx@gmail.com', '2021-12-13 07:41:48', '2021-12-13 07:41:48', NULL),
(5, 'email@email.com', '2021-12-13 12:00:16', '2021-12-13 12:00:16', NULL);

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
(16, 4, '95.00', '2021-12-03 23:14:28', '2021-12-03 23:14:28', NULL, 'Landstrasse', 43, 1030, 'Wien', 'Austria', '', 'Ana Mustermann', 2147483647, '12/21', 213),
(18, 4, '25.00', '2021-12-03 23:20:40', '2021-12-03 23:20:40', NULL, 'Landstrasse', 34, 1010, 'Wien', 'Austria', '', 'Ana Mustermann', 2147483647, '12/21', 456),
(19, 4, '10.50', '2021-12-03 23:24:58', '2021-12-03 23:24:58', NULL, 'Hauptstrasse', 1, 1010, 'Wien', 'Austria', '', 'Ana Mustermann', 2147483647, '12/21', 364),
(20, 1, '64.25', '2021-12-04 19:35:37', '2021-12-04 19:35:37', NULL, 'Simmeringer Strasse', 56, 1110, 'Wien', 'Austria', '', 'Luana Mayer', 2147483647, '04/22', 345),
(23, 1, '28.85', '2021-12-04 19:38:16', '2021-12-04 19:38:16', NULL, 'Landstrasse', 9, 1030, 'Wien', 'Austria', '', 'Luana Mayer', 2147483647, '12/21', 541),
(25, 1, '131.00', '2021-12-04 19:43:13', '2021-12-04 19:43:13', NULL, 'Kärtnerstrasse', 5, 1030, 'Wien', 'Austria', '', 'Luana Mayer', 2147483647, '12/21', 612),
(26, 1, '39.98', '2021-12-06 12:12:35', '2021-12-06 12:12:35', NULL, 'Hauptstrasse', 87, 1010, 'Wien', 'Austria', '', 'Luana Mayer', 2147483647, '12/21', 546),
(27, 6, '50.75', '2021-12-12 22:27:21', '2021-12-12 22:27:21', NULL, 'Mariahilfer Strasse', 34, 1060, 'Vienna', 'Austria', '', 'Lena Gruber', 2147483647, '12/22', 396),
(28, 6, '91.70', '2021-12-12 22:38:22', '2021-12-12 22:38:22', NULL, 'Hauptstrasse', 41, 1070, 'Vienna', 'Austria', '', 'Lena Gruber', 2147483647, '05/23', 437),
(30, 7, '92.80', '2021-12-13 07:36:36', '2021-12-13 07:36:36', NULL, 'Simmeringer Hauptstrasse', 32, 1110, 'Vienna', 'Austria', '', 'Hanna Marx', 2147483647, '06/25', 930),
(31, 1, '122.97', '2021-12-13 07:52:57', '2021-12-13 07:52:57', NULL, 'Hauptstrasse', 34, 1070, 'Vienna', 'Austria', '', 'Luisa Mayer', 2147483647, '12/25', 435),
(32, 6, '57.70', '2021-12-13 11:58:46', '2021-12-13 11:58:46', NULL, 'Hauptstrasse', 32, 1070, 'Vienna', 'Austria', '', 'Lena Gruber', 2147483647, '12/25', 647);

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
(9, 15, 2, '65.50', 25, '2021-12-04 19:43:13', '2021-12-04 19:43:13', NULL),
(10, 5, 2, '19.99', 26, '2021-12-06 12:12:35', '2021-12-06 12:12:35', NULL),
(11, 6, 2, '12.65', 27, '2021-12-12 22:27:21', '2021-12-12 22:27:21', NULL),
(12, 14, 1, '25.45', 27, '2021-12-12 22:27:21', '2021-12-12 22:27:21', NULL),
(13, 8, 2, '45.85', 28, '2021-12-12 22:38:22', '2021-12-12 22:38:22', NULL),
(14, 3, 1, '6.90', 30, '2021-12-13 07:36:36', '2021-12-13 07:36:36', NULL),
(15, 13, 1, '16.00', 30, '2021-12-13 07:36:36', '2021-12-13 07:36:36', NULL),
(16, 17, 2, '34.95', 30, '2021-12-13 07:36:36', '2021-12-13 07:36:36', NULL),
(17, 16, 3, '40.99', 31, '2021-12-13 07:52:57', '2021-12-13 07:52:57', NULL),
(18, 12, 2, '28.85', 32, '2021-12-13 11:58:46', '2021-12-13 11:58:46', NULL);

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
(2, 'Full length mascara', 'A lengthening mascara that curls, volumizes, lifts, and separates lashes for an \"out-of-here\" look. This breakthrough product reveals lashes you never knew you had! The specially designed brush features staggered bristles that grab close to the root, boosting length and volume beyond belief. The custom-domed tip uses precision bristles to lift, define, and curl even your tiniest lashes. With a glossy, jet-black, long-wearing formula, you’ll flaunt luxurious, silky lashes that won’t smudge, clump,', 'mascara3.jpg', '2021-12-01 23:58:00', '2021-12-13 15:18:44', NULL, '8.00', 'eyes'),
(3, 'Ultra shine lip gloss', 'An ultimate, gotta-have-it lip gloss with explosive shine that feels as good as it looks. It creates fuller-looking lips in a few seconds. Glides on comfortably for everyday wear.', 'lipgloss1.jpg', '2021-12-01 23:59:23', '2021-12-13 15:22:30', NULL, '6.90', 'lips'),
(4, 'Blush', 'A creamy, smooth, and seamless cheek color that glides onto the skin and melts upon contact for a flawless, second-skin finish.', 'blush.jpg', '2021-12-02 00:00:34', '2021-12-13 15:16:04', NULL, '10.50', 'face'),
(5, 'Best skin ever foundation', 'This light-as-air, talc-free foundation blurs the look of pores and fine lines, and gives you a soft-focus, photo-ready effect. Perfect for all skin types.', 'foundation1.jpg', '2021-12-02 07:43:12', '2021-12-04 17:28:43', NULL, '19.99', 'face'),
(6, 'Volume mascara', 'With the help of a special brush, our Volume Mascara condenses individual lashes into a thick fan. The mineral pigments can be applied in straight strokes or zig-zag movements to create expressive lashes and provide valuable eyelash care.', 'mascara1.jpg', '2021-12-02 07:45:32', '2021-12-13 15:03:30', NULL, '12.65', 'eyes'),
(7, 'Fake lashes mascara', 'A universal mascara with a unique eye-hugging brush to lift, lengthen, curl, and volumize every lash type for a lusher look. You will not need fake lashes with this mascara.', 'mascara2.jpg', '2021-12-02 07:45:32', '2021-12-13 15:05:25', NULL, '15.50', 'eyes'),
(8, 'Christmas wonderland lipstick set', 'An exclusive lipstick set consisting of a limited edition lipstick trio in various red shades, which are a perfect shade of red for Christmas season for all skin tones.', 'lipsticks-set-christmas.jpg', '2021-12-02 07:48:13', '2021-12-13 15:22:56', NULL, '45.85', 'christmas'),
(9, 'Sparkling christmas lipgloss set', 'An exclusive lip set consisting of a lip gloss trio in limited cool or warm shades. Perfect for the holidays and the festive season. Be sure to grab it before it\'s gone.', 'lipglosses-set-christmas.jpg', '2021-12-02 07:48:13', '2021-12-13 15:11:11', NULL, '38.95', 'christmas'),
(10, 'Pink dream lipstick', 'Perfect shade of hot pink chosen particularly for all pink lovers. The finish is matte and therefore long lasting. ', 'lipstick1.jpg', '2021-12-02 07:50:27', '2021-12-13 15:01:16', NULL, '15.50', 'lips'),
(11, 'Fierce red lipstick', 'Arcu risus quis varius quam quisque id. Ac tortor dignissim convallis aenean et tortor at. Et pharetra pharetra massa massa ultricies mi quis. Sem et tortor consequat id porta nibh.', 'lipstick2.jpg', '2021-12-02 07:50:27', '2021-12-11 19:28:14', '2021-12-11 19:28:14', '15.50', 'lips'),
(12, 'Hot pink set', 'Lipgloss and lipstick that go perfectly together. At erat pellentesque adipiscing commodo elit. Maecenas sed enim ut sem viverra aliquet eget. Id nibh tortor id aliquet.', 'lips-set1.jpg', '2021-12-02 07:53:10', '2021-12-04 17:36:11', NULL, '28.85', 'lips'),
(13, 'Primer spray', 'Spray before applying makeup, so that your glam can last the whole day. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi. Sed ullamcorper morbi tincidunt ornare massa eget. Turpis tincidunt id aliquet risus feugiat in ante metus.', 'primer-spray.jpg', '2021-12-02 07:53:10', '2021-12-04 17:36:46', NULL, '16.00', 'face'),
(14, 'Setting powder', 'This setting powder will resolve your issues of having a shiny forehead. Perfect for people with oily skin. ', 'puder-detail.jpg', '2021-12-02 07:54:38', '2021-12-13 14:55:24', NULL, '25.45', 'face'),
(15, 'Essentials christmas set', 'A limited edition, four-piece set for eyes and lips with essential neutral or red shades. Consists of a mascara, eyeshadow, eyeliner and lip gloss. Perfect for any basic look.', 'christmas-set-essentials.jpg', '2021-12-04 17:50:16', '2021-12-13 14:52:22', NULL, '65.50', 'christmas'),
(16, 'Prep christmas set', 'a limited edition skin care kit, includes studio fix mattifying 12hr shine-control primer, prep + prime lip and a mini fix+.', 'christmas-set-prep.jpg', '2021-12-04 17:50:16', '2021-12-13 14:44:06', NULL, '40.99', 'christmas'),
(17, 'Sunset eyeshadow palette', 'The palette is perfect for everyday makeup. The colors blend easily and have a very good pigment payoff. Shades in the palette were picked in order for it to make the perfect wide range of daytime looks.', 'eyeshadow-palette.jpg', '2021-12-04 17:56:11', '2021-12-13 14:49:27', NULL, '34.95', 'eyes'),
(20, 'Red lipstick', 'This lipstick has a satin finish. The particular shade of red is perfect for a girls night our or family parties during holidays. ', 'lipstick3.jpg', '2021-12-11 19:25:02', '2021-12-13 14:47:17', NULL, '9.99', 'lips'),
(26, 'Colorful eyeshadow palette', 'Use this eyeshadow palette to create hundreds of colorful makeup looks. The colors are very pigmented and blend like a dream. ', 'eyeshadow2.jpg', '2021-12-13 14:28:43', '2021-12-13 14:45:33', NULL, '19.00', 'eyes');

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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `created_at`, `updated_at`, `deleted_at`, `is_admin`) VALUES
(1, 'admin', '$2a$12$d2N93UFJfb/YSi6CEPbadOsFsKbIWBFuSlEmxrHACT9fjI4i9N8fO', 'arthur.dent@galaxy.com', 'Arthur', 'Dent', '2021-12-03 11:49:56', '2021-12-12 19:25:41', NULL, 1),
(3, 'jjosic', '$2a$12$cqBCeSbhCtzv922lnIPIJ.eYp11VNJj7t5wRIkHKUd8Uf5n7yWg4e', 'jjosic@mail.com', 'josko', 'josic', '2021-12-03 15:20:47', '2021-12-11 15:48:29', '2021-12-11 15:48:29', 0),
(4, 'kathy15', '$2y$10$Auh.cqvfqKCp.fP7a33bM.dgTRfUFFj.I5ka0lv/fU5Tl1/4HDL/C', 'klazar@gmail.com', 'Katherine', 'Lazar', '2021-12-03 20:08:37', '2021-12-03 20:08:37', NULL, 0),
(5, 'ruwopyfuk', '$2y$10$ioWei/B5MOasRThFucWgHu/BNge7TL4.jW1ZV8EDVFDU6VJZhr.uy', 'cicex@mailinator.com', 'Julian', 'Chambers', '2021-12-10 12:35:32', '2021-12-13 07:38:47', '2021-12-13 07:38:47', 0),
(6, 'Lena20', '$2y$10$uAtxpzCblcvv7kJ/P9itDe.L5GPtkF1iooBqEqp5ct0W5i.CnOh3W', 'lena.gruber@gmail.com', 'Lena', 'Gruber', '2021-12-12 22:20:24', '2021-12-13 11:59:27', NULL, 0),
(7, 'hanna96', '$2y$10$Z.KJIY3zXGmWGRLw8onHAOM64iU7KlwbWdS0/jg7ZvqhmCaPEmrHi', 'hmarx@gmail.com', 'Hanna', 'Marx', '2021-12-13 07:34:31', '2021-12-13 12:01:51', '2021-12-13 12:01:51', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
