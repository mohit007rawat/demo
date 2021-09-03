-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 02, 2021 at 02:55 PM
-- Server version: 5.7.35
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amanigz1_amanimart_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(11) NOT NULL,
  `mail` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0=unsubs,1=subs',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`id`, `mail`, `status`, `created_at`) VALUES
(1, 'w@gamil.com', 1, '2021-05-23 17:51:48'),
(2, '', 1, '2021-05-23 18:15:01'),
(3, '', 1, '2021-05-23 18:15:08'),
(4, '', 1, '2021-05-23 18:15:41'),
(5, '', 1, '2021-05-25 17:15:07'),
(6, '', 1, '2021-05-25 17:44:32'),
(7, '', 1, '2021-05-25 17:44:47'),
(8, '', 1, '2021-05-25 17:45:00'),
(9, 'd', 1, '2021-05-25 17:45:22'),
(10, 'd', 1, '2021-05-25 17:45:24'),
(11, '', 1, '2021-05-25 17:46:05'),
(12, '', 1, '2021-05-25 17:47:04'),
(13, '', 1, '2021-05-25 17:47:22'),
(14, '', 1, '2021-05-25 17:47:33'),
(15, 'test@gmail.com', 1, '2021-07-31 18:45:37'),
(16, 'yorank1101@gmail.com', 1, '2021-08-01 10:02:40'),
(17, 'rawatjinews@gmail.com', 0, '2021-09-02 18:41:33'),
(18, 'mohitrawat1000@gmail.com', 0, '2021-09-02 18:51:05'),
(19, 'mohitrawat1000@gmail.com', 0, '2021-09-02 18:54:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
