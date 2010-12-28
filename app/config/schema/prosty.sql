-- phpMyAdmin SQL Dump
-- version 3.3.7deb2build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Vært: localhost
-- Genereringstid: 28. 12 2010 kl. 05:07:27
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
-- Struktur-dump for tabellen `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `comment` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creator_id` (`created_by`),
  KEY `modifier_id` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Data dump for tabellen `comments`
--

INSERT INTO `comments` (`id`, `model`, `foreign_key`, `comment`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'Task', 15, 'test', '2010-12-27 03:32:58', 3, '2010-12-27 03:32:58', 3),
(2, 'Task', 15, 'adasd', '2010-12-27 03:33:02', 3, '2010-12-27 03:33:02', 3),
(3, 'Task', 15, 'a adssa', '2010-12-27 03:33:05', 3, '2010-12-27 03:33:05', 3),
(4, 'Task', 15, 'HallÃ¸jsov Thorkild!', '2010-12-27 03:33:11', 3, '2010-12-27 03:33:11', 3),
(5, 'Task', 15, 'asd ad', '2010-12-27 03:34:54', 3, '2010-12-27 03:34:54', 3),
(6, 'Task', 15, ' adsas ', '2010-12-27 03:34:56', 3, '2010-12-27 03:34:56', 3),
(7, 'Task', 15, 'jh\n', '2010-12-27 13:45:56', 3, '2010-12-27 13:45:56', 3),
(8, 'Wiki', 2, 'test!', '2010-12-27 13:50:56', 3, '2010-12-27 13:50:56', 3),
(9, 'Wiki', 7, 'sasad', '2010-12-27 13:51:11', 3, '2010-12-27 13:51:11', 3),
(10, 'Task', 16, 'asd', '2010-12-27 14:32:16', 4, '2010-12-27 14:32:16', 4),
(11, 'Task', 16, 'sdas', '2010-12-27 14:32:18', 4, '2010-12-27 14:32:18', 4),
(12, 'Task', 16, 'dsd', '2010-12-27 14:33:03', 1, '2010-12-27 14:33:03', 1),
(13, 'Wiki', 24, 'sada\n', '2010-12-27 17:48:04', 1, '2010-12-27 17:48:04', 1),
(14, 'Wiki', 24, 'zsaads', '2010-12-27 17:48:07', 1, '2010-12-27 17:48:07', 1),
(15, 'Wiki', 24, '<ssadasd\n\nads\nads', '2010-12-27 17:48:11', 1, '2010-12-27 17:48:11', 1),
(16, 'Task', 16, 'dsdsad', '2010-12-27 17:48:32', 1, '2010-12-27 17:48:32', 1),
(17, 'Task', 25, 'fd\nfdf\nsd', '2010-12-28 00:21:51', 1, '2010-12-28 00:21:51', 1),
(18, 'Task', 23, 'Jeg gÃ¸r''ed!', '2010-12-28 00:22:22', 1, '2010-12-28 00:22:22', 1);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `dashboard_fields`
--

CREATE TABLE IF NOT EXISTS `dashboard_fields` (
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `dashboard_fields`
--


-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `milestones`
--

CREATE TABLE IF NOT EXISTS `milestones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `deadline` datetime NOT NULL,
  `status` int(2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Data dump for tabellen `milestones`
--

INSERT INTO `milestones` (`id`, `project_id`, `title`, `description`, `deadline`, `status`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(1, 24, 'milepÃ¦l for 24', 'sasda aasddas Hep hey!', '2011-12-26 19:27:00', 0, '2010-12-26 19:27:44', '2010-12-26 23:11:37', 3, 3),
(4, 24, 'Nyere milepÃ¦l 201', 'Hvordan ved den dette? hallÃ¸jsa!', '2010-12-29 19:28:00', 0, '2010-12-26 22:58:28', '2010-12-27 03:20:30', 3, 3),
(15, 24, 'asad', 'asdas', '2010-12-27 03:21:00', 0, '2010-12-27 03:21:22', '2010-12-27 03:21:22', 3, 3),
(16, 2, 'asas', 'adsd', '2010-12-27 14:32:00', 0, '2010-12-27 14:32:03', '2010-12-27 14:32:03', 4, 4),
(9, 0, 'Nyere milepÃ¦l 201', 'Hvordan ved den dette?', '2010-12-29 19:28:00', 0, '2010-12-26 23:05:01', '2010-12-26 23:05:01', 3, 3);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `github` varchar(255) NOT NULL,
  `siteurl` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Data dump for tabellen `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `created`, `modified`, `created_by`, `modified_by`, `github`, `siteurl`) VALUES
