-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jun 09, 2015 at 10:54 AM
-- Server version: 5.0.27
-- PHP Version: 5.2.1
-- 
-- Database: `cargo`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `package_tbl`
-- 

CREATE TABLE `package_tbl` (
  `package_id` int(10) unsigned NOT NULL auto_increment,
  `emp_id` int(10) unsigned NOT NULL,
  `item` varchar(30) NOT NULL,
  `plength` varchar(10) NOT NULL,
  `pwidth` varchar(100) NOT NULL,
  `pheight` varchar(100) NOT NULL,
  `psection` varchar(50) NOT NULL,
  `detail` varchar(100) NOT NULL,
  PRIMARY KEY  (`package_id`),
  KEY `stu_id` (`stu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `package_tbl`
-- 

INSERT INTO `package_tbl` (`item_id`, `stu_id`, `item`, `plength`, `pwidth`, `pheight`, `psection`, `detail`) VALUES 
(1, 15, 'PC45', '60', '55', '67', 'Edtech', 'Computer');


-- --------------------------------------------------------

-- 
-- Table structure for table `stu_tbl`
-- 

CREATE TABLE `stu_tbl` (
  `emp_id` int(10) unsigned NOT NULL auto_increment,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `groupl` char(10) NOT NULL,
  `department` varchar(30) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mail` varchar(70) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  PRIMARY KEY  (`stu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- 
-- Dumping data for table `stu_tbl`
-- 

INSERT INTO `stu_tbl` (`emp_id`, `f_name`, `l_name`, `group1`, `department`, `unit`, `phone`, `mail`, `remarks`) VALUES 
(15, 'Sabile', 'Mac', 'EdTech','Central', 'OVCAA', '0757344455', 'msabile@up.edu.ph', 'Cleared');


-- --------------------------------------------------------

-- 
-- Table structure for table `users_tbl`
-- 

CREATE TABLE `users_tbl` (
  `u_id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` char(10) NOT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY  (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `users_tbl`
-- 

INSERT INTO `users_tbl` (`u_id`, `username`, `password`, `type`, `note`) VALUES 
(4, 'yyyy', 'xxx', 'creator', 'assignment');

-- 
-- Constraints for dumped tables
-- 

-- 
-- Constraints for table `package_tbl`
-- 
ALTER TABLE `package_tbl`
  ADD CONSTRAINT `package_tbl_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `stu_tbl` (`stu_id`) ON DELETE CASCADE ON UPDATE CASCADE;
