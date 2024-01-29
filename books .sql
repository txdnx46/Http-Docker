-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql_db
-- Generation Time: Jan 22, 2024 at 03:59 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `user_id`, `title`, `author`, `image`) VALUES
(65, 6, 'Docker', '18/09/46', 'docker.png '),
(66, 3, 'Docker', '12/08/46', 'docker.png '),
(71, 7, 'Docker', '12/5/98', 'docker.png '),
(73, 8, 'Docker', '12/5/98', 'qrcode_91217869_4155552917f7585ea9a4203629204071.png '),
(82, 3, 'Docker', '12/5/98', 'Screenshot 2024-01-21 032948.png'),
(83, 1, 'Dockers', 'THODs', 'docker.png'),
(102, 9, 'care', 'apec', 'qrcode_91217869_4155552917f7585ea9a4203629204071.png'),
(103, 11, 'cares', 'paweena', 'qrcode_91217869_4155552917f7585ea9a4203629204071.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'root', '1234', 'todza9990@gmail.com'),
(3, 'DEAR', '1234', 'todza9990@gmail.com'),
(6, 'Tanarat', '555', 'thod@com'),
(7, 'BIG', '1234', 'todza1@gmail.com'),
(8, 'nam', '222', 'thod@com'),
(9, 'paweena', '1234', 'todza1@gmail.com'),
(11, 'poer', '555', 'todza9990@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
