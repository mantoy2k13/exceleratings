-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2018 at 03:46 PM
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
  `userid` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_contacts`
--

INSERT INTO `notification_contacts` (`id`, `title`, `email`, `phone`, `userid`, `status`) VALUES
(1, 'The Title 1', 'thomas.woodfin01@yopmail.com', '145346436', 0, 1),
(2, 'The Title 2 dfd f', 'thomas.woodfin02@yopmail.com', '245346436', 2, 1),
(3, 'The Title 3', 'thomas.woodfin03@yopmail.com', '345346436', 0, 0),
(5, 'The Title 5', 'thomas.woodfin05@yopmail.com', '545346436', 2, 1),
(6, 'The Title 6', 'thomas.woodfin06@yopmail.com', '645346436', 2, 1),
(7, 'contact person ', 'thomas.woodfin07@yopmail.com', '745346436', 3, 1),
(8, 'The Title 8', 'thomas.woodfin08@yopmail.com', '845346436', 2, 0),
(12, 'The Title 2 d', 'thomas.woodfin16@yopmail.com', '34656544', 3, 1),
(13, 'The Title 2 dd', 'thomas.woodfin16@yopmail.com', '3465654', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages_questions`
--

CREATE TABLE `pages_questions` (
  `page_id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `q_shorting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages_questions`
--

INSERT INTO `pages_questions` (`page_id`, `qid`, `q_shorting`) VALUES
(4, 14, 0),
(4, 5, 1),
(4, 4, 2),
(1, 6, 0),
(1, 8, 1),
(1, 4, 2),
(2, 7, 0),
(2, 18, 1),
(2, 4, 2),
(6, 14, 0),
(6, 8, 1),
(5, 14, 0),
(5, 5, 1),
(5, 20, 2),
(5, 15, 3),
(5, 18, 4),
(5, 9, 5),
(5, 7, 6),
(5, 19, 7),
(5, 6, 8),
(5, 17, 9),
(5, 16, 10),
(5, 4, 11),
(5, 8, 12),
(7, 25, 0),
(7, 5, 1),
(7, 20, 2);

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
(46, 14, '10', ''),
(50, 5, '1', ''),
(50, 16, '1', ''),
(50, 17, '1', ''),
(50, 1, '1', ''),
(50, 2, '1', ''),
(51, 5, '8', ''),
(51, 16, '8', ''),
(51, 17, '8', ''),
(51, 1, '8', ''),
(51, 2, '8', ''),
(51, 7, '8', ''),
(51, 9, '9', ''),
(51, 10, '7', ''),
(52, 16, '4', ''),
(52, 2, '5', ''),
(53, 5, '7', ''),
(53, 18, '9', ''),
(53, 17, '9', ''),
(53, 1, '7', ''),
(53, 2, '7', ''),
(53, 7, '8', ''),
(53, 3, '7', ''),
(53, 8, '6', ''),
(53, 9, '6', ''),
(53, 14, '7', ''),
(53, 10, '7', ''),
(54, 5, '3', ''),
(54, 18, '3', ''),
(54, 1, '4', ''),
(54, 3, '3', ''),
(54, 8, '4', ''),
(54, 9, '4', ''),
(54, 14, '4', ''),
(54, 10, '3', ''),
(55, 1, '4', ''),
(55, 5, '4', ''),
(55, 17, '4', ''),
(55, 3, '2', ''),
(55, 8, '5', ''),
(56, 17, '4', ''),
(57, 19, '7', ''),
(57, 17, '3', ''),
(57, 18, '6', ''),
(57, 12, '3', ''),
(58, 19, '3', ''),
(58, 2, '4', ''),
(58, 8, '6', ''),
(58, 12, '7', ''),
(59, 21, '4', ''),
(60, 22, '2', ''),
(60, 21, '10', ''),
(61, 8, '7', ''),
(61, 20, '9', ''),
(62, 8, '8', ''),
(62, 20, '7', ''),
(63, 8, '4', ''),
(63, 20, '4', '');

-- --------------------------------------------------------

--
-- Table structure for table `q_pages`
--

CREATE TABLE `q_pages` (
  `id` int(11) NOT NULL,
  `pg_title` tinytext NOT NULL,
  `userid` int(11) NOT NULL,
  `inserted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `q_pages`
--

INSERT INTO `q_pages` (`id`, `pg_title`, `userid`, `inserted_at`) VALUES
(1, 'Sollicitudin voluptatem sequi mattis', 3, '0000-00-00 00:00:00'),
(2, 'Ipsa justo', 3, '0000-00-00 00:00:00'),
(3, 'Hendrerit dolorem doloribus', 3, '0000-00-00 00:00:00'),
(4, 'Page Title  test', 1, '0000-00-00 00:00:00'),
(5, 'Page Title Wr', 1, '0000-00-00 00:00:00'),
(6, 'Page Title  Te', 2, '0000-00-00 00:00:00'),
(7, 'Page Title Qtyr', 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `for_uid` int(11) NOT NULL,
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

INSERT INTO `reviews` (`id`, `for_uid`, `first_rating`, `email`, `phone`, `firstname`, `lastname`, `street`, `address`, `rev_comment`, `rev_about_experience`, `status`, `inserted_at`) VALUES
(1, 0, 2, 'reviewer14538@email.com', '14', 'F Name 14', 'L Name 14', 'Address 14', '14', 'Comments ... 14 14', '1', 0, '2018-11-01 09:28:04'),
(2, 0, 2, 'reviewer14538@email.com', '14', 'F Name 14', 'L Name 14', 'Address 14', '14', 'Comments ... 14 14', '1', 0, '2018-11-02 09:31:52'),
(3, 0, 2, 'reviewer14538@email.com', '14', 'F Name 14', 'L Name 14', 'Address 14', '14', 'Comments ... 14 14', '1', 0, '2018-11-04 09:32:29'),
(4, 0, 2, 'reviewer14538@email.com', '14', 'F Name 14', 'L Name 14', 'Address 14', '14', 'Comments ... 14 14', '1', 0, '2018-11-05 09:32:39'),
(5, 0, 3, 'reviewer4276@email.com', '4', 'F Name 4', 'L Name 4', 'Address 4', '4', 'Comments ... 4 4', '1', 0, '2018-11-06 09:33:00'),
(6, 0, 3, 'reviewer4276@email.com', '4', 'F Name 4', 'L Name 4', 'Address 4', '4', 'Comments ... 4 4', '1', 0, '2018-11-08 09:33:27'),
(7, 0, 3, 'reviewer4276@email.com', '4', 'F Name 4', 'L Name 4', 'Address 4', '4', 'Comments ... 4 4', '1', 0, '2018-11-08 09:33:38'),
(8, 0, 3, 'reviewer4276@email.com', '4', 'F Name 4', 'L Name 4', 'Address 4', '4', 'Comments ... 4 4', '1', 1, '2018-11-06 09:34:00'),
(9, 0, 1, 'reviewer2586@email.com', '2', 'F Name 2', 'L Name 2', 'Address 2', '2', 'Comments ... 2 2', '0', 0, '2018-11-11 09:36:08'),
(10, 0, 3, 'reviewer2317@email.com', '2', 'F Name 2', 'L Name 2', 'Address 2', '2', 'Comments ... 2 2', '0', 0, '2018-11-12 09:39:16'),
(11, 0, 0, 'reviewer8733@email.com', '8', 'F Name 8', 'L Name 8', 'Address 8', '8', 'Comments ... 8 8', '0', 0, '2018-11-13 09:42:55'),
(12, 0, 0, 'reviewer16738@email.com', '16', 'F Name 16', 'L Name 16', 'Address 16', '16', 'Comments ... 16 16', '0', 0, '2018-11-14 09:43:18'),
(13, 0, 0, 'reviewer8302@email.com', '8', 'F Name 8', 'L Name 8', 'Address 8', '8', 'Comments ... 8 8', '0', 0, '2018-11-14 09:43:42'),
(14, 0, 0, 'reviewer19609@email.com', '19', 'F Name 19', 'L Name 19', 'Address 19', '19', 'Comments ... 19 19', '0', 0, '2018-11-07 09:44:04'),
(15, 0, 0, 'reviewer7531@email.com', '7', 'F Name 7', 'L Name 7', 'Address 7', '7', 'Comments ... 7 7', '0', 0, '2018-11-08 09:44:15'),
(16, 0, 0, 'reviewer2901@email.com', '2', 'F Name 2', 'L Name 2', 'Address 2', '2', 'Comments ... 2 2', '0', 0, '2018-11-13 09:44:32'),
(17, 0, 2, 'reviewer20506@email.com', '20', 'F Name 20', 'L Name 20', 'Address 20', '20', 'Comments ... 20 20', '0', 0, '2018-11-04 09:54:13'),
(18, 0, 4, 'reviewer2920@email.com', '2', 'F Name 2', 'L Name 2', 'Address 2', '2', 'Comments ... 2 2', '0', 0, '2018-11-14 09:54:55'),
(19, 0, 2, 'reviewer1495@email.com', '1', 'F Name 1', 'L Name 1', 'Address 1', '1', 'Comments ... 1 1', '1', 0, '2018-11-05 09:56:14'),
(20, 0, 0, 'reviewer11727@email.com', '11', 'F Name 11', 'L Name 11', 'Address 11', '11', 'Comments ... 11 11', '0', 0, '2018-11-04 10:03:23'),
(21, 0, 5, 'reviewer1274@email.com', '12', 'F Name 12', 'L Name 12', 'Address 12', '12', 'Comments ... 12 12', '0', 0, '2018-11-12 10:04:56'),
(22, 0, 5, 'reviewer4221@email.com', '4', 'F Name 4', 'L Name 4', 'Address 4', '4', 'Comments ... 4 4', '0', 0, '2018-11-12 10:05:42'),
(23, 0, 2, 'reviewer8690@email.com', '8', 'F Name 8', 'L Name 8', 'Address 8', '8', 'Comments ... 8 8', '0', 0, '2018-11-12 10:06:24'),
(24, 0, 8, 'reviewer13385@email.com', '13', 'F Name 13', 'L Name 13', 'Address 13', '13', 'Comments ... 13 13', '0', 0, '2018-11-12 10:06:33'),
(25, 0, 2, 'reviewer8695@email.com', '8', 'F Name 8', 'L Name 8', 'Address 8', '8', 'Comments ... 8 8', '0', 0, '2018-11-12 10:07:34'),
(26, 0, 0, 'reviewer9235@email.com', '9', 'F Name 9', 'L Name 9', 'Address 9', '9', 'Comments ... 9 9', '0', 0, '2018-11-12 10:07:52'),
(27, 0, 4, 'reviewer9850@email.com', '9', 'F Name 9', 'L Name 9', 'Address 9', '9', 'Comments ... 9 9', '0', 0, '2018-11-12 10:08:24'),
(28, 0, 10, 'reviewer15171@email.com', '15', 'F Name 15', 'L Name 15', 'Address 15', '15', 'Comments ... 15 15', '0', 0, '2018-11-12 10:10:20'),
(29, 0, 5, 'reviewer15888@email.com', '15', 'F Name 15', 'L Name 15', 'Address 15', '15', 'Comments ... 15 15', '0', 0, '2018-11-12 10:11:47'),
(30, 0, 4, 'reviewer10762@email.com', '10', 'F Name 10', 'L Name 10', 'Address 10', '10', 'Comments ... 10 10', '0', 0, '2018-11-12 10:12:05'),
(31, 0, 0, 'reviewer422@email.com', '4', 'F Name 4', 'L Name 4', 'Address 4', '4', 'Comments ... 4 4', '0', 0, '2018-11-12 10:12:14'),
(32, 0, 0, 'reviewer935@email.com', '9', 'F Name 9', 'L Name 9', 'Address 9', '9', 'Comments ... 9 9', '0', 0, '2018-11-12 10:13:16'),
(33, 0, 0, 'reviewer17830@email.com', '17', 'F Name 17', 'L Name 17', 'Address 17', '17', 'Comments ... 17 17', '0', 0, '2018-11-12 10:13:43'),
(34, 0, 0, 'reviewer6305@email.com', '6', 'F Name 6', 'L Name 6', 'Address 6', '6', 'Comments ... 6 6', '0', 0, '2018-11-12 10:14:05'),
(35, 0, 0, 'reviewer10448@email.com', '10', 'F Name 10', 'L Name 10', 'Address 10', '10', 'Comments ... 10 10', '0', 0, '2018-11-12 10:14:57'),
(36, 0, 0, 'reviewer10448@email.com', '10', 'F Name 10', 'L Name 10', 'Address 10', '10', 'Comments ... 10 10', '0', 0, '2018-11-12 10:15:22'),
(37, 0, 0, 'reviewer9679@email.com', '9', 'F Name 9', 'L Name 9', 'Address 9', '9', 'Comments ... 9 9', '0', 0, '2018-11-12 10:22:02'),
(38, 0, 8, 'reviewer9385@email.com', '9', 'F Name 9', 'L Name 9', 'Address 9', '9', 'Comments ... 9 9', '0', 0, '2018-11-12 10:22:08'),
(39, 0, 0, 'reviewer15873@email.com', '15', 'F Name 15', 'L Name 15', 'Address 15', '15', 'Comments ... 15 15', '0', 0, '2018-11-12 10:22:31'),
(40, 0, 0, 'reviewer6820@email.com', '6', 'F Name 6', 'L Name 6', 'Address 6', '6', 'Comments ... 6 6', '0', 0, '2018-11-12 10:22:39'),
(41, 0, 0, 'reviewer18458@email.com', '18', 'F Name 18', 'L Name 18', 'Address 18', '18', 'Comments ... 18 18', '0', 0, '2018-11-12 10:24:59'),
(42, 0, 9, 'reviewer12572@email.com', '12', 'F Name 12', 'L Name 12', 'Address 12', '12', 'Comments ... 12 12', '0', 0, '2018-11-12 10:26:11'),
(43, 0, 0, 'reviewer14192@email.com', '14', 'F Name 14', 'L Name 14', 'Address 14', '14', 'Comments ... 14 14', '0', 0, '2018-11-12 10:27:32'),
(44, 0, 9, 'reviewer11794@email.com', '11', 'F Name 11', 'L Name 11', 'Address 11', '11', 'Comments ... 11 11', '0', 1, '2018-11-12 10:28:01'),
(45, 0, 10, 'reviewer9476@email.com', '9', 'F Name 9', 'L Name 9', 'Address 9', '9', 'Comments ... 9 9', '0', 0, '2018-11-12 10:28:17'),
(46, 0, 7, 'reviewer5819@email.com', '5', 'F Name 5', 'L Name 5', 'Address 5', '5', 'Comments ... 5 5', '0', 0, '2018-11-12 14:03:02'),
(47, 0, 8, 'reviewer17957@email.com', '17', 'F Name 17', 'L Name 17', 'Address 17', '17', 'Comments ... 17 17', 'N', 1, '2018-11-13 07:30:50'),
(48, 0, 3, 'reviewer20712@email.com', '20', 'F Name 20', 'L Name 20', 'Address 20', '20', 'Comments ... 20 20', 'rev_about_experience ... 20 20', 0, '2018-11-13 14:09:30'),
(49, 0, 9, 'dsdfsdf@erew.cdsf', '', 'df', 'dsfs', '', '', '', '', 1, '2018-11-13 14:09:49'),
(50, 0, 1, 'ewtdfsdf@erew.cdsf', '45436554', 'F name', 'L name', 'Street', '4545', 'dditional comments or concerns?\r\n\r\n', 'hing about your experience here failed to meet your expectations, what could we do ', 0, '2018-11-19 13:06:36'),
(51, 0, 8, 'ema65343@email.com', '45436554', 'F name', 'L name', 'Street', '43656', 'you have additional comments or ', 'ything about your experience here failed to meet your expectations, what could we do', 1, '2018-11-19 13:22:11'),
(52, 0, 4, 'werwetsdfsdf@erew.cdsf', '45436554', 'F name', 'L name', 'Street', '44554', 'omments or conce', 'bout your experience here failed to meet your expectations, what could we ', 0, '2018-11-19 13:27:51'),
(53, 0, 6, 'email343343@email.co', '45436554', 'F name', 'L name', 'Street', '454556', 'Dummy text ...', 'Dummy text ...', 1, '2018-11-19 13:47:02'),
(54, 0, 3, 'email3f543@email.com', '254365543', 'F name', 'L name', 'Street', '67567', 'test ..', 'Test ..', 0, '2018-11-19 13:47:47'),
(55, 0, 0, 'email3563@email.com', '45436554', 'F name', 'L name', 'Street', 'City', 'have additional comme', 'g about your experience here failed to meet your expectations, what could', 0, '2018-11-22 07:18:09'),
(56, 0, 3, 'emal43@email.com', '45436554', 'F name', 'L name', 'Street', 'City', 'dditional comments or concerns?\r\n\r\n', ' about your experience here failed to m', 0, '2018-11-22 07:31:36'),
(57, 0, 4, 'email35h3@email.com', '45436554', 'F name', 'L name', 'Street', 'City', 'have additional comments or concerns?\r\n\r\n', ' your experience here failed to meet your expectations, what could we d', 0, '2018-11-22 07:47:25'),
(58, 0, 3, 'email5343@email.com', '45436554', 'F name', 'L name', 'Street', 'City', '', 'ur experience here failed to meet your expectations, what could we do to improve it for you?\r\n\r\n', 0, '2018-11-22 07:55:12'),
(59, 0, 0, 'email356543@email.com', '5445', 'F name', 'L name', 'Street', '543', 'al comments or co', 'perience here failed to meet ', 0, '2018-12-02 11:30:06'),
(60, 3, 5, 'email356543@email.com', '45436554', 'F name', 'L name', 'Street', 'City', 'itional comments ', 'experience here failed to meet your expecta', 0, '2018-12-02 11:38:08'),
(61, 2, 8, 'email34343@email.com', '45436554', 'F name', 'L name', 'Street', 'City', 'dsfds', 'fdsf', 1, '2018-12-02 13:58:50'),
(62, 2, 10, 'email356543@email.com', '45436554', 'F name', 'L name', 'Street', 'City', 'dsfds', 'dsfds', 1, '2018-12-02 13:59:26'),
(63, 2, 5, 'email3565343@email.com', '45436554', 'F name', 'L name', 'Street', 'City', 'ds f', 'dsfds f', 0, '2018-12-02 13:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `rev_questions`
--

CREATE TABLE `rev_questions` (
  `qid` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer_option` varchar(20) NOT NULL,
  `shorting` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rev_questions`
--

INSERT INTO `rev_questions` (`qid`, `question`, `answer_option`, `shorting`, `userid`, `status`) VALUES
(1, 'How was your visit here overall?', 'rev_1_10', 2, 0, 1),
(2, 'How was our customer service?', 'rev_1_10', 5, 0, 1),
(3, 'How was your individual experience while you were here?', 'rev_1_10', 18, 0, 1),
(4, 'Would you refer your friends or family here?', 'rev_1_10', 8, 0, 1),
(5, 'What was the quality of our Doctor\'s service?', 'rev_1_10', 7, 0, 1),
(6, 'What was the quality of the medical treatment you received?', 'rev_1_10', 9, 0, 1),
(7, 'How would you rate the cleanliness of our facility?', 'rev_1_10', 10, 0, 1),
(8, 'How likely is it that you will return for a visit to our practice?', 'rev_1_10', 3, 2, 1),
(9, 'Do you have additional comments or concerns?', 'rev_1_10', 11, 0, 1),
(12, 'Nonummy sollicitudin aliqua morbi sodales tempora voluptate!', 'yes_no', 17, 0, 0),
(14, 'Rquam et. Nonummy sollicitudin aliqua morbi sodales tempora voluptate!', 'rev_1_10', 6, 2, 0),
(15, 'Eiam optio, platea, sodales, totam dolore, quam esse nunc ipsum senectus faucibus', 'rev_1_10', 16, 0, 0),
(16, 'Review question add form\r\n', 'rev_1_10', 14, 0, 0),
(17, 'Lacus eleifend consectetuer gravida hac hac auctor pede ullam in quia class. Eos ad, ullam? ', 'rev_1_10', 13, 0, 0),
(18, 'New question, Lorem ipsum doror (Dummy text)', 'rev_1_10', 15, 0, 0),
(19, 'Vestibulum fugit congue porta dui anim mollis', 'yes_no', 12, 0, 0),
(20, 'Review question add form', 'rev_1_10', 4, 2, 1),
(21, 'Review question add form', 'rev_1_10', 1, 3, 1),
(22, ' question add form The Question', 'rev_1_10', 0, 3, 1),
(23, 'Aenean, molestie, amet quia. Aspernatur odit venenatis mauris consequatur laudantium quas error?', 'rev_1_10', -1, 2, 1),
(24, 'Imperdiet voluptatum per, mollis quibusdam! Tempor', 'rev_1_10', -2, 2, 1),
(25, 'Penatibus porttitor illum, enim', 'rev_1_10', -3, 2, 1),
(26, 'Sollicitudin dolor illum, reiciendis', 'rev_1_10', -4, 2, 1);

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
-- Table structure for table `subs_packages`
--

CREATE TABLE `subs_packages` (
  `spk_id` int(11) NOT NULL,
  `spk_title` tinytext NOT NULL,
  `spk_slug` tinytext NOT NULL,
  `spk_subtitle` text NOT NULL,
  `spk_description` text NOT NULL,
  `spk_duration` double NOT NULL,
  `spk_duration_label` tinytext NOT NULL,
  `spk_price` double NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subs_packages`
--

INSERT INTO `subs_packages` (`spk_id`, `spk_title`, `spk_slug`, `spk_subtitle`, `spk_description`, `spk_duration`, `spk_duration_label`, `spk_price`, `status`) VALUES
(1, 'Free', 'free', 'Free sub title', 'Package description', 0, '', 0, 0),
(2, 'Silver', 'silver', 'Silver sub title', 'Package description', 1, 'year', 20, 0),
(3, 'Gold ', 'gold', 'Gold sub title', 'Package description', 1, 'year', 30, 0);

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
  `subs_package_slug` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `usertype`, `subs_package_slug`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@email.com', '202cb962ac59075b964b07152d234b70', 'superadmin', '', NULL, NULL),
(2, 'gnuser5', 'thomas5@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'gold', NULL, NULL),
(3, 'dental', 'dentaloffice@email.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'silver', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `uid` int(11) NOT NULL,
  `fullname` tinytext NOT NULL,
  `fullname_contact` varchar(222) NOT NULL,
  `phone` text NOT NULL,
  `alt_name_client_contact` tinytext NOT NULL,
  `alt_phone` tinytext NOT NULL,
  `alt_email` tinytext NOT NULL,
  `tablet_needed` int(1) NOT NULL,
  `tablet_so_how_many` int(11) NOT NULL,
  `service_location` text NOT NULL,
  `start_date_of_contract` tinytext NOT NULL,
  `about` text NOT NULL,
  `profilpic` text NOT NULL,
  `pos_rdr_url_yelp` text NOT NULL,
  `pos_rdr_url_google` text NOT NULL,
  `pos_rdr_url_facebook` text NOT NULL,
  `pos_rdr_url_trip_advisor` text NOT NULL,
  `pos_rdr_url_urban_spoon` text NOT NULL,
  `pos_rdr_url_city_search` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`uid`, `fullname`, `fullname_contact`, `phone`, `alt_name_client_contact`, `alt_phone`, `alt_email`, `tablet_needed`, `tablet_so_how_many`, `service_location`, `start_date_of_contract`, `about`, `profilpic`, `pos_rdr_url_yelp`, `pos_rdr_url_google`, `pos_rdr_url_facebook`, `pos_rdr_url_trip_advisor`, `pos_rdr_url_urban_spoon`, `pos_rdr_url_city_search`) VALUES
(2, 'Afdsfds  reyt d', 'dfsdf', '', '', '', '', 0, 0, '', '', 'About', 'cer_152606980821.jpg', '', 'dsfsdfwrfs', '', '', 'dsf ds', 'fds'),
(4, 'AQ Eidt d', '', '', '', '', '', 0, 0, '', '', 'aboutoihihfg f', 'comfortable-environment_icon-min1.png', '', '', '', '', '', ''),
(5, 'dsfdsfds', '', '', '', '', '', 0, 0, '', '', 'dfsd fdsf', 'comfortable-environment_icon-min1.png', '', '', '', '', '', ''),
(1, 'Super Admin', '', '', '', '', '', 0, 0, '', '', 'About AboutAboutAbout', 'comfortable-environment_icon-min1.png', '', '', '', '', '', ''),
(7, 'dsfdsfds', '', '', '', '', '', 0, 0, '', '', 'sdfds', 'admin.png', '', '', '', '', '', ''),
(9, 'dsfdsfds', '', '', '', '', '', 0, 0, '', '', 'About', 'Mercedes-e-class.png', '', '', '', '', '', ''),
(37, 'dsfdsfds', '', '', '', '', '', 0, 0, '', '', 'ds fds', 'mastercard31.png', '', '', '', '', '', ''),
(6, 'sss', '', '', '', '', '', 0, 0, '', '', 'sssss d  d', 'loc-pin1.png', '', '', '', '', '', ''),
(35, 'Full Name', '', '', '', '', '', 0, 0, '', '', 'About test .......', 'admin2.png', '', '', '', '', '', ''),
(33, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', ''),
(30, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', ''),
(32, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', ''),
(3, 'Full ', 'Contact Name', '', '', '', '', 0, 0, '', '', '', 'avatar12.png', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notification_contacts`
--
ALTER TABLE `notification_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `q_pages`
--
ALTER TABLE `q_pages`
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
-- Indexes for table `subs_packages`
--
ALTER TABLE `subs_packages`
  ADD PRIMARY KEY (`spk_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `q_pages`
--
ALTER TABLE `q_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `rev_questions`
--
ALTER TABLE `rev_questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subs_packages`
--
ALTER TABLE `subs_packages`
  MODIFY `spk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
