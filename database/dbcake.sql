-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2022 at 05:10 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbcake`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Product` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(19, 'occasional Cakes'),
(20, 'Aniversary Cake'),
(21, 'Cheese Cake'),
(25, 'cake'),
(28, 'cupcake');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TransacCode` varchar(225) NOT NULL,
  `DateDelivered` varchar(225) NOT NULL,
  `Items` varchar(225) NOT NULL,
  `Msge` varchar(225) NOT NULL,
  `Rate` varchar(224) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `TransacCode`, `DateDelivered`, `Items`, `Msge`, `Rate`) VALUES
(2, 'pe4zu7twlib', '2022-04-14', '(1) Mini cupcake, ', 'Masarap ng kunti', '2.5'),
(3, 'ro93qdf14yg', '2022-04-14', '(1) Aniv Cake, ', 'Good naman ', '3.5'),
(4, 'kt1gubrj6fs', '2022-04-16', '(1) Strawberry Cake, ', 'Masarap', '3.5'),
(6, 'ynpk9udmhtj', '2022-04-16', '(1) Aniv Cake, ', 'Masarap naman', '5');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transacID` varchar(25) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `deliverDate` varchar(100) NOT NULL,
  `item` text NOT NULL,
  `mod` varchar(225) NOT NULL,
  `refno` varchar(225) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `dateOrdered` varchar(100) NOT NULL,
  `dateDelivered` varchar(100) NOT NULL,
  `imgUrl` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=271 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `transacID`, `name`, `desc`, `contact`, `address`, `email`, `deliverDate`, `item`, `mod`, `refno`, `amount`, `status`, `dateOrdered`, `dateDelivered`, `imgUrl`) VALUES
