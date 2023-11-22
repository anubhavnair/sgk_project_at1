-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 18, 2023 at 04:10 PM
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
  `tank_balance` text NOT NULL,
  `created_on` text NOT NULL,
  `updated_by` int NOT NULL,
  `updated_on` text NOT NULL,
  `e_d_optn` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tank_entry_master`
--

INSERT INTO `tank_entry_master` (`id`, `tank_entry_date`, `area_id`, `opening_meter`, `total_refil`, `closing_meter`, `diesel_out`, `tank_balance`, `created_on`, `updated_by`, `updated_on`, `e_d_optn`) VALUES
(52, '2023-11-18', 3, '200', '250', '220', '20', '250', '2023-11-18 18:49:09', 7, '2023-11-18 19:25:10', '1'),
(51, '2023-11-18', 3, '200', '490', '220', '20', '470', '2023-11-18 17:34:42', 7, '2023-11-18 20:51:35', '0'),
(50, '2023-11-18', 3, '200', '490', '220', '20', '470', '2023-11-18 16:47:39', 7, '2023-11-18 18:18:58', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
