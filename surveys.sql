-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2019 at 10:29 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surveys`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `answer` enum('y','n') NOT NULL,
  `notes` text,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`, `notes`, `user_id`) VALUES
(45, 105, 'y', '', 56),
(46, 106, 'y', '', 56),
(48, 110, 'n', 'notesssss', 56),
(49, 111, 'n', 'xfjgfdfjsf', 56),
(50, 112, 'y', 'n', 56),
(51, 113, 'y', 'dsjfsk', 56),
(52, 107, 'y', '', 56),
(53, 108, 'y', '', 56),
(54, 118, 'y', '', 56),
(55, 117, 'y', '', 56),
(56, 120, 'y', 'ds', 56),
(57, 122, 'y', '', 56),
(58, 121, 'y', '', 56);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `survey_id` int(10) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `on_yes_no` enum('y','n') DEFAULT NULL,
  `parent_q_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `survey_id`, `question`, `on_yes_no`, `parent_q_id`) VALUES
(105, 106, 'q1', NULL, NULL),
(106, 106, 'yyy', 'y', 105),
(107, 107, 'q3', NULL, NULL),
(108, 107, 'qy', 'y', 107),
(109, 107, 'qn', 'n', 107),
(110, 108, 'What\'s your first question?', NULL, NULL),
(111, 109, 'Q1\n', NULL, NULL),
(112, 110, 'What\'s your first question?', NULL, NULL),
(113, 110, 'jhj', 'y', 112),
(114, 110, 'jh', 'n', 112),
(115, 110, 'yy', 'y', 114),
(116, 110, 'nn', 'n', 114),
(117, 111, 'What\'s your first question?', NULL, NULL),
(118, 111, 'yy', 'y', 117),
(119, 111, 'nn', 'n', 117),
(120, 112, 'What\'s your first question?', NULL, NULL),
(121, 112, 'kjh', 'y', 120),
(122, 112, 'kjhkjh', 'y', 121),
(123, 112, 'kjhkh', 'n', 121),
(124, 112, 'as', 'y', 123),
(125, 112, 'mmmmmmmmm\nsdfsdf\nsfsfsfs\nsdfsfsdf\nsdfdsf', 'n', 120),
(126, 112, 'iuy', 'y', 125),
(127, 112, 'iuy', 'n', 125);

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `title`, `user_id`) VALUES
(106, 'survey2', 54),
(107, 'unanswered survey', 54),
(108, 'survey3', 54),
(109, 'College Survey', 54),
(110, 's333', 54),
(111, 'dsfgsdfdsf', 54),
(112, 'dfas', 54);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `type` enum('root','admin','normal') NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`, `email`) VALUES
(54, 'admin', '85017f50ac463446025a87472126b5100052319d', 'admin', 'admin@l-one.de'),
(56, 'abdalmassihykn@gmail.com', '08cec73baf51088acac9b1bcfc1793201ff5a5e6', 'normal', 'dsfds@sdfds.dsfds'),
(58, 'abd', '19243c78c291a4a139567fcde7b35acb9d460219', 'normal', 'abdalmassihykn@gmail.com'),
(59, 'normal', 'da9582b36986700e675735551a7b9103486677b3', 'normal', 'nnn@dsfsd.sfsdf'),
(60, 'mgr', 'da9582b36986700e675735551a7b9103486677b3', 'admin', 'mgr@l-one.de');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_question_unique` (`question_id`,`user_id`),
  ADD KEY `answers_users_fk` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_surveys_fk` (`survey_id`),
  ADD KEY `questions_questions_fk` (`parent_q_id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surveys_author_id_idx` (`user_id`) USING BTREE,
  ADD KEY `author_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_questions_fk` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `answers_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_questions_fk` FOREIGN KEY (`parent_q_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `questions_surveys_fk` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surveys`
--
ALTER TABLE `surveys`
  ADD CONSTRAINT `surveys_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
