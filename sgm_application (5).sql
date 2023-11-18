-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 31, 2023 at 03:59 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `area_master`
--

INSERT INTO `area_master` (`id`, `area_name`, `created_by`, `created_on`, `updated_by`, `updated_on`, `e_d_optn`) VALUES
(3, 'Raipur', 0, '', 0, '', '0'),
(4, 'Bhilai', 0, '', 0, '', '0'),
(5, 'Kumhari', 0, '', 0, '', '0');

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
  `auth_id` text NOT NULL,
  `created_by` int NOT NULL,
  `created_on` text NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text NOT NULL,
  `e_d_optn` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee_master`
--

INSERT INTO `employee_master` (`id`, `emp_name`, `emp_mono`, `emp_password`, `auth_id`, `created_by`, `created_on`, `updated_by`, `updated_on`, `e_d_optn`) VALUES
(7, 'Anubhav', '8827703055', '123456789', '28,20,21,23,24,25,26,27', 0, '', 0, '', '0'),
(2, '', '', '', '', 0, '', 0, '', '0'),
(5, '', '', '', '26', 0, '', 0, '', '0'),
(6, 'Saziya', '6266546824', '123456', ' 18', 0, '', 0, '', '0'),
(8, 'Harsh', '7580843822', '123456', '23,24,25,26,27', 0, '', 0, '', '0'),
(9, 'shobhit', '7582937461', '78549', '28,20,23,24,25', 0, '', 0, '', '0');

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
  `general_desel` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `general_average` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `genral_remark` text NOT NULL,
  `created_on` text NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text NOT NULL,
  `e_d_optn` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `general_data_entry_master`
--

INSERT INTO `general_data_entry_master` (`id`, `general_date`, `vehical_id`, `noof_trips`, `work_descp`, `opening_meter`, `closing_meter`, `opening_dip`, `closing_dip`, `total_km`, `general_desel`, `general_average`, `genral_remark`, `created_on`, `updated_by`, `updated_on`, `e_d_optn`) VALUES
(6, '2023-10-26', 3, '3', 'nothing', '3444445', '09590', '509382349', '0954389', '90348759', '498570', '0945', 'lefj', '', 0, '', '0'),
(5, '2023-10-25', 3, '4', 'here is ', '45', '47', '4', '4', '35', '53', '34', '43434', '', 0, '', '0'),
(8, '2023-10-26', 3, '3', 'nothing', '3444445', '09590', '509382349', '0954389', '90348759', '498570', '0945', 'lefj', '', 0, '', '0'),
(9, '2023-10-25', 3, '4', 'here is ', '45', '47', '4', '4', '35', '53', '34', '43434', '', 0, '', '0'),
(10, '2023-10-26', 3, '3', 'nothing', '3444445', '09590', '509382349', '0954389', '90348759', '498570', '0945', 'lefj', '', 0, '', '0'),
(11, '2023-10-25', 3, '4', 'here is ', '45', '47', '4', '4', '35', '53', '34', '43434', '', 0, '', '0'),
(12, '2023-10-26', 3, '3', 'nothing', '3444445', '09590', '509382349', '0954389', '90348759', '498570', '0945', 'lefj', '', 0, '', '0'),
(13, '2023-10-25', 3, '4', 'here is ', '45', '47', '4', '4', '35', '53', '34', '43434', '', 0, '', '0'),
(14, '2023-10-26', 3, '3', 'nothing', '3444445', '09590', '509382349', '0954389', '90348759', '498570', '0945', 'lefj', '', 0, '', '0'),
(15, '2023-10-25', 3, '4', 'here is ', '45', '47', '4', '4', '35', '53', '34', '43434', '', 0, '', '0'),
(16, '2023-10-26', 3, '3', 'nothing', '3444445', '09590', '509382349', '0954389', '90348759', '498570', '0945', 'lefj', '', 0, '', '0'),
(17, '2023-10-25', 3, '4', 'here is ', '45', '47', '4', '4', '35', '53', '34', '43434', '', 0, '', '0'),
(18, '2023-10-26', 3, '3', 'nothing', '3444445', '09590', '509382349', '0954389', '90348759', '498570', '0945', 'lefj', '', 0, '', '0'),
(19, '2023-10-25', 3, '4', 'here is ', '45', '47', '4', '4', '35', '53', '34', '43434', '', 0, '', '0'),
(20, '2023-10-26', 3, '3', 'nothing', '3444445', '09590', '509382349', '0954389', '90348759', '498570', '0945', 'lefj', '', 0, '', '0'),
(21, '2023-10-25', 3, '4', 'here is ', '45', '47', '4', '4', '35', '53', '34', '43434', '', 0, '', '0'),
(22, '2023-10-26', 3, '3', 'nothing', '3444445', '09590', '509382349', '0954389', '90348759', '498570', '0945', 'lefj', '', 0, '', '0'),
(23, '2023-10-25', 3, '4', 'here is ', '45', '47', '4', '4', '35', '53', '34', '43434', '', 0, '', '0'),
(24, '2023-10-26', 3, '3', 'nothing', '3444445', '09590', '509382349', '0954389', '90348759', '498570', '0945', 'lefj', '', 0, '', '0'),
(25, '2023-10-25', 3, '4', 'here is ', '45', '47', '4', '4', '35', '53', '34', '43434', '', 0, '', '0'),
(26, '2023-10-26', 3, '3', 'nothing', '3444445', '09590', '509382349', '0954389', '90348759', '498570', '0945', 'lefj', '', 0, '', '0'),
(27, '2023-10-25', 3, '4', 'here is ', '45', '47', '4', '4', '35', '53', '34', '43434', '', 0, '', '0'),
(28, '2023-10-26', 3, '3', 'nothing', '3444445', '09590', '509382349', '0954389', '90348759', '498570', '0945', 'lefj', '', 0, '', '0'),
(29, '2023-10-25', 3, '4', 'here is ', '45', '47', '4', '4', '35', '53', '34', '43434', '', 0, '', '0'),
(30, '2023-10-26', 3, '3', 'nothing', '3444445', '09590', '509382349', '0954389', '90348759', '498570', '0945', 'lefj', '', 0, '', '0'),
(31, '2023-10-25', 3, '4', 'here is ', '45', '47', '4', '4', '35', '53', '34', '43434', '', 0, '', '0'),
(32, '2023-10-26', 3, '3', 'nothing', '3444445', '09590', '509382349', '0954389', '90348759', '498570', '0945', 'lefj', '', 0, '', '0'),
(33, '2023-10-25', 3, '4', 'here is ', '45', '47', '4', '4', '35', '53', '34', '43434', '', 0, '', '0'),
(34, '2023-10-26', 3, '3', 'nothing', '3444445', '09590', '509382349', '0954389', '90348759', '498570', '0945', 'lefj', '', 0, '', '0'),
(35, '2023-10-25', 3, '4', 'here is ', '45', '47', '4', '4', '35', '53', '34', '43434', '', 0, '', '0'),
(36, '2023-10-26', 3, '3', 'nothing', '3444445', '09590', '509382349', '0954389', '90348759', '498570', '0945', 'lefj', '', 0, '', '0'),
(37, '2023-10-25', 3, '4', 'here is ', '45', '47', '4', '4', '35', '53', '34', '43434', '', 0, '', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `manager_entry_master`
--

INSERT INTO `manager_entry_master` (`id`, `select_date`, `slip_no`, `vehical_no`, `total_qty`, `created_on`, `updated_by`, `updated_on`, `e_d_optn`) VALUES
(2, '2023-10-12', '12911', '123456', '4', '', 0, '', '0'),
(4, '2023-10-10', '230802', '88077030', '15', '', 0, '', '0'),
(5, '2023-10-23', '1809', '1253', '856', '', 0, '', '0'),
(6, '2023-10-10', 'anubhav_123', 'cg045284', '5', '', 0, '', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `module_master`
--

INSERT INTO `module_master` (`id`, `module_title`, `short_order`, `module_url`, `created_by`, `created_on`, `updated_by`, `updated_on`, `e_d_optn`) VALUES
(28, 'Module Master', '3', 'module_master.php', 0, '', 0, '', '0'),
(20, 'Dashboard', '1', 'dashboard.php', 0, '', 0, '', '0'),
(21, 'Employee Master', '2', 'employee_master.php', 0, '', 0, '', '0'),
(23, 'Area Master', '4', 'area_master.php', 0, '', 0, '', '0'),
(24, 'Vehicle Master', '5', 'vehicle_master.php', 0, '', 0, '', '0'),
(25, 'General Data Entry Master', '6', 'general_data_entry_master.php', 0, '', 0, '', '0'),
(26, 'Tank Entry Master', '7', 'tank_master.php', 0, '', 0, '', '0'),
(27, 'Manager Entry Master', '8', 'manager_entry_master.php', 0, '', 0, '', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tank_entry_master`
--

