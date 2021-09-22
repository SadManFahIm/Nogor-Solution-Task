-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2021 at 10:18 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `skills` varchar(100) DEFAULT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `email`, `gender`, `image`, `skills`, `timestamp`) VALUES
(5, 'Safin Sayed', 'sayed@gmail.com', 'male', 'clint-patterson-dYEuFB8KQJk-unsplash.jpg', '[\"Laravel\",\"Codeigniter\"]', '2021-09-22 08:13:49'),
(6, 'Sayed Islam Safin', 'safin@gmail.com', 'male', 'headphones-650px-opt.jpeg', '[\"Laravel\",\"Vue JS\",\"Ajax\",\"MySql\",\"API\"]', '2021-09-22 08:14:23'),
(7, 'Raisul Islam', 'raisul@gmail.com', 'male', '796841.jpg', '[\"Laravel\",\"MySql\",\"API\"]', '2021-09-22 08:15:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
