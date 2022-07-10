-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 10, 2022 at 12:03 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `About`
--

CREATE TABLE `About` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `About`
--

INSERT INTO `About` (`id`, `title`, `image`, `description`, `description2`) VALUES
(1, 'About Us', 'trottinette_about.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, ipsam.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem fuga blanditiis, modi exercitationem quae quam eveniet! Minus labore voluptatibus corporis recusandae accusantium velit, nemo, nobis, nulla ullam pariatur totam quos.');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `autor` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `date_create`, `autor`, `image`) VALUES
(2, 'testt', 'Footballeur professionnel à Brest, formé aux Girondins, Paul Lasne publie le 1er février “MurMures”, suite de courts textes sensibles et poétiques écrits pendant le confinement..', '2022-04-26 11:09:49', 'gavin', 'Logo_EASYSCOOTER-removebg-preview.png'),
(3, 'LE FOOTBALL', 'Cristiano Ronaldo dos Santos Aveiro, couramment appelé Cristiano Ronaldo ou Ronaldo et surnommé CR7, né le 5 février 1985 à Funchal, est un footballeur international portugais qui évolue au poste d\'attaquant à Manchester United.', '2022-07-04 11:04:00', 'Arun', 'liberté.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_description` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_description`, `date`) VALUES
(265, 31, '1,AAA111,casque-de-protection-urban-pour-trottinette-electrique-noir-tailles-s-m.jpeg,test,23', '2022-06-21 07:01:21'),
(269, 31, '1,AAA111,,test,23', '2022-06-21 07:22:29'),
(270, 31, '1,AAA111,casque-de-protection-urban-pour-trottinette-electrique-noir-tailles-s-m.jpeg,test,23', '2022-06-21 07:28:51'),
(271, 31, '1,AAA111,casque-de-protection-urban-pour-trottinette-electrique-noir-tailles-s-m.jpeg,test,23', '2022-06-21 07:31:07'),
(272, 31, '1,AAA100,casque-velo-trottinette-noir.jpeg,test213,0.01', '2022-07-09 17:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `description`, `status`) VALUES
(1, 'test', 'test', 1),
(2, 'test', 'test', 1),
(3, 'test', 'test', 1),
(4, 'test', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `product_id` float(10,2) NOT NULL,
  `transaction_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_amount` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `createdtime` datetime DEFAULT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `perm_mod` varchar(5) NOT NULL,
  `perm_id` int(11) NOT NULL,
  `perm_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`perm_mod`, `perm_id`, `perm_desc`) VALUES
('USR', 1, 'acces user list'),
('USR', 2, 'create user'),
('USR', 3, 'edit user'),
('USR', 4, 'delete user');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `plan_title` varchar(255) NOT NULL,
  `plan_price` float NOT NULL,
  `plan_description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `plan_title`, `plan_price`, `plan_description`, `created_at`) VALUES
(1, 'Day', 0.01, 'you can have for a whole day', '2022-06-25 22:58:13'),
(2, 'Normal', 0.01, 'Normal', '2022-07-03 13:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_description` varchar(255) DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_description`, `product_price`, `product_image`, `created_at`, `product_code`) VALUES
(2, 'test', 'test', 123, 'casque-velo-trottinette-noir.jpeg', '2022-04-18 16:18:21', 'AAAA11'),
(3, 'test', 'test', 123, 'casque-velo-trottinette-noir.jpeg', '2022-04-18 16:18:21', 'AAAA22'),
(5, 'test', 'test', 1, 'casque-velo-trottinette-noir.jpeg', '2022-04-18 16:18:21', 'AAAA42'),
(6, 'test', 'test', 2, 'casque-de-protection-urban-pour-trottinette-electrique-noir-tailles-s-m.jpeg', '2022-04-18 16:18:21', 'AAAA55'),
(7, 'test', 'test', 2, 'casque-velo-trottinette-noir.jpeg', '2022-04-18 16:18:21', 'AAAA66'),
(8, 'test', '12', 5, 'casque-velo-trottinette-noir.jpeg', '2022-04-18 16:18:21', 'AAAA77'),
(9, 'test', '12', 5, 'casque-velo-trottinette-noir.jpeg', '2022-04-18 16:18:21', 'AAAA88'),
(24, 'test23333', 'testttttt', 123, 'casque-de-protection-urban-pour-trottinette-electrique-noir-tailles-s-m.jpeg', '2022-04-18 16:19:05', 'AAAA99'),
(25, 'test213', 'code bleu', 0.01, 'casque-velo-trottinette-noir.jpeg', '2022-05-23 10:22:56', 'AAA100');

-- --------------------------------------------------------

--
-- Table structure for table `resetPassword`
--

CREATE TABLE `resetPassword` (
  `id` int(11) NOT NULL,
  `resetEmail` text NOT NULL,
  `resetSelect` text NOT NULL,
  `resetToken` longtext NOT NULL,
  `resetExpire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Administrator '),
(2, 'Editor'),
(5, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `roles_prem`
--

CREATE TABLE `roles_prem` (
  `role_id` int(11) NOT NULL,
  `perm_mod` varchar(5) NOT NULL,
  `perm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles_prem`
--

INSERT INTO `roles_prem` (`role_id`, `perm_mod`, `perm_id`) VALUES
(1, 'USR', 1),
(1, 'USR', 2);

-- --------------------------------------------------------

--
-- Table structure for table `scooter`
--

CREATE TABLE `scooter` (
  `id` int(11) NOT NULL,
  `scooter_name` varchar(255) NOT NULL,
  `scooter_image` varchar(255) NOT NULL,
  `scooter_status` int(11) NOT NULL DEFAULT '1',
  `scooter_code` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `scooter_signal` text,
  `take_at` time DEFAULT NULL,
  `done_at` time DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lon` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scooter`
--

INSERT INTO `scooter` (`id`, `scooter_name`, `scooter_image`, `scooter_status`, `scooter_code`, `created_at`, `scooter_signal`, `take_at`, `done_at`, `user_id`, `lat`, `lon`) VALUES
(1, 'scooter_1', 'trottinette-electrique-blaster.jpeg', 3, 'BBBB1', '2022-06-19 18:02:49', '', '18:23:51', '20:23:51', 31, 45.764, 4.83566),
(2, 'scooter_2', 'trottinette-electrique-blaster.jpeg', 1, 'BBBB2', '2022-06-19 18:12:04', '', NULL, NULL, 0, 45.764, 4.85566),
(3, 'scooter_3', 'trottinette-electrique-blaster.jpeg', 1, 'BBBB4', '2022-06-26 22:25:12', '', NULL, NULL, 0, 45.764, 4.93566),
(4, 'scooter_4', 'trottinette-electrique-blaster.jpeg', 1, 'BBBB56', '2022-06-26 22:25:14', '', NULL, NULL, 0, 4.87566, 4.87566);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `ip` varchar(20) DEFAULT NULL,
  `date_sign` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `address` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `code_postal` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `point` int(11) NOT NULL DEFAULT '0',
  `point_use` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `lastname`, `password`, `role_id`, `ip`, `date_sign`, `status`, `address`, `number`, `code_postal`, `ville`, `point`, `point_use`) VALUES
(18, 'audesad@gmail.com', 'GAVIN', 'APERANO MOULOUNGUI', '5a5e0ad1454f7c3cade49bf623f9d71d956395e2e08153f7858d5561ad2d4e75', 3, '::1', '2022-04-25 00:33:35', 1, 'AYH', '0635963171', '91300', 'MASSY', 0, 0),
(22, 'audesan@icloud.com', 'hbfiz', 'jebr', 'be73eda70bc3e2b53e641a22606d1e66006713bdbe4d305ef2ff5b2f547c5244', 3, '::1', '2022-05-13 18:34:46', 3, NULL, NULL, NULL, NULL, 0, 0),
(23, 'audesaddn@icloud.com', 'GAVINsvs', 'APERANO MOULOvUNGUI', 'decec1331842659e4448387694c54250015e73124bef178c7a5633f862b4aebd', 1, '::1', '2022-05-13 18:39:01', 1, NULL, NULL, NULL, NULL, 0, 0),
(24, 'audesaddn@icFloud.com', 'GAVIN', 'APERANO MOULOUNGUI', 'bfe59019d932498ab1c4edc81a8bd52a8f6981224647891581751fb879a36bca', 3, '::1', '2022-05-13 18:39:40', 1, NULL, NULL, NULL, NULL, 0, 0),
(31, 'aude1@gmail.com', 'GAVINN', 'APERANO MOULOUNGUI', 'bfe59019d932498ab1c4edc81a8bd52a8f6981224647891581751fb879a36bca', 3, '::1', '2022-05-18 19:47:55', 1, 'Avenue Émile Baudot', '0635963171', '91300', 'MASSY', 17, 33),
(33, 'gavi@gmail.com', 'GAVIN', 'APERANO MOULOUNGUI', 'bfe59019d932498ab1c4edc81a8bd52a8f6981224647891581751fb879a36bca', 3, '::1', '2022-05-24 12:48:06', 1, NULL, NULL, NULL, NULL, 0, 0),
(34, 'gavo@gmail.com', 'GAVIN', 'APERANO MOULOUNGUI', 'bfe59019d932498ab1c4edc81a8bd52a8f6981224647891581751fb879a36bca', 3, '::1', '2022-05-26 15:58:03', 1, 'Avenue Émile Baudot', '0635963171', '91300', 'MASSY', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `About`
--
ALTER TABLE `About`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idd` (`users_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`perm_mod`,`perm_id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resetPassword`
--
ALTER TABLE `resetPassword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `roles_prem`
--
ALTER TABLE `roles_prem`
  ADD PRIMARY KEY (`role_id`,`perm_mod`,`perm_id`);

--
-- Indexes for table `scooter`
--
ALTER TABLE `scooter`
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
-- AUTO_INCREMENT for table `About`
--
ALTER TABLE `About`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `resetPassword`
--
ALTER TABLE `resetPassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `scooter`
--
ALTER TABLE `scooter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
