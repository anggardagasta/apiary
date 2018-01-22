-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2018 at 04:20 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apiary`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `imageurl`, `created_at`, `updated_at`) VALUES
(1, 'polygon xtrada Z6', 2180, 'https://polygoneeimages.s3.amazonaws.com/images/19342/xtrada_5_p.jpg', '2018-01-22 14:29:44', '2018-01-22 14:29:44'),
(2, 'Giant Reign', 2560, 'http://www.sepedacycleshop.com/image-product/img2033-1368243649.jpg', '2018-01-22 14:39:53', '2018-01-22 14:39:53'),
(3, 'Santa Cruz Nomad', 7510, 'https://www.santacruzbicycles.com/files/frame-thumbs/my18_nomad_xx1_rsv30_tan.jpg', '2018-01-22 14:41:15', '2018-01-22 14:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_token` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `access_token`, `created_at`, `updated_at`) VALUES
(1, 'Anggarda Gasta', 'anggarda@gmail.com', 'test', 'asdasdafdgf', '2018-01-22 19:36:26', '2018-01-04 00:00:00'),
(6, 'bot', 'bot@example.com', '$2y$10$dbBYcT.SYWIOfjszy0Fmm.emv0Zmf/e5.oDQN4eLWJf4eoicyRkVO', '$2y$10$dbBYcT.SYWIOfjszy0Fmm.emv0Zmf/e5.oDQN4eLWJf4eoicyRkVO', '2018-01-22 15:14:34', '2018-01-22 15:14:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
