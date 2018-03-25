-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2018 at 11:10 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stock`
--
CREATE DATABASE IF NOT EXISTS `stock` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `stock`;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  `brand_active` int(11) NOT NULL DEFAULT '0',
  `brand_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_active`, `brand_status`) VALUES
(1, 'Gap', 1, 2),
(2, 'Forever 21', 1, 2),
(3, 'Gap', 1, 2),
(4, 'Forever 21', 1, 2),
(5, 'Adidas', 1, 2),
(6, 'Gap', 1, 2),
(7, 'Forever 21', 1, 2),
(8, 'Adidas', 1, 2),
(9, 'Gap', 1, 2),
(10, 'Forever 21', 1, 2),
(11, 'Adidas', 2, 1),
(12, 'Gap', 1, 1),
(13, 'Forever 21', 1, 1),
(14, 'Samsung', 1, 1),
(15, 'FBB', 1, 1),
(16, 'pepe', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL DEFAULT '0',
  `categories_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`categories_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_active`, `categories_status`) VALUES
(1, 'Sports ', 1, 2),
(2, 'Casual', 1, 2),
(3, 'Casual', 1, 2),
(4, 'Sport', 1, 2),
(5, 'Casual', 1, 2),
(6, 'Sport wear', 1, 2),
(7, 'Casual wear', 1, 1),
(8, 'Sports ', 1, 1),
(9, 'tetst', 1, 1),
(10, 'Mobile', 1, 1),
(11, 'T-shirt', 1, 1),
(12, 'jeans', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(255) NOT NULL,
  `ContactNo` int(11) NOT NULL,
  `Contact_Preson_Name` varchar(255) NOT NULL,
  `Contact_Preson_Number` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `Gst_num` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `CustomerName`, `ContactNo`, `Contact_Preson_Name`, `Contact_Preson_Number`, `Email`, `gender`, `Gst_num`, `active`, `status`) VALUES
(7, 'Half Pant', 0, '11', 7, '178', '1200', 1000, 1, 1),
(8, 'Polo T-shirt', 0, '12', 7, '193', '1200', 1000, 1, 1),
(9, 'test', 0, '11', 7, '392', '100', 80, 1, 1),
(10, 'qwe', 0, '12', 7, '977', '100', 80, 1, 1),
(11, 'S9+', 0, '14', 10, '100', '40', 50, 1, 1),
(12, 'T-shirt', 0, '15', 11, '93', '600', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `expence_record`
--

CREATE TABLE IF NOT EXISTS `expence_record` (
  `exp_id` int(11) NOT NULL AUTO_INCREMENT,
  `exp_reason` varchar(20) NOT NULL,
  `exp_amount` int(11) NOT NULL,
  `exp_date` date NOT NULL,
  `exp_note` varchar(40) NOT NULL,
  PRIMARY KEY (`exp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `expence_record`
--

INSERT INTO `expence_record` (`exp_id`, `exp_reason`, `exp_amount`, `exp_date`, `exp_note`) VALUES
(1, '', 0, '1970-01-01', ''),
(2, '', 10, '2018-03-14', ''),
(3, 'reason', 850, '2018-03-24', 'dsfdfgv ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `retailer_rate` varchar(255) NOT NULL,
  `dealer_rate` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `brand_id`, `categories_id`, `quantity`, `rate`, `retailer_rate`, `dealer_rate`, `active`, `status`) VALUES
(1, 'jeans', '../assests/images/stock/51665ab5e59899eab.jpg', 16, 12, '895', '850', '1000', '900', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `row_product_code`
--

CREATE TABLE IF NOT EXISTS `row_product_code` (
  `id` int(11) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `unit` int(11) NOT NULL,
  `opening_stock` int(11) NOT NULL,
  `rescieved_stock` int(11) NOT NULL,
  `used_stock` int(11) NOT NULL,
  `closing_stock` int(11) NOT NULL,
  `remark` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_record`
--

CREATE TABLE IF NOT EXISTS `stock_record` (
  `sotck_entry_id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `current_quantity` int(11) NOT NULL,
  `remain_quantity` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `inchal` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`sotck_entry_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `stock_record`
--

INSERT INTO `stock_record` (`sotck_entry_id`, `entry_date`, `quantity`, `current_quantity`, `remain_quantity`, `product_name`, `inchal`) VALUES
(1, '2018-03-21', 100, 0, 100, 'S9+', '194'),
(2, '2018-03-06', 43, 50, 93, 'T-shirt', '1'),
(3, '2018-03-24', 850, 45, 895, 'jeans', '520');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_image` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `retailer_rate` varchar(255) NOT NULL,
  `dealer_rate` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_image`, `brand_id`, `categories_id`, `quantity`, `rate`, `retailer_rate`, `dealer_rate`, `active`, `status`) VALUES
(7, 'Half Pant', '../assests/images/stock/1770257893463579bf.jpg', 11, 7, '178', '1200', '1000', '800', 1, 1),
(8, 'Polo T-shirt', '../assests/images/stock/136715789347d1aea6.jpg', 12, 7, '193', '1200', '1000', '700', 1, 1),
(9, 'test', '../assests/images/stock/3230559a6924b49f92.png', 11, 7, '392', '100', '80', '90', 1, 1),
(10, 'qwe', '../assests/images/stock/760559c6b48cb62f4.JPG', 12, 7, '977', '100', '80', '90', 1, 1),
(11, 'S9+', '../assests/images/stock/293865ab1f48e8c2f3.png', 14, 10, '100', '40', '50', '35', 1, 1),
(12, 'T-shirt', '../assests/images/stock/163955ab2300fe2705.png', 15, 11, '93', '600', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
