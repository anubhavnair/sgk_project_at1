-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 23, 2023 at 06:44 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sgm_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_master`
--

DROP TABLE IF EXISTS `area_master`;
CREATE TABLE IF NOT EXISTS `area_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `area_name` text NOT NULL,
  `created_by` int NOT NULL,
  `created_on` text NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text NOT NULL,
  `e_d_optn` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `authentication_master`
--

DROP TABLE IF EXISTS `authentication_master`;
CREATE TABLE IF NOT EXISTS `authentication_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emp_id` int NOT NULL,
  `module_id` text NOT NULL,
  `created_by` int NOT NULL,
  `created_on` text NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text NOT NULL,
  `e_d_optn` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_master`
--

DROP TABLE IF EXISTS `employee_master`;
CREATE TABLE IF NOT EXISTS `employee_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emp_name` text NOT NULL,
  `emp_mono` text NOT NULL,
  `emp_password` text NOT NULL,
  `created_by` int NOT NULL,
  `created_on` text NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text NOT NULL,
  `e_d_optn` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_data_entry_master`
--

DROP TABLE IF EXISTS `general_data_entry_master`;
CREATE TABLE IF NOT EXISTS `general_data_entry_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `general_date` text NOT NULL,
  `vehical_id` int NOT NULL,
  `noof_trips` text NOT NULL,
  `work_descp` text NOT NULL,
  `opening_meter` text NOT NULL,
  `closing_meter` text NOT NULL,
  `opening_dip` text NOT NULL,
  `closing_dip` text NOT NULL,
  `total_km` text NOT NULL,
  `genral_remark` text NOT NULL,
  `created_on` text NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text NOT NULL,
  `e_d_optn` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manager_entry_master`
--

DROP TABLE IF EXISTS `manager_entry_master`;
CREATE TABLE IF NOT EXISTS `manager_entry_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `select_date` text NOT NULL,
  `slip_no` text NOT NULL,
  `vehical_no` text NOT NULL,
  `total_qty` text NOT NULL,
  `created_on` text NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text NOT NULL,
  `e_d_optn` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `module_master`
--

DROP TABLE IF EXISTS `module_master`;
CREATE TABLE IF NOT EXISTS `module_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `module_title` text NOT NULL,
  `short_order` text NOT NULL,
  `module_url` text NOT NULL,
  `created_by` int NOT NULL,
  `created_on` text NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text NOT NULL,
  `e_d_optn` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `module_master`
--

INSERT INTO `module_master` (`id`, `module_title`, `short_order`, `module_url`, `created_by`, `created_on`, `updated_by`, `updated_on`, `e_d_optn`) VALUES
(11, 'Anubhav updated', 'anu updated', 'url updated', 0, '', 0, '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tank_entry_master`
--

DROP TABLE IF EXISTS `tank_entry_master`;
CREATE TABLE IF NOT EXISTS `tank_entry_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tank_entry_date` text NOT NULL,
  `area_id` int NOT NULL,
  `opening_meter` text NOT NULL,
  `total_refil` text NOT NULL,
  `closing_meter` text NOT NULL,
  `diesel_out` text NOT NULL,
  `tankentry_description` text NOT NULL,
  `tank_dip` text NOT NULL,
  `tank_balance` text NOT NULL,
  `created_on` text NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text NOT NULL,
  `e_d_optn` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehical_master`
--

DROP TABLE IF EXISTS `vehical_master`;
CREATE TABLE IF NOT EXISTS `vehical_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vehical_name` text NOT NULL,
  `driver_name` text NOT NULL,
  `driver_contactno` text NOT NULL,
  `created_on` text NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text NOT NULL,
  `e_d_optn` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
