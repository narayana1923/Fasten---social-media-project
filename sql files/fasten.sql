-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2022 at 06:11 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fasten`
--
CREATE DATABASE IF NOT EXISTS `fasten` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fasten`;

-- --------------------------------------------------------

--
-- Table structure for table `fasten_user`
--

DROP TABLE IF EXISTS `fasten_user`;
CREATE TABLE `fasten_user` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `fasten_user`
--

TRUNCATE TABLE `fasten_user`;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
CREATE TABLE `friends` (
  `username` varchar(40) NOT NULL,
  `friendname` varchar(40) NOT NULL,
  `since` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `friends`
--

TRUNCATE TABLE `friends`;
-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

DROP TABLE IF EXISTS `friend_requests`;
CREATE TABLE `friend_requests` (
  `username` varchar(40) NOT NULL,
  `friendname` varchar(40) NOT NULL,
  `sent_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `friend_requests`
--

TRUNCATE TABLE `friend_requests`;
-- --------------------------------------------------------

--
-- Table structure for table `interaction`
--

DROP TABLE IF EXISTS `interaction`;
CREATE TABLE `interaction` (
  `post_id` varchar(40) NOT NULL,
  `interacted_by` varchar(40) NOT NULL,
  `liked` varchar(10) NOT NULL,
  `commented` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `interaction`
--

TRUNCATE TABLE `interaction`;
-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `posted_on` date NOT NULL,
  `post_desc` varchar(255) NOT NULL,
  `media` longblob DEFAULT NULL,
  `media_type` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `posts`
--

TRUNCATE TABLE `posts`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasten_user`
--
ALTER TABLE `fasten_user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`username`,`friendname`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`username`,`friendname`);

--
-- Indexes for table `interaction`
--
ALTER TABLE `interaction`
  ADD PRIMARY KEY (`post_id`,`interacted_by`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
