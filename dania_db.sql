-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2024 at 08:12 AM
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
-- Database: `dania_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `avatars`
--

CREATE TABLE `avatars` (
  `id` int(11) NOT NULL,
  `avatar_name` varchar(255) DEFAULT NULL,
  `avatar_image` varchar(255) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avatars`
--

INSERT INTO `avatars` (`id`, `avatar_name`, `avatar_image`, `cost`) VALUES
(1, 'Space Explorer', 'explorer.png', 50),
(2, 'Astronaut', 'astronaut.png', 100),
(3, 'Alien', 'alien.png', 150),
(4, 'Robot', 'robot.png', 200),
(5, 'Cosmic Warrior', 'warrior.png', 300),
(6, 'default avatar', 'default_avatar.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coins`
--

CREATE TABLE `coins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coins_earned` int(11) DEFAULT 0,
  `coins_spent` int(11) DEFAULT 0,
  `balance` int(11) DEFAULT 0,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `level_number` int(11) NOT NULL,
  `level_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `total_sessions` int(11) DEFAULT 12
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level_number`, `level_name`, `description`, `total_sessions`) VALUES
(6, 1, 'Test 01', 'this is test level', 4);

-- --------------------------------------------------------

--
-- Table structure for table `planets`
--

CREATE TABLE `planets` (
  `id` int(11) NOT NULL,
  `planet_name` varchar(255) DEFAULT NULL,
  `planet_image` varchar(255) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `planets`
--

INSERT INTO `planets` (`id`, `planet_name`, `planet_image`, `cost`) VALUES
(1, 'Earth', 'earth.png', 100),
(2, 'Mars', 'mars.png', 150),
(3, 'Jupiter', 'jupiter.png', 200),
(4, 'Saturn', 'saturn.png', 250),
(5, 'Neptune', 'neptune.png', 300),
(6, 'no planet', 'no.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `level_id` int(11) DEFAULT NULL,
  `quiz_name` varchar(100) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `correct_answer_count` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `level_id`, `quiz_name`, `total_questions`, `correct_answer_count`, `created_at`) VALUES
(11, 6, 'quiz 1', 4, 0, '2024-09-30 18:29:53');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_attempts`
--

CREATE TABLE `quiz_attempts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `attempt_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_attempts`
--

INSERT INTO `quiz_attempts` (`id`, `user_id`, `quiz_id`, `attempt_date`) VALUES
(7, 4, 11, '2024-09-30 21:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `question_text` text NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `option_a` varchar(255) DEFAULT NULL,
  `option_b` varchar(255) DEFAULT NULL,
  `option_c` varchar(255) DEFAULT NULL,
  `option_d` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `quiz_id`, `question_text`, `correct_answer`, `option_a`, `option_b`, `option_c`, `option_d`) VALUES
(11, 11, 'q1', '11', '11', '22', '33', '44'),
(12, 11, 'www', 'w', 'w', 'q', 'r', 'f'),
(13, 11, 'qq', 'q', 'w', 'e', 'r', 'q'),
(14, 11, 'ffff', 'f', 'r', 'e', 'f', 'g');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `session_number` int(11) NOT NULL,
  `content` text NOT NULL,
  `is_completed` tinyint(1) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `coins_awarded` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `level_id`, `session_number`, `content`, `is_completed`, `user_id`, `completed_at`, `coins_awarded`) VALUES
(34, 6, 1, 'session 01', 1, 4, '2024-09-30 18:28:50', 0),
(35, 6, 2, 'session 02', 1, 4, '2024-09-30 18:29:03', 0),
(36, 6, 3, 'session 03\r\n', 1, 4, '2024-09-30 18:29:07', 0),
(37, 6, 4, 'session 04', 1, 4, '2024-09-30 18:29:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `coins` int(11) DEFAULT 0,
  `avatar` varchar(100) DEFAULT 'default_avatar.png',
  `planet` varchar(100) DEFAULT 'no.png',
  `levels_completed` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_admin` tinyint(1) DEFAULT NULL,
  `current_streak` int(11) DEFAULT 0,
  `longest_streak` int(11) DEFAULT 0,
  `last_activity` date DEFAULT NULL,
  `last_session_date` date DEFAULT NULL,
  `sessions_completed_today` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `coins`, `avatar`, `planet`, `levels_completed`, `created_at`, `is_admin`, `current_streak`, `longest_streak`, `last_activity`, `last_session_date`, `sessions_completed_today`) VALUES
(3, 'Mohamed Ehab', 'mohamed@test.com', '25f9e794323b453885f5181f1b624d0b', 0, 'default_avatar.png', 'no.png', 0, '2024-09-30 18:02:01', 1, 0, 0, NULL, NULL, 0),
(4, 'Test User', 'test@test.com', '25f9e794323b453885f5181f1b624d0b', 2500, 'astronaut.png', 'neptune.png', 6, '2024-09-30 18:22:57', 0, 0, 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_avatars`
--

CREATE TABLE `user_avatars` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `avatar_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_avatars`
--

INSERT INTO `user_avatars` (`id`, `user_id`, `avatar_id`) VALUES
(1, 4, NULL),
(2, 4, NULL),
(3, 4, NULL),
(4, 4, NULL),
(5, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_planets`
--

CREATE TABLE `user_planets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `planet_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_planets`
--

INSERT INTO `user_planets` (`id`, `user_id`, `planet_id`) VALUES
(1, 4, NULL),
(2, 4, NULL),
(3, 4, NULL),
(4, 4, NULL),
(5, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_quizzes`
--

CREATE TABLE `user_quizzes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `completed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avatars`
--
ALTER TABLE `avatars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coins`
--
ALTER TABLE `coins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planets`
--
ALTER TABLE `planets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`quiz_id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_avatars`
--
ALTER TABLE `user_avatars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `avatar_id` (`avatar_id`);

--
-- Indexes for table `user_planets`
--
ALTER TABLE `user_planets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `planet_id` (`planet_id`);

--
-- Indexes for table `user_quizzes`
--
ALTER TABLE `user_quizzes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`quiz_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avatars`
--
ALTER TABLE `avatars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coins`
--
ALTER TABLE `coins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `planets`
--
ALTER TABLE `planets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_avatars`
--
ALTER TABLE `user_avatars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_planets`
--
ALTER TABLE `user_planets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_quizzes`
--
ALTER TABLE `user_quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coins`
--
ALTER TABLE `coins`
  ADD CONSTRAINT `coins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);

--
-- Constraints for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `quiz_questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);

--
-- Constraints for table `user_avatars`
--
ALTER TABLE `user_avatars`
  ADD CONSTRAINT `user_avatars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_avatars_ibfk_2` FOREIGN KEY (`avatar_id`) REFERENCES `avatars` (`id`);

--
-- Constraints for table `user_planets`
--
ALTER TABLE `user_planets`
  ADD CONSTRAINT `user_planets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_planets_ibfk_2` FOREIGN KEY (`planet_id`) REFERENCES `planets` (`id`);

--
-- Constraints for table `user_quizzes`
--
ALTER TABLE `user_quizzes`
  ADD CONSTRAINT `user_quizzes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_quizzes_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
