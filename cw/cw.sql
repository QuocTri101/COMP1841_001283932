-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2025 at 04:06 AM
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
-- Database: `cw`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `ans_date` date NOT NULL,
  `ques_id` int(11) NOT NULL,
  `aut_id` int(11) NOT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `answer`, `ans_date`, `ques_id`, `aut_id`, `deleted`) VALUES
(1, 'Because they have to', '2024-05-15', 1, 5, 0),
(2, 'I wish I were them', '2024-05-23', 1, 8, 0),
(3, 'That\'s the neat part, they would never', '2024-01-31', 2, 2, 0),
(4, 'Next 10 years, I cope, just do voice & whiteboard presentation instead', '2024-03-12', 2, 3, 0),
(5, 'lol', '2024-07-31', 3, 7, 0),
(6, 'idk, pure lu... I mean, it\'s purely skill-based', '2024-08-01', 3, 5, 0),
(7, 'idk,.. anything can help, youtube, chatgpt, focus on getting better without any distraction', '2025-01-08', 4, 4, 0),
(9, 'help me', '2025-04-28', 11, 1, 0),
(10, 'not noice', '2025-04-28', 11, 2, 0),
(11, 'hahahaha', '2025-04-30', 11, 1, 0),
(12, 'tralalaala', '2025-04-30', 11, 3, 0),
(13, 'bwahahahaahaha', '2025-04-30', 11, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name`, `email`) VALUES
(1, 'matt', 'matt@matt'),
(2, 'dave', 'dave@dave'),
(3, 'jessica', 'jessi@gorgeous'),
(4, 'goku', 'ssjgb@earthhero'),
(5, 'cloud', 'big@sword'),
(6, 'whydoIexist', 'really@how'),
(7, 'ben', 'benjamin@woodwork'),
(8, 'satoshi', 'gottacatchthem@ll');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(1, 'Life Advice Seeking'),
(2, 'Personal Opinion'),
(3, 'Joke'),
(4, 'Facility Related'),
(5, 'Academical');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `date` date NOT NULL,
  `aut_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `date`, `aut_id`, `cat_id`, `image`, `deleted`) VALUES
(1, 'Why do birds fly?', '2024-05-08', 1, 2, 'birb.jpg', 0),
(2, 'When will the TV monitors get fixed', '2024-01-23', 4, 4, 'ohTV.jpg', 0),
(3, 'Can you brush your teeth while running on a deadline?', '2024-07-17', 6, 1, 'teeth.jpg', 0),
(4, 'Help me how to learn maths better?', '2024-10-31', 8, 5, 'math.jpg', 0),
(5, 'Have you seen spiderman catch a cockroach before?', '2024-06-03', 6, 3, 'spooderman.jpg', 0),
(11, 'lalala', '2025-04-28', 6, 3, 'teeth.jpg', 0),
(12, 'help me', '2025-04-28', 1, 1, 'nut.jpg', 1),
(13, 'heeeelllppppp', '2025-04-28', 6, 3, 'teeth.jpg', 0),
(14, 'YATT', '2025-04-28', 4, 5, 'blackhole.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `webmessage`
--

CREATE TABLE `webmessage` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `aut_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webmessage`
--

INSERT INTO `webmessage` (`id`, `message`, `date`, `aut_id`) VALUES
(1, 'help me', '2025-04-27', 2),
(2, 'good', '2025-04-27', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`ques_id`),
  ADD KEY `author_id` (`aut_id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`aut_id`),
  ADD KEY `category_id` (`cat_id`);

--
-- Indexes for table `webmessage`
--
ALTER TABLE `webmessage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aut_id` (`aut_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `webmessage`
--
ALTER TABLE `webmessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`ques_id`) REFERENCES `question` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`aut_id`) REFERENCES `author` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`aut_id`) REFERENCES `author` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `webmessage`
--
ALTER TABLE `webmessage`
  ADD CONSTRAINT `webmessage_ibfk_1` FOREIGN KEY (`aut_id`) REFERENCES `author` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