(233, '6ijysaope0z', 'Jett Duelist', 'HBD JETT', '09651797310', 'Divisoria', 'aj@gmail.com', '2022-04-23', '(1) Mini cupcake, ', 'Cash on Delivery', '', '125', 'confirmed', '04/07/22 08:00:06 PM', '04/07/22 08:25:33 PM', ''),
(235, 'jv03l4hbufm', 'maria clara', 'HBD AJ', '09651797310', 'pasonanca', 'ben@gmail.com', '2022-04-15', '(1) Mini cupcake, ', 'Gcash', '42465475675', '125', 'confirmed', '04/07/22 08:27:25 PM', '04/07/22 08:27:51 PM', ''),
(238, 'zih7ymsqo6f', 'Ben Ten', 'HBD BEN10', '09651797310', 'divisoria', 'ladjamatli5@gmail.com', '2022-04-15', '(1) Mini cupcake, ', 'Cash on Delivery', '', '125', 'confirmed', '04/07/22 08:31:56 PM', '04/07/22 08:32:06 PM', ''),
(241, 'sf5ixarz1tp', 'Ben Ladjamatli', 'HBD BEN10', '09651797310', 'divisoria', 'maria@gmail.com', '2022-04-16', '(1) Mini cupcake, ', 'Cash on Delivery', '', '125', 'confirmed', '04/07/22 09:15:00 PM', '04/08/22 12:08:31 PM', ''),
(242, 'rbe8w7c3m0i', 'maria dela Cruz', 'hbd maria', '09651797310', 'divisoria', 'ben@gmail.com', '2022-04-16', '(1) Mini cupcake, ', 'Cash on Delivery', '', '125', 'confirmed', '04/07/22 09:18:55 PM', '04/08/22 12:05:24 PM', ''),
(243, 'orvfha3t64n', 'Juan clara', 'HBD j', '09651797310', 'Divisoria', 'aj@gmail.com', '2022-04-22', '(1) Mini cupcake, ', 'Gcash', '21312314324', '125', 'confirmed', '04/07/22 09:37:31 PM', '04/08/22 12:04:08 PM', ''),
(244, 'qm8lkh5by71', 'Juan dela Cruz', 'HBD j', '09651797310', 'divisoria', 'Juan@gmail.com', '2022-04-08', '(1) Strawberry Cake, ', 'Cash on Delivery', '', '1500', 'confirmed', '04/08/22 12:10:27 PM', '04/08/22 12:11:40 PM', ''),
(245, 'ynpk9udmhtj', 'maria Duelist', 'HBD j', '09651797310', 'pasonanca', 'aj@gmail.com', '2022-04-16', '(1) Aniv Cake, ', 'Cash on Delivery', '', '2500', 'confirmed', '04/08/22 12:13:16 PM', '04/08/22 12:14:02 PM', ''),
(247, '1j2k8lefztg', 'maria Duelist', 'HBD j', '09651797310', 'pasonanca', 'Juan@gmail.com', '2022-04-09', '(1) Mini cupcake, ', 'Cash on Delivery', '', '125', 'confirmed', '04/08/22 12:18:01 PM', '04/08/22 12:21:30 PM', ''),
(250, 'kt1gubrj6fs', 'Reyna Duelist', 'HBD BEN10', '09651797310', 'divisoria', 'aj@gmail.com', '2022-04-16', '(1) Strawberry Cake, ', 'Cash on Delivery', '', '1500', 'confirmed', '04/11/22 05:23:24 PM', '04/11/22 05:24:01 PM', ''),
(251, 'ro93qdf14yg', 'maria dela Cruz', 'hbd maria', '09651797310', 'pasonanca', 'Juan@gmail.com', '2022-04-14', '(1) Aniv Cake, ', 'Cash on Delivery', '', '2500', 'confirmed', '04/11/22 05:25:47 PM', '04/11/22 05:26:28 PM', ''),
(252, 'gxyblze3wn2', 'Abusood Ladjamatli', 'HBD BEN10', '09651797310', 'divisoria', 'ben@gmail.com', '2022-04-15', '(1) Strawberry Cake, ', 'Cash on Delivery', '', '1500', 'confirmed', '04/11/22 05:32:42 PM', '04/15/22 02:06:16 PM', ''),
(253, 'pe4zu7twlib', 'Jett dela Cruz', 'hbd maria', '09651797310', 'Divisoria', 'ben@gmail.com', '2022-04-14', '(1) Mini cupcake, ', 'Cash on Delivery', '', '125', 'confirmed', '04/11/22 05:35:39 PM', '04/11/22 10:04:30 PM', ''),
(254, '0o78vlgnpq2', 'Jett Duelist', 'HBD jett', '09651797310', 'Divisoria', 'Juan@gmail.com', '2022-04-21', '(1) Cheese Cake, ', 'Gcash', '65676788978', '1500', 'confirmed', '04/18/22 11:32:40 AM', '04/18/22 11:37:24 AM', ''),
(256, '7gsxcvf6mkb', 'Jett Duelist', 'hbd Jett', '09651797310', 'Divisoria', 'aj@gmail.com', '2022-04-15', '(1) Mini cupcake, ', 'Cash on Delivery', '', '125', 'confirmed', '04/18/22 11:42:30 AM', '05/04/22 06:53:02 PM', ''),
(260, 'hio34zp902s', 'ben Matata', 'adsasdasd', '09651797310', 'Zamboanga City', 'asd@gmail.com', '2022-05-07', '(1) Aniv Cake, ', 'Cash on Delivery', '', '2500', 'confirmed', '04/30/22 12:30:19 PM', '05/01/22 12:56:48 PM', ''),
(264, 'y1achilngwx', 'Maria Jumat', 'hbd maria', '09651797310', 'Zamboanga City', 'maria@gmail.com', '2022-05-21', '(2) Mini cupcake, ', 'Cash on Delivery', '', '200', 'confirmed', '05/02/22 09:06:23 PM', '05/04/22 06:54:55 PM', ''),
(265, 'is1t74wd2hg', 'ben Matata', 'HBD hakuna', '09651797310', 'Zamboanga City', 'asd@gmail.com', '2022-05-19', '(1) Mini cupcake, ', 'Gcash', '12315356547', '125', 'confirmed', '05/04/22 06:44:06 PM', '05/04/22 06:52:52 PM', ''),
(266, 'hvp1sna9tbq', 'crazyboy asian', '13123', '09651797310', 'Divisoria', 'crzy@gmail.com', '2022-05-28', '(1) Aniv Cake, ', 'Gcash', '12312313', '2500', 'unconfirmed', '05/08/22 09:20:05 PM', '', ' '),
(267, 'znf9phw24rl', 'crazyboy asian', '', '09651797310', 'Divisoria', 'crzy@gmail.com', '2022-05-26', '(4) Aniv Cake, ', 'Gcash', '21313', '10000', 'unconfirmed', '05/08/22 11:06:46 PM', '', 'gcash.png'),
(268, '05mus236jnz', 'crazyboy asian', 'HBD boy', '09651797310', 'Divisoria', 'crzy@gmail.com', '2022-05-26', '(1) Mini cupcake, ', 'Gcash', '34242', '125', 'unconfirmed', '05/08/22 11:08:40 PM', '', 'gcash.png'),
(269, 'clxao16b359', 'crazyboy asian', '', '09651797310', 'Divisoria', 'crzy@gmail.com', '2022-06-02', '(1) Aniv Cake, ', 'Gcash', '424234', '2500', 'unconfirmed', '05/08/22 11:10:21 PM', '', 'gff.png'),
(270, 'wh5eat8z2sd', 'Abusood Ladjamatli', 'HBD Abusood', '09651797310', 'Divisoria', 'ladjamatli@gmail.com', '2022-05-28', '(1) Aniv Cake, ', 'Gcash', '454', '2500', 'unconfirmed', '05/08/22 11:12:05 PM', '', 'test.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `imgUrl` text NOT NULL,
  `Product` text NOT NULL,
  `Description` text NOT NULL,
  `Price` double NOT NULL,
  `Category` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `imgUrl`, `Product`, `Description`, `Price`, `Category`) VALUES
