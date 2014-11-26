-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2014 at 02:07 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lost_and_found`
--
CREATE DATABASE IF NOT EXISTS `lost_and_found` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lost_and_found`;

-- --------------------------------------------------------

--
-- Table structure for table `atm`
--

CREATE TABLE IF NOT EXISTS `atm` (
  `tkt_id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(25) NOT NULL,
  `date` varchar(10) NOT NULL,
  `bank_name` varchar(25) NOT NULL,
  `card_no` varchar(20) NOT NULL,
  `card_type` varchar(20) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `tkt_bit` int(1) NOT NULL,
  `match_bit` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tkt_id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `atm`
--

INSERT INTO `atm` (`tkt_id`, `user_id`, `date`, `bank_name`, `card_no`, `card_type`, `name`, `tkt_bit`, `match_bit`) VALUES
(2, 'omkar', '2014-04-22', 'sbi', '11111111111', 'debit', '', 0, 1),
(3, 'sonika11', '2014-04-23', 'sbi', '11111111111', 'debit', '', 1, 1),
(4, 'arv22', '2014-04-22', 'sbi', '90807060504030', 'debit', 'Arvind', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `calculator`
--

CREATE TABLE IF NOT EXISTS `calculator` (
  `tkt_id` int(3) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(25) NOT NULL,
  `date` varchar(10) NOT NULL,
  `brand_name` varchar(25) NOT NULL,
  `c_type` varchar(40) NOT NULL,
  `model_no` varchar(25) NOT NULL,
  `display` int(20) NOT NULL,
  `tkt_bit` int(1) NOT NULL,
  `match_bit` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tkt_id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `calculator`
--

INSERT INTO `calculator` (`tkt_id`, `user_id`, `date`, `brand_name`, `c_type`, `model_no`, `display`, `tkt_bit`, `match_bit`) VALUES
(14, 'sonika11', '2014-04-16', 'Casio', 'scientific', 'FX991ES', 12, 1, 0),
(16, 'shashank12', '2014-04-02', 'Casio', 'scientific', 'FX 85', 12, 0, 0),
(17, 'arv22', '2014-04-23', 'Casio', 'scientific', '123', 10, 0, 1),
(18, 'omkar', '2014-04-23', 'Casio', 'scientific', '123', 10, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jewellery`
--

CREATE TABLE IF NOT EXISTS `jewellery` (
  `tkt_id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `date` varchar(10) NOT NULL,
  `gtype` varchar(20) NOT NULL,
  `dtype` varchar(20) NOT NULL,
  `ticket_bit` int(11) NOT NULL,
  `match_bit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tkt_id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `jewellery`
--

INSERT INTO `jewellery` (`tkt_id`, `user_id`, `date`, `gtype`, `dtype`, `ticket_bit`, `match_bit`) VALUES
(39, 'jindal22', '2014-04-02', 'Earring', 'Silver', 0, 0),
(47, 'sourav', '2014-04-23', 'Ring', 'Diamond', 1, 0),
(50, 'omkar', '2014-04-23', 'Chain', 'Gold', 1, 1),
(51, 'arv22', '2014-04-23', 'Chain', 'Gold', 0, 1),
(52, 'arv22', '2014-04-23', 'Earring', 'Gold', 0, 1),
(53, 'sonika11', '2014-04-23', 'Earring', 'Gold', 1, 1),
(54, 'sonika11', '2014-04-23', 'Bracelet', 'Silver', 1, 1),
(55, 'arv22', '2014-04-23', 'Bracelet', 'Silver', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mobile`
--

CREATE TABLE IF NOT EXISTS `mobile` (
  `tkt_id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(25) NOT NULL,
  `date` varchar(10) NOT NULL,
  `mb_name` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `os` varchar(25) NOT NULL,
  `color` varchar(25) NOT NULL,
  `sim_type` varchar(20) NOT NULL,
  `imei` varchar(18) NOT NULL,
  `tkt_bit` int(1) NOT NULL,
  `match_bit` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tkt_id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `mobile`
--

INSERT INTO `mobile` (`tkt_id`, `user_id`, `date`, `mb_name`, `type`, `os`, `color`, `sim_type`, `imei`, `tkt_bit`, `match_bit`) VALUES
(34, 'omkar', '2014-04-22', 'samsung', 'touch', 'android', '#ffffff', 'double', '1234/5678/90/11', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(255) NOT NULL DEFAULT '',
  `id` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `id`, `email`, `phone`, `pswd`) VALUES
('Arvind Singh', 'arv22', 'arvind4friends@gmail.com', 8943035330, '12345'),
('Meenakshi', 'jindal22', 'm.jindal22@gmail.com', 8714114628, 'test'),
('A. Omkar', 'omkar', 'omkar.allaparthi@gmail.com', 9037384348, 'test'),
('Shashank Mishra', 'shashank12', 'shashank1790@gmail.com', 7736555980, '11111'),
('Gagandeep Kaur', 'sonika11', 'gagandeepkaur025@gmail.com', 7736794218, 'test'),
('Sourav', 'sourav', 'sourav.fb.90@gmail.com', 8089272154, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `watch`
--

CREATE TABLE IF NOT EXISTS `watch` (
  `tkt_id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(25) NOT NULL,
  `date` varchar(10) NOT NULL,
  `bname` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `strap_type` varchar(25) NOT NULL,
  `dialshape` varchar(25) NOT NULL,
  `color` varchar(25) NOT NULL,
  `tkt_bit` int(1) NOT NULL,
  `match_bit` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tkt_id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `watch`
--

INSERT INTO `watch` (`tkt_id`, `user_id`, `date`, `bname`, `type`, `strap_type`, `dialshape`, `color`, `tkt_bit`, `match_bit`) VALUES
(18, 'omkar', '2014-04-15', 'titan', 'analog', 'leather', 'round', '#400000', 1, 0),
(19, 'arv22', '2014-04-23', 'fastrack', 'analog', 'leather', 'oval', '#ff0000', 1, 0),
(20, 'shashank12', '2014-04-23', 'casio', 'analog', 'chain', 'oval', '#c0c0c0', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
