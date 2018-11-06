-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2017 at 06:15 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `holoflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `schedulemeetings`
--

CREATE TABLE `schedulemeetings` (
  `id` int(11) NOT NULL,
  `meeting_id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedulemeetings`
--

INSERT INTO `schedulemeetings` (`id`, `meeting_id`, `user_id`, `created`) VALUES
(3, '11953033', 1, '2017-09-21 12:56:17'),
(2, '11939975', 1, '2017-09-20 13:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`) VALUES
(1, 'Nik', 'K', 'wwww@mailinator.com', NULL, 'ddd'),
(2, 'Nik', 'K', 'nileshk5060@gmail.com', NULL, '12345'),
(3, 'Nik', 'K', 'nileshk50601@gmail.com', NULL, 'ddddd'),
(4, 'Nik', 'K', 'ruthussery123@mailinator.com', NULL, '1234'),
(5, 'Nik', 'K', 'wwww222@mailinator.com', NULL, 'tester'),
(6, 'Nik', 'K', 'wwwwee@mailinator.com', NULL, 'tester123'),
(7, 'Nik', 'K', 'nileshk5061@gmail.com', NULL, 'ccc'),
(8, 'Nik', 'K', 'nileshk5062@gmail.com', 'nileshk5062@gmail.com', 'tester123'),
(9, 'Nik', 'K', 'dd22@gmail.com', 'dd22@gmail.com', '$2y$10$qLHH9MJflTkd1Sva24ofxepTU9nB/ANct3Z8/Va5oE4qSrowkHbeC'),
(10, 'Roger', 'T', 'rogert0123@gmail.com', 'rogert0123@gmail.com', '$2y$10$MnOidvQjgchL29tsiiR2weVd6IhN6GFNSlFggg1sCvkDC76lrPAK6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schedulemeetings`
--
ALTER TABLE `schedulemeetings`
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
-- AUTO_INCREMENT for table `schedulemeetings`
--
ALTER TABLE `schedulemeetings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
