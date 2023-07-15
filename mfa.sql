-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 15, 2023 at 03:11 AM
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
-- Database: `mfa`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `secret` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password_hash`, `secret`) VALUES
(1, 'zer', 'zer@gmail.com', '$2y$10$LAq2f97PHfnCd4eXxRLyfefD5FvfXLeBk3HclxKRr1yVNWdA.ijaC', ''),
(2, 'azerty', 'azerty@gmail.com', '61f287dac922ab054738c386d324ca6f82df07309cf6dbb8686aa9a4ffa7e7a471c79bf78f9f920df57677c003cb532a1ce4525e2db64a5769fc82b8ebdfd2a9', ''),
(5, 'Bengaly', 'abdoulayedbengaly@gmail.com', '$2y$10$2NpYhIz1ZBqQpl.k2T/lNurhHq/sFaHw7dqR2HhAC8Jq1FKQ.GKb6', ''),
(7, 'test', 'test@gmail.com', '$2y$10$lC5AkOY6wC6kzeMqIVNKo.4cN2rb6n1KyiY5fcq5RverCkBurX.d6', 'KL4EKISABRHYJBYM'),
(8, 'abba', 'abba@gmail.com', '$2y$10$h0Dit7QQftkOOXFMAx73Vu6NMZ837NB7h8mw7yzSamURQ7SDHk1R6', 'ZWTUELJCCMNQ6UPP'),
(9, 'ousmane', 'ousmane@gmail.com', '$2y$10$z7beKvzuY9mULKYzvSenbeIspGkEUIYfakY7uoyw6gqOT79FbvXH2', 'CKOICHMHPGBHXNQQ'),
(10, 'Dicko', 'internetface25@gmail.com', '$2y$10$Db5jZdJJ9SUr.LGzDGDbQ.hOJXV1.DhDaTGIja5PyIGXvz1kz6K3e', '2VKMKY7T4O4CGXXK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
