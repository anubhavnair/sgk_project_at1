-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 13, 2023 at 03:39 AM
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
-- Database: `u330406990_sgm_applicatio`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_master`
--

DROP TABLE IF EXISTS `area_master`;
CREATE TABLE IF NOT EXISTS `area_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `area_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_on` text COLLATE utf8mb4_general_ci NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text COLLATE utf8mb4_general_ci NOT NULL,
  `e_d_optn` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `area_master`
--

INSERT INTO `area_master` (`id`, `area_name`, `created_by`, `created_on`, `updated_by`, `updated_on`, `e_d_optn`) VALUES
(12, 'Mudhipar', 7, '2023-11-30 11:53:13', 0, '', 1),
(11, 'Era', 7, '2023-11-30 11:52:56', 0, '', 1),
(10, 'Changori', 7, '2023-11-30 11:52:47', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `authentication_master`
--

DROP TABLE IF EXISTS `authentication_master`;
CREATE TABLE IF NOT EXISTS `authentication_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emp_id` int NOT NULL,
  `module_id` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_on` text COLLATE utf8mb4_general_ci NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text COLLATE utf8mb4_general_ci NOT NULL,
  `e_d_optn` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_master`
--

DROP TABLE IF EXISTS `employee_master`;
CREATE TABLE IF NOT EXISTS `employee_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emp_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `emp_mono` text COLLATE utf8mb4_general_ci NOT NULL,
  `emp_password` text COLLATE utf8mb4_general_ci NOT NULL,
  `emp_login_type` int NOT NULL DEFAULT '0',
  `auth_id` text COLLATE utf8mb4_general_ci NOT NULL,
  `emp_area_id` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_on` text COLLATE utf8mb4_general_ci NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text COLLATE utf8mb4_general_ci NOT NULL,
  `e_d_optn` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_master`
--

INSERT INTO `employee_master` (`id`, `emp_name`, `emp_mono`, `emp_password`, `emp_login_type`, `auth_id`, `emp_area_id`, `created_by`, `created_on`, `updated_by`, `updated_on`, `e_d_optn`) VALUES
(7, 'Master Admin', '8305189157', 'admin', 1, '28,21,23,24,25,26,27', '12,11,10', 0, '', 0, '', 1),
(28, 'Roshan', '6260761902', 'R12345', 0, '28,21,23,24,25', '10', 7, '2023-12-08 05:54:53', 0, '', 1),
(29, 'manish', '7987344030', 'manish', 0, '25,26,27', '10', 7, '2023-12-13 09:03:04', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `general_data_entry_master`
--

DROP TABLE IF EXISTS `general_data_entry_master`;
CREATE TABLE IF NOT EXISTS `general_data_entry_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `general_date` text COLLATE utf8mb4_general_ci NOT NULL,
  `vehical_id` int NOT NULL,
  `noof_trips` text COLLATE utf8mb4_general_ci NOT NULL,
  `work_descp` text COLLATE utf8mb4_general_ci NOT NULL,
  `opening_meter` text COLLATE utf8mb4_general_ci NOT NULL,
  `closing_meter` text COLLATE utf8mb4_general_ci NOT NULL,
  `opening_dip` text COLLATE utf8mb4_general_ci NOT NULL,
  `closing_dip` text COLLATE utf8mb4_general_ci NOT NULL,
  `total_km` text COLLATE utf8mb4_general_ci NOT NULL,
  `general_desel` text COLLATE utf8mb4_general_ci NOT NULL,
  `general_average` text COLLATE utf8mb4_general_ci NOT NULL,
  `genral_remark` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_on` text COLLATE utf8mb4_general_ci NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text COLLATE utf8mb4_general_ci NOT NULL,
  `e_d_optn` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manager_entry_master`
--

DROP TABLE IF EXISTS `manager_entry_master`;
CREATE TABLE IF NOT EXISTS `manager_entry_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `select_date` text COLLATE utf8mb4_general_ci NOT NULL,
  `slip_no` text COLLATE utf8mb4_general_ci NOT NULL,
  `vehical_no` text COLLATE utf8mb4_general_ci NOT NULL,
  `total_qty` text COLLATE utf8mb4_general_ci NOT NULL,
  `slip_image` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_on` text COLLATE utf8mb4_general_ci NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text COLLATE utf8mb4_general_ci NOT NULL,
  `e_d_optn` int NOT NULL DEFAULT '1',
  `created_by` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `module_master`
--

DROP TABLE IF EXISTS `module_master`;
CREATE TABLE IF NOT EXISTS `module_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `module_title` text COLLATE utf8mb4_general_ci NOT NULL,
  `short_order` text COLLATE utf8mb4_general_ci NOT NULL,
  `module_url` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_on` text COLLATE utf8mb4_general_ci NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text COLLATE utf8mb4_general_ci NOT NULL,
  `e_d_optn` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `module_master`
--

INSERT INTO `module_master` (`id`, `module_title`, `short_order`, `module_url`, `created_by`, `created_on`, `updated_by`, `updated_on`, `e_d_optn`) VALUES
(28, 'Module Master', '3', 'module_master.php', 0, '', 0, '', 1),
(20, 'Dashboard', '1', 'dashboard.php', 0, '', 0, '', 1),
(21, 'Employee Master', '2', 'employee_master.php', 0, '', 0, '', 1),
(23, 'Area Master', '4', 'area_master.php', 0, '', 0, '', 1),
(24, 'Vehical', '5', 'vehicle_master.php', 0, '', 0, '', 1),
(25, 'General Data Entry Master', '6', 'general_data_entry_master.php', 0, '', 0, '', 1),
(26, 'Tank Entry Master', '7', 'tank_master.php', 0, '', 0, '', 1),
(27, 'Manager Entry Master', '8', 'manager_entry_master.php', 0, '', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tank_entry_detail_table`
--

DROP TABLE IF EXISTS `tank_entry_detail_table`;
CREATE TABLE IF NOT EXISTS `tank_entry_detail_table` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tank_main_id` int NOT NULL,
  `descp` text COLLATE utf8mb4_general_ci NOT NULL,
  `dip` text COLLATE utf8mb4_general_ci NOT NULL,
  `total_desel_out` text COLLATE utf8mb4_general_ci NOT NULL,
  `total_balance` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_on` text COLLATE utf8mb4_general_ci NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text COLLATE utf8mb4_general_ci NOT NULL,
  `e_d_optn` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tank_entry_master`
--

DROP TABLE IF EXISTS `tank_entry_master`;
CREATE TABLE IF NOT EXISTS `tank_entry_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tank_entry_date` text COLLATE utf8mb4_general_ci NOT NULL,
  `area_id` int NOT NULL,
  `opening_meter` text COLLATE utf8mb4_general_ci NOT NULL,
  `total_refil` text COLLATE utf8mb4_general_ci NOT NULL,
  `closing_meter` text COLLATE utf8mb4_general_ci NOT NULL,
  `diesel_out` text COLLATE utf8mb4_general_ci NOT NULL,
  `tank_balance` text COLLATE utf8mb4_general_ci NOT NULL,
  `send_area_id` int NOT NULL,
  `send_refill` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_on` text COLLATE utf8mb4_general_ci NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text COLLATE utf8mb4_general_ci NOT NULL,
  `e_d_optn` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_master`
--

DROP TABLE IF EXISTS `vehicle_master`;
CREATE TABLE IF NOT EXISTS `vehicle_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vehical_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `vehicle_number` text COLLATE utf8mb4_general_ci NOT NULL,
  `driver_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `driver_contactno` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_on` text COLLATE utf8mb4_general_ci NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text COLLATE utf8mb4_general_ci NOT NULL,
  `e_d_optn` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_master`
--

INSERT INTO `vehicle_master` (`id`, `vehical_name`, `vehicle_number`, `driver_name`, `driver_contactno`, `created_on`, `updated_by`, `updated_on`, `e_d_optn`) VALUES
(12, 'Hyva Truck', 'a', 'a', 's', '2023-12-04 09:14:35', 7, '', 1),
(11, 'Tractor Loader', 'a', 'a', 'a', '2023-12-04 09:13:50', 7, '', 1),
(10, 'Tanker Gadi', 'a', 'a', 'a', '2023-12-04 09:13:24', 7, '', 1),
(9, 'JCB', 'a', 'a', 'a', '2023-12-04 09:12:54', 7, '', 1),
(8, '1.40(BRC)', 'a', 'a', 'a', '2023-12-04 09:12:46', 7, '', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
