-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2019 at 03:01 PM
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
(1, 'The Title 2 ddd', 'thomas12@yopmail.com', '0134656544', 2, 1),
(2, 'Contact name', 'thomas12@yopmail.com', '6399989394', 3, 1),
(3, 'Contact name', 'thomas12@yopmail.com', '34656544', 5, 1),
(4, 'Pharmacy', 'pharmacy@yopmail.com', '+1 8885018555', 8, 1),
(5, 'thomas', 'thomas14@yopmail.com', '32232323', 9, 1),
(6, 'Pharmacy', 'pharmacy@yopmail.com', '1234567890', 11, 1);

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
(1, 8, 0),
(1, 31, 1),
(1, 26, 2),
(1, 24, 3),
(1, 70, 4),
(1, 69, 5),
(1, 68, 6),
(1, 67, 7),
(1, 66, 8),
(1, 65, 9),
(1, 64, 10),
(1, 63, 11),
(2, 81, 0),
(2, 82, 1),
(2, 80, 2),
(2, 78, 3),
(2, 79, 4),
(2, 69, 5),
(2, 65, 6),
(2, 63, 7),
(3, 70, 0),
(3, 83, 1),
(3, 85, 2),
(3, 69, 3),
(3, 84, 4),
(3, 68, 5),
(3, 67, 6),
(3, 66, 7),
(3, 65, 8),
(3, 64, 9),
(3, 63, 10),
(4, 90, 0),
(4, 89, 1),
(4, 88, 2),
(4, 7, 3),
(4, 5, 4),
(4, 17, 5),
(4, 32, 6),
(4, 35, 7),
(4, 36, 8),
(4, 37, 9),
(6, 92, 0),
(6, 91, 1),
(5, 101, 0),
(5, 100, 1),
(5, 98, 2),
(5, 97, 3),
(5, 104, 4);

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
(1, 26, '4', ''),
(1, 24, '8', ''),
(1, 70, '10', ''),
(1, 69, '10', ''),
(1, 68, '10', ''),
(1, 66, '0', ''),
(1, 65, '10', ''),
(1, 64, '0', ''),
(1, 63, '10', ''),
(2, 8, '8', ''),
(2, 31, '9', ''),
(2, 26, '8', ''),
(2, 24, '8', ''),
(2, 70, '10', ''),
(2, 69, '10', ''),
(2, 68, '0', ''),
(2, 67, '0', ''),
(2, 66, '10', ''),
(2, 65, '10', ''),
(2, 64, '0', ''),
(2, 63, '10', ''),
(3, 78, '4', ''),
(3, 70, '0', ''),
(3, 68, '10', ''),
(3, 67, '10', ''),
(3, 66, '10', ''),
(3, 65, '0', ''),
(4, 78, '8', ''),
(4, 69, '10', ''),
(4, 68, '10', ''),
(4, 66, '10', ''),
(4, 63, '0', ''),
(5, 78, '4', ''),
(5, 70, '10', ''),
(5, 69, '10', ''),
(5, 68, '10', ''),
(5, 67, '10', ''),
(5, 66, '10', ''),
(5, 65, '10', ''),
(5, 64, '0', ''),
(5, 63, '0', ''),
(6, 7, '8', ''),
(6, 5, '9', ''),
(6, 17, '8', ''),
(6, 32, '7', ''),
(6, 33, '6', ''),
(6, 34, '8', ''),
(6, 35, '6', ''),
(6, 36, '10', ''),
(6, 37, '8', ''),
(7, 7, '5', ''),
(7, 5, '4', ''),
(7, 17, '3', ''),
(7, 32, '4', ''),
(7, 33, '6', ''),
(7, 34, '4', ''),
(7, 35, '3', ''),
(7, 36, '0', ''),
(7, 37, '4', ''),
(8, 92, '10', ''),
(8, 91, '6', ''),
(8, 94, '9', ''),
(8, 93, '10', ''),
(9, 92, '0', ''),
(9, 91, '6', ''),
(9, 94, '5', ''),
(9, 93, '10', ''),
(10, 92, '10', ''),
(10, 91, '9', ''),
(11, 94, '3', ''),
(11, 93, '10', ''),
(12, 81, '9', ''),
(12, 82, '8', ''),
(12, 80, '8', ''),
(12, 78, '6', ''),
(12, 79, '5', ''),
(12, 69, '10', ''),
(12, 65, '10', ''),
(12, 63, '10', ''),
(13, 81, '8', ''),
(13, 82, '8', ''),
(13, 80, '8', ''),
(13, 78, '6', ''),
(13, 79, '5', ''),
(13, 69, '10', ''),
(13, 65, '10', ''),
(13, 63, '10', ''),
(14, 81, '8', ''),
(14, 82, '9', ''),
(14, 80, '8', ''),
(14, 78, '8', ''),
(14, 79, '8', ''),
(14, 69, '10', ''),
(14, 65, '10', ''),
(14, 63, '10', ''),
(15, 81, '7', ''),
(15, 82, '7', ''),
(15, 80, '8', ''),
(15, 78, '8', ''),
(15, 79, '8', ''),
(15, 69, '10', ''),
(15, 65, '10', ''),
(15, 63, '10', '');

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
(1, 'Page Title  test', 2, '0000-00-00 00:00:00'),
(2, 'Page Title ', 3, '0000-00-00 00:00:00'),
(3, 'Sollicitudin voluptatem sequi mattis', 4, '0000-00-00 00:00:00'),
(4, 'Question Page Title ', 5, '0000-00-00 00:00:00'),
(5, 'Survey', 8, '0000-00-00 00:00:00'),
(6, 'Was the Selection of Beverages Sufficient?', 9, '0000-00-00 00:00:00');

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
(1, 1, 9, 'exceleratings@email.com', '45436554', 'First Name', 'Last Name', 'Street', 'erewr', 'Cursus fuga, sint nulla pellentesque mattis, pharetra cubilia sollicitudin cras anim similique odio sodales ab malesuada minima.', 'Lacinia leo deserunt, labore itaque? Anim! Quisque incididunt litora dolorum mollit ullamco! Tristique quam distinctio! Sem laboris.', 1, '2019-01-18 09:33:45'),
(2, 1, 8, 'exceleratings@email.com', '25365543', 'First Name', 'Last Name', 'h', '', 'Convallis vero voluptates, sociosqu repellat luctus cum mollit orci laboris, exercitation tincidunt, quo voluptate fusce dignissim, repudiandae.', 'Ipsam voluptatibus, fusce malesuada eligendi dictumst consequat repellendus! Nemo mollis, etiam feugiat! Viverra rhoncus nihil ridiculus? Do.', 1, '2019-01-18 10:16:07'),
(3, 2, 4, 'exceleratings@email.com', '35436554', 'First Name', 'Last Name', 'Street', '', 'Eu nobis magnam anim, orci perferendis', 'Eu nobis magnam anim, orci perferendis', 0, '2019-01-18 10:41:30'),
(4, 2, 9, 'exceleratings@email.com', '24334', 'First Name', 'Last Name', 'Street', '', 'Numquam dolore fusce odit porttitor torquent metus', 'Numquam dolore fusce odit porttitor torquent metus', 1, '2019-01-18 10:43:44'),
(5, 2, 6, 'exceleratings@email.com', '2536554', 'F name', 'L name', 'Street', '', 'Gravida, quo elit imperdiet mollit semper voluptate tenetur! Eaque, tempor id accumsan consectetur tempore eu luctus mattis.', 'Gravida, quo elit imperdiet mollit semper voluptate tenetur! Eaque, tempor id accumsan consectetur tempore eu luctus mattis.', 1, '2019-01-18 12:10:53'),
(6, 4, 5, 'exceleratings@email.com', '25365543', 'First Name', 'Last Name', 'Street', '', 'Test', 'Test ...', 1, '2019-01-24 10:45:34'),
(7, 4, 3, 'exceleratings@email.com', '2536554', 'First Name', 'Last Name', 'Street', '', 'Test ', 'Test ...', 0, '2019-01-24 10:46:18'),
(8, 5, 10, 'tommy@yopmail.com', '12980387478', 'Tom', 'Wood', '123, NYC', 'NYC', 'Additional comments.', 'About your experience. ', 1, '2019-02-19 12:05:28'),
(9, 5, 7, 'tommywood@yopmail.com', '019878654237', 'Tommy', 'Wood', '123, NYC', 'NYC', '', '', 0, '2019-02-19 12:06:51'),
(10, 6, 10, 'xcvxcv@hckhfi.comdfhgdhi', '3243', 'xcvxc', 'vxcv', 'sdf', 'dsfsdf', 'yes', 'no', 1, '2019-02-24 10:29:36'),
(11, 5, 5, 'tommy@yopmail.com', 'asdf', 'a', 'asdf', 'asf', 'asdf', '', '', 0, '2019-03-05 15:20:40'),
(12, 2, 9, 'exceleratings@yopmail.com', '2536554', 'First Name', 'Last Name', 'Street', 'tyt', 'Do you have additional comments or concerns?', 'If anything about your experience here failed to meet your expectations, what could we do to improve it for you?\r\n\r\n', 1, '2019-03-06 12:42:57'),
(13, 2, 8, 'exceleratings@yopmail.com', '2536554', 'First Name', 'Last Name', 'Street', 'er', '', '', 1, '2019-03-06 12:45:31'),
(14, 2, 8, 'exceleratings@yopmail.com', '35436554', 'First Name', 'Last Name', 'Street', 'd', 'f', 'dsf', 1, '2019-03-06 12:49:41'),
(15, 2, 7, 'exceleratings@yopmail.com', '45436554', 'First Name', 'Last Name', 'Street', 'f', 'f', 'f', 1, '2019-03-06 12:51:07'),
(16, 5, 5, 'tommy@yopmail.com', 'asdf', 'a', 'asdf', 'asf', 'asdf', '', '', 0, '2019-03-08 06:25:22'),
(17, 5, 10, 'tommy@yopmail.com', 'asdf', 'a', 'asdf', 'asf', 'asdf', '', '', 1, '2019-03-08 06:29:05');

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
(1, 'How satisfied with your appointment today?', 'rev_1_10', 0, 30, 1, 2, 1),
(2, 'How satisfied are you with the final product?', 'rev_1_10', 0, 56, 1, 1, 1),
(4, 'How was the condition and cleanliness of our facility?', 'rev_1_10', 0, 35, 1, 2, 1),
(5, 'How would you rate the customer service today?', 'rev_1_10', 0, 34, 1, 3, 1),
(6, 'Did …….. Contracting stay on schedule?', 'rev_1_10', 0, 39, 1, 1, 1),
(7, 'How would you rate the cleanliness of our facility?', 'rev_1_10', 0, 29, 1, 3, 1),
(8, 'How likely is it that you will return for a visit to our practice?', 'rev_1_10', 0, 70, 2, 0, 1),
(9, 'Did  …….. Contracting stay within the agreed upon contract price?', 'rev_1_10', 0, 33, 1, 1, 1),
(14, 'Rquam et. Nonummy sollicitudin aliqua morbi sodales tempora voluptate!', 'rev_1_10', 0, 72, 2, 0, 0),
(15, 'Were you attended to in a timely manner?', 'rev_1_10', 0, 43, 1, 2, 1),
(16, 'How satisfied were you with the customer service?', 'rev_1_10', 0, 38, 1, 2, 1),
(17, 'How attentive we’re our staff to you and your party?', 'rev_1_10', 0, 37, 1, 3, 1),
(19, 'How satisfied were you with the cleanliness of the job site?', 'rev_1_10', 0, 28, 1, 1, 1),
(20, 'Review question add form', 'rev_1_10', 0, 71, 2, 0, 1),
(23, 'Aenean, molestie, amet quia. Aspernatur odit venenatis mauris consequatur laudantium quas error?', 'rev_1_10', 0, 73, 2, 0, 1),
(24, 'Imperdiet voluptatum per, mollis quibusdam! Tempor', 'rev_1_10', 0, 69, 2, 0, 1),
(25, 'Penatibus porttitor illum, enim', 'rev_1_10', 0, 61, 2, 0, 1),
(26, 'Sollicitudin dolor illum, reiciendis', 'rev_1_10', 0, 52, 2, 0, 1),
(31, 'estion add form', 'rev_1_10', 0, 32, 2, 0, 1),
(32, 'How would you rate the quality of our food?', 'rev_1_10', 0, 42, 1, 3, 1),
(33, 'How would you rate the selection on our menu?', 'rev_1_10', 0, 47, 1, 3, 1),
(34, 'Were you seated in a timely manner?', 'rev_1_10', 0, 51, 1, 3, 1),
(35, 'How would you rate our atmosphere?', 'rev_1_10', 0, 55, 1, 3, 1),
(36, 'Would you eat here or stay here again?', 'yes_no', 0, 60, 1, 3, 1),
(37, 'How would you rate our amenities on site?', 'rev_1_10', 0, 65, 1, 3, 1),
(39, 'Were you pleased with the level of professionalism with the administrative office and principles?', 'rev_1_10', 0, 41, 1, 1, 1),
(40, 'Were you satisfied with the level of professionalism with all mechanics on site?', 'rev_1_10', 0, 46, 1, 1, 1),
(41, 'Were you satisfied with the quality of workmanship?', 'rev_1_10', 0, 50, 1, 1, 1),
(42, 'Did …….the workers show up on time and leave at a reasonable hour?', 'rev_1_10', 0, 59, 1, 1, 1),
(43, 'Were the materials utilized of good quality?', 'rev_1_10', 0, 64, 1, 1, 1),
(44, 'Would you hire ….. Contracting for future remodeling projects?', 'rev_1_10', 0, 68, 1, 1, 1),
(45, 'How satisfied were you with the knowledge of our staff?', 'rev_1_10', 0, 45, 1, 2, 1),
(46, 'Would you visit our practice again?', 'yes_no', 0, 49, 1, 2, 1),
(47, 'Was it easy to make your appointment?', 'yes_no', 0, 54, 1, 2, 1),
(48, 'Did you experience any complications in your visit today?', 'yes_no', 0, 58, 1, 2, 1),
(49, 'How would you rate our website?', 'rev_1_10', 0, 63, 1, 2, 1),
(50, 'Did you feel comfortable during your visit today?', 'yes_no', 0, 67, 1, 2, 1),
(51, 'Review question add form\r\n', 'yes_no', 0, 26, 2, 0, 1),
(52, 'iew question add form', 'yes_no', 0, 25, 2, 0, 1),
(53, 'Was your front desk experience positive? ', 'yes_no', 0, 66, 1, 7, 1),
(54, 'Did your service provider start your appointment on time? ', 'yes_no', 0, 62, 1, 7, 1),
(55, 'Did you feel you received a through consultation prior to services\r\n received? ', 'yes_no', 0, 57, 1, 7, 1),
(56, 'Did your service provider understand your needs? ', 'yes_no', 0, 53, 1, 7, 1),
(57, 'Did your service provider mention any other services, or current promotions? ', 'yes_no', 0, 48, 1, 7, 1),
(58, 'Did your service provider recommend any products during your appointment? ', 'yes_no', 0, 44, 1, 7, 1),
(59, 'Did you purchase any products for home care? ', 'yes_no', 0, 40, 1, 7, 1),
(60, 'Was the facility clean and tidy?', 'yes_no', 0, 36, 1, 7, 1),
(61, 'Do you feel the services you received were worth the money? ', 'yes_no', 0, 31, 1, 7, 1),
(62, 'Would you like to schedule your next appointment?', 'yes_no', 0, 27, 1, 7, 1),
(63, 'The food was presented beautifully', 'yes_no', 0, 24, 1, 6, 1),
(64, 'The music was not too loud and well chosen ', 'yes_no', 0, 23, 1, 6, 1),
(65, 'The lighting is adjusted to the appropriate levels', 'yes_no', 0, 22, 1, 6, 1),
(66, 'The cleanliness is impeccable', 'yes_no', 0, 21, 1, 6, 1),
(67, 'The server and other staff were friendly, attentive, and knowledgeable', 'yes_no', 0, 20, 1, 6, 1),
(68, 'The wait time was reasonable', 'yes_no', 0, 19, 1, 6, 1),
(69, 'The food was a good value for the price ', 'yes_no', 0, 18, 1, 6, 1),
(70, 'The food was fresh, prepared well, and arrived hot ', 'yes_no', 0, 17, 1, 6, 1),
(78, 'Turpis felis accumsan, hymenaeos earum', 'rev_1_10', 0, 16, 3, 0, 1),
(79, 'Irure distinctio quo consectetur erat', 'rev_1_10', 0, 15, 3, 0, 1),
(80, 'Diamlorem odit consequatur nostra accumsan', 'rev_1_10', 0, 14, 3, 0, 1),
(81, 'Ipsum vivamus, sunt?', 'rev_1_10', 0, 13, 3, 0, 1),
(82, 'Do aute neque potenti rhoncus curae sint.', 'rev_1_10', 0, 12, 3, 0, 1),
(83, 'Lorem Ipsum is simply dummy text', 'rev_1_10', 0, 11, 4, 0, 1),
(84, 'It is a long established fact that a reader', 'rev_1_10', 0, 10, 4, 0, 1),
(85, 'Contrary to popular belief, Lorem Ipsum is not simply', 'rev_1_10', 0, 9, 4, 0, 1),
(86, 'There are many variations of passages of Lorem Ipsum available', 'rev_1_10', 0, 8, 4, 0, 1),
(87, 'New custom question 1', 'rev_1_10', 0, 7, 5, 0, 1),
(88, 'New custom question 2', 'rev_1_10', 0, 6, 5, 0, 1),
(89, 'New question 3', 'yes_no', 0, 5, 5, 0, 1),
(90, 'Custom question 4', 'yes_no', 1, 4, 5, 0, 1),
(95, 'Does the Restaurant Have a Sufficient Selection of Healthy Choices?', 'rev_1_10', 0, -1, 9, 0, 1),
(96, 'How Quick or Adequate Was the Speed of Service?', 'yes_no', 0, -2, 9, 0, 1),
(97, 'Do you like our service?', 'yes_no', 0, -3, 1, 9, 1),
(98, 'Rate us according to our service.', 'rev_1_10', 0, -4, 1, 9, 1),
(100, 'Will you visit our pharmacy again?', 'yes_no', 0, -5, 8, 0, 1),
(101, 'Did we have what you were looking for?', 'yes_no', 0, -6, 8, 0, 1),
(102, 'Have you got into any trouble to find our shop?', 'yes_no', 0, -7, 8, 0, 1),
(103, 'Rate us as per our service.', 'rev_1_10', 0, -8, 8, 0, 1),
(104, 'How much improvement do we need to provide better service?', 'rev_1_10', 0, -9, 8, 0, 1);

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
(7, 'Salon-Spa Questionnaire', 1),
(9, 'Pharmacy', 1);

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
(2, 'SMS Services active', 'sms-services', 'yes', 'allow_disallow');

