-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 04:25 AM
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
-- Database: `pd_membersystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `recorded_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_hours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`recorded_id`, `user_id`, `total_hours`) VALUES
(2, 18, 25);

-- --------------------------------------------------------

--
-- Table structure for table `community_history`
--

CREATE TABLE `community_history` (
  `recorded_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hours_added` int(11) DEFAULT NULL,
  `date_added` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community_history`
--

INSERT INTO `community_history` (`recorded_id`, `user_id`, `hours_added`, `date_added`) VALUES
(2, 18, 5, '2024-04-22'),
(3, 18, 5, '2024-04-23'),
(4, 18, 15, '2024-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `cred_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `passwords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`cred_id`, `user_id`, `email`, `passwords`) VALUES
(9, 16, 'admin@gmail.com', '$2y$12$.lG7XszdRkflrNiOX8a/GuHQFzBYEAnwmwcSImv5w7DCPOFfdcFSi'),
(10, 17, 'member@gmail.com', '$2y$12$3capqUtxkz1D30k4chqtre7OigA5bHAsnEUwkkD2YWURqCxnbeyn2'),
(11, 18, 'romario@gmail.com', '$2y$12$.1.fYDsq369c4NCmapk.b.GHhghD7TUYXlroOGCHSfAumOaSJ5Aq6');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `roles` varchar(7) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `first_name`, `last_name`, `roles`, `date_of_birth`, `gender`, `created_at`) VALUES
(16, 'Romario', 'herman', 'Admin', NULL, NULL, '2024-04-14 23:22:20'),
(17, 'Romano', 'Guildan', 'Member', NULL, ' Male', '2024-04-21 00:58:06'),
(18, 'Romario', 'Bishop', 'Member', NULL, NULL, '2024-04-22 00:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subscription_date` date NOT NULL,
  `subscription_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `user_id`, `subscription_date`, `subscription_status`) VALUES
(3, 18, '2026-06-01', NULL),
(6, 17, '2024-03-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments_history`
--

CREATE TABLE `payments_history` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subscription_date` date DEFAULT NULL,
  `amount_paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments_history`
--

INSERT INTO `payments_history` (`payment_id`, `user_id`, `subscription_date`, `amount_paid`) VALUES
(4, 18, '2024-05-01', 5),
(5, 18, '2024-06-01', 5),
(6, 18, '2024-07-01', 10),
(7, 18, '2024-10-01', 20),
(8, 18, '2024-11-01', 20),
(9, 18, '2024-12-01', 30),
(10, 18, '2023-01-01', 10),
(11, 18, '2025-02-01', 10),
(12, 18, '2026-06-01', 20),
(13, 17, '2024-05-01', 5),
(14, 17, '2024-02-01', 5),
(15, 17, '2024-01-01', 5),
(16, 17, '2024-03-01', 5),
(17, 17, '2024-04-01', 15),
(18, 17, '2024-06-01', 20),
(19, 17, '2024-03-01', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`recorded_id`),
  ADD KEY `idx3_user_id` (`user_id`);

--
-- Indexes for table `community_history`
--
ALTER TABLE `community_history`
  ADD PRIMARY KEY (`recorded_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`cred_id`),
  ADD KEY `idx_user_id` (`user_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `idx2_user_id` (`user_id`);

--
-- Indexes for table `payments_history`
--
ALTER TABLE `payments_history`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payments_history_ibfk_1` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `recorded_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `community_history`
--
ALTER TABLE `community_history`
  MODIFY `recorded_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `cred_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments_history`
--
ALTER TABLE `payments_history`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `community`
--
ALTER TABLE `community`
  ADD CONSTRAINT `community_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `members` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `community_history`
--
ALTER TABLE `community_history`
  ADD CONSTRAINT `community_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `members` (`user_id`);

--
-- Constraints for table `credentials`
--
ALTER TABLE `credentials`
  ADD CONSTRAINT `credentials_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `members` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `members` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `payments_history`
--
ALTER TABLE `payments_history`
  ADD CONSTRAINT `payments_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `members` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
