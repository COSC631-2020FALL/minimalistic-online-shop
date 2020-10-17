
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `admins` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO `admins` (`user_id`, `user_email`, `user_pass`) VALUES
(1, 'asdf@gmail.com', '631'),
(2, 'zxcv@gmail.com', '631');


CREATE TABLE `product` (
  `type_id` int(11) NOT NULL,
  `type_title` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO `product` (`type_id`, `type_title`) VALUES
(1, 'Handmade Crafts'),
(2, '3D Prints'),
(3, 'T-Shirts'),
(4, 'T-Shirt Prints'),
(5, 'Used Books');


CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `cust_fname` text NOT NULL,
  `cust_lname` text,
  `cust_email` varchar(100) NOT NULL,
  `cust_pass` varchar(100) NOT NULL,
  `cust_country` text,
  `cust_city` text,
  `cust_addr` varchar(255) NOT NULL,
  `cust_phone` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO `customers` (`cust_id`, `cust_fname`, `cust_lname`, `cust_email`, `cust_pass`, `cust_country`, `cust_city`, `cust_addr`, `cust_phone`) VALUES
(1, 'Odom', 'Water', 'owater@gmail.com', '631', 'United States', 'Ann Arbor', '', '7345269988'),
(2, 'Eric', 'Smith', 'esmith@gmail.com', '631', 'United States', 'Ann Arbor', '', '7345269928');