-- --------------------------------------------------------

--
-- Table structure for table `subs_features`
--

CREATE TABLE `subs_features` (
  `id` int(11) NOT NULL,
  `sf_title` text NOT NULL,
  `pac_slug` tinytext NOT NULL,
  `order_by` int(4) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subs_features`
--

INSERT INTO `subs_features` (`id`, `sf_title`, `pac_slug`, `order_by`, `status`) VALUES
(1, 'Attach to Invoice (Contractors) or Check (restaurants) or Check Out at Dr’s Office Or Hotels', 'bronze', 0, 0),
(2, 'Text goes out immediately to their phone', 'bronze', 0, 0),
(3, 'Option to Leave Review on Google or FB only (Podium Model as Reference)', 'bronze', 0, 0),
(5, 'Tablet with 5 Basic Question –Questionnaire on it presented in Office or Business or Home', 'silver', 0, 0),
(6, 'Positive Review opens link to leave review', 'silver', 0, 0),
(7, 'Negative Review pings Manager', 'silver', 0, 0),
(8, 'Text Reminder with Positive', 'silver', 0, 0),
(9, 'Email Reminder with Positive', 'silver', 0, 0),
(11, 'Price $350 Set Up (incudes Tablet) $250.00/month per Location', 'silver', 0, 0),
(12, 'Tablet with 10 Custom Questions Question –Questionnaire on it presented in Office or Business or Home', 'gold', 0, 0),
(13, 'Positive Review opens link to leave review', 'gold', 0, 0),
(14, 'Negative Review pings Manager', 'gold', 0, 0),
(15, 'Text Reminder with Positive', 'gold', 0, 0),
(16, 'Email Reminder with Positive', 'gold', 0, 0),
(17, 'Survey Metrics for inner office management', 'gold', 0, 0),
(18, 'Social Media/Review sites Automated Updates', 'gold', 0, 0),
(20, 'Price $550 Set Up (incudes Tablet) $250.00/month per Location', 'gold', 0, 0),
(24, 'Price : $250 Set Up fee $150/Month per location', 'bronze', 0, 0);

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
  `order_by` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subs_packages`
--

INSERT INTO `subs_packages` (`spk_id`, `spk_title`, `spk_slug`, `spk_subtitle`, `spk_description`, `spk_duration`, `spk_duration_label`, `spk_price`, `order_by`, `status`) VALUES
(1, 'Bronze', 'bronze', 'Bronze sub title', 'Package description', 1, 'year', 0, 0, 0),
(2, 'Silver', 'silver', 'Silver sub title', 'Package description', 1, 'year', 20, 1, 0),
(3, 'Gold ', 'gold', 'Gold sub title', 'Package description', 1, 'year', 30, 2, 0);

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
  `subs_start_date` date NOT NULL,
  `service_category` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `usertype`, `subs_package_slug`, `subs_start_date`, `service_category`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@email.com', '202cb962ac59075b964b07152d234b70', 'superadmin', '', '0000-00-00', 0, NULL, NULL),
(2, 'tom1', 'tom1@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'silver', '2019-02-22', 6, NULL, NULL),
(3, 'tom2', 'tom2@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'bronze', '2019-02-22', 6, NULL, NULL),
(4, 'tom4', 'tom4@yopemail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'bronze', '2019-02-22', 6, NULL, NULL),
(5, 'tom13', 'tom13@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'bronze', '2019-02-22', 3, NULL, NULL),
(6, 'dsfsd', 'dsfsd@dfsdf.ghj', '698d51a19d8a121ce581499d7b701668', 'generaluser', 'free', '2019-02-22', 6, NULL, NULL),
(7, 'ABC Plumbing', 'owehoo@gmail.com', 'c172f5366337a101ed63e7b193712f22', 'generaluser', 'free', '2019-02-22', 1, NULL, NULL),
(8, 'tommy99', 'tommy99@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'bronze', '2019-02-22', 9, NULL, NULL),
(9, 'Thomas', 'thomas12@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'bronze', '2019-02-22', 9, NULL, NULL),
(10, 'thomas100', 'thomas100@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'free', '0000-00-00', 9, NULL, NULL),
(11, 'tommy98', 'tommy98@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'bronze', '0000-00-00', 9, NULL, NULL),
(12, 'tom223', 'tom223@yopmail.com', '202cb962ac59075b964b07152d234b70', 'generaluser', 'free', '0000-00-00', 7, NULL, NULL);

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
  `docpic` text NOT NULL,
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

INSERT INTO `user_profile` (`uid`, `fullname`, `fullname_contact`, `phone`, `alt_name_client_contact`, `alt_phone`, `alt_email`, `tablet_needed`, `tablet_so_how_many`, `service_location`, `start_date_of_contract`, `about`, `profilpic`, `docpic`, `pos_rdr_url_yelp`, `pos_rdr_url_google`, `pos_rdr_url_facebook`, `pos_rdr_url_trip_advisor`, `pos_rdr_url_urban_spoon`, `pos_rdr_url_city_search`) VALUES
(2, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', 'http://#', 'http://##', 'http://#', ''),
(3, '', '', '', '', '', '', 0, 0, '', '', '', 'avatar121.png', 'cer_152606980821.jpg', '', 'https://ddd', 'http://#', '', '', ''),
(1, 'Thomas Woodfin', '', '', '', '', '', 0, 0, '', '', 'About myself.', 'pp_15324165212.png', '', '', '', '', '', '', ''),
(4, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', ''),
(5, '', '', '', '', '', '', 0, 0, '', '', '', '', '', 'http://#', 'http://#', 'http://#', 'http://#', 'http://#', 'http://#'),
(8, 'Thomas Woodfin', 'Tommy', '1234567890', '', '', '', 0, 0, '3', '01/03/2019', 'About Tommy Admin.', '', '', '', '', '', '', '', ''),
(9, 'Thomas Woodfin', '', '', '', '', '', 0, 0, '', '', 'Test data', 'sasasas.jpg', '', 'http://#', 'http://#', 'http://#', 'http://#', 'http://#', 'http://#'),
(7, '', '', '', '', '', '', 0, 0, '', '', '', 'avatar122.png', '', '', '', '', '', '', ''),
(11, 'Tommy Woodfin', 'Tom', '1234567890', '', '', '', 0, 0, '1', '1-03-2019', 'About', 'men1.jpg', '', 'http://yelp.com/tom', 'http://google.com/tom', 'http://facebook.com/tom', 'http://trip.com/tom', 'http://urban.com/tom', 'http://city.com/tom'),
(12, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '');

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
-- Indexes for table `subs_features`
--
ALTER TABLE `subs_features`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `q_pages`
--
ALTER TABLE `q_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rev_questions`
--
ALTER TABLE `rev_questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subs_features`
--
ALTER TABLE `subs_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subs_packages`
--
ALTER TABLE `subs_packages`
  MODIFY `spk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
