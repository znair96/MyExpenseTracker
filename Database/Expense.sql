-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 26, 2018 at 08:29 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Expense`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `RegisteredDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LoggedInStatus` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `password`, `gender`, `RegisteredDate`, `LoggedInStatus`) VALUES
(1, 'Satyam', 'satya96', 'satyam.agr1996@gmail', '1234', 'Male', '2018-08-18 00:38:37', 0),
(2, 'Zubin Nair', 'znair96', 'znair96@gmail.com', '1234', 'Male', '2018-08-18 00:40:11', 0),
(3, 'Ravi', 'ravi123', 'ravi@gmail.com', '123456', 'Male', '2018-08-18 00:42:36', 0),
(4, 'Chaman', 'chn998', 'admin@feereport.com', 'admin', 'Female', '2018-08-25 23:30:30', 0),
(5, 'Naman', 'nam23', 'abc123@gmail.com', '123456', 'Male', '2018-08-25 23:32:47', 0),
(9, 'Raman', 'ram123', 'ram123@gmail.com', '123456', 'Male', '2018-08-25 23:42:51', 0),
(10, 'Thakur', 'tah123', 'znair23091996@gmail.com', '1234', 'Male', '2018-08-25 23:43:36', 0),
(17, 'Rajat', 'rajjo123', 'rajjo89@gmail.com', '123456', 'Male', '2018-08-25 23:55:56', 0),
(19, 'Parth', 'parth43', 'coolparth@gmail.com', '123456', 'Others', '2018-08-25 23:57:40', 0),
(20, 'Shyam', 'sha1', 'sha1@gmail.com', '123456', 'Male', '2018-08-26 11:21:47', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
