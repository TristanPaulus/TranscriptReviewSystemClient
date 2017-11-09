-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2017 at 01:26 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transcriptreviewsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `audio_clip`
--

CREATE TABLE `audio_clip` (
  `audio_id` varchar(255) NOT NULL,
  `clip_name` varchar(255) DEFAULT NULL,
  `duration` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audio_clip`
--

INSERT INTO `audio_clip` (`audio_id`, `clip_name`, `duration`) VALUES
('100', 'State of the Nation address (1)', 2.3),
('101', 'State of the Nation address (2)', 2.3),
('102', 'State of the Nation address (3)', 3.3),
('103', 'State of the Nation address (4)', 2),
('104', 'State of the Nation address (5)', 4),
('105', 'State of the Nation address (6)', 2.3),
('106', 'Finance Report (1)', 2.3),
('107', 'Finance Report (2)', 2),
('108', 'Finance Report (3)', 4.3),
('109', 'Media address (1)', 3.3),
('110', 'Media address (2)', 2.3),
('111', 'Media address (3)', 4.3),
('112', 'Parliament address (1)', 2);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` varchar(255) NOT NULL,
  `grammar` int(11) NOT NULL,
  `language` int(11) NOT NULL,
  `loss_of_meaning` int(11) NOT NULL,
  `punctuation` int(11) NOT NULL,
  `reviewer_id` varchar(255) DEFAULT NULL,
  `total` double NOT NULL,
  `transcriber_id` varchar(255) DEFAULT NULL,
  `translation` int(11) NOT NULL,
  `transcriber` varchar(255) DEFAULT NULL,
  `audio_clip` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `grammar`, `language`, `loss_of_meaning`, `punctuation`, `reviewer_id`, `total`, `transcriber_id`, `translation`, `transcriber`, `audio_clip`) VALUES
('100', 3, 4, 1, 5, 'tpaulus', 4.2, '102', 5, 'rabrahams', 'Media address (3)'),
('101', 4, 5, 2, 3, 'tpaulus', 3.4, '104', 3, 'spaulus', 'Finance Report (2)'),
('102', 5, 3, 1, 3, 'tpaulus', 3.2, '105', 4, 'anaidoo', 'Finance Report (1)'),
('103', 4, 5, 5, 2, 'tpaulus', 3.8, '107', 3, 'ihendricks', 'State of the Nation address (5)'),
('104', 3, 3, 3, 3, 'tpaulus', 3, '108', 3, 'jfranco', 'State of the Nation address (4)'),
('105', 4, 5, 2, 3, 'tpaulus', 3.4, '109', 3, 'bnye', 'State of the Nation address (3)'),
('106', 5, 4, 3, 3, 'tpaulus', 3.4, '110', 2, 'rabrahams', 'State of the Nation address (2)'),
('107', 1, 2, 3, 4, 'rabrahams', 3, '100', 5, 'tpaulus', 'Media address (3)'),
('108', 4, 4, 3, 4, 'rabrahams', 3.8, '101', 4, 'tpaulus', 'Media address (2)'),
('109', 5, 3, 2, 5, 'rabrahams', 4, '103', 5, 'tpaulus', 'Finance Report (3)'),
('110', 1, 2, 3, 4, 'rabrahams', 3, '106', 5, 'tpaulus', 'State of the Nation address (6)'),
('111', 3, 3, 3, 3, 'rabrahams', 3, '111', 3, 'tpaulus', 'State of the Nation address (1)'),
('112', 5, 5, 5, 5, 'rabrahams', 5, '101', 5, 'tpaulus', 'Media');

-- --------------------------------------------------------

--
-- Table structure for table `transcript`
--

CREATE TABLE `transcript` (
  `transcript_id` varchar(255) NOT NULL,
  `clip` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `transcriber_id` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transcript`
--

INSERT INTO `transcript` (`transcript_id`, `clip`, `date`, `text`, `transcriber_id`) VALUES
('100', '111', '2017-10-10 00:00:00', 'Good day fellow citizens, the purpose of this meeting is to address the concerns of the youth protesting at our universities. ', 'tpaulus'),
('101', '110', '2017-10-10 00:00:00', 'Hello all and a good day to you. This is a friendly reminder that as of today, water rationing has begun. Please put measures in place. ', 'tpaulus'),
('102', '109', '2017-10-27 00:00:00', 'Good day fellow citizens, the purpose of this meeting is to address the concerns of the youth protesting at our universities. ', 'rabrahams'),
('103', '108', '2017-10-22 00:00:00', 'The state of our finances is abysmal! What do you have to say for yourself and your frivolous spending sir? ', 'tpaulus'),
('104', '107', '2017-10-13 00:00:00', 'We have money. The taxpayers are providing us with more than we need. Why do you complain when I build huge swimmingpools?', 'spaulus'),
('105', '106', '2017-10-12 00:00:00', 'A business plan for the long term for investment in a secure financial future, be it for business or house', 'anaidoo'),
('106', '105', '2017-10-30 00:00:00', 'Honorable member... Honorable member... Honorable member... Honorable member... Order, order, order. If I may.', 'tpaulus'),
('107', '104', '2017-10-30 00:00:00', 'Confrontation of political matters at hand and how actions will be taken place to come to a resolution', 'ihendricks'),
('108', '103', '2017-10-30 00:00:00', 'Honorable member... Honorable member... Honorable member... Honorable member... Order, order, order. If I may.', 'jfranco'),
('109', '102', '2017-10-01 00:00:00', 'Presedential gibberish spoken in front of a group of angered members that have seen this happen before', 'bnye'),
('110', '101', '2017-10-20 00:00:00', 'Parliamentary gathering to discuss future of country', 'rabrahams'),
('111', '100', '2017-10-12 00:00:00', 'Discussions amongst political parties about the state of the nations economic and social state', 'tpaulus'),
('112', '112', '2017-11-09 01:04:12', 'Greetings all and welcome to the 35th annual parliamentary address', 'rabrahams'),
('113', '112', '2017-11-09 01:30:25', 'Welcome comrades. This is the 35th parliamentary address held annually', 'nbux');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `passwordkey` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `firstname`, `passwordkey`, `surname`) VALUES
('tpaulus', 'tristan.ipaulus@gmail.com', 'Tristan', 'paulus', 'Paulus'),
('spaulus', 'shana@gmail.com', 'Shana', 'paulus', 'Paulus'),
('rabrahams', 'razia@gmail.com', 'Razia', 'abrahams', 'Abrahams'),
('anaidoo', 'astin@gmail.com', 'Astin', 'naidoo', 'Naidoo'),
('ihendricks', 'imtiyaaz@gmail.com', 'Imtiyaaz', 'hendricks', 'Hendricks'),
('jfranco', 'jamesfranco@gmail.com', 'James', 'franco', 'Franco'),
('bnye', 'billnye@gmail.com', 'Bill', 'nye', 'Nye'),
('nbux', 'naeem@gmail.com', 'Naeem', 'bux', 'Bux');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audio_clip`
--
ALTER TABLE `audio_clip`
  ADD PRIMARY KEY (`audio_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `transcript`
--
ALTER TABLE `transcript`
  ADD PRIMARY KEY (`transcript_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
