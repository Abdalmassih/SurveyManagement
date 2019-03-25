-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2019 at 09:04 AM
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
  `answer` tinyint(1) NOT NULL,
  `notes` text,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `survey_id` int(10) UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `on_yes_no` enum('yes','no') DEFAULT NULL,
  `parent_q_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

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
(1, 'Sports Survey', NULL),
(2, 'survey2', 55),
(3, 'dsfds', NULL),
(4, 'dsfds', NULL),
(5, 'dsfds', NULL),
(6, 'dsfds', NULL),
(7, 'dsfds', NULL),
(8, 'ssq', NULL),
(9, 's23', NULL),
(10, 's23', NULL),
(11, 's23', NULL),
(12, 'kkk', NULL),
(13, 'kkk', NULL),
(14, 'kkk', NULL),
(15, 'kkk', NULL),
(16, 'kkk', NULL),
(17, 'kkk', NULL),
(18, 'Ø­Ø§Ø¬ Ø§Ù„ÙŠÙˆÙ… Ù„ÙˆÙ„', NULL),
(19, 'Ù‡Ù„Ù‚ Ø¬Ø¯ Ù…Ø§ Ø­ØªØºÙŠØ± Ø§Ù„Ø§Ø®Ø¶Ø± ÙˆÙ„Ùˆ ', NULL),
(20, 'Ù…Ø¨Ù„Ø§', NULL),
(21, 'Ù…Ø¨Ù„Ø§', NULL),
(22, 'Ù…Ø¨Ù„Ø§', NULL),
(23, 'dsfgds', NULL),
(24, 'aaa', NULL),
(25, 'aaa', NULL);

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
(51, 'test', '96908fec5bcaf070060cc4ed6e8f6978b62ce8d9', 'admin', 'aa@f.gsfssf'),
(54, 'admin', '85017f50ac463446025a87472126b5100052319d', 'admin', 'admin@l-one.de'),
(55, 'abdalmassih', '89ad4e274ae4b6f63788766f8e8f737c0132767b', 'admin', 'abdalmassihykn@gmail.com'),
(56, 'abdalmassihykn@gmail.com', '08cec73baf51088acac9b1bcfc1793201ff5a5e6', '', 'dsfds@sdfds.dsfds'),
(57, 'aya', 'b9fbed6fe7b78f2e32d9dc06c83cc89539106661', 'admin', 'dfgdfg@dsfsd.com');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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
  ADD CONSTRAINT `questions_questions_fk` FOREIGN KEY (`parent_q_id`) REFERENCES `questions` (`id`),
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
