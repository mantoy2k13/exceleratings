-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2018 at 01:23 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exceleratings`
--

-- --------------------------------------------------------

--
-- Table structure for table `notification_contacts`
--

CREATE TABLE `notification_contacts` (
  `id` int(11) NOT NULL,
  `title` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `phone` tinytext NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_contacts`
--

INSERT INTO `notification_contacts` (`id`, `title`, `email`, `phone`, `status`) VALUES
(1, 'The Title 1', 'thomas.woodfin01@yopmail.com', '145346436', 1),
(2, 'The Title 2 dfd f', 'thomas.woodfin02@yopmail.com', '245346436', 1),
(3, 'The Title 3', 'thomas.woodfin03@yopmail.com', '345346436', 0),
(5, 'The Title 5', 'thomas.woodfin05@yopmail.com', '545346436', 1),
(6, 'The Title 6', 'thomas.woodfin06@yopmail.com', '645346436', 1),
(7, 'The Title 7', 'thomas.woodfin07@yopmail.com', '745346436', 1),
(8, 'The Title 8', 'thomas.woodfin08@yopmail.com', '845346436', 0),
(12, 'The Title 2 d', 'thomas.woodfin16@yopmail.com', '34656544', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_ratings`
--

CREATE TABLE `question_ratings` (
  `rid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `review` tinytext NOT NULL,
  `q_type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_ratings`
--

INSERT INTO `question_ratings` (`rid`, `qid`, `review`, `q_type`) VALUES
(8, 1, '3', ''),
(8, 5, '4', ''),
(8, 2, '8', ''),
(8, 7, '2', ''),
(8, 3, '4', ''),
(8, 8, '3', ''),
(8, 9, '3', ''),
(8, 14, '8', ''),
(9, 1, '2', ''),
(9, 5, '3', ''),
(9, 2, '4', ''),
(9, 7, '5', ''),
(9, 3, '6', ''),
(9, 8, '7', ''),
(9, 9, '9', ''),
(9, 14, '10', ''),
(10, 1, '0', ''),
(10, 5, '0', ''),
(10, 2, '0', ''),
(10, 7, '6', ''),
(10, 3, '0', ''),
(10, 8, '3', ''),
(10, 9, '0', ''),
(10, 14, '0', ''),
(11, 5, '4', ''),
(11, 2, '1', ''),
(12, 1, '1', ''),
(12, 9, '4', ''),
(13, 1, '3', ''),
(14, 1, '1', ''),
(14, 8, '3', ''),
(15, 1, '2', ''),
(15, 8, '7', ''),
(16, 8, '3', ''),
(17, 2, '6', ''),
(17, 8, '7', ''),
(17, 9, '7', ''),
(18, 8, '3', ''),
(19, 8, '7', ''),
(20, 2, '5', ''),
(21, 1, '8', ''),
(21, 9, '8', ''),
(22, 3, '2', ''),
(25, 9, '6', ''),
(26, 9, '7', ''),
(27, 2, '3', ''),
(27, 7, '9', ''),
(27, 9, '6', ''),
(27, 14, '7', ''),
(31, 7, '7', ''),
(32, 5, '6', ''),
(33, 5, '6', ''),
(34, 14, '4', ''),
(35, 1, '5', ''),
(36, 1, '5', ''),
(37, 14, '2', ''),
(39, 3, '6', ''),
(40, 14, '10', ''),
(41, 9, '9', ''),
(43, 1, '9', ''),
(46, 1, '5', ''),
(46, 5, '7', ''),
(46, 2, '4', ''),
(46, 3, '7', ''),
(46, 8, '7', ''),
(46, 9, '9', ''),
(46, 14, '10', '');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `first_rating` int(2) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` char(222) NOT NULL,
  `firstname` varchar(222) NOT NULL,
  `lastname` varchar(222) NOT NULL,
  `street` varchar(222) NOT NULL,
  `address` varchar(222) NOT NULL,
  `rev_comment` text NOT NULL,
  `rev_about_experience` text NOT NULL,
  `status` int(1) NOT NULL,
  `inserted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `first_rating`, `email`, `phone`, `firstname`, `lastname`, `street`, `address`, `rev_comment`, `rev_about_experience`, `status`, `inserted_at`) VALUES
