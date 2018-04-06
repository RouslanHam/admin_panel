-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2018 at 01:57 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `my_users`
--

CREATE TABLE `my_users` (
  `id` int(11) NOT NULL,
  `login` varchar(25) COLLATE koi8r_bin NOT NULL,
  `password` varchar(40) CHARACTER SET latin1 NOT NULL,
  `fullName` varchar(255) COLLATE koi8r_bin DEFAULT NULL,
  `email` varchar(50) COLLATE koi8r_bin DEFAULT NULL,
  `role` enum('admin','user') CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=koi8r COLLATE=koi8r_bin;

--
-- Dumping data for table `my_users`
--

INSERT INTO `my_users` (`id`, `login`, `password`, `fullName`, `email`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', 'admin'),
(5, 'fff', 'd41d8cd98f00b204e9800998ecf8427e', 'Иван Иванович Иванов', 'ivan@mail.ru', 'admin'),
(7, 'test', 'd41d8cd98f00b204e9800998ecf8427e', 'abjabj', '', 'user'),
(26, 'er', 'd41d8cd98f00b204e9800998ecf8427e', '', '', 'user'),
(27, 'dsfg', 'd41d8cd98f00b204e9800998ecf8427e', '', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `my_users`
--
ALTER TABLE `my_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `login_2` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `my_users`
--
ALTER TABLE `my_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
