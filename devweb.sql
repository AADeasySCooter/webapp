-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 29, 2022 at 05:22 PM
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
(1, 'test', 'Footballeur professionnel à Brest, formé aux Girondins, Paul Lasne publie le 1er février “MurMures”, suite de courts textes sensibles et poétiques écrits pendant le confinement.\nQuel a été le cheminement jusqu’au livre ? Le confinement en a-t-il été le déclic ?\n\nC’est clairement le confinement qui a permis à ce livre de voir le jour. Le déclenchement de l’écriture, c’est un moment assez ordinaire. Je revenais d’aller faire les courses juste avant l’annonce du Président et j’ai senti là-bas une ambiance anxiogène, assez inhabituelle. J’ai eu envie de le retranscrire sur le papier car ça m’arrive parfois d’avoir envie d’écrire des choses spontanément. Je l’ai lu à mon épouse, elle a trouvé ça plutôt sympa et elle m’a encouragé à continuer.\n\nVous aviez donc au fond de vous, l’envie d’écrire ?\n\nJe pense que cette occasion avec le confinement, le fait que tout ce qui s’arrête d’un coup - les entraînements et tout le reste - a été pour moi l’occasion de partir sur un terrain de jeu un peu différent, que j’appréciais depuis plusieurs années. Ça m’a permis de m’y...\n\n', '2022-04-26 11:09:45', 'gavin', 'logo_project.jpg'),
(2, 'test', 'Footballeur professionnel à Brest, formé aux Girondins, Paul Lasne publie le 1er février “MurMures”, suite de courts textes sensibles et poétiques écrits pendant le confinement.\n', '2022-04-26 11:09:49', 'gavin', 'logo_project.jpg');

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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_description` varchar(255) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_description`, `product_price`, `product_image`, `created_at`) VALUES
(1, 'test', 'test', 12333, 'liberté.jpeg', '2022-04-18 16:18:21'),
(2, 'test', 'test', 123, 'liberté.jpeg', '2022-04-18 16:18:21'),
(3, 'test', 'test', 123, 'liberté.jpeg', '2022-04-18 16:18:21'),
(4, 'test', 'test', 2, 'liberté.jpeg', '2022-04-18 16:18:21'),
(5, 'test', 'test', 2, 'liberté.jpeg', '2022-04-18 16:18:21'),
(6, 'test', 'test', 2, 'liberté.jpeg', '2022-04-18 16:18:21'),
(7, 'test', 'test', 2, 'liberté.jpeg', '2022-04-18 16:18:21'),
(8, 'test', '12', 5, 'liberté.jpeg', '2022-04-18 16:18:21'),
(9, 'test', '12', 5, 'liberté.jpeg', '2022-04-18 16:18:21'),
(24, 'test23333', 'testttttt', 123, 'liberté.jpeg', '2022-04-18 16:19:05');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `ip` varchar(20) DEFAULT NULL,
  `date_sign` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `lastname`, `password`, `username`, `role_id`, `ip`, `date_sign`) VALUES
(1, 'audesandrine6@gmail.com', NULL, NULL, 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', NULL, 1, '', '2022-04-25 00:20:15'),
(2, 'audesandrine6@gdmail.com', NULL, NULL, '822e54d37dd37d83776ed8aac05e4578e8b201d8f3fa366bdc60b75228bc835f', NULL, 3, '', '2022-04-25 00:20:15'),
(3, 'audesandrine65@gmail.com', NULL, NULL, '937e8d5fbb48bd4949536cd65b8d35c426b80d2f830c5c308e2cdec422ae2244', NULL, 1, '', '2022-04-25 00:20:15'),
(4, 'gaperanomouloungui@myges.fr', NULL, NULL, 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', NULL, 1, '', '2022-04-25 00:20:15'),
(5, 'gaperanomouleoungui@myges.fr', NULL, NULL, 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', NULL, 1, '', '2022-04-25 00:20:15'),
(6, 'admin@admin123', NULL, NULL, 'admin123', NULL, 1, '', '2022-04-25 00:20:15'),
(18, 'audesad@gmail.com', 'GAVIN', 'APERANO MOULOUNGUI', '137a531e5ae9513899625ced2dd46b6ec1e280df2b1c89699582039936cff731', NULL, 3, '::1', '2022-04-25 00:33:35'),
(19, 'audesa@gmail.com', 'GAVIN', 'APERANO MOULOUNGUI', '137a531e5ae9513899625ced2dd46b6ec1e280df2b1c89699582039936cff731', NULL, 3, '::1', '2022-04-25 00:34:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`perm_mod`,`perm_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