(89, 'cake.jpg', 'Strawberry Cake', 'Chocolate', 1500, 'cake'),
(90, 'capcake.jpg', 'Mini cupcake', 'Vanilla', 75, 'cupcake'),
(91, 'birthday.png', 'Aniv Cake', 'Strawberry cake', 2500, 'Aniversary Cake'),
(92, 'cake.jpg', 'Cheese Cake', 'White cheese and ice cream', 1500, 'Cheese Cake');

-- --------------------------------------------------------

--
-- Table structure for table `tbgraph`
--

CREATE TABLE IF NOT EXISTS `tbgraph` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(225) NOT NULL,
  `product` varchar(225) NOT NULL,
  `qty` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `tbgraph`
--

INSERT INTO `tbgraph` (`id`, `date`, `product`, `qty`) VALUES
(43, '03/09/22 07:57:13 PM', 'bday cake ', '4 '),
(44, '03/09/22', 'Cake', '22'),
(45, '03/09/22', 'Cake', '21'),
(46, '03/09/22 08:01:18 PM', 'mini cup cake/n', '3/n'),
(47, '03/09/22 08:03:07 PM', 'mini cup cake\r\nbday cake\r\ncupcake strawberry\r\n', '3\r\n5\r\n4\r\n'),
(48, '03/09/22 09:27:03 PM', 'cake vanilla\r\nBday Cake\r\n', '3\r\n3\r\n'),
(49, '03/12/22 10:09:59 PM', 'bday cake\r\ncupcake strawberry\r\n', '2\r\n9\r\n'),
(50, '03/12/22 10:11:01 PM', 'mini cup cake\r\ncake vanilla\r\n', '1\r\n2\r\n'),
(51, '03/12/22 10:13:35 PM', 'mini cup cake\r\n', '3\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE IF NOT EXISTS `tb_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `contact` varchar(225) NOT NULL,
  `user_address` varchar(225) NOT NULL,
  `user_email` varchar(225) NOT NULL,
  `user_password` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id`, `fname`, `lname`, `contact`, `user_address`, `user_email`, `user_password`) VALUES
(3, 'Abusood', 'Ladjamatli', '09651797310', 'Divisoria', 'ladjamatli@gmail.com', 'Gang199x'),
(15, 'crazyboy', 'asian', '09651797310', 'Divisoria', 'crzy@gmail.com', 'Crazy199x');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(0, 'admin', 'admin'),
(0, '123', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