(1, 2, 'reviewer14538@email.com', '14', 'F Name 14', 'L Name 14', 'Address 14', '14', 'Comments ... 14 14', '1', 0, '2018-11-12 09:28:04'),
(2, 2, 'reviewer14538@email.com', '14', 'F Name 14', 'L Name 14', 'Address 14', '14', 'Comments ... 14 14', '1', 0, '2018-11-12 09:31:52'),
(3, 2, 'reviewer14538@email.com', '14', 'F Name 14', 'L Name 14', 'Address 14', '14', 'Comments ... 14 14', '1', 0, '2018-11-12 09:32:29'),
(4, 2, 'reviewer14538@email.com', '14', 'F Name 14', 'L Name 14', 'Address 14', '14', 'Comments ... 14 14', '1', 0, '2018-11-12 09:32:39'),
(5, 3, 'reviewer4276@email.com', '4', 'F Name 4', 'L Name 4', 'Address 4', '4', 'Comments ... 4 4', '1', 0, '2018-11-12 09:33:00'),
(6, 3, 'reviewer4276@email.com', '4', 'F Name 4', 'L Name 4', 'Address 4', '4', 'Comments ... 4 4', '1', 0, '2018-11-12 09:33:27'),
(7, 3, 'reviewer4276@email.com', '4', 'F Name 4', 'L Name 4', 'Address 4', '4', 'Comments ... 4 4', '1', 0, '2018-11-12 09:33:38'),
(8, 3, 'reviewer4276@email.com', '4', 'F Name 4', 'L Name 4', 'Address 4', '4', 'Comments ... 4 4', '1', 1, '2018-11-12 09:34:00'),
(9, 1, 'reviewer2586@email.com', '2', 'F Name 2', 'L Name 2', 'Address 2', '2', 'Comments ... 2 2', '0', 0, '2018-11-12 09:36:08'),
(10, 3, 'reviewer2317@email.com', '2', 'F Name 2', 'L Name 2', 'Address 2', '2', 'Comments ... 2 2', '0', 0, '2018-11-12 09:39:16'),
(11, 0, 'reviewer8733@email.com', '8', 'F Name 8', 'L Name 8', 'Address 8', '8', 'Comments ... 8 8', '0', 0, '2018-11-12 09:42:55'),
(12, 0, 'reviewer16738@email.com', '16', 'F Name 16', 'L Name 16', 'Address 16', '16', 'Comments ... 16 16', '0', 0, '2018-11-12 09:43:18'),
(13, 0, 'reviewer8302@email.com', '8', 'F Name 8', 'L Name 8', 'Address 8', '8', 'Comments ... 8 8', '0', 0, '2018-11-12 09:43:42'),
(14, 0, 'reviewer19609@email.com', '19', 'F Name 19', 'L Name 19', 'Address 19', '19', 'Comments ... 19 19', '0', 0, '2018-11-12 09:44:04'),
(15, 0, 'reviewer7531@email.com', '7', 'F Name 7', 'L Name 7', 'Address 7', '7', 'Comments ... 7 7', '0', 0, '2018-11-12 09:44:15'),
(16, 0, 'reviewer2901@email.com', '2', 'F Name 2', 'L Name 2', 'Address 2', '2', 'Comments ... 2 2', '0', 0, '2018-11-12 09:44:32'),
(17, 2, 'reviewer20506@email.com', '20', 'F Name 20', 'L Name 20', 'Address 20', '20', 'Comments ... 20 20', '0', 0, '2018-11-12 09:54:13'),
(18, 4, 'reviewer2920@email.com', '2', 'F Name 2', 'L Name 2', 'Address 2', '2', 'Comments ... 2 2', '0', 0, '2018-11-12 09:54:55'),
(19, 2, 'reviewer1495@email.com', '1', 'F Name 1', 'L Name 1', 'Address 1', '1', 'Comments ... 1 1', '1', 0, '2018-11-12 09:56:14'),
(20, 0, 'reviewer11727@email.com', '11', 'F Name 11', 'L Name 11', 'Address 11', '11', 'Comments ... 11 11', '0', 0, '2018-11-12 10:03:23'),
(21, 5, 'reviewer1274@email.com', '12', 'F Name 12', 'L Name 12', 'Address 12', '12', 'Comments ... 12 12', '0', 0, '2018-11-12 10:04:56'),
(22, 5, 'reviewer4221@email.com', '4', 'F Name 4', 'L Name 4', 'Address 4', '4', 'Comments ... 4 4', '0', 0, '2018-11-12 10:05:42'),
(23, 2, 'reviewer8690@email.com', '8', 'F Name 8', 'L Name 8', 'Address 8', '8', 'Comments ... 8 8', '0', 0, '2018-11-12 10:06:24'),
(24, 8, 'reviewer13385@email.com', '13', 'F Name 13', 'L Name 13', 'Address 13', '13', 'Comments ... 13 13', '0', 0, '2018-11-12 10:06:33'),
(25, 2, 'reviewer8695@email.com', '8', 'F Name 8', 'L Name 8', 'Address 8', '8', 'Comments ... 8 8', '0', 0, '2018-11-12 10:07:34'),
(26, 0, 'reviewer9235@email.com', '9', 'F Name 9', 'L Name 9', 'Address 9', '9', 'Comments ... 9 9', '0', 0, '2018-11-12 10:07:52'),
(27, 4, 'reviewer9850@email.com', '9', 'F Name 9', 'L Name 9', 'Address 9', '9', 'Comments ... 9 9', '0', 0, '2018-11-12 10:08:24'),
(28, 10, 'reviewer15171@email.com', '15', 'F Name 15', 'L Name 15', 'Address 15', '15', 'Comments ... 15 15', '0', 0, '2018-11-12 10:10:20'),
(29, 5, 'reviewer15888@email.com', '15', 'F Name 15', 'L Name 15', 'Address 15', '15', 'Comments ... 15 15', '0', 0, '2018-11-12 10:11:47'),
(30, 4, 'reviewer10762@email.com', '10', 'F Name 10', 'L Name 10', 'Address 10', '10', 'Comments ... 10 10', '0', 0, '2018-11-12 10:12:05'),
(31, 0, 'reviewer422@email.com', '4', 'F Name 4', 'L Name 4', 'Address 4', '4', 'Comments ... 4 4', '0', 0, '2018-11-12 10:12:14'),
(32, 0, 'reviewer935@email.com', '9', 'F Name 9', 'L Name 9', 'Address 9', '9', 'Comments ... 9 9', '0', 0, '2018-11-12 10:13:16'),
(33, 0, 'reviewer17830@email.com', '17', 'F Name 17', 'L Name 17', 'Address 17', '17', 'Comments ... 17 17', '0', 0, '2018-11-12 10:13:43'),
(34, 0, 'reviewer6305@email.com', '6', 'F Name 6', 'L Name 6', 'Address 6', '6', 'Comments ... 6 6', '0', 0, '2018-11-12 10:14:05'),
(35, 0, 'reviewer10448@email.com', '10', 'F Name 10', 'L Name 10', 'Address 10', '10', 'Comments ... 10 10', '0', 0, '2018-11-12 10:14:57'),
(36, 0, 'reviewer10448@email.com', '10', 'F Name 10', 'L Name 10', 'Address 10', '10', 'Comments ... 10 10', '0', 0, '2018-11-12 10:15:22'),
(37, 0, 'reviewer9679@email.com', '9', 'F Name 9', 'L Name 9', 'Address 9', '9', 'Comments ... 9 9', '0', 0, '2018-11-12 10:22:02'),
(38, 8, 'reviewer9385@email.com', '9', 'F Name 9', 'L Name 9', 'Address 9', '9', 'Comments ... 9 9', '0', 0, '2018-11-12 10:22:08'),
(39, 0, 'reviewer15873@email.com', '15', 'F Name 15', 'L Name 15', 'Address 15', '15', 'Comments ... 15 15', '0', 0, '2018-11-12 10:22:31'),
(40, 0, 'reviewer6820@email.com', '6', 'F Name 6', 'L Name 6', 'Address 6', '6', 'Comments ... 6 6', '0', 0, '2018-11-12 10:22:39'),
(41, 0, 'reviewer18458@email.com', '18', 'F Name 18', 'L Name 18', 'Address 18', '18', 'Comments ... 18 18', '0', 0, '2018-11-12 10:24:59'),
(42, 9, 'reviewer12572@email.com', '12', 'F Name 12', 'L Name 12', 'Address 12', '12', 'Comments ... 12 12', '0', 0, '2018-11-12 10:26:11'),
(43, 0, 'reviewer14192@email.com', '14', 'F Name 14', 'L Name 14', 'Address 14', '14', 'Comments ... 14 14', '0', 0, '2018-11-12 10:27:32'),
(44, 9, 'reviewer11794@email.com', '11', 'F Name 11', 'L Name 11', 'Address 11', '11', 'Comments ... 11 11', '0', 1, '2018-11-12 10:28:01'),
(45, 10, 'reviewer9476@email.com', '9', 'F Name 9', 'L Name 9', 'Address 9', '9', 'Comments ... 9 9', '0', 0, '2018-11-12 10:28:17'),
(46, 7, 'reviewer5819@email.com', '5', 'F Name 5', 'L Name 5', 'Address 5', '5', 'Comments ... 5 5', '0', 0, '2018-11-12 14:03:02'),
(47, 8, 'reviewer17957@email.com', '17', 'F Name 17', 'L Name 17', 'Address 17', '17', 'Comments ... 17 17', 'N', 1, '2018-11-13 07:30:50'),
(48, 3, 'reviewer20712@email.com', '20', 'F Name 20', 'L Name 20', 'Address 20', '20', 'Comments ... 20 20', 'rev_about_experience ... 20 20', 0, '2018-11-13 14:09:30'),
(49, 9, 'dsdfsdf@erew.cdsf', '', 'df', 'dsfs', '', '', '', '', 1, '2018-11-13 14:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `rev_questions`
--

CREATE TABLE `rev_questions` (
  `qid` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer_option` varchar(20) NOT NULL,
  `shorting` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rev_questions`
--

INSERT INTO `rev_questions` (`qid`, `question`, `answer_option`, `shorting`, `status`) VALUES
(1, 'Uisquam sollicitudin, morbi eagnam libero ', 'rev_1_10', 1, 1),
(2, 'Qre er Uisquam sollicitudin, morbi eagnam libero  ', 'rev_1_10', 2, 1),
(3, 'At labore! Malesuada numquam et. Nonummy sollicitudin aliqua morbi sodales tempora voluptate!', 'rev_1_10', 4, 1),
(4, 'Uisquam sollicitudin, morbi eagnam libero ', 'yes_no', 5, 0),
(5, 'Wbore! Malesuada numquam et. Nonummy sollicitudin aliqua morbi sodales tempora voluptate!', 'rev_1_10', 0, 1),
(6, 'Ealesuada numquam et. Nonummy sollicitudin aliqua morbi sodales tempora voluptate!', 'yes_no', 6, 0),
(7, 'Aquam ftert sollicitudin, morbi eagnam libero ', 'rev_1_10', 3, 1),
(8, 'Wam sollicitudin, morbi eagnam libero sollicitudin, morbi eagnam libero sollicitudin, morbi eagnam libero ', 'rev_1_10', 7, 1),
(9, 'Qbore! Malesuada numquam et. Nonummy sollicitudin aliqua morbi sodales tempora voluptate!', 'rev_1_10', 8, 1),
(12, 'Nonummy sollicitudin aliqua morbi sodales tempora voluptate!', 'yes_no', 11, 1),
(14, 'Rquam et. Nonummy sollicitudin aliqua morbi sodales tempora voluptate!', 'rev_1_10', 9, 1),
(15, 'Eiam optio, platea, sodales, totam dolore, quam esse nunc ipsum senectus faucibus', 'rev_1_10', 10, 0),
(16, 'Review question add form\r\n', 'rev_1_10', 0, 1),
(17, 'Lacus eleifend consectetuer gravida hac hac auctor pede ullam in quia class. Eos ad, ullam? ', 'rev_1_10', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `option_title` varchar(222) NOT NULL,
  `option_slug` varchar(222) NOT NULL,
  `option_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `option_title`, `option_slug`, `option_value`) VALUES
(1, 'Google review link', 'review-url-google', 'dsf dfds'),
(2, 'Yelp review link', 'review-url-yelp', 'sdf s');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `usertype`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@email.com', '202cb962ac59075b964b07152d234b70', 'superadmin', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notification_contacts`
--
ALTER TABLE `notification_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rev_questions`
--
ALTER TABLE `rev_questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification_contacts`
--
ALTER TABLE `notification_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `rev_questions`
--
ALTER TABLE `rev_questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
