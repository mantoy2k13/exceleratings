-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2019 at 01:18 PM
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
(6, 'The Title 6', 'thomas.woodfin06@yopmail.com', '8801815035736', 2, 1),
(7, 'contact person ', 'thomas.woodfin07@yopmail.com', '745346436', 3, 1),
(8, 'The Title 8', 'thomas.woodfin08@yopmail.com', '845346436', 2, 0),
(12, 'The Title 2 d', 'thomas.woodfin16@yopmail.com', '34656544', 3, 1),
(13, 'The Title 2 dd', 'thomas.woodfin16@yopmail.com', '3465654', 2, 1),
(14, 'Cont', 'tom5cont@yopmail.com', '8801815035736', 16, 1);

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
(7, 20, 2),
(8, 28, 0),
(8, 27, 1),
(8, 30, 2),
(9, 29, 0),
(9, 30, 1),
(9, 27, 2),
(9, 28, 3),
(11, 5, 0),
(11, 7, 1),
(11, 17, 2),
(12, 5, 0),
(12, 7, 1),
(12, 17, 2),
(10, 26, 0),
(10, 14, 1),
(10, 20, 2),
(10, 24, 3),
(13, 7, 0),
(13, 5, 1),
(13, 17, 2),
(13, 32, 3),
(13, 33, 4),
(13, 34, 5),
(13, 35, 6),
(13, 36, 7),
(13, 37, 8),
(13, 38, 9),
(14, 19, 0),
(14, 9, 1),
(14, 6, 2),
(14, 39, 3),
(14, 40, 4),
(14, 41, 5),
(14, 2, 6),
(14, 42, 7),
(14, 43, 8),
(14, 44, 9),
(15, 1, 0),
(15, 4, 1),
(15, 16, 2),
(15, 15, 3),
(15, 45, 4),
(15, 46, 5),
(15, 47, 6),
(15, 48, 7),
(15, 49, 8),
(15, 50, 9),
(16, 70, 0),
(16, 69, 1),
(16, 68, 2),
(16, 67, 3),
(16, 66, 4),
(16, 65, 5),
(16, 64, 6),
(16, 63, 7),
(16, 71, 8),
(17, 73, 0),
(17, 70, 1),
(17, 69, 2),
(17, 68, 3),
(17, 67, 4),
(17, 66, 5),
(17, 65, 6),
(17, 64, 7),
(17, 63, 8),
(18, 75, 0),
(18, 1, 1),
(18, 4, 2),
(18, 16, 3),
(18, 15, 4),
(18, 45, 5),
(18, 46, 6),
(18, 47, 7),
(18, 48, 8),
(18, 49, 9),
(18, 50, 10),
(19, 7, 0),
(19, 5, 1),
(19, 17, 2),
(19, 32, 3),
(19, 33, 4),
(19, 34, 5),
(19, 35, 6),
(19, 36, 7),
(19, 37, 8),
(20, 76, 0),
(20, 62, 1),
(20, 61, 2),
(20, 60, 3),
(20, 59, 4),
(20, 58, 5),
(20, 57, 6),
(20, 56, 7),
(20, 55, 8),
(20, 54, 9),
(20, 53, 10);

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
(63, 20, '4', ''),
(64, 25, '4', ''),
(64, 5, '8', ''),
(64, 20, '5', ''),
(65, 14, '4', ''),
(65, 8, '7', ''),
(66, 25, '9', ''),
(66, 5, '8', ''),
(66, 20, '8', ''),
(67, 14, '8', ''),
(67, 8, '8', ''),
(68, 25, '6', ''),
(68, 5, '10', ''),
(68, 20, '8', ''),
(69, 14, '4', ''),
(69, 8, '7', ''),
(70, 25, '4', ''),
(70, 5, '4', ''),
(70, 20, '4', ''),
(71, 28, '5', ''),
(71, 27, '9', ''),
(71, 30, '6', ''),
(72, 14, '8', ''),
(72, 8, '8', ''),
(73, 14, '8', ''),
(73, 8, '8', ''),
(74, 14, '8', ''),
(74, 8, '9', ''),
(75, 25, '9', ''),
(75, 5, '8', ''),
(75, 20, '8', ''),
(76, 25, '8', ''),
(76, 5, '8', ''),
(76, 20, '8', ''),
(77, 14, '8', ''),
(77, 8, '9', ''),
(78, 25, '9', ''),
(78, 5, '9', ''),
(78, 20, '9', ''),
(79, 25, '8', ''),
(79, 5, '9', ''),
(79, 20, '8', ''),
(80, 25, '8', ''),
(80, 5, '8', ''),
(80, 20, '8', ''),
(81, 14, '5', ''),
(81, 8, '5', ''),
(82, 14, '5', ''),
(82, 8, '6', ''),
(83, 25, '5', ''),
(83, 5, '5', ''),
(83, 20, '5', ''),
(84, 25, '5', ''),
(84, 5, '5', ''),
(84, 20, '5', ''),
(85, 25, '5', ''),
(85, 5, '5', ''),
(85, 20, '5', ''),
(86, 25, '4', ''),
(86, 5, '3', ''),
(86, 20, '3', ''),
(87, 25, '4', ''),
(87, 5, '4', ''),
(87, 20, '3', ''),
(88, 52, '10', ''),
(88, 8, '5', ''),
(88, 6, '4', ''),
(88, 2, '4', ''),
(88, 9, '4', ''),
(88, 19, '3', ''),
(89, 52, '10', ''),
(89, 8, '4', ''),
(89, 6, '4', ''),
(89, 2, '5', ''),
(89, 9, '4', ''),
(89, 19, '5', ''),
(90, 52, '10', ''),
(90, 51, '10', ''),
(90, 8, '8', ''),
(90, 6, '8', ''),
(90, 2, '8', ''),
(90, 9, '8', ''),
(110, 19, '5', ''),
(110, 9, '4', ''),
(110, 6, '6', ''),
(110, 39, '5', ''),
(110, 40, '7', ''),
(110, 41, '6', ''),
(110, 2, '8', ''),
(110, 42, '8', ''),
(110, 43, '7', ''),
(110, 44, '6', ''),
(111, 1, '4', ''),
(111, 4, '6', ''),
(111, 16, '8', ''),
(111, 15, '9', ''),
(111, 45, '8', ''),
(111, 46, '7', ''),
(111, 47, '6', ''),
(111, 48, '4', ''),
(111, 49, '4', ''),
(111, 50, '2', ''),
(112, 1, '8', ''),
(112, 4, '5', ''),
(112, 16, '5', ''),
(112, 15, '8', ''),
(112, 45, '7', ''),
(112, 46, '4', ''),
(112, 47, '7', ''),
(112, 48, '6', ''),
(112, 49, '4', ''),
(112, 50, '7', ''),
(113, 70, '10', ''),
(113, 69, '10', ''),
(113, 68, '10', ''),
(113, 67, '10', ''),
(113, 64, '10', ''),
(113, 63, '10', ''),
(113, 71, '9', ''),
(114, 70, '10', ''),
(114, 69, '10', ''),
(114, 68, '10', ''),
(114, 67, '10', ''),
(114, 65, '10', ''),
(114, 64, '10', ''),
(114, 63, '10', ''),
(114, 71, '8', ''),
(115, 70, '10', ''),
(115, 69, '10', ''),
(115, 68, '10', ''),
(115, 67, '10', ''),
(115, 64, '10', ''),
(115, 63, '10', ''),
(115, 71, '9', ''),
(116, 74, '10', ''),
(116, 69, '10', ''),
(116, 68, '10', ''),
(116, 67, '10', ''),
(116, 65, '10', ''),
(116, 64, '10', ''),
(116, 63, '10', ''),
(117, 74, '10', ''),
(117, 65, '10', ''),
(117, 64, '10', ''),
(117, 63, '10', ''),
(118, 69, '10', ''),
(118, 68, '10', ''),
(118, 66, '10', ''),
(118, 64, '10', ''),
(119, 74, '1', ''),
(119, 70, '0', ''),
(119, 69, '1', ''),
(119, 68, '0', ''),
(119, 67, '0', ''),
(119, 66, '0', ''),
(119, 65, '1', ''),
(119, 64, '0', ''),
(119, 63, '1', ''),
(120, 74, '0', ''),
(120, 70, '10', ''),
(120, 69, '0', ''),
(120, 68, '10', ''),
(120, 67, '0', ''),
(120, 66, '10', ''),
(120, 65, '0', ''),
(120, 64, '10', ''),
(120, 63, '0', ''),
(122, 70, '0', ''),
(123, 75, '4', ''),
(123, 1, '3', ''),
(124, 69, '0', ''),
(124, 68, '10', ''),
(124, 67, '10', ''),
(124, 66, '0', ''),
(124, 65, '0', ''),
(124, 64, '10', ''),
(124, 63, '0', ''),
(124, 71, '5', ''),
(125, 7, '4', ''),
(125, 33, '5', ''),
(125, 36, '10', ''),
(126, 76, '4', ''),
(126, 62, '6', ''),
(126, 58, '0', ''),
(126, 57, '10', ''),
(126, 56, '10', ''),
(126, 55, '10', ''),
(126, 54, '10', ''),
(126, 53, '0', ''),
(127, 73, '4', ''),
(127, 70, '10', ''),
(127, 69, '10', ''),
(127, 68, '10', ''),
(127, 67, '0', ''),
(127, 66, '10', ''),
(127, 65, '0', ''),
(128, 73, '7', ''),
(128, 70, '10', ''),
(128, 69, '10', ''),
(128, 68, '10', ''),
(128, 67, '10', ''),
(128, 66, '10', ''),
(128, 65, '0', ''),
(128, 64, '0', ''),
(128, 63, '10', ''),
(129, 73, '9', ''),
(129, 70, '10', ''),
(129, 69, '0', ''),
(129, 68, '0', ''),
(129, 67, '10', ''),
(129, 66, '10', ''),
(129, 65, '10', ''),
(129, 64, '10', ''),
(129, 63, '10', ''),
(130, 73, '4', ''),
(130, 70, '10', ''),
(130, 69, '10', ''),
(130, 68, '10', ''),
(130, 67, '10', ''),
(130, 66, '0', ''),
(130, 65, '0', ''),
(130, 64, '10', ''),
(131, 73, '4', ''),
(131, 70, '0', ''),
(131, 69, '0', ''),
(131, 68, '0', ''),
(131, 67, '10', ''),
(131, 66, '10', ''),
(131, 65, '10', ''),
(131, 64, '10', ''),
(132, 75, '4', ''),
(132, 1, '9', ''),
(132, 4, '10', ''),
(132, 16, '9', ''),
(132, 15, '9', ''),
(132, 45, '8', ''),
(132, 46, '10', ''),
(132, 47, '10', ''),
(132, 48, '0', ''),
(132, 49, '6', ''),
(132, 50, '10', ''),
(133, 75, '9', ''),
(133, 1, '9', ''),
(133, 4, '9', ''),
(133, 16, '9', ''),
(133, 47, '10', ''),
(133, 48, '10', ''),
(134, 75, '9', ''),
(134, 1, '9', ''),
(134, 4, '9', ''),
(134, 16, '9', ''),
(134, 46, '10', ''),
(134, 47, '0', ''),
(134, 48, '10', ''),
(135, 75, '3', ''),
(135, 46, '0', ''),
(136, 75, '3', ''),
(136, 46, '0', ''),
(137, 75, '3', ''),
(137, 46, '0', ''),
(138, 75, '3', ''),
(138, 46, '0', ''),
(139, 1, '4', ''),
(139, 16, '5', ''),
(139, 46, '0', ''),
(139, 48, '0', ''),
(140, 16, '6', ''),
(140, 47, '10', ''),
(140, 48, '0', ''),
(140, 49, '7', ''),
(140, 50, '10', '');

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
(7, 'Page Title Qtyr', 2, '0000-00-00 00:00:00'),
(8, 'First question page', 4, '0000-00-00 00:00:00'),
(9, '2nd Question page', 4, '0000-00-00 00:00:00'),
(10, 'Page Title ', 2, '0000-00-00 00:00:00'),
(12, 'Page Title  test...', 7, '0000-00-00 00:00:00'),
(13, 'Page Title ', 10, '0000-00-00 00:00:00'),
(14, 'Page Title  test...', 12, '0000-00-00 00:00:00'),
(15, 'Page Title  test', 13, '0000-00-00 00:00:00'),
(16, 'Page Title ', 15, '0000-00-00 00:00:00'),
(17, 'Page Title ', 14, '0000-00-00 00:00:00'),
(18, 'Page Title  test...', 16, '0000-00-00 00:00:00'),
(19, 'Page Title  test', 17, '0000-00-00 00:00:00'),
(20, 'Page Title  test...', 18, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `for_pgid` int(11) NOT NULL,
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

INSERT INTO `reviews` (`id`, `for_pgid`, `first_rating`, `email`, `phone`, `firstname`, `lastname`, `street`, `address`, `rev_comment`, `rev_about_experience`, `status`, `inserted_at`) VALUES
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
(62, 3, 10, 'email356543@email.com', '45436554', 'F name', 'L name', 'Street', 'City', 'dsfds', 'dsfds', 1, '2018-12-02 13:59:26'),
(63, 2, 5, 'email3565343@email.com', '45436554', 'F name', 'L name', 'Street', 'City', 'ds f', 'dsfds f', 0, '2018-12-02 13:59:45'),
(64, 7, 6, 'emailf43@email.com', '45436554', 'F name', 'L name', 'Street', 'City', 'dsfd', 'sdfds', 0, '2018-12-18 11:49:10'),
(65, 6, 5, 'email3d4343@email.com', '45436554', 'F name', 'L name', 'Street', 'City', 'dsfds', 'sdf', 0, '2018-12-18 11:50:15'),
(66, 7, 8, 'email3443@email.com', '45436554', 'F name', 'L name', 'Street', 'City', 'sdfsd', 'dsgetr', 1, '2018-12-18 11:50:52'),
(67, 6, 9, 'email356543@email.com', '45436554', 'F name', 'L name', 'Street', 'City', 'ditional comment', 'ut your experience here failed to meet your expectations, what could we do to improve it for you?', 1, '2018-12-18 12:09:22'),
(68, 7, 6, 'email66734343@email.com', '45436554', 'F name', 'L name', 'Street', 'City', 'e additional comments or concerns?\r\n', 'ut your experience here failed to meet your expectations, what could we', 1, '2018-12-19 05:56:26'),
(69, 6, 4, 'wrtysdihe@erew.cdsf', '347436554', 'F name', 'L name', 'Street', 'City', ' additional comments or concerns?', 'your experience here failed to meet your expectations, what could we do to improve it for you?\r\n\r\n', 0, '2018-12-19 05:58:59'),
(70, 7, 4, 'emailwe6543@email.com', '2536554', 'F name', 'L name', 'Street', 'City', 'dditional comments or conc', 'hing about your experience here failed to meet ', 0, '2018-12-19 06:33:09'),
(71, 8, 6, 'wsfsdf@erew.cdsf', '25365543', 'w', 'w', 'Street', 'City', 'f', 'f', 0, '2018-12-19 10:03:29'),
(72, 6, 9, 'exceleratings@yopmail.com', '45436554', 'F name', 'L name', 'Street', 'City', 'ou have additional comments or conce', 'ur experience here failed to meet your expectations, what could we do to improve it for you?\r\n', 1, '2018-12-20 08:13:38'),
(73, 6, 9, 'exceleratings@yopmail.com', '45436554', 'F name', 'L name', 'Street', 'City', 'ou have additional comments or conce', 'ur experience here failed to meet your expectations, what could we do to improve it for you?\r\n', 1, '2018-12-20 09:39:06'),
(74, 6, 8, 'exceleratings@yopmail.com', '5445', 'F name', 'L name', 'Street', 'City', 'dsf', 'dsfsd', 1, '2018-12-20 09:48:48'),
(75, 7, 9, 'exceleratings@yopmail.com', '5445', 'F name', 'L name', 'Street', 'City', 'dsf', 'f', 1, '2018-12-20 09:51:15'),
(76, 7, 9, 'exceleratings@yopmail.com', '5445', 'F name', 'dsfs', 'Street', 'City', 'f', 'f', 1, '2018-12-20 09:55:17'),
(77, 6, 8, 'exceleratings@yopmail.com', '2536554', 'F name', 'L name', 'Street', 'City', ' or conc', 'ere failed to meet your expecta', 1, '2018-12-20 09:57:35'),
(78, 7, 9, 'exceleratings@yopmail.com', '2536554', 'F name', 'L name', 'Street', 'City', 'g', 'g', 1, '2018-12-20 09:58:15'),
(79, 7, 8, 'sakiremail@gmail.com', '45436554', 'F name', 'L name', 'Street', 'City', 'e', 'e', 1, '2018-12-20 10:02:51'),
(80, 7, 9, 'exceleratings@yopmail.com', '45436554', 'F name', 'L name', 'Street', 'City', 'dditional com', 'perience here failed to meet your expectations, what could we do to improve it for you?\r\n', 1, '2018-12-20 10:18:02'),
(81, 6, 5, 'exceleratings@yopmail.com', '25365543', 'F name', 'L name', 'Street', 'City', ' comments o', 'rience here failed to mee', 0, '2018-12-20 12:14:08'),
(82, 6, 4, 'exceleratings@yopmail.com', '5445', 'F name', 'dsfs', 'Street', 'City', 'u have additional comments or concern', ' about your experience here failed to meet', 0, '2018-12-20 12:18:21'),
(83, 7, 5, 'exceleratings@yopmail.com', '5445', 'F name', 'L name', 'Street', 'City', 'ents o', 'o meet your expectatio', 0, '2018-12-20 13:27:27'),
(84, 7, 5, 'exceleratings@yopmail.com', '5445', 'F name', 'L name', 'Street', 'City', 'ents o', 'o meet your expectatio', 0, '2018-12-20 13:31:19'),
(85, 7, 5, 'exceleratings@yopmail.com', '5445', 'F name', 'L name', 'Street', 'City', 'ents o', 'o meet your expectatio', 0, '2018-12-20 13:33:39'),
(86, 7, 6, 'exceleratings@yopmail.com', '45436554', 'F name', 'L name', 'Street', 'City', 'r', 'f', 0, '2018-12-20 13:40:16'),
(87, 7, 4, 'exceleratings@yopmail.com', '35436554', 'F name', 'L name', 'Street', 'City', 'mment', 'nce here', 0, '2018-12-21 09:45:11'),
(88, 10, 4, 'sakiremail@gmail.com', '25365543', 'F name', 'L name', 'h', 'df', 'e additional comments or ', 'df', 0, '2019-01-04 07:20:14'),
(89, 10, 6, 'sakiremail@gmail.com', '45436554', 'F name', 'L name', 'Street', 'y', 'ave additional comments or concerns?', 'ng about your experience here failed to meet your expectations, what could w', 0, '2019-01-04 10:08:17'),
(90, 10, 9, 'sakiremail@gmail.com', '45436554', 'F name', 'L name', 'h', 'g', 'e additional comments ', 'ut your experience here failed to meet your expectations, what could we do to im', 1, '2019-01-04 10:10:36'),
(91, 10, 4, 'email34343@email.com', '45436554', 'F name', 'L name', 'er', 'erewr', ' have additional comments or c', 'our experience here failed to meet your expectations, what could we do', 0, '2019-01-04 10:47:49'),
(92, 10, 4, 'email34343@email.com', '45436554', 'F name', 'L name', 'er', 'erewr', ' have additional comments or c', 'our experience here failed to meet your expectations, what could we do', 0, '2019-01-04 10:48:13'),
(93, 10, 4, 'email34343@email.com', '45436554', 'F name', 'L name', 'er', 'erewr', ' have additional comments or c', 'our experience here failed to meet your expectations, what could we do', 0, '2019-01-04 10:49:04'),
(94, 10, 4, 'email34343@email.com', '45436554', 'F name', 'L name', 'er', 'erewr', ' have additional comments or c', 'our experience here failed to meet your expectations, what could we do', 0, '2019-01-04 10:49:31'),
(95, 10, 4, 'email34343@email.com', '45436554', 'F name', 'L name', 'er', 'erewr', ' have additional comments or c', 'our experience here failed to meet your expectations, what could we do', 0, '2019-01-04 10:50:06'),
(96, 10, 4, 'email34343@email.com', '45436554', 'F name', 'L name', 'er', 'erewr', ' have additional comments or c', 'our experience here failed to meet your expectations, what could we do', 0, '2019-01-04 10:50:15'),
(97, 10, 4, 'email34343@email.com', '45436554', 'F name', 'L name', 'er', 'erewr', ' have additional comments or c', 'our experience here failed to meet your expectations, what could we do', 0, '2019-01-04 12:07:12'),
(98, 10, 5, 'sakiremail@gmail.com', '45436554', 'F name', 'L name', 'Street', 's', 'mments or co', 'd', 0, '2019-01-04 12:08:52'),
(99, 10, 5, 'sakiremail@gmail.com', '2536554', 'F name', 'L name', 's', 's', 'd', 'd', 0, '2019-01-04 12:15:17'),
(100, 10, 5, 'sakiremail@gmail.com', '45436554', 'F name', 'L name', 'rrg', 'grg', 'sdfdsf', 'regert', 0, '2019-01-04 12:16:59'),
(101, 10, 5, 'sakiremail@gmail.com', '45436554', 'F name', 'L name', 'rrg', 'grg', 'sdfdsf', 'regert', 0, '2019-01-04 12:20:05'),
(102, 10, 5, 'sakiremail@gmail.com', '25365543', 'df', 'w', 'Street', 'f', 'dsf', 'dsfds', 0, '2019-01-04 12:22:50'),
(103, 10, 3, 'sakiremail@gmail.com', '35436554', 'F name', 'L name', 'Street', 'g', 'ents or c', 'failed to meet', 0, '2019-01-04 12:24:27'),
(104, 10, 2, 'sakiremail@gmail.com', '25365543', 'df', 'dsfs', 'Street', 'f', 'f', 'f', 0, '2019-01-04 12:26:58'),
(105, 10, 3, 'robert@mobileappdevelopmentfirm.com', '45436554', 'F name', 'L name', 'Street', 'sfd', 'onal comments or', 'ere failed to meet your expe', 0, '2019-01-05 11:46:09'),
(106, 13, 9, 'exceleratings@yopmail.com', '25365543', 'F name', 'L name', 'Street', 'h', 'l comment', 'erience here failed to mee', 1, '2019-01-08 11:55:43'),
(107, 14, 5, 'robert@mobileappdevelopmentfirm.com', '5445', 'F name', 'L name', 'Street', 'df', 'have additional comments or co', 'out your experience here failed to meet your expectations, what co', 0, '2019-01-09 07:00:16'),
(108, 14, 8, 'robert@mobileappdevelopmentfirm.com', '45436554', 'F name', 'L name', 'Street', '', 'u have additional comments or conc', 'about your experience here failed to meet your expectations, what co', 0, '2019-01-09 07:09:49'),
(109, 14, 4, 'robert@mobileappdevelopmentfirm.com', '25365543', 'F name', 'L name', 'Street', 'r', 's', 's', 0, '2019-01-09 07:27:36'),
(110, 14, 4, 'robert@mobileappdevelopmentfirm.com', '35436554', 'F name', 'L name', 'Street', 'r', 'itional commen', 'ailed to meet your ', 0, '2019-01-09 07:30:14'),
(111, 15, 5, 'robert@mobileappdevelopmentfirm.com', '35436554', 'F name', 'L name', 'Street', 'u', 'u have additional comments o', 'erience here failed to meet your expecta', 0, '2019-01-09 07:33:04'),
(112, 15, 6, 'robert@mobileappdevelopmentfirm.com', '25365543', 'F name', 'w', 'Street', 't', 'r', 'r', 0, '2019-01-09 07:35:14'),
(115, 16, 5, 'robert@mobileappdevelopmentfirm.com', '35436554', 'F name', 'L name', 'h', 'a', 'onal comments o', 'out your experience here failed', 1, '2019-01-09 12:17:58'),
(116, 17, 6, 'exceleratings@yopmail.com', '45436554', 'F name', 'L name', 'Street', 'h', 'have additional comments or', ' experience here failed to meet your expectations, what could we do to', 1, '2019-01-10 06:44:48'),
(117, 17, 2, 'email34343@email.com', '25365543', 'F name', 'dsfs', 'Street', 'd', 'd', 'd', 0, '2019-01-10 06:59:48'),
(118, 17, 5, 'exceleratings@yopmail.com', '45436554', 'F name', 'L name', 'Street', 'o', '', 'perience here failed to meet yo', 0, '2019-01-10 07:05:53'),
(119, 17, 5, 'exceleratings@yopmail.com', '35436554', 'F name', 'L name', 'h', 'f', 've additional comments', 'out your experience here fa', 0, '2019-01-10 07:15:05'),
(120, 17, 3, 'exceleratings@yopmail.com', '45436554', 'F name', 'L name', 'Street', 'l', 'ave additional comm', 'ut your experience here failed to meet your expectations, ', 0, '2019-01-10 07:16:14'),
(121, 17, 5, 'exceleratings@yopmail.com', '45436554', 'F name', 'L name', 'Street', 'j', ' additional comments', ' about your experience here failed to meet y', 0, '2019-01-10 07:33:10'),
(122, 17, 8, 'exceleratings@yopmail.com', '45436554', 'F name', 'L name', 'Street', 'k', 'dditional comments or co', 'about your experience here faile', 0, '2019-01-10 07:34:26'),
(123, 18, 4, 'exceleratings@yopmail.com', '25365543', 'F name', 'L name', 'h', 'p', ' additional commen', 'your experience here failed to meet your expectati', 0, '2019-01-10 07:41:50'),
(124, 16, 5, 'exceleratings@yopmail.com', '35436554', 'F name', 'L name', 'Street', 'f', 'f', 'f', 0, '2019-01-10 09:23:26'),
(125, 19, 4, 'exceleratings@yopmail.com', '2536554', 'F name', 'L name', 'Street', 'g', 'ave additional comment', 'your experience here failed to meet your expectati', 0, '2019-01-10 09:25:45'),
(126, 20, 7, 'exceleratings@yopmail.com', '45436554', 'F name', 'L name', 'Street', 'r', 've additional comme', ' about your experience here failed to meet your e', 0, '2019-01-10 09:29:28'),
(127, 17, 4, 'exceleratings@yopmail.com', '45436554', 'F name', 'L name', 'Street', 'k', 'u have additional comments or', 'your experience here failed to meet your expectations, what could we do to im', 0, '2019-01-10 10:11:10'),
(128, 17, 8, 'exceleratings@yopmail.com', '45436554', 'F name', 'L name', 'Street', '', 'e additional comments ', 'our experience here failed to meet your ex', 1, '2019-01-10 10:16:59'),
(129, 17, 9, 'exceleratings@yopmail.com', '45436554', 'F name', 'L name', 'Street', 'l', 'dditional comment', 'ence here failed to meet y', 1, '2019-01-10 10:18:23'),
(130, 17, 9, 'exceleratings@yopmail.com', '25365543', 'F name', 'L name', 'h', '', 'al comments or c', 'e here failed to meet your', 1, '2019-01-10 10:20:34'),
(131, 17, 5, 'exceleratings@yopmail.com', '45436554', 'F name', 'L name', 'Street', '', 'tional comments or con', 'r experience here failed to meet y', 0, '2019-01-10 10:22:37'),
(132, 18, 5, 'exceleratings@yopmail.com', '35436554', 'F name', 'L name', 'Street', '', 'ou have additional comm', 'out your experience here failed to meet your expectations', 1, '2019-01-10 10:24:30'),
(133, 18, 9, 'exceleratings@yopmail.com', '25365543', 'F name', 'L name', 'Street', '', 'additional comme', 'about your experience here failed to ', 1, '2019-01-10 10:28:00'),
(134, 18, 9, 'exceleratings@yopmail.com', '2536554', 'F name', 'L name', 'Street', '', 'ditional comments or conce', 't your experience here failed to mee', 1, '2019-01-10 10:29:00'),
(135, 18, 4, 'exceleratings@yopmail.com', '45436554', 'F name', 'L name', 'Street', '', 's', 's', 0, '2019-01-10 12:19:51'),
(136, 18, 4, 'exceleratings@yopmail.com', '45436554', 'F name', 'L name', 'Street', '', 's', 's', 0, '2019-01-10 12:20:37'),
(137, 18, 4, 'exceleratings@yopmail.com', '45436554', 'F name', 'L name', 'Street', '', 's', 's', 0, '2019-01-10 12:20:56'),
(138, 18, 4, 'exceleratings@yopmail.com', '45436554', 'F name', 'L name', 'Street', '', 's', 's', 0, '2019-01-10 12:21:42'),
(139, 18, 4, 'exceleratings@yopmail.com', '45436554', 'F name', 'L name', 'Street', '', '', '', 0, '2019-01-10 12:23:11'),
(140, 18, 5, 'exceleratings@yopmail.com', '45436554', 'F name', 'L name', 'Street', '', 'ditional comment', ' experience here failed to meet your expectations, w', 0, '2019-01-10 13:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `rev_questions`
--

CREATE TABLE `rev_questions` (
  `qid` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer_option` varchar(20) NOT NULL,
  `yes_0_no_1` int(1) NOT NULL,
  `shorting` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `service_category` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rev_questions`
--

INSERT INTO `rev_questions` (`qid`, `question`, `answer_option`, `yes_0_no_1`, `shorting`, `userid`, `service_category`, `status`) VALUES
(1, 'How satisfied with your appointment today?', 'rev_1_10', 0, 0, 1, 2, 1),
(2, 'How satisfied are you with the final product?', 'rev_1_10', 0, 6, 1, 1, 1),
(4, 'How was the condition and cleanliness of our facility?', 'rev_1_10', 0, 1, 1, 2, 1),
(5, 'How would you rate the customer service today?', 'rev_1_10', 0, 1, 1, 3, 1),
(6, 'Did …….. Contracting stay on schedule?', 'rev_1_10', 0, 2, 1, 1, 1),
(7, 'How would you rate the cleanliness of our facility?', 'rev_1_10', 0, 0, 1, 3, 1),
(8, 'How likely is it that you will return for a visit to our practice?', 'rev_1_10', 0, 11, 2, 0, 1),
(9, 'Did  …….. Contracting stay within the agreed upon contract price?', 'rev_1_10', 0, 1, 1, 1, 1),
(14, 'Rquam et. Nonummy sollicitudin aliqua morbi sodales tempora voluptate!', 'rev_1_10', 0, 13, 2, 0, 0),
(15, 'Were you attended to in a timely manner?', 'rev_1_10', 0, 3, 1, 2, 1),
(16, 'How satisfied were you with the customer service?', 'rev_1_10', 0, 2, 1, 2, 1),
(17, 'How attentive we’re our staff to you and your party?', 'rev_1_10', 0, 2, 1, 3, 1),
(18, 'New question, Lorem ipsum doror (Dummy text)', 'rev_1_10', 0, 24, 0, 0, 0),
(19, 'How satisfied were you with the cleanliness of the job site?', 'rev_1_10', 0, 0, 1, 1, 1),
(20, 'Review question add form', 'rev_1_10', 0, 12, 2, 0, 1),
(21, 'Review question add form', 'rev_1_10', 0, 8, 3, 0, 1),
(22, ' question add form The Question', 'rev_1_10', 0, 6, 3, 0, 1),
(23, 'Aenean, molestie, amet quia. Aspernatur odit venenatis mauris consequatur laudantium quas error?', 'rev_1_10', 0, 15, 2, 0, 1),
(24, 'Imperdiet voluptatum per, mollis quibusdam! Tempor', 'rev_1_10', 0, 9, 2, 0, 1),
(25, 'Penatibus porttitor illum, enim', 'rev_1_10', 0, 7, 2, 0, 1),
(26, 'Sollicitudin dolor illum, reiciendis', 'rev_1_10', 0, 5, 2, 0, 1),
(27, 'Curae faucibus sapien quia aliquid curabitur', 'rev_1_10', 0, 4, 4, 0, 1),
(28, 'Nibh dis, mollis non pharetra eveniet magnis nunc rutrum', 'rev_1_10', 0, 3, 4, 0, 1),
(29, 'Deserunt explicabo quia ultricies nemo', 'rev_1_10', 0, 2, 4, 0, 1),
(30, 'Maecenas elit nascetur ultrices feugiat', 'rev_1_10', 0, 0, 4, 0, 1),
(31, 'estion add form', 'rev_1_10', 0, 1, 2, 0, 1),
(32, 'How would you rate the quality of our food?', 'rev_1_10', 0, 3, 1, 3, 1),
(33, 'How would you rate the selection on our menu?', 'rev_1_10', 0, 4, 1, 3, 1),
(34, 'Were you seated in a timely manner?', 'rev_1_10', 0, 5, 1, 3, 1),
(35, 'How would you rate our atmosphere?', 'rev_1_10', 0, 6, 1, 3, 1),
(36, 'Would you eat here or stay here again?', 'yes_no', 0, 7, 1, 3, 1),
(37, 'How would you rate our amenities on site?', 'rev_1_10', 0, 8, 1, 3, 1),
(39, 'Were you pleased with the level of professionalism with the administrative office and principles?', 'rev_1_10', 0, 3, 1, 1, 1),
(40, 'Were you satisfied with the level of professionalism with all mechanics on site?', 'rev_1_10', 0, 4, 1, 1, 1),
(41, 'Were you satisfied with the quality of workmanship?', 'rev_1_10', 0, 5, 1, 1, 1),
(42, 'Did …….the workers show up on time and leave at a reasonable hour?', 'rev_1_10', 0, 7, 1, 1, 1),
(43, 'Were the materials utilized of good quality?', 'rev_1_10', 0, 8, 1, 1, 1),
(44, 'Would you hire ….. Contracting for future remodeling projects?', 'rev_1_10', 0, 9, 1, 1, 1),
(45, 'How satisfied were you with the knowledge of our staff?', 'rev_1_10', 0, 4, 1, 2, 1),
(46, 'Would you visit our practice again?', 'yes_no', 0, 5, 1, 2, 1),
(47, 'Was it easy to make your appointment?', 'yes_no', 0, 6, 1, 2, 1),
(48, 'Did you experience any complications in your visit today?', 'yes_no', 0, 7, 1, 2, 1),
(49, 'How would you rate our website?', 'rev_1_10', 0, 8, 1, 2, 1),
(50, 'Did you feel comfortable during your visit today?', 'yes_no', 0, 9, 1, 2, 1),
(51, 'Review question add form\r\n', 'yes_no', 0, -1, 2, 0, 1),
(52, 'iew question add form', 'yes_no', 0, -2, 2, 0, 1),
(53, 'Was your front desk experience positive? ', 'yes_no', 0, -3, 1, 7, 1),
(54, 'Did your service provider start your appointment on time? ', 'yes_no', 0, -4, 1, 7, 1),
(55, 'Did you feel you received a through consultation prior to services\r\n received? ', 'yes_no', 0, -5, 1, 7, 1),
(56, 'Did your service provider understand your needs? ', 'yes_no', 0, -6, 1, 7, 1),
(57, 'Did your service provider mention any other services, or current promotions? ', 'yes_no', 0, -7, 1, 7, 1),
(58, 'Did your service provider recommend any products during your appointment? ', 'yes_no', 0, -8, 1, 7, 1),
(59, 'Did you purchase any products for home care? ', 'yes_no', 0, -9, 1, 7, 1),
(60, 'Was the facility clean and tidy?', 'yes_no', 0, -10, 1, 7, 1),
(61, 'Do you feel the services you received were worth the money? ', 'yes_no', 0, -11, 1, 7, 1),
(62, 'Were you asked to schedule your next appointment?', 'rev_1_10', 0, -12, 1, 7, 1),
(63, 'The food was presented beautifully', 'yes_no', 0, -13, 1, 6, 1),
(64, 'The music was not too loud and well chosen ', 'yes_no', 0, -14, 1, 6, 1),
(65, 'The lighting is adjusted to the appropriate levels', 'yes_no', 0, -15, 1, 6, 1),
(66, 'The cleanliness is impeccable', 'yes_no', 0, -16, 1, 6, 1),
(67, 'The server and other staff were friendly, attentive, and knowledgeable', 'yes_no', 0, -17, 1, 6, 1),
(68, 'The wait time was reasonable', 'yes_no', 0, -18, 1, 6, 1),
(69, 'The food was a good value for the price ', 'yes_no', 0, -19, 1, 6, 1),
(70, 'The food was fresh, prepared well, and arrived hot ', 'yes_no', 0, -20, 1, 6, 1),
(71, 'w question add form', 'rev_1_10', 0, -21, 15, 0, 1),
(72, 'Review question add form', 'rev_1_10', 0, -22, 15, 0, 1),
(73, 'Ultricies nihil quisque molestiae', 'rev_1_10', 0, -23, 14, 0, 1),
(74, 'Dignissimos semper molestiae ad fugit per', 'yes_no', 0, -24, 14, 0, 1),
(75, 'Ratione malesuada vel pariatur', 'rev_1_10', 0, -25, 16, 0, 1),
(76, 'Maxime mollis dolorum aspernatur', 'rev_1_10', 0, -26, 18, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` int(11) NOT NULL,
  `title` tinytext NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `title`, `status`) VALUES
(1, 'Contractor Questionnaire', 1),
(2, 'Medical Questionnaire', 1),
(3, 'Hotel Questionnaire', 1),
(6, 'Restaurant Questionnaire', 1),
(7, 'Salon-Spa Questionnaire', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `option_title` varchar(222) NOT NULL,
  `option_slug` varchar(222) NOT NULL,
  `option_value` text NOT NULL,
  `input_type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `option_title`, `option_slug`, `option_value`, `input_type`) VALUES
(1, 'Application Title', 'application-title', 'Exceleratings', 'text'),
(2, 'SMS Services active', 'sms-services', 'no', 'allow_disallow');

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
(1, 'Bronze', 'bronze', 'Bronze sub title', 'Package description', 1, 'year', 0, 0),
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
  `service_category` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `usertype`, `subs_package_slug`, `service_category`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@email.com', '202cb962ac59075b964b07152d234b70', 'superadmin', '', 0, NULL, NULL),
(2, 'gnuser5', 'thomas5@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'silver', 1, NULL, NULL),
(3, 'dental', 'dentaloffice@email.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'silver', 0, NULL, NULL),
(4, 'gnuser4', 'gnuser4@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'silver', 0, NULL, NULL),
(5, 'gnuser11', 'thomas12@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'bronze', 0, NULL, NULL),
(6, 'gnuser52', 'thomas.woodfin162@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'bronze', 0, NULL, NULL),
(7, 'gnuser12', 'gnuser12@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'silver', 3, NULL, NULL),
(8, 'gnuser13', 'thomas13@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'gold', 1, NULL, NULL),
(9, 'thomas14', 'thomas14@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'free', 2, NULL, NULL),
(10, 'thom1', 'thom1@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'silver', 3, NULL, NULL),
(11, 'tom1', 'tom1@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'free', 3, NULL, NULL),
(12, 'tom2', 'tom2@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'free', 1, NULL, NULL),
(13, 'tom3', 'tom3@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'free', 2, NULL, NULL),
(14, 'tom4', 'tom4@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'gold', 6, NULL, NULL),
(15, 'tom6', 'tom6@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'silver', 6, NULL, NULL),
(16, 'tom5', 'tom5@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'silver', 2, NULL, NULL),
(17, 'tom7', 'tom7@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'free', 3, NULL, NULL),
(18, 'tom8', 'tom8@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'bronze', 7, NULL, NULL);

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
(2, 'Afdsfds  reyt d', 'dfsdf', '', '', '', '', 0, 0, '', '', 'Voluptate cursus venenatis dis, cillum venenatis do officia. Ex corrupti, nonummy laboris sociis occaecat cupiditate bibendum, ligula.', 'download1.png', '', 'dsfsdfwrfs', '', '', 'dsf ds', 'fds'),
(4, 'AQ Eidt d', '', '34656544', '', '', '', 0, 0, '', '', 'aboutoihihfg f', 'comfortable-environment_icon-min1.png', 'd', 'd', 'd', 'dsfds', 'wqweq', 'City'),
(5, 'dsfdsfds', '', '', '', '', '', 0, 0, '', '', 'dfsd fdsf', 'comfortable-environment_icon-min1.png', '', '', '', '', '', ''),
(1, 'Super Admin', '', '', '', '', '', 0, 0, '', '', 'Voluptate cursus venenatis dis, cillum venenatis do officia. Ex corrupti, nonummy laboris sociis occaecat cupiditate bibendum, ligula.', 'comfortable-environment_icon-min1.png', '', '', '', '', '', ''),
(7, 'dsfdsfds', '', '', '', '', '', 0, 0, '', '', 'sdfds', 'cer_1526069808212.jpg', '#', '', '#', '#', '', ''),
(9, 'dsfdsfds', '', '', '', '', '', 0, 0, '', '', 'About', 'Mercedes-e-class.png', '', '', '', '', '', ''),
(37, 'dsfdsfds', '', '', '', '', '', 0, 0, '', '', 'ds fds', 'mastercard31.png', '', '', '', '', '', ''),
(6, 'sss', '', '', '', '', '', 0, 0, '', '', 'sssss d  d', 'loc-pin1.png', '', '', '', '', '', ''),
(35, 'Full Name', '', '', '', '', '', 0, 0, '', '', 'About test .......', 'admin2.png', '', '', '', '', '', ''),
(33, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', ''),
(30, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', ''),
(32, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', ''),
(3, 'Full ', 'Contact Name', '', '', '', '', 0, 0, '', '', '', 'avatar12.png', '', '', '', '', '', ''),
(8, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', ''),
(10, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', ''),
(15, '', '', '', '', '', '', 0, 0, '', '', '', '', 'fsdfds', 'd', '', '', '', ''),
(14, '', '', '', '', '', '', 0, 0, '', '', '', '', 'eee', '', 'fdsf', '', '', ''),
(16, '', '', '', '', '', '', 0, 0, '', '', '', '', '', 'dsfsdfwrfs', 'fdsf', 'dsfds', '', ''),
(18, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '#', '#', '##', '#', '');

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
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `q_pages`
--
ALTER TABLE `q_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `rev_questions`
--
ALTER TABLE `rev_questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
