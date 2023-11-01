-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 11:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register_login_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `middle_name` varchar(4) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(128) NOT NULL,
  `area_code` int(5) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `email` varchar(128) NOT NULL,
  `street_address` varchar(128) NOT NULL,
  `city` varchar(128) NOT NULL,
  `state_province` varchar(128) NOT NULL,
  `postal_code` int(10) NOT NULL,
  `country` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `gender`, `area_code`, `phone_number`, `email`, `street_address`, `city`, `state_province`, `postal_code`, `country`, `password`) VALUES
(1, 'John', '', 'Doe', '2000-01-01', 'male', 123, 123123123, 'johndoe@example.com', '123 House St.', 'New York', 'Metro Manila', 1, 'USA', '$2y$10$aNO3WrXeOaQzM7qtn9VVkuxH7Pgv2QdTvZLMDszOeAV12MRfP4TB2'),
(2, 'Jane', '', 'Doe', '2001-12-31', 'female', 321, 987654321, 'janedoe@example.com', '321 Mansion St.', 'Quezon City', 'Metro Manila', 99999, 'Philippines', '$2y$10$tykQiBKtVtHDTKjOc75LTuFGKSXNkM.1n9aBnIpdOIvJw1N48wgWC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