(1, 'A Question Of', 'Fantastisk modeprojekt!', '2010-12-13 21:54:18', '2010-12-13 22:43:17', 0, 0, '', ''),
(2, 'URU Diamonds', 'Diamanter i massevis fra Tanzania!', '2010-12-13 21:55:06', '2010-12-13 21:55:06', 0, 0, '', ''),
(26, 'sadd', ' addasd', '2010-12-25 04:08:06', '2010-12-25 04:08:06', 0, 0, '', ''),
(24, 'RoseMunde', 'sadasdad ads', '2010-12-25 04:02:52', '2010-12-25 04:02:52', 0, 0, '', ''),
(25, 'Pikkemand!', 'sadaads', '2010-12-25 04:04:01', '2010-12-25 04:04:01', 0, 0, '', ''),
(27, 'sda', 'asdad', '2010-12-26 16:11:02', '2010-12-26 16:11:02', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `roles`
--

INSERT INTO `roles` (`id`, `title`, `modified`, `created`, `created_by`, `modified_by`) VALUES
(1, 'Angel', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2, 'Developer', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(3, 'Client', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

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

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(16) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`, `role_id`, `created`, `modified`) VALUES
(1, 'Lasse', 'f8e390d44fb4c3cc6a1ddc4c1d5d661f22ee9ba1', '', 0, 1, '2010-12-13 21:51:28', '2010-12-25 05:00:46'),
(2, 'SÃ¸ren', '80bd64a0a7fb58d6b94ef63f9f08c091752aea0e', '', 0, 1, '2010-12-13 21:51:38', '2010-12-25 05:00:52'),
(3, 'Tomas', 'f8e390d44fb4c3cc6a1ddc4c1d5d661f22ee9ba1', '', 0, 2, '2010-12-13 21:52:18', '2010-12-25 05:01:05'),
(4, 'Bo', '80bd64a0a7fb58d6b94ef63f9f08c091752aea0e', '', 0, 3, '2010-12-14 03:04:16', '2010-12-26 00:56:10');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `user_projects`
--

CREATE TABLE IF NOT EXISTS `user_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Data dump for tabellen `user_projects`
--

INSERT INTO `user_projects` (`id`, `user_id`, `project_id`, `created`, `modified`) VALUES
(14, 3, 25, '2010-12-25 04:04:01', '2010-12-25 04:04:01'),
(13, 2, 25, '2010-12-25 04:04:01', '2010-12-25 04:04:01'),
(12, 1, 25, '2010-12-25 04:04:01', '2010-12-25 04:04:01'),
(16, 4, 2, '2010-12-26 00:56:43', '2010-12-26 00:56:43'),
(10, 3, 24, '2010-12-25 04:02:52', '2010-12-25 04:02:52'),
(15, 3, 26, '2010-12-25 04:08:06', '2010-12-25 04:08:06'),
(17, 4, 27, '2010-12-26 16:11:02', '2010-12-26 16:11:02');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `wikis`
--

CREATE TABLE IF NOT EXISTS `wikis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  `frontpage` int(2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Data dump for tabellen `wikis`
--

INSERT INTO `wikis` (`id`, `title`, `body`, `parent_id`, `frontpage`, `created`, `modified`, `created_by`, `modified_by`, `project_id`) VALUES
(1, 'Mufasa', 'Jeg er en lÃ¸vernes konge!', 1, 0, '2010-12-23 23:57:52', '2010-12-24 04:31:58', 0, 0, 0),
(2, 'Louv', '<p><strong>louv klan</strong></p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li><strong>zcdsa</strong></li>\r\n<li><strong>a</strong><em>s</em></li>\r\n<li><em>sad</em></li>\r\n<li><em>sda</em></li>\r\n<li><em>d</em></li>\r\n</ul>', 0, 0, '2010-12-24 00:01:21', '2010-12-27 04:28:04', 0, 3, 0),
(3, 'sd', 'sdf sdsfd', 1, 0, '2010-12-24 04:31:26', '2010-12-24 04:31:26', 0, 0, 0),
(4, 'asdds', 'asd adssad', 4, 0, '2010-12-24 04:32:12', '2010-12-24 04:34:01', 0, 0, 0),
(5, 'Jansen', 'adsa', 0, 0, '2010-12-24 05:26:57', '2010-12-24 05:58:04', 0, 0, 0),
(6, 'Martin', '<p><strong>Tester</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Jeg er fucking sej</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><em>MUAHAHA!!!!</em></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>L&Aring;L&Aring;L</p>', 2, 0, '2010-12-24 05:58:17', '2010-12-27 03:52:11', 0, 3, 0),
(7, 'Inge', '<p><strong>asd</strong></p>', 2, 0, '2010-12-24 05:58:32', '2010-12-24 05:58:32', 0, 0, 0),
(9, 'Lise', '<p>Dette er Lises site!</p>', 2, 0, '2010-12-27 04:15:11', '2010-12-27 04:20:10', 3, 3, 0),
(10, 'Tobias', '<p>asdsad</p>', 9, 0, '2010-12-27 04:15:24', '2010-12-27 04:15:24', 3, 3, 0),
(11, 'Andreas', '', 9, 0, '2010-12-27 04:15:35', '2010-12-27 04:15:35', 3, 3, 0),
(22, 'Dronning Ingrid', '<p><strong>Noget om dronning''</strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li><strong>z&lt;xxz</strong></li>\r\n<li><strong>ds</strong></li>\r\n<li><strong>as</strong></li>\r\n<li><strong>dsa</strong></li>\r\n<li><strong>ads</strong></li>\r\n<li><span style="text-decoration: underline;"><strong>das</strong></span></li>\r\n</ul>', 0, 0, '2010-12-27 17:46:26', '2010-12-27 17:46:26', 1, 1, 0),
(16, 'Frederik', '<p>asds</p>', 21, 0, '2010-12-27 04:20:40', '2010-12-27 04:22:05', 3, 3, 0),
(17, 'Joachim', '', 21, 0, '2010-12-27 04:20:49', '2010-12-27 04:21:55', 3, 3, 0),
(18, 'Christian', '', 16, 0, '2010-12-27 04:21:08', '2010-12-27 04:21:08', 3, 3, 0),
(19, 'Nikolai', '', 16, 0, '2010-12-27 04:21:18', '2010-12-27 04:21:18', 3, 3, 0),
(20, 'Felix', '', 17, 0, '2010-12-27 04:21:29', '2010-12-27 04:21:29', 3, 3, 0),
(21, 'Margrete', '<p>asdas asdasd</p>', 15, 0, '2010-12-27 04:21:46', '2010-12-27 04:21:46', 3, 3, 0),
(23, 'Margrete', '<p>dfasasd</p>\r\n<p>ds</p>\r\n<p>sdaads</p>', 22, 0, '2010-12-27 17:46:48', '2010-12-27 17:46:48', 1, 1, 0),
(24, 'Frederik', '', 22, 0, '2010-12-27 17:46:56', '2010-12-27 17:47:44', 1, 1, 0),
(25, 'Joachim', '<p>asdsa</p>', 23, 0, '2010-12-27 17:47:05', '2010-12-27 17:47:05', 1, 1, 0),
(26, 'Joachim', '<p>asdsa</p>', 23, 0, '2010-12-27 17:47:05', '2010-12-27 17:47:05', 1, 1, 0);