INSERT INTO `tank_entry_master` (`id`, `tank_entry_date`, `area_id`, `opening_meter`, `total_refil`, `closing_meter`, `diesel_out`, `tankentry_description`, `tank_dip`, `tank_balance`, `created_on`, `updated_by`, `updated_on`, `e_d_optn`) VALUES
(9, '2023-10-26', 4, '25000', '50000', '4324', '2000', 'sadf', '3', '3534', '', 0, '', '0'),
(11, '2023-10-30', 3, '2000', '2000', '202', '02', '20', '02', '020', '', 0, '', '0'),
(12, '2023-10-30', 3, '20202', '020', '20', '022', '02', '0220', '020', '', 0, '', '0'),
(13, '2023-10-30', 3, '25000', '50000', '20200', '200', '2020', '020', '0200', '', 0, '', '0'),
(14, '2023-10-30', 3, '0202025', '565552', '5252', '525252', '52525', '3255', '52353', '', 0, '', '0'),
(15, '2023-10-30', 3, '53525', '525325', '32525', '2352355', '5355', '253', '352', '', 0, '', '0'),
(16, '2023-10-30', 3, '5355', '5253', '5353', '535', '55555555555', '555555', '5', '', 0, '', '0'),
(17, '2023-10-30', 3, '876', '2000', '3434324', '23324', '342', '2434', '243432', '', 0, '', '0'),
(18, '2023-10-30', 3, '42343', '243', '243', '432', '243', '333', '333', '', 0, '', '0'),
(19, '2023-10-30', 3, '2', '2222', '2', '2', '2', '2', '2', '', 0, '', '0'),
(20, '2023-10-30', 3, '33', '3333', '2', '2', '22', '2', '2', '', 0, '', '0'),
(21, '2023-10-30', 3, '33', '33', '3', '3', '3', '3', '3', '', 0, '', '0'),
(22, '2023-10-30', 3, '3', '333', '3', '3', '3', '333', '333', '', 0, '', '0'),
(23, '2023-10-30', 3, '34242', '4242', '42432', '424234', '234234', '23423', '432423', '', 0, '', '0'),
(24, '2023-10-30', 3, '234234', '423423', '23423423', '32324', '34242', '3423', '32423', '', 0, '', '0'),
(25, '2023-10-30', 3, '23423324', '34324432', '432342432', '23443', '3422', '243234', '243243', '', 0, '', '0'),
(26, '2023-10-30', 3, '2434', '4243', '2342', '234', '24', '424', '2432', '', 0, '', '0'),
(27, '2023-10-30', 3, '4523534', '534534', '5345', '355', '35325', '3245', '353', '', 0, '', '0'),
(28, '2023-10-30', 3, '345435', '5435', '5345', '454', '553', '52', '23554', '', 0, '', '0'),
(29, '2023-10-30', 3, '54245', '2345', '235', '5345', '253', '35', '53', '', 0, '', '0'),
(30, '2023-10-30', 3, '335', '2', '3534', '235', '3525', '235', '2534', '', 0, '', '0'),
(31, '2023-10-30', 3, '334', '3523', '53553', '33554', '3252', '25', '353', '', 0, '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_master`
--

DROP TABLE IF EXISTS `vehicle_master`;
CREATE TABLE IF NOT EXISTS `vehicle_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vehical_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `vehicle_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `driver_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `driver_contactno` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_on` text NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `e_d_optn` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vehicle_master`
--

INSERT INTO `vehicle_master` (`id`, `vehical_name`, `vehicle_number`, `driver_name`, `driver_contactno`, `created_on`, `updated_by`, `updated_on`, `e_d_optn`) VALUES
(3, 'JCB 2', 'CG 07 4567', 'Harsh ', '123456789', '', 0, '', '0'),
(2, 'haiva', 'ggg', 'raman', '4095349', '', 0, '', '0'),
(4, 'truck', 'cg07 4534', 'ram', '123456789', '', 0, '', '0'),
(5, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(9, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(10, 'JCB 2', 'CG 07 4567', 'Harsh ', '123456789', '', 0, '', '0'),
(11, 'truck', 'cg07 4534', 'ram', '123456789', '', 0, '', '0'),
(12, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(13, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(14, 'JCB 2', 'CG 07 4567', 'Harsh ', '123456789', '', 0, '', '0'),
(15, 'haiva', 'ggg', 'raman', '4095349', '', 0, '', '0'),
(16, 'truck', 'cg07 4534', 'ram', '123456789', '', 0, '', '0'),
(17, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(18, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(19, 'JCB 2', 'CG 07 4567', 'Harsh ', '123456789', '', 0, '', '0'),
(20, 'truck', 'cg07 4534', 'ram', '123456789', '', 0, '', '0'),
(21, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(22, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(23, 'JCB 2', 'CG 07 4567', 'Harsh ', '123456789', '', 0, '', '0'),
(24, 'haiva', 'ggg', 'raman', '4095349', '', 0, '', '0'),
(25, 'truck', 'cg07 4534', 'ram', '123456789', '', 0, '', '0'),
(26, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(27, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(28, 'JCB 2', 'CG 07 4567', 'Harsh ', '123456789', '', 0, '', '0'),
(29, 'truck', 'cg07 4534', 'ram', '123456789', '', 0, '', '0'),
(30, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(31, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(32, 'JCB 2', 'CG 07 4567', 'Harsh ', '123456789', '', 0, '', '0'),
(33, 'haiva', 'ggg', 'raman', '4095349', '', 0, '', '0'),
(34, 'truck', 'cg07 4534', 'ram', '123456789', '', 0, '', '0'),
(35, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(36, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(37, 'JCB 2', 'CG 07 4567', 'Harsh ', '123456789', '', 0, '', '0'),
(38, 'truck', 'cg07 4534', 'ram', '123456789', '', 0, '', '0'),
(39, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(40, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(41, 'JCB 2', 'CG 07 4567', 'Harsh ', '123456789', '', 0, '', '0'),
(42, 'haiva', 'ggg', 'raman', '4095349', '', 0, '', '0'),
(43, 'truck', 'cg07 4534', 'ram', '123456789', '', 0, '', '0'),
(44, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(45, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(46, 'JCB 2', 'CG 07 4567', 'Harsh ', '123456789', '', 0, '', '0'),
(47, 'truck', 'cg07 4534', 'ram', '123456789', '', 0, '', '0'),
(48, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(49, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(50, 'JCB 2', 'CG 07 4567', 'Harsh ', '123456789', '', 0, '', '0'),
(51, 'haiva', 'ggg', 'raman', '4095349', '', 0, '', '0'),
(52, 'truck', 'cg07 4534', 'ram', '123456789', '', 0, '', '0'),
(53, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(54, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(55, 'JCB 2', 'CG 07 4567', 'Harsh ', '123456789', '', 0, '', '0'),
(56, 'truck', 'cg07 4534', 'ram', '123456789', '', 0, '', '0'),
(57, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(58, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(59, 'JCB 2', 'CG 07 4567', 'Harsh ', '123456789', '', 0, '', '0'),
(60, 'haiva', 'ggg', 'raman', '4095349', '', 0, '', '0'),
(61, 'truck', 'cg07 4534', 'ram', '123456789', '', 0, '', '0'),
(62, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(63, 'truck 1', 'cg04 5678', 'karan', '94579820', '', 0, '', '0'),
(64, 'JCB 2', 'CG 07 4567', 'Harsh ', '123456789', '', 0, '', '0'),
(65, 'truck', 'cg07 4534', 'ram', '123456789', '', 0, '', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
