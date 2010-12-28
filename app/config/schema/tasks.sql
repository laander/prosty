-- phpMyAdmin SQL Dump
-- version 3.3.7deb2build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Vært: localhost
-- Genereringstid: 28. 12 2010 kl. 05:00:26
-- Serverversion: 5.1.49
-- PHP-version: 5.3.3-1ubuntu9.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prosty`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `milestone_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(2) NOT NULL,
  `estimate` int(2) NOT NULL,
  `priority` int(2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `assigned_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Data dump for tabellen `tasks`
--

INSERT INTO `tasks` (`id`, `milestone_id`, `title`, `description`, `status`, `estimate`, `priority`, `created`, `modified`, `created_by`, `modified_by`, `assigned_id`) VALUES
(1, 1, 'Menuen i toppen', 'Menuen skal IGEN flyttes. Denne gang op!', 1, 2, 7, '2010-12-14 03:20:35', '2010-12-21 20:23:09', 0, 0, 0),
(2, 1, 'PÃ¦nere logoer', 'Logoerne mangler jo fuldstÃ¦ndig anti-aliasing! Hvd sker dder??!?', 0, 1, 10, '2010-12-14 03:21:45', '2010-12-23 23:08:52', 0, 0, 0),
(3, 2, 'VI skal have fucking ''pagne!!', '... ikke det billige sprÃ¸jt fra Netto!', 0, 9, 10, '2010-12-14 03:26:32', '2010-12-14 03:26:32', 0, 0, 0),
(4, 2, 'Invitere galla gÃ¦ster!', 'Vi mÃ¥ fucking ikke glemme RenÃ© Diff, ligesom sidst. Han bliver smadder ked af det.', 1, 1, 1, '2010-12-14 03:27:36', '2010-12-14 03:27:36', 0, 0, 0),
(5, 3, 'Skift skrifttype', 'Skridttypen er for ncie! den skal Ã¦ndrs til noget grimt!', 0, 5, 9, '2010-12-20 06:39:26', '2010-12-20 06:39:26', 0, 0, 0),
(6, 1, 'En ny en', 'asdsadsa', 0, 4, 1, '2010-12-21 03:06:32', '2010-12-21 03:06:32', 0, 0, 0),
(7, 4, 'test task', 'asd', 0, 6, 4, '2010-12-26 06:26:14', '2010-12-26 06:26:14', 0, 0, 0),
(8, 4, 'task til nyere milepÃ¦l', 'asdas', 0, 4, 4, '2010-12-27 00:59:26', '2010-12-27 00:59:26', 3, 3, 0),
(9, 4, 'task til nyere milepÃ¦l', 'asdas', 0, 4, 4, '2010-12-27 00:59:55', '2010-12-27 00:59:55', 3, 3, 0),
(10, 4, 'task til nyere milepÃ¦l', 'asdas', 0, 4, 4, '2010-12-27 00:59:58', '2010-12-27 00:59:58', 3, 3, 0),
(11, 4, 'task til nyere milepÃ¦l', 'asdas', 0, 4, 4, '2010-12-27 01:00:09', '2010-12-27 01:00:09', 3, 3, 0),
(12, 4, 'task til nyere milepÃ¦l', 'asdas', 0, 4, 4, '2010-12-27 01:00:37', '2010-12-27 01:00:37', 3, 3, 0),
(13, 4, 'task til nyere milepÃ¦l', 'asdas', 0, 4, 4, '2010-12-27 01:00:43', '2010-12-27 01:00:43', 3, 3, 0),
(14, 1, 'task til 24 milepÃ¦l!', 'asddas', 0, 4, 4, '2010-12-27 01:01:02', '2010-12-27 01:01:02', 3, 3, 0),
(15, 15, 'zxczc', 'xzcx', 1, 4, 4, '2010-12-27 03:21:36', '2010-12-28 03:17:13', 3, 1, 1),
(16, 16, 'sads', 'aads', 1, 0, 0, '2010-12-27 14:32:10', '2010-12-27 18:45:16', 4, 1, 0),
(17, 15, 'HEY man!', 'sadasasdsa', 1, 5, 5, '2010-12-27 22:11:41', '2010-12-28 03:15:42', 1, 1, 1),
(18, 15, 'asdsa', 'adsd', 0, 4, 4, '2010-12-27 22:12:23', '2010-12-28 03:47:05', 1, 1, 1),
(19, 15, 'asd', 'sda', 1, 4, 4, '2010-12-27 22:16:06', '2010-12-27 22:45:50', 1, 1, 0),
(20, 15, 'asd', 'sad', 0, 4, 3, '2010-12-27 22:20:20', '2010-12-28 03:47:16', 1, 1, 1),
(21, 15, 'PENIS!!', 'MUAHAHA', 1, 3, 3, '2010-12-27 22:20:37', '2010-12-27 22:45:56', 1, 1, 0),
(22, 15, 'LASSE BOIS', 'asdsa', 0, 34, 3, '2010-12-27 22:20:52', '2010-12-28 04:14:38', 1, 3, 3),
(23, 15, 'dsf', 'sfdsf', 1, 4, 4, '2010-12-27 22:35:28', '2010-12-28 00:22:14', 1, 1, 0),
(24, 15, 'sadsda', 'asdasd', 1, 4, 4, '2010-12-27 22:37:32', '2010-12-27 22:45:57', 1, 1, 0),
(25, 15, 'Het jeg tester!', 'asdsd', 1, 3, 3, '2010-12-27 22:38:04', '2010-12-28 00:22:09', 1, 1, 0),
(26, 15, 'task til 15', 'asd', 1, 4, 4, '2010-12-27 22:56:11', '2010-12-28 00:22:09', 1, 1, 0),
(27, 4, 'task til 4', 'asdsad', 0, 3, 5, '2010-12-27 22:56:28', '2010-12-27 22:56:28', 1, 1, 0),
(28, 1, 'sads', 'saddsa', 0, 3, 4, '2010-12-27 22:56:43', '2010-12-27 22:56:43', 1, 1, 0),
(29, 15, 'sadsa', 'asd', 1, 4, 5, '2010-12-27 22:57:09', '2010-12-28 00:22:10', 1, 1, 0),
(30, 15, 'dsda', 'assads', 1, 3, 3, '2010-12-28 00:19:41', '2010-12-28 00:22:13', 1, 1, 0),
(31, 15, 'Ny trst simon evil se klovn', 'sasdas', 0, 5, 1, '2010-12-28 00:20:03', '2010-12-28 03:16:39', 1, 1, 1);
