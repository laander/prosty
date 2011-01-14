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

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `milestones`
--

CREATE TABLE IF NOT EXISTS `milestones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `deadline` datetime NOT NULL,
  `status` int(2) NOT NULL,
  `project_id` int(11) NOT NULL,  
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Data dump for tabellen `milestones`
--

INSERT INTO `milestones` (`id`, `title`, `description`, `deadline`, `status`, `project_id`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(1, 'Default Milestone 1', 'A default milestone for testing purposes', '0000-00-00 00:00:00', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `github` varchar(255) NOT NULL,
  `siteurl` varchar(255) NOT NULL,  
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Data dump for tabellen `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `github`, `siteurl`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(1, 'Default', 'A default test project', 'http://google.com', 'http://google.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);

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
(1, 'Angel', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(2, 'Agent', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(3, 'Client', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(2) NOT NULL,
  `estimate` int(2) NOT NULL,
  `priority` int(2) NOT NULL,
  `milestone_id` int(11) NOT NULL,
  `assigned_id` int(11) NOT NULL,  
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Data dump for tabellen `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `status`, `estimate`, `priority`, `milestone_id`, `assigned_id`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(1, 'Default Task', 'A default task for testing', 0, 2, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);

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
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,  
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`, `role_id`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(1, 'admin', 'f8e390d44fb4c3cc6a1ddc4c1d5d661f22ee9ba1', '', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);

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
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,  
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Data dump for tabellen `user_projects`
--

INSERT INTO `user_projects` (`id`, `user_id`, `project_id`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `wikis`
--

CREATE TABLE IF NOT EXISTS `wikis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `frontpage` int(2) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Data dump for tabellen `wikis`
--

INSERT INTO `wikis` (`id`, `title`, `body`, `frontpage`, `parent_id`, `project_id`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(1, 'Default Wiki', 'A wiki solely for testing', 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);
