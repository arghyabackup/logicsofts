-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 07:51 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment1`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `createdAt` datetime DEFAULT current_timestamp(),
  `updateAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `status`, `is_deleted`, `createdAt`, `updateAt`) VALUES
(1, 'Arghya', 'arghya', 'arghya@gmail.com', 'b843ba8185b6d9df212ccc518f37e8e4', '1', '0', '2021-12-24 02:27:51', '2021-12-24 02:27:51'),
(2, 'Arghya', 'arghya2', 'arghya2@gmail.com', 'b843ba8185b6d9df212ccc518f37e8e4', '1', '0', '2021-12-24 02:27:51', '2021-12-24 02:27:51'),
(3, 'Arghya', 'arghya3', 'arghya3@gmail.com', 'b843ba8185b6d9df212ccc518f37e8e4', '1', '1', '2021-12-24 02:27:51', '2021-12-24 12:19:53'),
(4, 'Arghya', 'arghya4', 'arghya4@gmail.com', 'b843ba8185b6d9df212ccc518f37e8e4', '1', '1', '2021-12-24 02:27:51', '2021-12-24 11:24:16'),
(5, 'Soma', 'soma', 'soma@gmail.com', '3bf347b0de2d4c21771d079b0fb8dd5d', '1', '0', '2021-12-24 12:16:59', '2021-12-24 12:16:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_gallery`
--

CREATE TABLE `user_gallery` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `createdAt` datetime DEFAULT current_timestamp(),
  `updateAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_gallery`
--

INSERT INTO `user_gallery` (`id`, `user_id`, `file_name`, `status`, `is_deleted`, `createdAt`, `updateAt`) VALUES
(1, 1, '73a011aea1f72ebe7d19014766c87565.jpg', '1', '0', '2021-12-24 02:27:52', '2021-12-24 02:27:52'),
(2, 1, '184d185088cd6291059142479b07ed7b.jpg', '1', '0', '2021-12-24 02:27:52', '2021-12-24 02:27:52'),
(3, 5, '3fb1c0d8fcf91bd68914f8d6999b4327.jpg', '1', '0', '2021-12-24 12:16:59', '2021-12-24 12:16:59'),
(4, 5, '899f77ca8f6b7c331f4784c240c05457.jpg', '1', '0', '2021-12-24 12:16:59', '2021-12-24 12:16:59'),
(5, 5, '14a31beb3e884f69714463698d90567f.jpg', '1', '0', '2021-12-24 12:16:59', '2021-12-24 12:16:59'),
(6, 5, 'cf88289bb1f0b0e4cab11cb5960ac0d2.png', '1', '0', '2021-12-24 12:17:00', '2021-12-24 12:17:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_gallery`
--
ALTER TABLE `user_gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_gallery`
--
ALTER TABLE `user_gallery`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
